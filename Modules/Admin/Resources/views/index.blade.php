@extends('admin::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        welcome: {{ XI_ADMIN()->name }}
        <br>

        <a href="{{ route('admin.logout') }}">Logout</a>
    </p>
@endsection
