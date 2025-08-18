<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Reward;
use App\Models\Setting;
use App\Models\UserAddress;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Show Checkout Page
     */
    public function index()
    {
        $user = Auth::user();

        // Fetch cart items
        $cartItems = Order::with('dish', 'quantity')
            ->where('user_id', $user->id)
            ->where('order_stage', 'in_cart')
            ->get();

        // Totals
        $subtotal = $cartItems->sum(fn($item) => ($item->quantity->original_price ?? 0) * $item->cart_quantity);
        $discountedTotal = $cartItems->sum(fn($item) => ($item->quantity->discount_price ?? 0) * $item->cart_quantity);
        $savings = $cartItems->sum(fn($item) => (($item->quantity->original_price ?? 0) - ($item->quantity->discount_price ?? 0)) * $item->cart_quantity);

        // Coupon
        $appliedCoupon = $cartItems->firstWhere('applied_coupon_id', '!=', null);
        $discountAmount = $cartItems->sum(fn($item) => $item->coupon_discount ?? 0);

        // Grand total after discount
        $grandTotal = max(0, $discountedTotal - $discountAmount);

        // Rewards
        $reward = Reward::where('min_cart_value', '<=', $grandTotal)
            ->orderBy('min_cart_value', 'desc')
            ->first();
        $rewardMessage = $reward?->reward_message;

        // Save reward message in orders
        Order::where('user_id', $user->id)
            ->where('order_stage', 'in_cart')
            ->update(['reward_message' => $rewardMessage]);

        // Addresses
        $addresses = UserAddress::where('user_id', $user->id)->get();

        // Coupons
        $usedCoupons = $user->couponUsages()->pluck('coupon_id');
        $availableCoupons = Coupon::where('active', true)
            ->whereDate('expiry_date', '>=', now())
            ->whereNotIn('id', $usedCoupons)
            ->get();

        // Find best coupon
        $bestCoupon = null;
        $maxSavings = 0;
        foreach ($availableCoupons as $coupon) {
            $potentialSavings = $coupon->type === 'fixed'
                ? $coupon->value
                : ($grandTotal * $coupon->value) / 100;

            if ($potentialSavings > $maxSavings) {
                $maxSavings = $potentialSavings;
                $bestCoupon = $coupon;
            }
        }

        return view('user.checkout', compact(
            'cartItems',
            'subtotal',
            'discountedTotal',
            'savings',
            'grandTotal',
            'addresses',
            'availableCoupons',
            'bestCoupon',
            'discountAmount',
            'appliedCoupon',
            'rewardMessage'
        ));
    }

    /**
     * Save or Update Shipping Address
     */
    public function saveAddress(Request $request)
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->where('order_stage', 'in_cart')->get();

        if ($orders->isEmpty()) {
            return redirect()->back()->with('error', 'No active orders found.');
        }

        if ($request->selected_address && $request->selected_address !== "new") {
            $address = UserAddress::find($request->selected_address);
            if ($address) {
                $address->update($request->only([
                    'country',
                    'first_name',
                    'last_name',
                    'company',
                    'address',
                    'apartment',
                    'city',
                    'state',
                    'zip_code',
                    'phone'
                ]));
            }
        } else {
            $address = UserAddress::create([
                'user_id' => $user->id
            ] + $request->only([
                            'country',
                            'first_name',
                            'last_name',
                            'company',
                            'address',
                            'apartment',
                            'city',
                            'state',
                            'zip_code',
                            'phone'
                        ]));
        }

        $addressJson = json_encode($address->toArray(), JSON_PRETTY_PRINT);

        foreach ($orders as $order) {
            $order->update([
                'selected_address' => $addressJson,
                'type_of_shipping' => 'priority_shipping'
            ]);
        }

        return redirect()->route('shipping.page')->with('success', 'Shipping address updated successfully.');
    }

    /**
     * Apply Coupon
     */
    public function applyCoupon(Request $request)
    {
        $request->validate(['promo_code' => 'required|string']);

        $user = Auth::user();
        $coupon = Coupon::where('code', $request->promo_code)
            ->where('active', true)
            ->whereDate('expiry_date', '>=', now())
            ->first();

        if (!$coupon) {
            return response()->json(['success' => false, 'message' => 'Invalid or expired coupon.']);
        }

        if ($user->couponUsages()->where('coupon_id', $coupon->id)->exists()) {
            return response()->json(['success' => false, 'message' => 'You have already used this coupon.']);
        }

        $cartItems = Order::where('user_id', $user->id)->where('order_stage', 'in_cart')->get();
        if ($cartItems->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'Your cart is empty.']);
        }

        $cartTotal = $cartItems->sum('total_amount');

        if ($coupon->minimum_order_value && $cartTotal < $coupon->minimum_order_value) {
            return response()->json(['success' => false, 'message' => 'Cart total is less than the minimum required.']);
        }

        $discount = $coupon->type === 'percentage'
            ? ($cartTotal * ($coupon->value / 100))
            : $coupon->value;

        $newTotal = max(0, $cartTotal - $discount);

        foreach ($cartItems as $item) {
            $item->update([
                'applied_coupon_id' => $coupon->id,
                'coupon_discount' => $discount / $cartItems->count(),
            ]);
        }

        $user->couponUsages()->create(['coupon_id' => $coupon->id]);

        return response()->json([
            'success' => true,
            'message' => 'Coupon Applied Successfully!',
            'discount' => convertPrice($discount),
            'discount_raw' => $discount,
            'new_total' => convertPrice($newTotal),
            'new_total_raw' => $newTotal
        ]);
    }

    /**
     * Shipping Page
     */
    public function shipping()
    {
        $user = Auth::user();

        $cartItems = Order::with('dish', 'quantity')
            ->where('user_id', $user->id)
            ->where('order_stage', 'in_cart')
            ->get();

        $subtotal = $cartItems->sum(fn($item) => $item->quantity->original_price * $item->cart_quantity);
        $discountedTotal = $cartItems->sum(fn($item) => $item->quantity->discount_price * $item->cart_quantity);
        $savings = $subtotal - $discountedTotal;
        $appliedCoupon = $cartItems->firstWhere('applied_coupon_id', '!=', null);
        $discountAmount = $cartItems->sum(fn($item) => $item->coupon_discount ?? 0);
        $grandTotal = max(0, $discountedTotal - $discountAmount);

        $userAddress = UserAddress::where('user_id', $user->id)->first();
        $country = $userAddress->country ?? 'India';

        /**
         * Price-based shipping logic
         * You can change these later as per your needs
         */
        if ($grandTotal <= 1000) {
            $shippingCost = 90;
        } elseif ($grandTotal <= 2000) {
            $shippingCost = 120;
        } elseif ($grandTotal <= 5000) {
            $shippingCost = 150;
        } elseif ($grandTotal <= 10000) {
            $shippingCost = 200;
        } else {
            $shippingCost = 0; // free shipping above ₹10000
        }

        // Assign shipping cost equally per item
        $cartItemCount = $cartItems->count();
        $shippingPerItem = $cartItemCount > 0 ? ($shippingCost / $cartItemCount) : 0;

        foreach ($cartItems as $item) {
            $item->shipping_cost = $shippingPerItem;
            $item->save();
        }

        // Add shipping to grand total
        $grandTotalWithShipping = $grandTotal + $shippingCost;

        return view('user.shipping', compact(
            'cartItems',
            'subtotal',
            'discountedTotal',
            'savings',
            'grandTotal',
            'grandTotalWithShipping',
            'userAddress',
            'discountAmount',
            'shippingCost'
        ));
    }

    /**
     * Update Shipping Method
     */
    public function updateShippingMethod(Request $request)
    {
        $user = Auth::user();
        $shippingMethod = $request->shipping_method;

        // Get cart items
        $cartItems = Order::with('quantity')
            ->where('user_id', $user->id)
            ->where('order_stage', 'in_cart')
            ->get();

        // Calculate grand total (discount applied)
        $discountedTotal = $cartItems->sum(fn($item) => $item->quantity->discount_price * $item->cart_quantity);
        $discountAmount = $cartItems->sum(fn($item) => $item->coupon_discount ?? 0);
        $grandTotal = max(0, $discountedTotal - $discountAmount);

        // Price-based shipping cost logic
        if ($grandTotal <= 1000) {
            $shippingCost = 90;
        } elseif ($grandTotal <= 2000) {
            $shippingCost = 120;
        } elseif ($grandTotal <= 5000) {
            $shippingCost = 150;
        } elseif ($grandTotal <= 10000) {
            $shippingCost = 200;
        } else {
            $shippingCost = 0; // Free shipping above ₹10000
        }

        // Distribute shipping per item
        $cartItemCount = $cartItems->count();
        $shippingPerItem = $cartItemCount > 0 ? ($shippingCost / $cartItemCount) : 0;

        // Save shipping method & cost
        foreach ($cartItems as $item) {
            $item->type_of_shipping = $shippingMethod;
            $item->shipping_cost = $shippingPerItem;
            $item->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Shipping method updated successfully!',
            'shipping_cost' => $shippingCost,
            'grand_total_with_shipping' => $grandTotal + $shippingCost
        ]);
    }

}
