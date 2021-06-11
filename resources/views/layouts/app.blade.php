<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

{{-- main layout css files with addition css files --}}
@include('includes.main-layout-includes.top-css')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        {{-- Top layout for each screen --}}
        @include('includes.main-layout-includes.header')

        {{-- Menubar layout --}}
        @include('includes.main-layout-includes.menubar')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-12">
                            <h1 class="m-0 text-dark">@yield('page-header')</h1>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Dynamic content --}}
            @yield('content')
        </div>

        {{-- Footer layout --}}
        @include('includes.main-layout-includes.footer')
    </div>

    {{-- Main layout js files with additional js files --}}
    @include('includes.main-layout-includes.bottom-js')
</body>

</html>
