@php
$pageId = 3;
@endphp
@extends('layouts.app')

@section('title', 'Create Role')
@section('page-header', 'Create Role')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            Create New Role
                            <a title="Go Back" class="btn btn-primary d-inline float-right"
                                href="{{ url('/Roles') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                &nbsp; Go
                                Back</a>
                        </div>
                        <div class="card-body">
                            <form id="AddEditRole" name="AddEditRole" class="form-horizontal" method="POST"
                                action="{{ url('/Roles') }}" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <table id="example" class="table table-bordered second">
                                            <tr>
                                                <td width="15%"><strong>Role Name:</strong></td>
                                                <td>{!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control required']) !!}</td>
                                            </tr>
                                            <tr>
                                                <td class="align-top"><strong>List Of Permissions:</strong></td>
                                                <td>
                                                    <div class="icheck-material-primary">
                                                        <input type="checkbox" id="chkAll" name="chkAll">
                                                        <label for="chkAll"> Give All Permissions</label>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        @php
                                                            $i = 1;
                                                        @endphp
                                                        @foreach ($permission as $value)
                                                            @php
                                                                $i++;
                                                            @endphp
                                                            <div class="col-3">
                                                                <div class="icheck-material-primary">
                                                                    {{ Form::checkbox('permission[]', $value->id, false, ['id' => 'chk_' . $i, 'class' => 'name checkbox']) }}
                                                                    <label for="{{ 'chk_' . $i }}">{{ $i - 1 }}
                                                                        - {{ $value->name }}</label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-center">
                                                    <button type="submit" id="submit" name="submit"
                                                        class="btn btn-primary">Submit</button>
                                                </td>
                                            </tr>
                                        </table>
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
    <script src="{{ asset('/assets/js/additional-js/roles-add-edit.js') }}"></script>
@endsection
