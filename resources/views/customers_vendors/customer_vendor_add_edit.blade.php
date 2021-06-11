@php
$pageId = 5;
@endphp
@extends('layouts.app')

@section('title', $act . ' Customer / Vendor')
@section('page-header', $act . ' Customer / Vendor')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            Customer / Vendor Details
                        </div>
                        <div class="card-body">
                            <form id="FormCustomerVendorDetails" name="FormCustomerVendorDetails" class="form"
                                action="{{ url('/CustVend') }}{{ $act == 'Edit' ? '/' . $CustomersVendor->id : '' }}"
                                method="POST">
                                @csrf
                                @if ($act == 'Edit')
                                    @method("PATCH")
                                @endif

                                <div class="form-group row">
                                    <div class="col-sm-4 bottom-margin">
                                        <label for="CVName"><span class="text-danger">*</span> Name</label>
                                        <input type="text" class="form-control" id="CVName" name="CVName"
                                            placeholder="Customer / Vendor Name"
                                            value="{{ ($act == 'Edit') ? $CustomersVendor->CVName : old('CVName') }}" required
                                            maxlength="50">

                                        @if ($errors->has('CVName'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('CVName') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 bottom-margin">
                                        <label for="CVEmail"> Email</label>
                                        <input type="email" class="form-control" id="CVEmail" name="CVEmail"
                                            placeholder="Customer / Vendor Email"
                                            value="{{ ($act == 'Edit') ? $CustomersVendor->CVEmail : old('CVEmail') }}"
                                            maxlength="50">

                                        @if ($errors->has('CVEmail'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('CVEmail') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 bottom-margin">
                                        <label for="CVMobile"><span class="text-danger">*</span> Mobile Number</label>
                                        <input type="text" class="form-control" id="CVMobile" name="CVMobile"
                                            placeholder="Customer / Vendor Mobile Number"
                                            value="{{ ($act == 'Edit') ? $CustomersVendor->CVMobile : old('CVMobile') }}"
                                            required maxlength="10">

                                        @if ($errors->has('CVMobile'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('CVMobile') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4 bottom-margin">
                                        <label for="CVAddress"><span class="text-danger">*</span> Address</label>
                                        <textarea class="form-control" id="CVAddress" name="CVAddress"
                                            placeholder="Customer / Vendor Name" rows="1" required
                                            maxlength="1000">{{ ($act == 'Edit') ? $CustomersVendor->CVAddress : old('CVAddress') }}</textarea>

                                        @if ($errors->has('CVAddress'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('CVAddress') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 bottom-margin">
                                        <label for="CVPin"><span class="text-danger">*</span> Pin Code</label>
                                        <input type="text" class="form-control" id="CVPin" name="CVPin"
                                            placeholder="Customer / Vendor Pin Code"
                                            onkeypress="return onlyNumberKey(event)"
                                            value="{{ ($act == 'Edit') ? $CustomersVendor->CVPin : old('CVPin') }}" required
                                            maxlength="6">

                                        @if ($errors->has('CVPin'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('CVPin') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 bottom-margin">
                                        <label for="CVCity"><span class="text-danger">*</span> City</label>
                                        <input type="text" class="form-control" id="CVCity" name="CVCity"
                                            placeholder="Customer / Vendor City"
                                            value="{{ ($act == 'Edit') ? $CustomersVendor->CVCity : old('CVCity') }}" required
                                            maxlength="30">

                                        @if ($errors->has('CVCity'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('CVCity') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4 bottom-margin">
                                        <label for="CVState"><span class="text-danger">*</span> State</label>
                                        <input type="text" name="CVState" id="CVState" class="form-control"
                                            value="{{ ($act == 'Edit') ? $CustomersVendor->CVState : old('CVState') }}"
                                            placeholder="Customer / Vendor State">

                                        @if ($errors->has('CVState'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('CVState') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 bottom-margin">
                                        <label for="CVGSTN">GST Number</label>
                                        <input type="text" class="form-control" id="CVGSTN" name="CVGSTN"
                                            placeholder="Customer / Vendor GST Number"
                                            value="{{ ($act == 'Edit') ? $CustomersVendor->CVGSTN : old('CVGSTN') }}"
                                            maxlength="15">

                                        @if ($errors->has('CVGSTN'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('CVGSTN') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-sm-4 bottom-margin">
                                        <label for="CVType"><span class="text-danger">*</span> Type</label>
                                        <select class="form-control" id="CVType" name="CVType">
                                            <option
                                                {{ $act == 'Edit' ? ($CustomersVendor->CVType == 0 ? 'selected' : '') : (old('cv_id') == 0 ? 'selected' : '') }}
                                                value="0"> CUSTOMER </option>
                                            <option
                                                {{ $act == 'Edit' ? ($CustomersVendor->CVType == 1 ? 'selected' : '') : (old('cv_id') == 1 ? 'selected' : '') }}
                                                value="1"> VENDOR </option>
                                        </select>

                                        @if ($errors->has('CVType'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('CVType') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-12 text-center">
                                        <input type="submit" name="submit" id="submit" class="btn btn-primary pl-4 pr-4"
                                            value="Save">
                                        <a href="{{ url('/CustVend') }}" class="btn btn-default pl-4 pr-4">Cancel</a>
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
    <script src="{{ asset('/assets/js/additional-js/customer-vendor-add-edit.js') }}"></script>
@endsection
