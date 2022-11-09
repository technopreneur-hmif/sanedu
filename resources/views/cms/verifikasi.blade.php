<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('assets') }}/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css">
    <!-- Style Css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/user-style.css">
    <link href="{{ asset('assets') }}/css/bootstrap.css" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <span class="">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="starter.html" class="nav-link">
                                <p>
                                    User
                                    <i class=""></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="artikel.html" class="nav-link">
                                <p>
                                    Keuangan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="galeri.html" class="nav-link">
                                <p>
                                    Absensi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="galeri.html" class="nav-link">
                                <p>
                                    Ujian
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="button">
            <a class="btn btn-primary" href="#" role="button">Verifikasi Akun</a>
            <a class="btn btn-primary" href="#" role="button">Siswa</a>
            <a class="btn btn-primary" href="#" role="button">Orang Tua</a>
            <a class="btn btn-primary" href="#" role="button">Kelas</a>
        </div>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- /.content-header -->
            <div class="col-md-12">
                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th>
                                Nama
                            </th>
                            <th>
                                No WA
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Siswa
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    @foreach($data as $result)
                    <tr>
                        <td>
                            {{ $result->nama }}
                        </td>
                        <td>
                            @if($result->roles_id=='1')
                            {{ $result->wa_user }}
                            @elseif($result->roles_id=='2')
                            {{ $result->wa_user }}
                            @endif
                        </td>
                        <td>
                            {{ $result->hubungan }}
                        </td>
                        <td>
                            @foreach($siswa as $s)
                            @if($s->wa_user==$result->wa_siswa)
                                {{ $s->nama }}
                            @endif
                            @endforeach
                        </td>
                        <td>
                            <div class="col-md-13">
                                <a href="verifikasi/update/{{ $result->id }}"><button type="button" class="btn btn-success">Acc</button></a>
                                <a href="verifikasi/delete/{{ $result->id }}"><button type="button" class="btn btn-danger">Tolak</button></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
            <!-- /.content -->
        </div>
        @if (session('sukses'))
            <div class="alert alert-success">
                {{ session('sukses') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <!-- /.content-wrapper -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
</script>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets') }}/dist/js/adminlte.min.js"></script>
</body>

</html>
