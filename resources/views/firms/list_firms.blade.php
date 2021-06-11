@php
$pageId = 2;
@endphp
@extends('layouts.app')

@section('title', 'Firms')
@section('page-header', 'Firms')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            Firms List
                            @can('Firms Create')
                                <a href="{{ url('/Firms/create') }}" class="btn btn-primary float-right"><i
                                        class="fa fa-plus-square mr-1"></i> Create New Firm</a>
                            @endcan
                        </div>
                        <div class="card-body table-responsive pt-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">No.</th>
                                        <th>Name</th>
                                        <th class="text-center" width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse ($Firms as $Firm)
                                        <tr>
                                            <td align="center">{{ $i++ }}</td>
                                            <td>{{ $Firm->FirmName }}</td>
                                            <td align="center">
                                                @can('Firms Edit')
                                                    <a title="Edit Firm" class="act-edit"
                                                        href="{{ url('/Firms') }}/{{ $Firm->id }}/edit"><i
                                                            class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                                                    &nbsp;
                                                @endcan
                                                @can('Firms Delete')
                                                    <form class="d-inline" action="{{ url('/Firms') }}/{{ $Firm->id }}"
                                                        method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <a title="Delete Firm" class="act-delete" href="javascript:void(0);"
                                                            onclick="FormConfirmDelete(this, 'Sure to delete?', 'It\'ll be deleted permanently!', 'warning');"><i
                                                                class="fa fa-trash-alt fa-lg" aria-hidden="true"></i></a>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="font-weight-bold text-center" colspan="3">No Firms Found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $Firms->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
