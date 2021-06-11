@php
$pageId = 6;
@endphp
@extends('layouts.app')

@section('title', 'Product Category')
@section('page-header', 'Product Category')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            Product Category List
                            @can('Product Category Create')
                                <a href="{{ url('/ProductCategory/create') }}" class="btn btn-primary float-right"><i
                                        class="fa fa-plus-square mr-1"></i> Create New Product Category</a>
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
                                    @forelse ($ProductCategories as $ProductCategory)
                                        <tr>
                                            <td align="center">{{ $i++ }}</td>
                                            <td>{{ $ProductCategory->CategoryName }}</td>
                                            <td align="center">
                                                @can('Product Category Edit')
                                                    <a title="Edit Product Category" class="act-edit"
                                                        href="{{ url('/ProductCategory') }}/{{ $ProductCategory->id }}/edit"><i
                                                            class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                                                    &nbsp;
                                                @endcan
                                                @can('Product Category Delete')
                                                    <form class="d-inline" action="{{ url('/ProductCategory') }}/{{ $ProductCategory->id }}"
                                                        method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <a title="Delete Product Category" class="act-delete" href="javascript:void(0);"
                                                            onclick="FormConfirmDelete(this, 'Sure to delete?', 'It\'ll be deleted permanently!', 'warning');"><i
                                                                class="fa fa-trash-alt fa-lg" aria-hidden="true"></i></a>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="font-weight-bold text-center" colspan="3">No Product Category Found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $ProductCategories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
