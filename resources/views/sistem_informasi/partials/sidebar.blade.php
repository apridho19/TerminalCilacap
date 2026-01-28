<style>
    .page-sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;      /* setinggi layar */
    overflow-y: auto;   /* kalau menu banyak, sidebar saja yang scroll */
    z-index: 1000;
}

</style>

<div>
    <!-- START SIDEBAR-->
    <nav class="page-sidebar" id="sidebar">
        <div id="sidebar-collapse">
            <div class="admin-block d-flex">
                <div>
                    <img src="{{ asset('assets/img/admin-avatar.png') }}" width="45px" />
                </div>
                <div class="admin-info">
                    <div class="font-strong">{{ Auth::user()->name }}</div>
                    <small>{{ ucfirst(Auth::user()->role) }}</small>
                </div>
            </div>
            <ul class="side-menu metismenu">
                <li>
                    <a class="{{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                        <span class="nav-label">Dashboard</span>
                    </a>
                </li>
                <li class="heading">FEATURES</li>
                <li>
                    <a class="{{ request()->is('keberangkatan*') ? 'active' : '' }}" href="{{ url('/keberangkatan') }}"><i class="sidebar-item-icon fa fa-plane"></i>
                        <span class="nav-label">Keberangkatan</span></a>
                </li>
                <li>
                    <a class="{{ request()->is('kedatangan*') ? 'active' : '' }}" href="{{ url('/kedatangan') }}"><i class="sidebar-item-icon fa fa-download"></i>
                        <span class="nav-label">Kedatangan</span></a>
                </li>

                @if(Auth::user()->role === 'admin')
                <li>
                    <a class="{{ request()->is('dataproduksi*') ? 'active' : '' }}" href="{{ url('/dataproduksi') }}"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                        <span class="nav-label">Data Produksi</span></a>
                </li>
                <li>
                    <a class="{{ request()->is('datamaster*') ? 'active' : '' }}" href="{{ url('/datamaster') }}"><i class="sidebar-item-icon fa fa-table"></i>
                        <span class="nav-label">Data Master</span></a>
                </li>
                @endif

                <li>
                    <a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="sidebar-item-icon fa fa-sign-out"></i>
                        <span class="nav-label">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>


            </ul>
        </div>
    </nav>
    <!-- END SIDEBAR-->
</div>