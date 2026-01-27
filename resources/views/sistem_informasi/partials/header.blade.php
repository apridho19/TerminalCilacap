<div>
    <!-- START HEADER-->
    <header class="header">
        <div class="page-brand">
            <a class="link" href="{{ url('/dashboard') }}">
                <span class="brand">
                    <!-- <img src="{{ asset('assets/img/logo_kemenhub.png') }}" alt="logo" style="max-height: 35px; margin-right: 8px;"> -->
                    Si
                    <span class="brand-tip">PAKAT</span>
                </span>
                <span class="brand-mini"><img src="{{ asset('assets/img/logo_kemenhub.png') }}" alt="logo" style="max-height: 35px;"></span>
            </a>
        </div>
        <div class="flexbox flex-1">
            <!-- START TOP-LEFT TOOLBAR-->
            <ul class="nav navbar-toolbar">
                <li>
                    <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                </li>
                <li>
                    <form class="navbar-search" action="javascript:;">
                        <div class="rel">
                            <span class="search-icon"><i class="ti-search"></i></span>
                            <input class="form-control" placeholder="Search here...">
                        </div>
                    </form>
                </li>
            </ul>
            <!-- END TOP-LEFT TOOLBAR-->
            <!-- START TOP-RIGHT TOOLBAR-->
            <ul class="nav navbar-toolbar">
             
              
                <li class="dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                        <img src="{{ asset('assets/img/admin-avatar.png') }}" />
                        <span></span>{{ Auth::user()->name }}<i class="fa fa-angle-down m-l-5"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="profile.html"><i class="fa fa-user"></i>Profile</a>
                        <a class="dropdown-item" href="profile.html"><i class="fa fa-cog"></i>Settings</a>
                        <a class="dropdown-item" href="javascript:;"><i class="fa fa-support"></i>Support</a>
                        <li class="dropdown-divider"></li>
                        <a class="dropdown-item" href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();"><i class="fa fa-power-off"></i>Logout</a>
                        <form id="logout-form-header" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
            <!-- END TOP-RIGHT TOOLBAR-->
        </div>
    </header>
    <!-- END HEADER-->
</div>