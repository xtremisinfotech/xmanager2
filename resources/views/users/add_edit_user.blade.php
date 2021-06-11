@php
$pageId = 4;
@endphp
@extends('layouts.app')

@section('title', $act . ' User')
@section('page-header', $act . ' User')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-9 col-md-12 col-sm-12 col-xs-12 col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            User Details
                        </div>
                        <div class="card-body">
                            <form id="FormUserAddEdit" name="FormUserAddEdit" class="form"
                                action="{{ url('/Users') }}{{ $act == 'Edit' ? '/' . $User->id : '' }}" method="POST">
                                @csrf
                                @if ($act == 'Edit')
                                    @method("PATCH")
                                @endif

                                <div class="form-group row">
                                    <label for="name" class="col-3 col-lg-3 col-form-label text-right"><span
                                            class="text-danger">*</span> Name</label>
                                    <div class="col-9 col-lg-9">
                                        <input id="name" type="text" class="form-control" name="name"
                                            placeholder="User name"
                                            value="{{ $act == 'Edit' ? $User->name : old('name') }}" required autofocus
                                            maxlength="50">

                                        @if ($errors->has('name'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-3 col-lg-3 col-form-label text-right"><span
                                            class="text-danger">*</span> E-Mail Address</label>
                                    <div class="col-9 col-lg-9">
                                        <input id="email" type="email" class="form-control" name="email"
                                            placeholder="User email address"
                                            value="{{ $act == 'Edit' ? $User->email : old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                @if ($act == 'Create')
                                    <div class="form-group row">
                                        <label for="password" class="col-3 col-lg-3 col-form-label text-right"><span
                                                class="text-danger">*</span> Password</label>
                                        <div class="col-9 col-lg-9">
                                            <input id="password" type="password" class="form-control" name="password"
                                                placeholder="Password" value="{{ isset($User) ? $User->password : '' }}"
                                                required>

                                            @if ($errors->has('password'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password_confirmation"
                                            class="col-3 col-lg-3 col-form-label text-right"><span
                                                class="text-danger">*</span> Confirm Password</label>
                                        <div class="col-9 col-lg-9">
                                            <input id="password_confirmation" type="password" class="form-control"
                                                placeholder="Confirm password" name="password_confirmation"
                                                value="{{ isset($User) ? $User->password : '' }}" required>
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group row">
                                    <label for="roles" class="col-3 col-lg-3 col-form-label text-right"><span
                                            class="text-danger">*</span> User Role</label>
                                    <div class="col-9 col-lg-9">
                                        {!! Form::select('roles[]', $roles, isset($User) ? $userRole : [], ['class' => 'form-control ', 'required']) !!}

                                        @if ($errors->has('roles'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('roles') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                @if ($act == 'Edit')
                                    <div class="form-group row">
                                        <div class="col-3 col-lg-3 col-form-label text-right"></div>
                                        <div class="col-9 col-lg-9">
                                            <a href="{{ url('/ChangeUserPassword') }}/{{ $User->id }}">Change
                                                Password</a>
                                        </div>
                                    </div>
                                @endif
                                <hr>
                                <div class="form-group row">
                                    <div class="col-12 text-center">
                                        <input type="submit" name="submit" id="submit" class="btn btn-primary pl-4 pr-4"
                                            value="Save">
                                        <a href="{{ url('/Users') }}" class="btn btn-default pl-4 pr-4">Cancel</a>
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
    <script src="{{ asset('/assets/js/additional-js/users-add-edit.js') }}"></script>
@endsection
