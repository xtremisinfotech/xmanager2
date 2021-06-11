@php
$pageId = 2;
@endphp
@extends('layouts.app')

@section('title', $act . ' Firm')
@section('page-header', $act . ' Firm')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            Firm Details
                        </div>
                        <div class="card-body">
                            <form id="FormFirmDetails" name="FormFirmDetails" class="form"
                                action="{{ url('/Firms') }}{{ $act == 'Edit' ? '/' . $Firm->id : '' }}" method="POST">
                                @csrf
                                @if ($act == 'Edit')
                                    @method("PATCH")
                                @endif

                                <div class="form-group row">
                                    <label for="FirmName"
                                        class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-xs-3 col-3 col-form-label">Firm
                                        Name</label>
                                    <div class="col-xl-8 col-lg-8 col-md-7 col-sm-10 col-xs-11 col-9">
                                        <input type="text" class="form-control" id="FirmName" name="FirmName"
                                            placeholder="Enter Firm Name"
                                            value="{{ $act == 'Edit' ? $Firm->FirmName : old('FirmName') }}">
                                        @error('FirmName')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="FirmAddress"
                                        class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-xs-3 col-3 col-form-label">Firm
                                        Address</label>
                                    <div class="col-xl-8 col-lg-8 col-md-7 col-sm-10 col-xs-11 col-9">
                                        <input type="text" class="form-control" id="FirmAddress" name="FirmAddress"
                                            placeholder="Enter Firm Address"
                                            value="{{ $act == 'Edit' ? $Firm->FirmAddress : old('FirmAddress') }}">
                                        @error('FirmAddress')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="FirmCity"
                                        class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-xs-3 col-3 col-form-label">Firm
                                        City</label>
                                    <div class="col-xl-8 col-lg-8 col-md-7 col-sm-10 col-xs-11 col-9">
                                        <input type="text" class="form-control" id="FirmCity" name="FirmCity"
                                            placeholder="Enter Firm City"
                                            value="{{ $act == 'Edit' ? $Firm->FirmCity : old('FirmCity') }}">
                                        @error('FirmCity')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="FirmPinCode"
                                        class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-xs-3 col-3 col-form-label">Firm
                                        Pin Code</label>
                                    <div class="col-xl-8 col-lg-8 col-md-7 col-sm-10 col-xs-11 col-9">
                                        <input type="text" class="form-control" id="FirmPinCode" name="FirmPinCode"
                                            placeholder="Enter Firm Pin Code"
                                            value="{{ $act == 'Edit' ? $Firm->FirmPinCode : old('FirmPinCode') }}">
                                        @error('FirmPinCode')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="FirmState"
                                        class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-xs-3 col-3 col-form-label">Firm
                                        State</label>
                                    <div class="col-xl-8 col-lg-8 col-md-7 col-sm-10 col-xs-11 col-9">
                                        <input type="text" class="form-control" id="FirmState" name="FirmState"
                                            placeholder="Enter Firm State"
                                            value="{{ $act == 'Edit' ? $Firm->FirmState : old('FirmState') }}">
                                        @error('FirmState')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="FirmCountry"
                                        class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-xs-3 col-3 col-form-label">Firm
                                        Country</label>
                                    <div class="col-xl-8 col-lg-8 col-md-7 col-sm-10 col-xs-11 col-9">
                                        <input type="text" class="form-control" id="FirmCountry" name="FirmCountry"
                                            placeholder="Enter Firm Country"
                                            value="{{ $act == 'Edit' ? $Firm->FirmCountry : old('FirmCountry') }}">
                                        @error('FirmCountry')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="FirmPhoneNo"
                                        class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-xs-3 col-3 col-form-label">Firm
                                        Phone No.</label>
                                    <div class="col-xl-8 col-lg-8 col-md-7 col-sm-10 col-xs-11 col-9">
                                        <input type="text" class="form-control" id="FirmPhoneNo" name="FirmPhoneNo"
                                            placeholder="Enter Firm Phone No."
                                            value="{{ $act == 'Edit' ? $Firm->FirmPhoneNo : old('FirmPhoneNo') }}"
                                            maxlength="15">
                                        @error('FirmPhoneNo')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="FirmGSTN"
                                        class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-xs-3 col-3 col-form-label">Firm
                                        GST Number</label>
                                    <div class="col-xl-8 col-lg-8 col-md-7 col-sm-10 col-xs-11 col-9">
                                        <input type="text" class="form-control" id="FirmGSTN" name="FirmGSTN"
                                            placeholder="Enter Firm GST Number"
                                            value="{{ $act == 'Edit' ? $Firm->FirmGSTN : old('FirmGSTN') }}">
                                        @error('FirmGSTN')
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
                                        <a href="{{ url('/Firms') }}" class="btn btn-default pl-4 pr-4">Cancel</a>
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
    <script src="{{ asset('/assets/js/additional-js/firms-add-edit.js') }}"></script>
@endsection
