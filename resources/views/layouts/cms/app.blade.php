<!DOCTYPE html>
<html lang="id">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta charset="UTF-8" />
        <meta name="theme-color" content="#09f" />
        <meta name="mobile-web-app-capable" content="yes" />
        <meta name="robots" content="follow" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta property="og:type" content="cms website" />
        <meta property="og:url" content="URL" />
        <link rel="manifest" href="./manifest.webmanifest" />

        <title>@yield('title') - Sanedu Indonesia</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon-16x16.png') }}">

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="{{ asset('assets') }}/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('assets') }}/fontawesome/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
        <!-- Style Css -->
        <link rel="stylesheet" href="{{ asset('assets/css/user-style.css') }}">
        <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button"><i class="fas fa-search"></i></a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit"><i class="fas fa-search"></i></button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search"><i class="fas fa-times"></i></button>
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
                    <a class="btn btn-primary verif" href="verif-akun.html" role="button">Verifikasi Akun</a>
                    <a class="btn btn-primary" href="siswa.html" role="button">Siswa</a>
                    <a class="btn btn-primary" href="ortu.html" role="button">Orang Tua</a>
                    <a class="btn btn-primary" href="kelas.html" role="button">Kelas</a>
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

                            <tr>
                                <td>
                                    Algino
                                </td>
                                <td>
                                    082176760909
                                </td>
                                <td>
                                    Ayah
                                </td>
                                <td>
                                    Margaun
                                </td>
                                <td>
                                    <div class="col-md-13">
                                        <div class="dropdown">
                                            <div class="kiri">
                                                <a class="btn btn-success" href="#popup" role="button">Acc</a>
                                            </div>
                                            <div class="kanan">
                                                <a class="btn btn-danger" href="" role="button">Tolak</a>
                                            </div>
                                        </div>
                                    </div>
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
            <div class="dropdown">
                <div class="popup-wrapper" id="popup">
                    <div class="popup-container">
                        <form action="" method="post" class="popup-form">
                            <div class="input-group">
                                <div class="container">
                                    <form>
                                        <div class="row mb-3">

                                            <label for="inputnumber3" class="col-sm-3 col-form-label">Nominal dibayarkan</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputnumber3">
                                                <p class="bayar"><b>Kelas</b></p>

                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control kelas" aria-label="Text input with dropdown button">
                                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" value="Acc" name="">
                                    </form>
                                </div>
                            </div>
                            <a class="popup-close" href="#closed">X</a>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ./wrapper -->

      <!-- Tempat Scripts -->
      <script>

      </script>
      @yield('script')

      <!-- jQuery -->
      <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
      <!-- AdminLTE App -->
      <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

    </body>
</html>
