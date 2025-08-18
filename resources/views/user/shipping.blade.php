@extends('layouts.app')
@section('title', 'Shipping')
@section('content')
    <div class="container py-5">
        <ol class="breadcrumb justify-content-start mb-3 mt-2 fs-3">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user.cart') }}">Cart</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('checkout') }}">Information</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
        </ol>
        <div class="row">
            <!-- Left Section: Shipping Details -->
            <div class="left-panel col-md-7">
                <h2 class="mb-4">Shipping method</h2>
                <div class="card p-4 mb-4">
                    <h5>Contact</h5>
                    <p>{{ auth()->user()->email }}</p>
                    <hr>
                    <h5>Ship to</h5>
                    @php
                        $selectedAddress = json_decode($cartItems->first()->selected_address ?? '{}', true);
                    @endphp

                    <p>
                        {{ $selectedAddress['address'] ?? 'No address provided' }},
                        {{ $selectedAddress['zip_code'] ?? '' }},
                        {{ $selectedAddress['phone'] ?? '' }}
                        <a href="{{route('checkout.process')}}">Change</a>
                    </p>

                </div>
                @php
                    // Get the type_of_shipping from the first "in_cart" order (assuming all have the same type)
                    $selectedShipping = $cartItems->first() ? $cartItems->first()->type_of_shipping : 'priority_shipping';
                @endphp

                @php
                    // guarantee variables exist
                    $selectedShipping = $selectedShipping ?? 'priority_shipping';
                    $priorityShipping = $priorityShipping ?? 0;
                    $standardShipping = $standardShipping ?? 0;
                    $shippingCost = $shippingCost ?? ($selectedShipping === 'priority_shipping' ? $priorityShipping : $standardShipping);
                @endphp
                <div class="card p-4">
                    <h5>Shipping Charges</h5>
                    <div class="d-flex justify-content-between mt-2 mb-3">
                        <span class="text-dark fw-bold">Shipping Charges</span>
                        <span id="shipping-cost" class="text-dark fw-bold adding">
                            + {{ $shippingCost == 0 ? 'FREE' : convertPrice($shippingCost) }}
                        </span>
                    </div>
                </div>
                <hr>

                <div class="text-end mb-3">
                    <button id="continue-payment" class="btn btn-primary mt-4">Continue to payment</button>
                </div>

            </div>

            <!-- Right Section: Order Summary -->
            <div class="right-panel col-12 col-lg-4">
                <div class="card p-3">
                    @foreach ($cartItems as $item)
                        <div class="d-flex align-items-center justify-content-between mb-3 p-2 border rounded"
                            style="gap: 12px; background: #fff;">

                            <!-- Dish Image -->
                            <img src="{{ asset('dish_images/' . $item->dish->image) }}" width="80" height="80" class="rounded"
                                style="object-fit: cover;">

                            <!-- Dish Details -->
                            <div class="flex-grow-1">
                                <p class="mb-1 fw-bold text-dark">{{ $item->dish->name }}</p>
                                <p class="mb-0 fw-bold text-success" style="font-size: 0.85rem;">
                                    {{ $item->quantity->weight }} | Qty: {{ $item->cart_quantity }}
                                </p>
                            </div>

                            <!-- Pricing Section -->
                            <div class="text-end">
                                <p class="mb-0 fw-bold text-dark">{{ convertPrice($item->quantity->discount_price) }}</p>
                                <p class="mb-0 text-decoration-line-through text-primary" style="font-size: 0.9rem;">
                                    {{ convertPrice($item->quantity->original_price) }}
                                </p>
                            </div>

                        </div>
                    @endforeach

                    @php
                        // Get the type_of_shipping from the first "in_cart" order
                        $selectedShipping = $cartItems->first() ? $cartItems->first()->type_of_shipping : 'priority_shipping';
                        $shippingCost = $shippingCost ?? ($selectedShipping === 'priority_shipping' ? $priorityShipping : $standardShipping);
                        $grandTotalWithShipping = $grandTotal + $shippingCost;

                        $convertedAmount = PaymentPrice($grandTotalWithShipping, true); // Only once
                    @endphp

                    <div class="mt-3">
                        <div class="d-flex justify-content-between mt-2 mb-3">
                            <span class="text-dark fw-bold">Subtotal (Original Price)</span>
                            <span class="text-dark fw-bold">{{ convertPrice($subtotal) }}</span>
                        </div>

                        <div class="d-flex justify-content-between text-danger fw-bold mt-2 mb-3">
                            <span class="text-dark fw-bold">Your Savings</span>
                            <span class="savings">- {{ convertPrice($savings) }}</span>
                        </div>

                        <div class="d-flex justify-content-between mt-2 mb-3">
                            <span class="text-dark fw-bold">Total</span>
                            <span class="text-dark fw-bold">{{ convertPrice($discountedTotal) }}</span>
                        </div>

                        <!-- @if($discountAmount > 0)
                                            <div class="d-flex justify-content-between text-danger fw-bold mt-2 mb-3">
                                                <span class="text-dark fw-bold">Coupon Discount</span>
                                                <span class="savings">- {{ convertPrice($discountAmount) }}</span>
                                            </div>
                                        @endif -->


                        <div class="d-flex justify-content-between mt-2 mb-3">
                            <span class="text-dark fw-bold">Shipping</span>

                            <!-- Hidden shipping method (optional if you need it for backend updates) -->
                            <input type="hidden" id="shipping-method"
                                value="{{ $cartItems->first()->type_of_shipping ?? 'standard_shipping' }}">

                            <!-- Display shipping cost -->
                            <span id="shipping-cost" class="text-dark fw-bold adding">
                                + {{ $shippingCost == 0 ? 'FREE' : convertPrice($shippingCost) }}
                            </span>
                        </div>


                        <hr>

                        <div class="d-flex justify-content-between fw-bold fs-4 mt-2 mb-3">
                            <span class="text-dark fw-bold">Grand Total</span>
                            <span class="jsGrandTotal text-dark fw-bold" id="total-amount">
                                {{ convertPrice($grandTotalWithShipping) }}
                            </span>
                        </div>

                        <!-- Checkout Benefits -->
                        <div class="mt-4">
                            <div class="d-flex align-items-center mb-3">
                                <span class="d-flex justify-content-center align-items-center"
                                    style="width: 50px; height: 50px; border-radius: 25px; background-color: #e0e0e0; color: #007bff;">
                                    <i class="fas fa-truck fa-lg"></i>
                                </span>
                                <div class="ms-3">
                                    <strong class="text-dark">FAST SHIPPING</strong>
                                    <p class="text-muted mb-0">Fast shipping across India</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-3">
                                <span class="d-flex justify-content-center align-items-center"
                                    style="width: 50px; height: 50px; border-radius: 25px; background-color: #e0e0e0; color: #28a745;">
                                    <i class="fas fa-lock fa-lg"></i>
                                </span>
                                <div class="ms-3">
                                    <strong class="text-dark">SAFE CHECKOUT</strong>
                                    <p class="text-muted mb-0">Our customer team is available 24/7</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-3">
                                <span class="d-flex justify-content-center align-items-center"
                                    style="width: 50px; height: 50px; border-radius: 25px; background-color: #e0e0e0; color: #dc3545;">
                                    <i class="fas fa-headset fa-lg"></i>
                                </span>
                                <div class="ms-3">
                                    <strong class="text-dark">CUSTOMER SUPPORT</strong>
                                    <p class="text-muted mb-0">24/7 assistance</p>
                                </div>
                            </div>

                            <!-- <div class="d-flex align-items-center">
                                                                                    <span class="d-flex justify-content-center align-items-center"
                                                                                        style="width: 50px; height: 50px; border-radius: 25px; background-color: #e0e0e0; color: #ffc107;">
                                                                                        <i class="fas fa-globe fa-lg"></i>
                                                                                    </span>
                                                                                    <div class="ms-3">
                                                                                        <strong class="text-dark">NO CUSTOM DUTIES</strong>
                                                                                        <p class="text-muted mb-0">Enjoy no custom duties across any country</p>
                                                                                    </div>
                                                                                </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('input[name="shipping"]').forEach(input => {
                input.addEventListener('change', function () {
                    let selectedShipping = this.value;

                    // Calculate shipping dynamically based on cart total
                    let cartTotal = parseFloat("{{ $cartTotal ?? 0 }}"); // Pass cart total from backend
                    let shippingCost = 0;

                    if (cartTotal >= 1000 && cartTotal < 2000) {
                        shippingCost = 90;
                    } else if (cartTotal >= 2000 && cartTotal < 5000) {
                        shippingCost = 120;
                    } else if (cartTotal >= 5000 && cartTotal < 10000) {
                        shippingCost = 150;
                    } else if (cartTotal >= 10000) {
                        shippingCost = 0; // Free shipping above ₹10k
                    }

                    // If user selects priority shipping, add extra ₹50
                    if (selectedShipping === "priority_shipping") {
                        shippingCost += 50;
                    }

                    // Send updated shipping cost to backend
                    fetch("{{ route('update-shipping-method') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            shipping_method: selectedShipping,
                            shipping_cost: shippingCost
                        })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                document.getElementById("shipping-cost").textContent =
                                    shippingCost === 0 ? "FREE" : `+ ₹${shippingCost}`;

                                $.notify({
                                    message: data.message,
                                    title: "Success",
                                    icon: "fa fa-check"
                                }, {
                                    type: "success"
                                });

                                setTimeout(function () {
                                    location.reload();
                                }, 1500);
                            } else {
                                $.notify({
                                    message: data.message,
                                    title: "Error",
                                    icon: "fa fa-times"
                                }, {
                                    type: "danger"
                                });
                            }
                        })
                        .catch(error => console.error("Error:", error));
                });
            });
        });
    </script>

    <!-- Shipping Cost Section -->
    <div class="d-flex justify-content-between mt-2 mb-3">
        <span class="text-dark fw-bold">Shipping</span>
        <span id="shipping-cost" class="text-dark fw-bold adding">
            + {{ $shippingCost == 0 ? 'FREE' : convertPrice($shippingCost) }}
        </span>
    </div>
    <hr>


    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.getElementById("continue-payment").addEventListener("click", function () {
            fetch("{{ route('razorpay.initiate') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    grandTotal: "{{ $grandTotalWithShipping }}",
                    amount: "{{ $grandTotalWithShipping }}", // Use grand total directly
                    currency: "INR", // Fixed for India
                    name: "{{ auth()->user()->name }}",
                    email: "{{ auth()->user()->email }}",
                    phone: "{{ auth()->user()->phone_number }}"
                })
            })
                .then(response => response.json())
                .then(data => {
                    let options = {
                        "key": data.key,
                        "amount": data.amount,
                        "currency": data.currency,
                        "name": "{{ config('app.name') }}",
                        "description": "Order Payment",
                        "image": "{{ asset('img/logo5.png') }}",
                        "order_id": data.order_id,
                        "handler": function (response) {
                            window.location.href = "{{ route('razorpay.success') }}?payment_id=" + response.razorpay_payment_id;
                        },
                        "prefill": {
                            "name": data.name,
                            "email": data.email,
                            "contact": data.phone
                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    let rzp1 = new Razorpay(options);
                    rzp1.open();
                })
                .catch(error => console.error("Error initiating payment:", error));
        });
    </script>

    <script>
        document.querySelectorAll('input[name="shipping"]').forEach(input => {
            input.addEventListener('change', function () {
                let selectedShipping = this.value;

                // Get shipping cost dynamically from the displayed label
                let shippingCostText = document.getElementById(
                    selectedShipping === "priority_shipping" ? "priority-price" : "standard-price"
                ).innerText;

                // Extract numeric value from string like "₹90.00"
                let shippingCost = parseFloat(shippingCostText.replace(/[^\d.]/g, ''));

                // Send selection to backend
                fetch("{{ route('update-shipping-method') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        shipping_method: selectedShipping,
                        shipping_cost: shippingCost
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update shipping cost in the summary instantly
                            document.getElementById("shipping-cost").innerText =
                                shippingCost === 0 ? 'FREE' : `+ ₹${shippingCost.toFixed(2)}`;

                            $.notify({
                                message: data.message,
                                title: "Success",
                                icon: "fa fa-check"
                            }, {
                                type: "success"
                            });

                            // Optional reload if you want cart recalculated server-side
                            setTimeout(() => location.reload(), 1200);
                        } else {
                            $.notify({
                                message: data.message,
                                title: "Error",
                                icon: "fa fa-times"
                            }, {
                                type: "danger"
                            });
                        }
                    })
                    .catch(error => console.error("Error:", error));
            });
        });
    </script>

    <script>
        document.getElementById('shipping-method').addEventListener('change', function () {
            let method = this.value;

            fetch("{{ route('update-shipping-method') }}", {   // Make sure this route points to updateShippingMethod
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({ shipping_method: method })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update shipping cost
                        document.getElementById('shipping-cost').innerText =
                            data.shipping_cost > 0 ? '+ ' + data.shipping_cost.toLocaleString('en-IN', { style: 'currency', currency: 'INR' }) : 'FREE';

                        // Update grand total
                        document.getElementById('total-amount').innerText =
                            data.grand_total_with_shipping.toLocaleString('en-IN', { style: 'currency', currency: 'INR' });
                    } else {
                        alert('Failed to update shipping. Please try again.');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>


@endsection