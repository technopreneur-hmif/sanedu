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
    <link rel="stylesheet" href="{{ asset('assets') }}/fontawesome/css/all.min.css">
    <!-- Theme style -->

    <!-- Style Css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/client-style.css">
    <link href="{{ asset('assets') }}/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/bootstrap.css" rel="stylesheet">

</head>

<body>
    <div class="content">
        <div class="header">
            <div class="hai">
                <h2>Hai Bunda Alfa</h2>
                <p>Biaya Pendampingan Alfa</p>
                <p><b>Rp. 3.500.000</b></p>
            </div>
            <div class="ikon">
                <div class="qr">
                    <a class="tombol" href="#"><i class="fa-solid fa-qrcode fa-2x"></i></a>
                </div>
                <div class="wa">
                    <a class="tombol" href="#"><i class="fa-brands fa-whatsapp fa-2x"></i></a>
                </div>
                <div class="wallet">
                    <a class="tombol" href="#"><i class="fa-solid fa-wallet fa-2x"></i></a>
                </div>
            </div>
        </div>
        <div class="keuangan">
            <div class="pembayaran">
                <h6>Pembayaran</h6>
                <p><b>Rp. 500.000</b></p>
            </div>
            <div class="kekurangan">
                <h6>Kekurangan</h6>
                <p><b>Rp. 3.000.000</b></p>
            </div>
        </div>
        <div class="container">

            <div class="button">
                <a class="btn btn-primary " href="absensi.html" role="button">Absensi Siswa</a>
                <a class="btn btn-primary " href="riwayat-pembayaran.html" role="button">Riwayat Pembayaran</a>
                <a class="btn btn-primary verif" href="riwayat-ujian.html" role="button">Riwayat Ujian</a>
            </div>
            <form action="#">
                <select name="classroom" id="lang">
                  <option value="kelas">2022</option>
                  <option value="saintek1">2021</option>
                  <option value="xiipa1">2020</option>
                  <option value="saintek2">2019</option>
                  <option value="saintek3">2018</option>
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
                                    Tanggal
                                </th>
                                <th>
                                    Mata Pelajaran
                                </th>
                                <th>
                                    Total Soal
                                </th>
                                <th>
                                    Benar
                                </th>
                                <th>
                                    Salah
                                </th>
                                <th>
                                    Kosong
                                </th>
                                <th>
                                    Nilai
                                </th>
                            </tr>
                        </thead>

                        <tr>
                            <td>
                                21-Okt-2022
                            </td>
                            <td>
                                Semua Pelajaran
                            </td>
                            <td>
                                35
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
                        <tr>
                            <td>
                                19-Okt-2022
                            </td>
                            <td>
                                Semua Pelajaran
                            </td>
                            <td>
                                35
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
                        <tr>
                            <td>
                                17-Okt-2022
                            </td>
                            <td>
                                Semua Pelajaran
                            </td>
                            <td>
                                35
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
                        <tr>
                            <td>
                                15-Okt-2022
                            </td>
                            <td>
                                Semua Pelajaran
                            </td>
                            <td>
                                35
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
    </div>
    </div>


    <!-- jQuery -->
    <script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets') }}/dist/js/adminlte.min.js"></script>
</body>

</html>
