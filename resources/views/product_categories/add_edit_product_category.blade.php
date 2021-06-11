@php
$pageId = 6;
@endphp
@extends('layouts.app')

@section('title', $act . ' Product Category')
@section('page-header', $act . ' Product Category')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            Product Category Details
                        </div>
                        <div class="card-body">
                            <form id="FormProductCategory" name="FormProductCategory" class="form"
                                action="{{ url('/ProductCategory') }}{{ $act == 'Edit' ? '/' . $ProductCategory->id : '' }}"
                                method="POST">
                                @csrf
                                @if ($act == 'Edit')
                                    @method("PATCH")
                                @endif

                                <div class="form-group row">
                                    <label for="CategoryName"
                                        class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-xs-3 col-3 col-form-label">Category
                                        Name</label>
                                    <div class="col-xl-8 col-lg-8 col-md-7 col-sm-10 col-xs-11 col-9">
                                        <input type="text" class="form-control" id="CategoryName" name="CategoryName"
                                            placeholder="Enter Category Name"
                                            value="{{ $act == 'Edit' ? $ProductCategory->CategoryName : old('CategoryName') }}">
                                        @error('CategoryName')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr>
                                <div class="form-group row">
                                    <div class="col-12 text-center">
                                        <input type="submit" name="submit" id="submit" class="btn btn-primary pl-4 pr-4"
                                            value="Save">
                                        <a href="{{ url('/ProductCategory') }}"
                                            class="btn btn-default pl-4 pr-4">Cancel</a>
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

@section('additional-js')
    <script src="{{ asset('/assets/js/additional-js/product-category-add-edit.js') }}"></script>
@endsection
