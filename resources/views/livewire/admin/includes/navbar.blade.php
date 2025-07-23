<div class="left-side-bar">
    <div class="brand-logo">
        @if(Auth::user()->role=='admin')
            <a href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('admin/vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo">
                <img src="{{ asset('admin/vendors/images/deskapp-logo-white.svg') }}" alt="" class="light-logo">
            </a>
        @else
            <a href="{{ route('staff.dashboard') }}">
                <img src="{{ asset('admin/vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo">
                <img src="{{ asset('admin/vendors/images/deskapp-logo-white.svg') }}" alt="" class="light-logo">
            </a>
        @endif
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                
                @if(Auth::user()->role=='admin')
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-home"></span><span class="mtext">Dashboard</span>
                        </a>
                    </li>
                    <li>
                    <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-user"></span><span class="mtext">User Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('plate.scan') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-search"></span><span class="mtext">Scan Plate</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('plate.scan.records') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-list"></span><span class="mtext">Scan History</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('plate.scan.live') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-search"></span><span class="mtext">Live Capture</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-table"></span><span class="mtext">Applications</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('admin.application.create') }}">New Application</a></li>
                            <li><a href="{{ route('admin.applications.index') }}">Manage Applications</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="{{ route('admin.land.allocate') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-list"></span><span class="mtext">Allocate Land</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.deduction.setup') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-settings"></span><span class="mtext">Deduction Setup</span>
                        </a>
                    </li>
                    
                    
                    
                @else
                    <li>
                        <a href="{{ route('staff.dashboard') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-home"></span><span class="mtext">Dashboard</span>
                        </a>
                    </li>
                    <li>
                    <div class="dropdown-divider"></div>
                    </li>

                    <li>
                        <a href="{{ route('staff.apply') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-user"></span><span class="mtext">New Application</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('application.index') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-list"></span><span class="mtext">My Applications</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>