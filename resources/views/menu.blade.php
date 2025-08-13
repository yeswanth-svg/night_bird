@extends('layouts.app')
@section('title', 'Our Collection')
@section('content')

  <style>
    .breadcrumb-item a {
    color: #fff;
    }

    .category-sidebar a {
    text-decoration: none;
    transition: color 0.2s;
    }

    .category-sidebar a:hover {
    color: #0d6efd;
    }

    .category-sidebar>li>a {
    font-weight: 600;
    }

    .category-sidebar ul li a {
    font-weight: 400;
    font-size: 0.95rem;
    }
  </style>

  <!-- Hero Start -->
  <div class="container-fluid py-6 my-6 mt-0" style="background: url('img/bg-cover1.png'); color: white; height: 340px;">
    <div class="container text-center animated bounceInDown">
    <h1 class="display-1 mb-4" style="color: white">Our Collection</h1>
    <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
      <li class="breadcrumb-item"><a href="{{ url('/') }}" style="color: white">Home</a></li>
      <li class="breadcrumb-item text-light" aria-current="page">Our Collection</li>
    </ol>
    </div>
  </div>
  <!-- Hero End -->

  <!-- Menu Section Start -->

  <div class="container py-4">
    <div class="row">

    <!-- LEFT COLUMN: Categories -->
    <div class="col-lg-3 mb-4">
      <div class="p-3 border rounded bg-light shadow-sm">
      <h5 class="fw-bold mb-3">Categories</h5>
      <hr>
      <ul class="list-unstyled category-sidebar">
        @foreach($categories as $category)
        <li class="mb-2">
        <a class="d-flex justify-content-between align-items-center text-dark fw-semibold" data-bs-toggle="collapse"
        href="#category-{{ $category->id }}"
        aria-expanded="{{ $selectedTypeId && $category->types->contains('id', $selectedTypeId) ? 'true' : 'false' }}"
        aria-controls="category-{{ $category->id }}">
        {{ $category->category_name }}
        <span class="toggle-icon">+</span>
        </a>

        @if($category->types->count())
        <ul
        class="list-unstyled ms-3 collapse {{ $category->types->contains('id', $selectedTypeId) ? 'show' : '' }}"
        id="category-{{ $category->id }}">
        @foreach($category->types as $type)
        <li class="mb-1">
        <a href="{{ route('menu', ['category' => $type->id]) }}"
        class="text-muted {{ $selectedTypeId == $type->id ? 'fw-bold text-primary' : '' }}">
        {{ $type->name }}
        </a>
        </li>
      @endforeach
        </ul>
      @endif
        </li>
      @endforeach
      </ul>
      </div>
    </div>

    <!-- RIGHT COLUMN: Dishes -->
    <div class="col-lg-9">
      <div class="row">
      @forelse($dishes as $dish)
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="p-3 border rounded shadow-sm text-center h-100">
        <img src="{{ asset('dish_images/' . $dish->image) }}" alt="{{ $dish->name }}" class="img-fluid mb-2"
        style="height:150px; object-fit:cover;">

        <h6>{{ $dish->name }}</h6>

        @php
        $quantity = $dish->quantities ? $dish->quantities->first() : null;
      @endphp

        @if($quantity)
      <p class="mb-1">
        <span class="text-muted text-decoration-line-through">
        ₹{{ number_format($quantity->original_price, 2) }}
        </span>
        <span class="fw-bold text-danger ms-1">
        ₹{{ number_format($quantity->discount_price, 2) }}
        </span>
      </p>
      @else
      <p class="text-muted mb-1">Price not available</p>
      @endif

        <a href="{{ route('dish.details', $dish->id) }}" class="btn btn-sm btn-primary">View</a>
        </div>
      </div>
    @empty
      <div class="col-12">
      <p class="text-muted">Select a category to view dresses.</p>
      </div>
    @endforelse
      </div>

      <!-- Pagination -->
      <div class="mt-3">
      {{ $dishes->links() }}
      </div>
    </div>


    </div>
  </div>

  <!-- Menu Section End -->



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
    document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[data-bs-toggle="collapse"]').forEach(function (link) {
      link.addEventListener('click', function () {
      const icon = this.querySelector('.toggle-icon');
      const target = document.querySelector(this.getAttribute('href'));

      target.addEventListener('shown.bs.collapse', function () {
        icon.textContent = '-';
      });
      target.addEventListener('hidden.bs.collapse', function () {
        icon.textContent = '+';
      });
      });
    });
    });
  </script>



@endsection