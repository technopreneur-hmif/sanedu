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
        <form action="#">
            <select name="classroom" id="lang">
              <option value="kelas">Kelas</option>
              <option value="saintek1">Saintek 1</option>
              <option value="xiipa1">Xi IPA 1</option>
              <option value="saintek2">Saintek 2</option>
              <option value="saintek3">Saintek 3</option>
            </select>
        </form>
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
                                Kelas
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tr>
                        <td>
                            Algino
                        </td>
                        <td>
                            082176760909
                        </td>
                        <td>
                            Siswa
                        </td>
                        <td>
                            Saintek 1
                        </td>
                        <td>
                            <div class="col-md-13">
                                <button type="button" class="btn btn-warning">Edit</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <td>
                        Margaun
                    </td>
                    <td>
                        089909030392
                    </td>
                    <td>
                        Siswa
                    </td>
                    <td>
                        XI IPA 1
                    </td>
                    <td>
                        <div class="col-md-13">
                            <div class="dropdown">
                                <button type="button" class="btn btn-warning">Edit</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </div>
                        </div>
                    </td>
                    </tr>
                    <td>
                        Santina
                    </td>
                    <td>
                        087682827287
                    </td>
                    <td>
                        Siswa
                    </td>
                    <td>
                        Saintek 2
                    </td>
                    <td>
                        <div class="col-md-13">
                            <button type="button" class="btn btn-warning">Edit</button>
                            <button type="button" class="btn btn-danger">Hapus</button>
                        </div>
                    </td>
                    </tr>
                    <td>
                        Argaun
                    </td>
                    <td>
                        089676726278
                    </td>
                    <td>
                        Siswa
                    </td>
                    <td>
                        Saintek 3
                    </td>
                    <td>
                        <div class="col-md-13">
                            <button type="button" class="btn btn-warning">Edit</button>
                            <button type="button" class="btn btn-danger">Hapus</button>
                        </div>
                    </td>
                    </tr>
                    <td>
                        -
                    </td>
                    <td>
                        -
                    </td>
                    <td>
                        -
                    </td>
                    <td>
                        -
                    </td>
                    <td>
                        -
                    </td>
                    </tr>
                    <td>
                        -
                    </td>
                    <td>
                        -
                    </td>
                    <td>
                        -
                    </td>
                    <td>
                        -
                    </td>
                    <td>
                        -
                    </td>
                    </tr>
                    <td>
                        -
                    </td>
                    <td>
                        -
                    </td>
                    <td>
                        -
                    </td>
                    <td>
                        -
                    </td>
                    <td>
                        -
                    </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets') }}/dist/js/adminlte.min.js"></script>
</body>

</html>
