<div class="left-side-bar" style="background-color: #004526;">
    <div class="brand-logo">
        @if(Auth::user()->role=='admin')
            <a href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('admin/vendors/images/nda-logo2.png') }}" alt="" class="dark-logo">
                <img src="{{ asset('admin/vendors/images/nda-logo-white.png') }}" alt="" class="light-logo">
            </a>
        @else
            <a href="{{ route('staff.dashboard') }}">
                <img src="{{ asset('admin/vendors/images/nda-logo2.png') }}" alt="" class="dark-logo">
                <img src="{{ asset('admin/vendors/images/nda-logo-white.png') }}" alt="" class="light-logo">
            </a>
        @endif
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                
                @if(Auth::user()->role=='admin' || Auth::user()->role=='officer' || Auth::user()->role=='personnel')
                    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'bg-success' : '' }}"> 
                        <a href="{{ route('admin.dashboard') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-home"></span><span class="mtext">Dashboard</span>
                        </a>
                    </li>
                    <li>
                    <li class="nav-item {{ request()->routeIs('users.index') ? 'bg-success' : '' }}">
                        <a href="{{ route('users.index') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-user"></span><span class="mtext">User Management</span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('plate.scan') ? 'bg-success' : '' }}">
                        <a href="{{ route('plate.scan') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-search"></span><span class="mtext">Scan Plate</span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('plate.scan.records') ? 'bg-success' : '' }}">
                        <a href="{{ route('plate.scan.records') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-list"></span><span class="mtext">Scan History</span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('plate.scan.live') ? 'bg-success' : '' }}">
                        <a href="{{ route('plate.scan.live') }}" class="dropdown-toggle no-arrow">
                            <span class="micon fa fa-camera"></span><span class="mtext">Live Capture</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('staff.dashboard') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-home"></span><span class="mtext">Dashboard</span>
                        </a>
                    </li>
                    <li>
                @endif
            </ul>
        </div>
    </div>
</div>