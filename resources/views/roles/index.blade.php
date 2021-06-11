@php
$pageId = 3;
@endphp
@extends('layouts.app')

@section('title', 'Roles')
@section('page-header', 'Roles')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            Roles List
                            @can('Role Create')
                                <a href="{{ url('/Roles/create') }}" class="btn btn-primary float-right"><i
                                        class="fa fa-plus-square mr-1"></i> Create New Role</a>
                            @endcan
                        </div>
                        <div class="card-body table-responsive">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered second" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="5%" class="text-center">No.</th>
                                            <th>Name</th>
                                            <th width="10%" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($roles as $key => $role)
                                            <tr>
                                                <td align="center">{{ $i++ }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td align="center">
                                                    <a class="act-view" title="View Role"
                                                        href="{{ url('/Roles') }}/{{ $role->id }}"><i
                                                            class="fa fa-eye fa-lg" aria-hidden="true"></i></a>
                                                    &nbsp;
                                                    @can('Role Edit')
                                                        <a class="act-edit" title="Edit Role"
                                                            href="{{ url('/Roles') }}/{{ $role->id }}/edit"><i
                                                                class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                                                        &nbsp;
                                                    @endcan
                                                    @can('Role Delete')
                                                        <form action="{{ url('/Roles') }}/{{ $role->id }}" method="post"
                                                            style="display: inline;">
                                                            @csrf
                                                            @method('delete')
                                                            <a class="act-delete" title="Delete Role" href="javascript:void(0)"
                                                                onclick="FormConfirmDelete(this, 'Sure to delete?', 'It\'ll be deleted permanently!', 'warning');"><i
                                                                    class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach

                                        @if ($i == 1)
                                            <tr>
                                                <td colspan="4" class="text-center font-weight-bold">No roles found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                {{ $roles->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
