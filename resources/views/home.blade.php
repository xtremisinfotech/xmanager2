@php
    $pageId = 1;
@endphp
@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-header', 'Dashboard')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            Dashboard
                            <span class="float-right"><strong>Selected Firm :</strong> {!! getFirm(Session::get('LoggedInFirmId'))->FirmName !!}</span>
                        </div>

                        <div class="card-body">
                            Welcome back {{ Auth::User()->name }}!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
