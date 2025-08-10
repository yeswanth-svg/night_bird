@extends('layouts.admin')
@section('title', 'Create Dress')
@section('content')

    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Dress</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Dress</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Create</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create Dress</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.dishes.store') }}" enctype="multipart/form-data"
                                class="form-group">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="dishName" class="form-label text-success fw-bold fs-4">Type</label>
                                        <select class="form-select form-control" name="type_id">
                                            <option value="">Select Category</option>
                                            @php
                                                // Group all type categories by their main category name (Mens, Womens, Kids, etc.)
                                                $groupedTypes = $types->groupBy(fn($type) => $type->category->category_name);
                                            @endphp

                                            @foreach($groupedTypes as $mainCategory => $categoryTypes)
                                                <optgroup label="{{ $mainCategory }}">
                                                    @foreach($categoryTypes as $type)
                                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>

                                    </div>
                                    <!-- Dish Name -->
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label text-success fw-bold fs-4">Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="e.g., Mens Jeans" required value="{{old('name')}}">
                                    </div>

                                    <!-- Dish Image -->
                                    <div class="col-md-6 mb-3">
                                        <label for="main_image" class="form-label text-success fw-bold fs-4">Main
                                            Image</label>
                                        <input type="file" name="main_image" id="main_image" class="form-control"
                                            accept=".webp" required value="{{old('image')}}">
                                        <span class="text-danger">* You can only upload .webpof size 150 * 150.Max 2MB
                                            Files</span>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="image" class="form-label text-success fw-bold fs-4">More Images</label>
                                        <input type="file" name="extra_images[]" id="image" class="form-control" multiple
                                            accept=".webp" required value="{{old('image')}}">
                                        <span class="text-danger">* You can only upload .webp of size 700 * 682.Max 2MB
                                            Files</span>
                                    </div>



                                    <div class="col-md-6 mb-3">
                                        <label for="description"
                                            class="form-label text-success fw-bold fs-4">Description</label>
                                        <textarea type="text" name="description" id="description" class="form-control"
                                            placeholder="e.g., Chicken Pickel" required>{{old('description')}}</textarea>
                                    </div>

                                    <!-- <div class="col-md-6 mb-3">
                                            <label for="description" class="form-label text-success fw-bold fs-4">Spice
                                                Level</label>
                                            <select class="form-select" name="spice_level">
                                                <option value="" selected>Select Status</option>
                                                <option value="mild">Mild</option>
                                                <option value="medium">Medium</option>
                                                <option value="spicy">Spicy</option>
                                                <option value="extra_spicy">extra Spicy</option>
                                            </select>
                                        </div> -->


                                    <!-- Submit Button -->
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection