<div class="be-right-navbar">
    <ul class="nav navbar-nav navbar-right be-user-nav">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle">
                <img src="{{ asset('asset-beagle/img/avatar7.png')}}" alt="Avatar">
                {{-- <span class="user-name">{{ Auth::user()->nama }}</span> --}}
                <span class="user-name">Nama User</span>
            </a>
            <ul role="menu" class="dropdown-menu">
                <li>
                    <div class="user-info">
                        <div class="user-name"></div>
                        <div class="user-position online">Nama User</div>
                    </div>
                </li>
                <li><a href="{{ route('logoutadmin') }}"><span class="icon mdi mdi-power"></span> Logout</a></li>
            </ul>
        </li>
    </ul>
    <div class="page-title"><span>Admin</span></div>
</div>
