@php
$pageId = 3;
@endphp
@extends('layouts.app')

@section('title', 'Role Permissions')
@section('page-header', 'Role Permissions')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            Role List

                            <a title="Go Back" class="btn btn-primary d-inline float-right" href="{{ url('/Roles') }}"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i>
                                &nbsp; Go
                                Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <table id="example" class="table table-bordered second" style="width:100%">
                                        <tr>
                                            <td width="15%"><strong>Role Name:</strong></td>
                                            <td>{{ $role->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="align-top"><strong>List Of Permissions:</strong></td>
                                            <td>
                                                @if (!empty($rolePermissions))
                                                    <div class="row">
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @foreach ($rolePermissions as $v)
                                                            @php
                                                                $i++;
                                                            @endphp
                                                            <div class="col-3"><label
                                                                    class="label label-success">{{ $i - 1 }} -
                                                                    {{ $v->name }}</label></div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
