@php
$pageId = 5;
@endphp
@extends('layouts.app')

@section('title', 'Customer / Vendor')
@section('page-header', 'Customer / Vendor')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            Customer / Vendor List
                            @can('Customer Vendor Create')
                                <a href="{{ url('/CustVend/create') }}" class="btn btn-primary float-right"><i
                                        class="fa fa-plus-square mr-1"></i> Create New Customer / Vendor</a>
                            @endcan
                        </div>
                        <div class="card-body table-responsive pt-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">No.</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th width="10%">Type</th>
                                        <th class="text-center" width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse ($ListCustVend as $CustVend)
                                        <tr>
                                            <td align="center">{{ $i++ }}</td>
                                            <td>{{ $CustVend->CVName }}</td>
                                            <td>{{ $CustVend->CVMobile }}</td>
                                            <td>{{ $CustVend->CVAddress }}</td>
                                            <td>{{ ($CustVend->CVType == 0) ? 'Customer' : 'Vendor' }}</td>
                                            <td align="center">
                                                @can('Customer Vendor Edit')
                                                    <a title="Edit Firm" class="act-edit"
                                                        href="{{ url('/CustVend') }}/{{ $CustVend->id }}/edit"><i
                                                            class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                                                    &nbsp;
                                                @endcan
                                                @can('Customer Vendor Delete')
                                                    <form class="d-inline" action="{{ url('/CustVend') }}/{{ $CustVend->id }}"
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
                                            <td class="font-weight-bold text-center" colspan="3">No Customer / Vendor Found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $ListCustVend->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
