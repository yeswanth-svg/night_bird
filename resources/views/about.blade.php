@extends('layouts.app')
@section('title', 'About Us')

@section('content')

  <style>
    .breadcrumb-item a {
    color: #fff;
    }
  </style>

  <!-- Hero Start -->
  <div class="container-fluid bg-light py-6 my-6 mt-0" style="
      background: url('img/bg-cover1.png');
      color: white;height: 340px;
      ">
    <div class="container text-center animated bounceInDown">
    <h2 class="display-1 mb-4" style="color: white">About Us</h2>
    <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
      <li class="breadcrumb-item "><a href="{{url('/')}}">Home</a></li>
      <li class="breadcrumb-item text-light" aria-current="page">About</li>
    </ol>
    </div>
  </div>
  <!-- Hero End -->

  <!-- About Start -->
  <div class="container-fluid py-6">
    <div class="container">
    <div class="row g-5 align-items-center">
      <!-- Image Section -->
      <div class="col-lg-5">
      <img src="img/about2.png" class="img-fluid rounded shadow" alt="NightBird Nightwear" />
      </div>
      <!-- Content Section -->
      <div class="col-lg-7" data-wow-delay="0.3s">
      <small
        class="d-inline-block fw-bold text-white text-uppercase bg-primary border border-primary rounded-pill px-4 py-1 mb-3">
        About NightBird
      </small>
      <h1 class="display-5 mb-4 text-primary fw-bold">
        Experience the Joy of Cozy Nights, Every Night
      </h1>
      <p class="mb-4 fs-5">
        <b>NightBird</b> is a hybrid nightwear brand based in India, dedicated to delivering <b>stylish, comfortable,
        and affordable sleepwear</b> for the modern Indian family. Our collection spans both online and offline
        channels, making cozy fashion accessible wherever you are.
      </p>

      <!-- Vision Section -->
      <div class="mb-4">
        <h4 class="fw-semibold text-secondary mb-2">Our Vision</h4>
        <p>
        Our ambition is to become India’s favorite destination for nightwear, combining comfort, trends, and value,
        so every night is a celebration—regardless of your age or style.
        </p>
      </div>

      <!-- Offerings Grid -->
      <div class="mb-4">
        <h4 class="fw-semibold text-secondary mb-2">What We Offer</h4>
        <div class="row gy-2 text-dark">
        <div class="col-sm-6">
          <i class="fas fa-snowflake text-primary me-2"></i> Cotton Pajama Sets: Breathable for Indian summers
        </div>
        <div class="col-sm-6">
          <i class="fas fa-gem text-primary me-2"></i> Satin Slip Dresses: Chic, luxurious comfort
        </div>
        <div class="col-sm-6">
          <i class="fas fa-child text-primary me-2"></i> Maternity Wear: Thoughtfully designed for new moms
        </div>
        <div class="col-sm-6">
          <i class="fas fa-heart text-primary me-2"></i> Couples Nightwear: Coordinated sets for pairs
        </div>
        <div class="col-sm-6">
          <i class="fas fa-gem text-primary me-2"></i> Kids Sleepwear: Safe, soft, and fun for ages 3–12
        </div>
        <div class="col-sm-6">
          <i class="fas fa-snowflake text-primary me-2"></i> Seasonal & Festival Collections: Winter fleece to
          festive themes
        </div>
        </div>
      </div>

      <!-- Customer Focus -->
      <!-- <div class="mb-4">
        <h4 class="fw-semibold text-secondary mb-2">Our Customers</h4>
        <ul class="mb-0 ms-3">
        <li>Urban women (18–45)</li>
        <li>Young couples & college students</li>
        <li>New moms & maternity segment</li>
        <li>Kids aged 3–12</li>
        <li>Tier 1 and 2 Indian cities—expanding fast</li>
        </ul>
      </div> -->

      <!-- Reasons to Choose NightBird -->
      <div class="mb-4">
        <h4 class="fw-semibold text-secondary mb-2">Why NightBird?</h4>
        <div class="row gy-2 text-dark">
        <div class="col-sm-6">
          <i class="fas fa-feather-alt text-primary me-2"></i> Quality & Comfort First
        </div>
        <div class="col-sm-6">
          <i class="fas fa-tshirt text-primary me-2"></i> Fashion-Forward Collections
        </div>
        <div class="col-sm-6">
          <i class="fas fa-rupee-sign text-primary me-2"></i> Smart Pricing
        </div>
        <div class="col-sm-6">
          <i class="fas fa-shipping-fast text-primary me-2"></i> Seamless Experience
        </div>
        </div>
      </div>

      <!-- How We Work -->
      <!-- <div class="mb-4">
        <h4 class="fw-semibold text-secondary mb-2">How We Work</h4>
        <ul class="mb-0 ms-3">
        <li>Strict sourcing from Tirupur, Surat, Delhi, Jaipur, and custom makers</li>
        <li>Fresh collections updated every season</li>
        <li>Cutting-edge inventory management for quality and transparency</li>
        <li>Expert offline store staff for personalized comfort and style advice</li>
        </ul>
      </div> -->

      <!-- Beyond the Basics -->
      <!-- <div class="mb-4">
        <h4 class="fw-semibold text-secondary mb-2">We Keep Evolving</h4>
        <ul class="mb-0 ms-3">
        <li>Personalized nightwear (your name or initials)</li>
        <li>Sleepwear subscription boxes</li>
        <li>Major launches on Myntra, Nykaa Fashion, Amazon & more</li>
        <li>Exclusive sleep and fabric guides via our blog</li>
        </ul>
      </div> -->

      <!-- Call to Action -->
      <p class="mb-4">
        Whether shopping for yourself or loved ones, NightBird welcomes you to discover nightwear that isn’t just for
        sleep—it’s about living in comfort and style, all day and all night.
      </p>
      <!-- <a href="{{route('about-us')}}" class="btn btn-primary py-3 px-5 rounded-pill">
        Know More <i class="fas fa-arrow-right ps-2"></i>
      </a> -->
      </div>
    </div>
    </div>
  </div>
  <!-- About End -->


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
        <div class="team-content text-center py-3 bg-dark rounded-bottom">
        <h4 class="text-light">chef 1</h4>
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
      <div class="col-lg-3 col-md-6">
      <div class="team-item rounded">
        <img class="img-fluid rounded-top" src="img/chef2.jpg" alt="" />
        <div class="team-content text-center py-3 bg-dark rounded-bottom">
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
      <div class="col-lg-3 col-md-6">
      <div class="team-item rounded">
        <img class="img-fluid rounded-top" src="img/chef3.jpg" alt="" />
        <div class="team-content text-center py-3 bg-dark rounded-bottom">
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
      <div class="col-lg-3 col-md-6">
      <div class="team-item rounded">
        <img class="img-fluid rounded-top" src="img/chef4.jpg" alt="" />
        <div class="team-content text-center py-3 bg-dark rounded-bottom">
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
@endsection