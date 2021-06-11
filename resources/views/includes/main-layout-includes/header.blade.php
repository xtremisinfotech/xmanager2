<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <form class="form-inline ml-3">
        <div class="input-group">
            @php
                $Firms = getFirmList();
            @endphp

            <select class="form-control" name="ChangeFirm" id="ChangeFirm">
                @foreach ($Firms as $Firm)
                    <option {{ (Session::get('LoggedInFirmId') == $Firm->id) ? 'selected' : '' }} value="{{ $Firm->id }}">{{ $Firm->FirmName }}</option>
                @endforeach
            </select>
        </div>
    </form>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link font-weight-bold" data-toggle="dropdown" href="#">
                {{ Auth::User()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                <a href="{{ url('/UpdateProfile') }}" class="dropdown-item">
                    <i class="fa fa-user mr-2"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="#"
                    class="dropdown-item">
                    <i class="fa fa-power-off mr-2"></i> Log Out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    </ul>
</nav>
