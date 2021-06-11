<aside class="main-sidebar sidebar-dark-primary elevation-2">
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="{{ config('app.name') }} Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8;margin-top: 0px;">
        <span class="brand-text font-weight-light" style="margin-top:-10px">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if (Gate::check('Firms List') || Gate::check('Firms Create') || Gate::check('Firms Edit') || Gate::check('Firms Delete'))
                    <li class="nav-item">
                        <a href="{{ url('/Firms') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Manage Firms</p>
                        </a>
                    </li>
                @endif
                @if (Gate::check('Customer Vendor List') || Gate::check('Customer Vendor Create') || Gate::check('Customer Vendor Edit') || Gate::check('Customer Vendor Delete'))
                    <li class="nav-item">
                        <a href="{{ url('/CustVend') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Customer / Vendor</p>
                        </a>
                    </li>
                @endif
                @if (Gate::check('Product Category List') || Gate::check('Product Category Create') || Gate::check('Product Category Edit') || Gate::check('Product Category Delete'))
                    <li class="nav-item">
                        <a href="{{ url('/ProductCategory') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Product Category</p>
                        </a>
                    </li>
                @endif
                @if (Gate::check('Role List') || Gate::check('Role Create') || Gate::check('Role Edit') || Gate::check('Role Delete'))
                    <li class="nav-item">
                        <a href="{{ url('/Roles') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Manage Roles</p>
                        </a>
                    </li>
                @endif
                @if (Gate::check('Users List') || Gate::check('Users Create') || Gate::check('Users Edit') || Gate::check('Users Delete'))
                    <li class="nav-item">
                        <a href="{{ url('/Users') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Manage Users</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
