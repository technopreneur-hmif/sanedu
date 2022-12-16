<div class="be-left-sidebar">
    <div class="left-sidebar-wrapper">
        <a href="#" class="left-sidebar-toggle">Dashboard</a>
        <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
                <div class="left-sidebar-content">
                    <ul class="sidebar-elements">
                        <li class="divider">Menu</li>
                        <li class="#">
                            <a href="{{route('admin')}}"><i class="icon mdi mdi-home"></i><span>Beranda</span></a>
                        </li>
                        <li class="parent {{ active(['admin.user', 'admin.user.*'], 'active open') }}">
                            <a href="{{route('admin.user')}}"><i class="icon mdi mdi-account"></i><span>User</span></a>
                            <ul class="sub-menu">
                                <li class="{{ active(['admin.user.verification', 'admin.user.verification.*']) }}">
                                    <a href="{{route('admin.user.verification')}}">Verifikasi Akun</a>
                                </li>
                                <li class="{{ active(['admin.user.student', 'admin.user.student.*']) }}">
                                    <a href="{{route('admin.user.student')}}">Siswa</a>
                                </li>
                                <li class="{{ active(['admin.user.parent', 'admin.user.parent.*']) }}">
                                    <a href="{{route('admin.user.parent')}}">Orang Tua</a>
                                </li>
                                <li class="{{ active(['admin.user.class', 'admin.user.class.*']) }}">
                                    <a href="{{route('admin.user.class')}}">Kelas</a>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="#"><i class="icon mdi mdi-check-circle"></i><span>Absensi</span></a>
                        </li>
                        <li class="">
                            <a href="{{route('admin.finance')}}"><i class="icon mdi mdi-tab"></i><span>Keuangan</span></a>
                        </li>
                        <li class="">
                            <a href="#"><i class="icon mdi mdi-ticket-star"></i><span>Ujian</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
