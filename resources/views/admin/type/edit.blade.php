@extends('layouts.admin')
@section('title', 'Edit Type')
@section('content')

    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Type</h3>
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
                        <a href="#">Type</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Type</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.type.update', $type->id) }}" class="form-group">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="dishName" class="form-label text-success fw-bold fs-4">Category</label>
                                        <select class="form-select form-control" name="category_id">
                                            <option value="{{$type->category_id}}">{{$type->category->category_name}}
                                            </option>
                                            @foreach($categories as $type)
                                                <option value="{{$type->id}}">{{$type->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label text-success fw-bold fs-4">Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="e.g., Full Length Shorts" autocomplete="Name"
                                            value="{{$type->name}}"></input>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="{{ route('admin.type.index') }}" class="btn btn-secondary ml-2">Cancel</a>
                                    </div>
                                </div>




                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>




@endsection