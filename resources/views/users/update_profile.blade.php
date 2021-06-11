@php
$pageId = 1;
@endphp
@extends('layouts.app')

@section('title', 'Profile Details')
@section('page-header', 'Profile Details')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">Personal Info</div>
                        <div class="card-body">
                            <form id="UserPersonalDetails" class="form" action="{{ url('/UpdatePersonalInfo') }}"
                                method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-xs-12 col-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                placeholder="Your Name" value="{{ Auth::User()->name }}" required>
                                            @error('name')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <button type="submit" class="btn btn-primary"> Save </button>
                                        <a href="{{ url('/home') }}" class="btn btn-outline-primary"
                                            style="border: 1px solid #3097d1">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">Update Password</div>
                        <div class="card-body">
                            <form id="UserPassword" class="form" action="{{ url('/UpdatePassword') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-xs-12 col-12">
                                        <div class="form-group">
                                            <label for="current_password">Current Password</label>
                                            <input type="password" id="current_password" name="current_password"
                                                class="form-control" placeholder="Current Password" value="" required>
                                            @error('current_password')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-xs-12 col-12">
                                        <div class="form-group">
                                            <label for="new_password">New Password</label>
                                            <input type="password" id="new_password" name="new_password"
                                                class="form-control" placeholder="New Password" value="" required>
                                            @error('confirm_password')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-xs-12 col-12">
                                        <div class="form-group">
                                            <label for="confirm_password">Confirm Password</label>
                                            <input type="password" id="confirm_password" name="confirm_password"
                                                class="form-control" placeholder="Confirm Password" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <button type="submit" class="btn btn-primary"> Save </button>
                                        <a href="{{ url('/home') }}" class="btn btn-outline-primary"
                                            style="border: 1px solid #3097d1">Cancel</a>
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
    <script src="{{ asset('/assets/js/additional-js/update-profile.js') }}"></script>
@endsection
