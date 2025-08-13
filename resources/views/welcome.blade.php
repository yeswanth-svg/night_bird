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

        .product-card {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .product-card:hover {
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.12);
            transform: translateY(-4px);
        }

        .product-img-wrapper {
            position: relative;
            overflow: hidden;
        }

        .product-img-wrapper img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover img {
            transform: scale(1.05);
        }

        /* Badges */
        .product-img-wrapper .badge {
            position: absolute;
            top: 12px;
            left: 12px;
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 30px;
            color: #fff;
        }

        .badge.hot {
            background: #28a745;
        }

        .badge.new {
            background: #007bff;
        }

        .badge.off {
            background: #ff5722;
        }

        /* Product Info */
        .product-title {
            font-size: 25px;
            font-weight: 600;
            color: #052c65;
        }

        .product-price {
            font-size: 14px;
            font-weight: bold;
            color: #ff5722;
        }

        .old-price {
            text-decoration: line-through;
            font-size: 13px;
            color: #999;
            margin-left: 6px;
        }

        /* Fade-in and slide-up animation */
        @keyframes fadeUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Hidden before animation */
        .scroll-animate {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease-in-out;
        }

        /* Triggered animation */
        .scroll-animate.show {
            animation: fadeUp 0.8s ease-out forwards;
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
                                @forelse($category->types as $type)
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <a href="{{ route('menu', ['category' => $type->id]) }}"
                                            class="text-decoration-none text-dark">
                                            <div class="product-card text-center">

                                                <div class="product-img-wrapper">
                                                    @if($type->image)
                                                        <img src="{{ asset('type_images/' . $type->image) }}" alt="{{ $type->name }}"
                                                            class="img-fluid">
                                                    @else
                                                        <img src="{{ asset('images/no-image.png') }}" alt="No image" class="img-fluid">
                                                    @endif


                                                </div>

                                                <div class="product-info mt-2">
                                                    <h6 class="product-title">{{ $type->name }}</h6>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <p class="text-muted">No types available in this category.</p>
                                    </div>
                                @endforelse
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
                            alt="NightBird Video Preview" style="width: 540px;height: 400px;" />
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

    <!-- Google maps start -->
    <section id="nightbird-location" style="padding: 40px 0; background: #f8f9fa;">
    <div class="container scroll-animate">
        <!-- Title Section -->
        <div class="text-center mb-4">
            <h2 style="font-weight: 700; font-size: 28px; color: #333;">📍 Our Location</h2>
            <p style="color: #666; font-size: 16px; margin-top: 5px;">
                Visit us at Night Bird – Miyapur, Hyderabad
            </p>
        </div>

        <!-- Map Section -->
        <div style="width:100%; max-width: 100%; height: 450px; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3804.9110391831437!2d78.34766237340547!3d17.511759583396707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb93b1117a1119%3A0x51149c4d1813ea9e!2sNight%20Bird!5e0!3m2!1sen!2sin!4v1755052801007!5m2!1sen!2sin" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>



    <!-- Google maps end -->

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

    <script>
// Show animation when element is in viewport
document.addEventListener("scroll", function () {
    const element = document.querySelector(".scroll-animate");
    const position = element.getBoundingClientRect().top;
    const screenHeight = window.innerHeight;

    if (position < screenHeight - 100) {
        element.classList.add("show");
    }
});
</script>

@endsection