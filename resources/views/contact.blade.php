@extends('layouts.app')
@section('title', 'Contact')

@section('content')

  <style>
    .breadcrumb-item a {
    color: #fff;
    }

    /* Fade-in animation */
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

    .scroll-animate {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s ease-in-out;
    }

    .scroll-animate.show {
    animation: fadeUp 0.8s ease-out forwards;
    }
  </style>

  <!-- Hero Start -->
  <div class="container-fluid bg-light py-6 my-6 mt-0"
    style="background: url('img/bg-cover1.png'); color: white; height: 340px;">
    <div class="container text-center animated bounceInDown">
    <h1 class="display-1 mb-4" style="color: white">Contact</h1>
    <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item text-light" aria-current="page">Contact</li>
    </ol>
    </div>
  </div>
  <!-- Hero End -->

  <!-- Contact Start -->
  <div class="container-fluid contact py-6">
    <div class="container">
    <div class="p-5 bg-light rounded contact-form">
      <div class="row g-4">
      <!-- Section Title -->
      <div class="col-12">
        <small
        class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">
        Get in touch
        </small>
        <h1 class="display-5 mb-0">Contact Us For Any Queries!</h1>
      </div>

      <!-- Contact Form -->
      <div class="col-md-6 col-lg-7">
        <form>
        <input type="text" class="w-100 form-control p-3 mb-4 border-primary bg-light" placeholder="Your Name" />
        <input type="email" class="w-100 form-control p-3 mb-4 border-primary bg-light"
          placeholder="Enter Your Email" />
        <textarea class="w-100 form-control mb-4 p-3 border-primary bg-light" rows="4" cols="10"
          placeholder="Your Message"></textarea>
        <button class="w-100 btn btn-primary form-control p-3 border-primary bg-primary rounded-pill" type="submit">
          Submit Now
        </button>
        </form>
      </div>

      <!-- Contact Info -->
      <div class="col-md-6 col-lg-5">
        <!-- Address -->
        <div class="d-inline-flex w-100 border border-primary p-4 rounded mb-4">
        <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
        <div>
          <h4>Address</h4>
          <p>Maktha Mahaboobpet, Seri Lingampally Municipality,<br>
          RR District, Hyderabad, Telangana 500049</p>
        </div>
        </div>

        <!-- Mail Us -->
        <div class="d-inline-flex w-100 border border-primary p-4 rounded mb-4">
        <i class="fas fa-envelope fa-2x text-primary me-4"></i>
        <div>
          <h4>Mail Us</h4>
          <p class="mb-2">nightbird0205@gmail.com</p>
        </div>
        </div>

        <!-- Mobile Numbers -->
        <div class="d-inline-flex w-100 border border-primary p-4 rounded mb-4">
        <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
        <div>
          <h4>Mobile Numbers</h4>
          <p class="mb-2">(+91) 95318 89591</p>
        </div>
        </div>
      </div>

      <!-- Google Map Section -->
      <div class="col-12 mt-5 scroll-animate">
        <div class="text-center mb-4">
        <h2 class="fw-bold">📍 Our Location</h2>
        <p class="text-muted">Visit us at Night Bird – Miyapur, Hyderabad</p>
        </div>
        <div
        style="width:100%; height:450px; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3804.9110391831437!2d78.34766237340547!3d17.511759583396707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb93b1117a1119%3A0x51149c4d1813ea9e!2sNight%20Bird!5e0!3m2!1sen!2sin!4v1755052801007!5m2!1sen!2sin"
          width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        </div>
      </div>

      </div>
    </div>
    </div>
  </div>
  <!-- Contact End -->

  <script>
    // Fade-in when in view
    document.addEventListener("scroll", function () {
    document.querySelectorAll(".scroll-animate").forEach(function (el) {
      const position = el.getBoundingClientRect().top;
      const screenHeight = window.innerHeight;
      if (position < screenHeight - 100) {
      el.classList.add("show");
      }
    });
    });
  </script>

@endsection