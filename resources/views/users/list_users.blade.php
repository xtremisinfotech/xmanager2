@php
$pageId = 4;
@endphp
@extends('layouts.app')

@section('title', 'Users')
@section('page-header', 'Users')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            Users List
                            @can('Users Create')
                                <a href="{{ url('/Users/create') }}" class="btn btn-primary float-right"><i
                                        class="fa fa-plus-square mr-1"></i> Create New User</a>
                            @endcan
                        </div>
                        <div class="card-body table-responsive pt-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">No.</th>
                                        <th width="25%">Name</th>
                                        <th>Email</th>
                                        <th width="25%">Role</th>
                                        <th class="text-center" width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse ($Users as $User)
                                        <tr>
                                            <td align="center">{{ $i++ }}</td>
                                            <td>{{ $User->name }}</td>
                                            <td>{{ $User->email }}</td>
                                            <td>
                                                @if (!empty($User->getRoleNames()))
                                                    @foreach ($User->getRoleNames() as $v)
                                                        <label class="badge badge-success">{{ $v }}</label>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td align="center">
                                                @can('Users Edit')
                                                    <a title="Edit User" class="act-edit"
                                                        href="{{ url('/Users') }}/{{ $User->id }}/edit"><i
                                                            class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                                                    &nbsp;
                                                @endcan
                                                @can('Users Delete')
                                                    <form class="d-inline" action="{{ url('/Users') }}/{{ $User->id }}"
                                                        method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <a title="Delete User" class="act-delete" href="javascript:void(0);"
                                                            onclick="FormConfirmDelete(this, 'Sure to delete?', 'It\'ll be deleted permanently!', 'warning');"><i
                                                                class="fa fa-trash-alt fa-lg" aria-hidden="true"></i></a>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="font-weight-bold text-center" colspan="5">No Users Found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $Users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
