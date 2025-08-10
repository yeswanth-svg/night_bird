@extends('layouts.app')
@section('title', 'Cart')
@section('content')




    <div class="container">
        <ol class="breadcrumb justify-content-start mb-3 mt-2 fs-3">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>

        <!-- Left Panel: Dishes and Total -->
        <div class="row">
            <div class="left-panel col-12 col-lg-8">



                @foreach ($cartItems as $item)
                    <div
                        style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; padding: 1rem; background: #fff; border: 1px solid #ddd; border-radius: 8px; flex-wrap: wrap;">

                        <!-- Image and Details -->
                        <div
                            style="display: flex; align-items: center; gap: 1rem; padding: 10px; border-radius: 8px; background: #f9f9f9;">
                            <img src="{{ asset('dish_images/' . $item->dish->image) }}" alt="{{ $item->dish->name }}"
                                style="width: 80px; height: 80px; border-radius: 8px; object-fit: cover;">

                            <div style="flex: 1;">
                                <h3 style="margin: 0; font-size: 1.2rem; font-weight: bold; color: #333;">
                                    {{ $item->dish->name }}
                                </h3>

                                <p style="margin: 4px 0; font-size: 1rem;">
                                    <i class="fas fa-weight-hanging" style="color: #007bff;"></i> {{ $item->quantity->weight }}
                                </p>

                                <p style="margin: 4px 0; font-size: 1rem;">
                                    <i class="fas fa-shopping-bag" style="color: #28a745;"></i> Quantity:
                                    {{ $item->cart_quantity }}
                                </p>

                                <!-- <p style="margin: 4px 0; font-size: 0.9rem;">
                                                    🌶️ Spice Level:
                                                    @if ($item->spice_level == 'mild')
                                                        <span class="badge bg-success p-2">🌱 Mild</span>
                                                    @elseif ($item->spice_level == 'medium')
                                                        <span class="badge bg-warning text-dark p-2">🌶️ Medium</span>
                                                    @elseif ($item->spice_level == 'spicy')
                                                        <span class="badge bg-danger p-2">🔥 Spicy</span>
                                                    @elseif ($item->spice_level == 'extra_spicy')
                                                        <span class="badge bg-dark text-light p-2">☠️ Extra Spicy</span>
                                                    @endif
                                                </p> -->


                                <p style="margin: 4px 0; font-size: 1rem;">
                                    <i class="fas fa-truck" style="color: #ffc107;"></i> Ready to dispatch in 3 - 5 business
                                    days
                                </p>
                            </div>


                        </div>


                        <!-- Cart Quantity Counter -->


                        <!-- Price -->
                        <div class="cart__punit hide-mobile">
                            <span class="jsPrice">{{convertPrice($item->quantity->discount_price) }}</span>

                            <span
                                class="cart__compare-price cart__compare-price--punit jsPrice text-primary">{{ convertPrice($item->quantity->original_price) }}</span>

                        </div>
                        <!-- Delete Button -->
                        <form action="{{ route('user.cart.destroy', $item->id) }}" method="POST" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="trash-button">
                                <i class="fas fa-trash-alt"
                                    style="    font-size: 1.2rem;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    padding: 2px;"></i>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
            <!-- Right Panel: Total Amount -->
            @if ($cartItems->isNotEmpty())
                <div class="right-panel col-12 col-lg-4">

                    <div class="card cart mt-3 p-3" style="border-radius: inherit;">

                        <div class="d-flex justify-content-between mt-2">
                            <span>Total:</span>
                            <span>{{ convertPrice($cartTotal) }}</span>
                        </div>

                        @if ($discountTotal > 0)
                            <div class="d-flex justify-content-between mt-2 text-danger">
                                <span>Savings:</span>
                                <span class="savings">- {{ convertPrice($discountTotal) }}</span>
                            </div>
                        @endif

                        <div class="d-flex justify-content-between mt-3 border-top pt-2">
                            <span class="fw-bold text-primary fs-4">Grand Total:</span>
                            <span class="fw-bold fs-4">{{ convertPrice($finalTotal) }}</span>
                        </div>

                        {{-- Minimum order price check --}}
                        @if ($finalTotal < 1000)
                            <div class="alert alert-warning mt-3">
                                Minimum order value should be <strong>{{ convertPrice(1000) }}</strong>.
                            </div>
                            <button class="btn btn-primary btn-block mt-3" disabled>
                                CHECKOUT
                            </button>
                        @else
                            <a href="{{ url('/checkout') }}" class="btn btn-primary btn-block mt-3">
                                CHECKOUT
                            </a>
                        @endif

                        <a href="{{ url('/') }}" class="btn btn-outline-primary btn-block mt-2">
                            CONTINUE SHOPPING
                        </a>
                    </div>


                </div>


            @endif

        </div>
    </div>

@endsection