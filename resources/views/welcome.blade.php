@extends('layouts.app')
@section('title', 'Night Bird')
@section('content')



    <style>
        .btn-play {
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0.85;
            transition: opacity 0.15s;
            outline: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-play:hover {
            opacity: 1;
        }
    </style>

    <!-- Hero Start -->
    <div class="container-fluid bg-light py-6 my-6 mt-0">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-7 col-md-12 order-1">
                    <h1 class="display-2 mb-4">
                        <span style="color: black">Experience the</span>
                        <span class="text-primary">Pure Comfort & Authentic Styles</span>
                        <!-- of NightBird Sleepwear -->
                    </h1>
                    <div class="d-flex justify-content-start align-items-start">
                        <a href="{{ route('menu')}}" class="btn btn-primary border-0 rounded-pill py-3  px-md-5 me-4">Order
                            Now</a>
                        <a href="#welcome_menu" class="btn btn-primary border-0 rounded-pill py-3  px-md-5">Explore
                            More</a>
                    </div>

                </div>
                <div class="col-lg-5 col-md-12 order-lg-2">
                    <img src="img/nightbird-header2.png" class="img-fluid rounded " alt="Delicious Pickles" />
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- About Start -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <img src="img/about2.png" class="img-fluid rounded" alt="Traditional Pickles" />
                </div>
                <div class="col-lg-7" data-wow-delay="0.3s">
                    <small
                        class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">
                        About Us
                    </small>
                    <h1 class="display-5 mb-4">
                        Making Nights Stylish, Comfortable & Affordable
                    </h1>
                    <p class="mb-4">
                        NightBird is a hybrid (online + offline) nightwear brand originating in India. Our journey began
                        with a vision to bring modern, cozy, and expressive sleepwear to families across the country. We
                        blend the latest trends with uncompromising comfort, offering curated collections for women, men,
                        and kids—making every night stylish and relaxed.
                    </p>
                    <div class="row g-4 text-dark mb-5">
                        <div class="col-sm-6">
                            <i class="fas fa-bed text-primary me-2"></i>
                            Crafted with <b>Quality Fabrics</b>
                        </div>
                        <div class="col-sm-6">
                            <i class="fas fa-tshirt text-primary me-2"></i>
                            <b>Trendy Designs</b> for Every Age
                        </div>
                        <div class="col-sm-6">
                            <i class="fas fa-users text-primary me-2"></i>
                            <b>For Women, Men & Kids</b>
                        </div>
                        <div class="col-sm-6">
                            <i class="fas fa-tags text-primary me-2"></i>
                            <b>Affordable</b> & Accessible Everywhere
                        </div>
                    </div>
                    <a href="{{route('about-us')}}" class="btn btn-primary py-3 px-5 rounded-pill">Know More <i
                            class="fas fa-arrow-right ps-2"></i></a>
                </div>

            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Fact Start-->
    <div class="container-fluid faqt py-6">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-7">
                    <div class="row g-4">
                        <div class="col-sm-4" data-wow-delay="0.3s">
                            <div class="faqt-item bg-primary rounded p-4 text-center">
                                <i class="fas fa-users fa-4x mb-4 text-white"></i>
                                <h1 class="display-4 fw-bold text-white" data-toggle="counter-up">
                                    689
                                </h1>
                                <p class="text-white text-uppercase fw-bold mb-0">
                                    Happy Customers
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4" data-wow-delay="0.5s">
                            <div class="faqt-item bg-primary rounded p-4 text-center">
                                <i class="fas fa-users-cog fa-4x mb-4 text-white"></i>
                                <h1 class="display-4 fw-bold text-white" data-toggle="counter-up">8</h1>
                                <p class="text-white text-uppercase fw-bold mb-0">
                                    Quality Vendors
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4" data-wow-delay="0.7s">
                            <div class="faqt-item bg-primary rounded p-4 text-center">
                                <i class="fas fa-check fa-4x mb-4 text-white"></i>
                                <h1 class="display-4 fw-bold text-white" data-toggle="counter-up">
                                    253
                                </h1>
                                <p class="text-white text-uppercase fw-bold mb-0">
                                    Deliveries
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Video Section Start -->
                <div class="col-lg-5">
                    <div class="video position-relative">
                        <img src="img/nightbird-video-thumbnail.png" class="img-fluid rounded shadow"
                            alt="NightBird Video Preview" style="width: 540px;" />
                        <button type="button" class="btn btn-play position-absolute top-50 start-50 translate-middle"
                            data-bs-toggle="modal" data-src="img/nightbird-video.mp4" data-bs-target="#videoModal"
                            aria-label="Open Video Modal"
                            style="z-index:2; background:transparent; border:none; width:auto; height:auto; padding:0;">
                            <img src="img/play-btn1.png" alt="Play Video" style="width:180px;">
                            <span class="visually-hidden">Open Video Modal</span>
                        </button>

                    </div>
                </div>
                <!-- Video Section End -->

            </div>
        </div>
    </div>
    <!-- Fact End -->

    <!-- Video Modal Start -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">Night Bird</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-dark">
                    <video id="nightbirdVideo" width="100%" controls poster="img/nightbird-video-thumbnail.jpg"
                        style="background: #000; border-radius:8px;">
                        <!-- Source will be set via JS -->
                    </video>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- Our collection Start -->
    <div class="container-fluid menu py-6" id="welcome_menu">
        <div class="container">
            <div class="text-center">
                <small
                    class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">
                    Our Collections
                </small>
                <h1 class="display-5 mb-5">Elevate Your Evenings with NightBird Fashion</h1>
            </div>

            <div class="tab-class text-center">
                <!-- Category Tabs -->
                <div class="category-tabs-wrapper">
                    <ul class="nav nav-pills d-flex category-tabs mb-5">
                        @foreach($categories as $key => $category)
                            <li class="nav-item">
                                <a class="nav-link px-3 py-2 border border-primary bg-white rounded-pill category-tab {{ $key === 0 ? 'active' : '' }}"
                                    data-bs-toggle="pill" href="#tab-{{ $category->id }}">
                                    {{ $category->category_name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-content">
                    @foreach($categories as $key => $category)
                        <div id="tab-{{ $category->id }}" class="tab-pane fade show p-0 @if($key === 0) active @endif">
                            <div class="row g-4">
                                @foreach($category->dishes as $dish)
                                    <div class="col-lg-6">
                                        <div
                                            class="menu-item d-flex align-items-center position-relative dish-card p-3 border rounded shadow-sm">
                                            <a href="{{ route('dish.details', $dish->id) }}" class="dish-overlay">
                                                <div class="d-none d-md-block"></div>
                                                <span class="view-button btn btn-primary btn-sm d-inline d-md-none">View</span>
                                            </a>

                                            <!-- Dish Image -->
                                            <div class="ratio ratio-1x1 img-responsive rounded">
                                                <img src="{{ asset('dish_images/' . $dish->image) }}" alt="{{ $dish->name }}"
                                                    class="img-fluid rounded dish-img" />
                                            </div>

                                            <!-- Dish Details -->
                                            <div class="w-100 d-flex flex-column text-start">
                                                <h4 class="mb-2">{{ $dish->name }}</h4>

                                                <!-- Rating & Price on Same Line -->
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <span class="badge bg-success text-white px-2 py-1">
                                                        ⭐
                                                        {{ number_format($dish->reviews->count() > 0 ? round($dish->reviews->avg('rating')) : 5, 1) }}
                                                    </span>

                                                    @if($dish->quantities->isNotEmpty())
                                                        @php
                                                            $firstQuantity = $dish->quantities->first();
                                                            $discountPrice = $firstQuantity->discount_price ?? $firstQuantity->original_price;
                                                        @endphp
                                                        <div class="text-start prices text-lg-start text-center">
                                                            <span class="fs-6 fw-bold text-success discount-price-display"
                                                                style="font-size: 1.6rem !important;">
                                                                {{ convertPrice($firstQuantity->original_price ?? 0) }}
                                                            </span>
                                                            <p class="text-primary text-decoration-line-through original-price-display mb-0"
                                                                style="font-size: 1.5rem !important;">
                                                                {{ convertPrice($discountPrice) }}
                                                            </p>
                                                        </div>
                                                    @else
                                                        <p class="text-muted">Price not available</p>
                                                    @endif
                                                </div>

                                                <!-- Dish Description -->
                                                <p class="text-muted mt-2">{{ Str::limit($dish->description, 50) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- "View All" Button -->
                            <div class="text-center mt-4">
                                <a href="{{ route('menu', ['category' => $category->id]) }}"
                                    class="btn btn-primary rounded-pill px-4 py-2">
                                    View All {{ $category->category_name }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <!-- Our collection End -->

    <!-- Team Start -->
    <!-- <div class="container-fluid team py-6">
                                <div class="container">
                                    <div class="text-center">
                                        <small
                                            class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our
                                            Team</small>
                                        <h1 class="display-5 mb-5">We have experienced chef Team</h1>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="team-item rounded">
                                                <img class="img-fluid rounded-top" src="img/chef1.jpg" alt="" />
                                                <div class="team-content text-center py-3 bg-danger rounded-bottom">
                                                    <h4 class="text-light">Chef 1</h4>
                                                    <p class="text-white mb-0">Professional Chef</p>
                                                </div>
                                                <div class="team-icon d-flex flex-column justify-content-center m-4">
                                                    <a class="share btn btn-primary btn-md-square rounded-circle mb-2" href=""><i
                                                            class="fas fa-share-alt"></i></a>
                                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i
                                                            class="fab fa-facebook-f"></i></a>
                                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i
                                                            class="fab fa-twitter"></i></a>
                                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i
                                                            class="fab fa-instagram"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6" data-wow-delay="0.3s">
                                            <div class="team-item rounded">
                                                <img class="img-fluid rounded-top" src="img/chef2.jpg" alt="" />
                                                <div class="team-content text-center py-3 bg-danger rounded-bottom">
                                                    <h4 class="text-light">Chef 2</h4>
                                                    <p class="text-white mb-0">Professional Chef</p>
                                                </div>
                                                <div class="team-icon d-flex flex-column justify-content-center m-4">
                                                    <a class="share btn btn-primary btn-md-square rounded-circle mb-2" href=""><i
                                                            class="fas fa-share-alt"></i></a>
                                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i
                                                            class="fab fa-facebook-f"></i></a>
                                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i
                                                            class="fab fa-twitter"></i></a>
                                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i
                                                            class="fab fa-instagram"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6" data-wow-delay="0.5s">
                                            <div class="team-item rounded">
                                                <img class="img-fluid rounded-top" src="img/chef3.jpg" alt="" />
                                                <div class="team-content text-center py-3 bg-danger rounded-bottom">
                                                    <h4 class="text-light">Chef 3</h4>
                                                    <p class="text-white mb-0">Professional Chef</p>
                                                </div>
                                                <div class="team-icon d-flex flex-column justify-content-center m-4">
                                                    <a class="share btn btn-primary btn-md-square rounded-circle mb-2" href=""><i
                                                            class="fas fa-share-alt"></i></a>
                                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i
                                                            class="fab fa-facebook-f"></i></a>
                                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i
                                                            class="fab fa-twitter"></i></a>
                                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i
                                                            class="fab fa-instagram"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6" data-wow-delay="0.7s">
                                            <div class="team-item rounded">
                                                <img class="img-fluid rounded-top" src="img/chef4.jpg" alt="" />
                                                <div class="team-content text-center py-3 bg-danger rounded-bottom">
                                                    <h4 class="text-light">Chef 4</h4>
                                                    <p class="text-white mb-0">Professional Chef</p>
                                                </div>
                                                <div class="team-icon d-flex flex-column justify-content-center m-4">
                                                    <a class="share btn btn-primary btn-md-square rounded-circle mb-2" href=""><i
                                                            class="fas fa-share-alt"></i></a>
                                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i
                                                            class="fab fa-facebook-f"></i></a>
                                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i
                                                            class="fab fa-twitter"></i></a>
                                                    <a class="share-link btn btn-primary btn-md-square rounded-circle mb-2" href=""><i
                                                            class="fab fa-instagram"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="text-center">
                <small
                    class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Customer
                    Reviews</small>
                <h1 class="display-5 mb-5">What Our Customers says!</h1>
            </div>
            <div class="owl-carousel owl-theme testimonial-carousel testimonial-carousel-1 mb-4">
                <div class="testimonial-item rounded bg-light">
                    <div class="d-flex mb-3">
                        <img src="img/testimonial-1.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="" />
                        <div class="position-absolute" style="top: 15px; right: 20px">
                            <i class="fa fa-quote-right fa-2x"></i>
                        </div>
                        <div class="ps-3 my-auto">
                            <h4 class="mb-0">Person Name</h4>
                            <p class="m-0">Profession</p>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <div class="d-flex">
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                        </div>
                        <p class="fs-5 m-0 pt-3">
                            Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore
                            et dolore magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item rounded bg-light">
                    <div class="d-flex mb-3">
                        <img src="img/testimonial-2.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="" />
                        <div class="position-absolute" style="top: 15px; right: 20px">
                            <i class="fa fa-quote-right fa-2x"></i>
                        </div>
                        <div class="ps-3 my-auto">
                            <h4 class="mb-0">Person Name</h4>
                            <p class="m-0">Profession</p>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <div class="d-flex">
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                        </div>
                        <p class="fs-5 m-0 pt-3">
                            Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore
                            et dolore magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item rounded bg-light">
                    <div class="d-flex mb-3">
                        <img src="img/testimonial-3.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="" />
                        <div class="position-absolute" style="top: 15px; right: 20px">
                            <i class="fa fa-quote-right fa-2x"></i>
                        </div>
                        <div class="ps-3 my-auto">
                            <h4 class="mb-0">Person Name</h4>
                            <p class="m-0">Profession</p>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <div class="d-flex">
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                        </div>
                        <p class="fs-5 m-0 pt-3">
                            Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore
                            et dolore magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item rounded bg-light">
                    <div class="d-flex mb-3">
                        <img src="img/testimonial-4.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="" />
                        <div class="position-absolute" style="top: 15px; right: 20px">
                            <i class="fa fa-quote-right fa-2x"></i>
                        </div>
                        <div class="ps-3 my-auto">
                            <h4 class="mb-0">Person Name</h4>
                            <p class="m-0">Profession</p>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <div class="d-flex">
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                        </div>
                        <p class="fs-5 m-0 pt-3">
                            Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore
                            et dolore magna aliqua.
                        </p>
                    </div>
                </div>
            </div>
            <div class="owl-carousel testimonial-carousel testimonial-carousel-2" data-wow-delay="0.3s">
                <div class="testimonial-item rounded bg-light">
                    <div class="d-flex mb-3">
                        <img src="img/testimonial-1.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="" />
                        <div class="position-absolute" style="top: 15px; right: 20px">
                            <i class="fa fa-quote-right fa-2x"></i>
                        </div>
                        <div class="ps-3 my-auto">
                            <h4 class="mb-0">Person Name</h4>
                            <p class="m-0">Profession</p>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <div class="d-flex">
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                        </div>
                        <p class="fs-5 m-0 pt-3">
                            Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore
                            et dolore magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item rounded bg-light">
                    <div class="d-flex mb-3">
                        <img src="img/testimonial-2.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="" />
                        <div class="position-absolute" style="top: 15px; right: 20px">
                            <i class="fa fa-quote-right fa-2x"></i>
                        </div>
                        <div class="ps-3 my-auto">
                            <h4 class="mb-0">Person Name</h4>
                            <p class="m-0">Profession</p>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <div class="d-flex">
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                        </div>
                        <p class="fs-5 m-0 pt-3">
                            Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore
                            et dolore magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item rounded bg-light">
                    <div class="d-flex mb-3">
                        <img src="img/testimonial-3.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="" />
                        <div class="position-absolute" style="top: 15px; right: 20px">
                            <i class="fa fa-quote-right fa-2x"></i>
                        </div>
                        <div class="ps-3 my-auto">
                            <h4 class="mb-0">Person Name</h4>
                            <p class="m-0">Profession</p>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <div class="d-flex">
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                        </div>
                        <p class="fs-5 m-0 pt-3">
                            Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore
                            et dolore magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="testimonial-item rounded bg-light">
                    <div class="d-flex mb-3">
                        <img src="img/testimonial-4.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="" />
                        <div class="position-absolute" style="top: 15px; right: 20px">
                            <i class="fa fa-quote-right fa-2x"></i>
                        </div>
                        <div class="ps-3 my-auto">
                            <h4 class="mb-0">Person Name</h4>
                            <p class="m-0">Profession</p>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <div class="d-flex">
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                            <i class="fas fa-star text-primary"></i>
                        </div>
                        <p class="fs-5 m-0 pt-3">
                            Lorem ipsum dolor sit amet elit, sed do eiusmod tempor ut labore
                            et dolore magna aliqua.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <script src="{{asset('admin/js/core/jquery-3.7.1.min.js')}}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const dishCards = document.querySelectorAll(".dish-card");

            dishCards.forEach((card) => {
                const overlay = card.querySelector(".dish-overlay");

                // Show View button on touch (simulating hover)
                card.addEventListener("touchstart", function () {
                    overlay.style.opacity = "1"; // Show overlay
                });

                // Hide View button when touching outside
                document.addEventListener("touchstart", function (event) {
                    if (!card.contains(event.target)) {
                        overlay.style.opacity = "0"; // Hide overlay
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var videoModal = document.getElementById('videoModal');
            var video = document.getElementById('nightbirdVideo');
            var playButtons = document.querySelectorAll('.btn-play');

            playButtons.forEach(function (button) {
                button.addEventListener("click", function () {
                    var videoSrc = button.getAttribute('data-src');
                    video.src = videoSrc;
                    setTimeout(function () { video.play(); }, 500);
                });
            });

            videoModal.addEventListener('hidden.bs.modal', function () {
                video.pause();
                video.src = '';
            });
        });
    </script>

@endsection