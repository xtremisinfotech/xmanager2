@php
$pageId = 4;
@endphp
@extends('layouts.app')

@section('title', 'Change User Password')
@section('page-header', 'Change User Password')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-9 col-md-12 col-sm-12 col-xs-12 col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            Change User Password
                        </div>
                        <div class="card-body">
                            <form id="FormUserPassword" name="FormUserPassword" class="form"
                                action="{{ url('/ChangeUserPassword') }}" method="POST">
                                <input type="hidden" name="uid" value="{{ $id }}">
                                @csrf


                                <div class="form-group row">
                                    <label for="oldpassword" class="col-3 col-lg-3 col-form-label text-right"><span
                                            class="text-danger">*</span> Old Password</label>
                                    <div class="col-9 col-lg-9">
                                        <input id="oldpassword" type="password" class="form-control" name="oldpassword"
                                            value="{{ old('oldpassword') }}" required autofocus="">

                                        @if ($errors->has('oldpassword'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('oldpassword') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-3 col-lg-3 col-form-label text-right"><span
                                            class="text-danger">*</span> New Password</label>
                                    <div class="col-9 col-lg-9">
                                        <input id="password" type="password" class="form-control" name="password"
                                            value="{{ isset($user) ? $user->password : '' }}" required>

                                        @if ($errors->has('password'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password_confirmation"
                                        class="col-3 col-lg-3 col-form-label text-right"><span class="text-danger">*</span>
                                        Confirm Password</label>
                                    <div class="col-9 col-lg-9">
                                        <input id="password_confirmation" type="password" class="form-control"
                                            name="password_confirmation" value="{{ isset($user) ? $user->password : '' }}"
                                            required>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-12 col-lg-12 text-center">
                                        <button type="submit" class="btn btn-primary pl-4 pr-4"> Save </button>
                                        <a href="{{ url('/Users') }}/{{ $id }}/edit"
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
    <script src="{{ asset('/assets/js/additional-js/change-user-password.js') }}"></script>
@endsection
