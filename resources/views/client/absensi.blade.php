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

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets') }}/fontawesome/css/all.min.css">
    <!-- Theme style -->

    <!-- Style Css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/client-style.css">
    <link href="{{ asset('assets') }}/css/bootstrap.css" rel="stylesheet">

</head>

<body>
    <div class="content">
        <div class="wrap-header">
        <div class="header">
            <div class="hai">
                <h2>Hai,
                    @if($client->hubungan!=null)
                    {{ $client->hubungan }}
                    @endif
                    @if($client->hubungan!=null)
                        {{ $siswa->nama }}
                    @else
                    {{ $client->nama }}
                    @endif
                </h2>
                <p>Biaya Pendampingan
                    @if($client->hubungan!=null)
                        {{ $siswa->nama }}
                    @else
                    {{ $client->nama }}
                    @endif
                </p>
                <p><b>Rp.
                    @if($nominal!=null)
                    {{ $nominal->nominal }}
                    @else
                    {{ $nominal }}
                    @endif
                </b></p>
            </div>
            <div class="ikon">
                <div class="qr">
                    <a class="tombol" href="#"><i class="fa-solid fa-qrcode fa-2x"></i></a>
                </div>
                <div class="wa">
                    <a class="tombol" href="https://wa.me/6282175992745"><i class="fa-brands fa-whatsapp fa-2x"></i></a>
                </div>
                <div class="wallet">
                    <a class="tombol" href="pembayaran/{{ $client->wa_user }}"><i class="fa-solid fa-wallet fa-2x"></i></a>
                </div>
            </div>
        </div>
        <div class="keuangan">
            <div class="pembayaran">
                <h6>Pembayaran</h6>
                <p><b>Rp.
                    @if($nominal!=null)
                    {{ $pembayaran->nominal }}
                    @endif
                </b></p>
            </div>
            <div class="kekurangan">
                <h6>Kekurangan</h6>
                <p><b>Rp. {{ $kekurangan }}</b></p>
            </div>
        </div>
        </div>
        <div class="container">

            <div class="button">
                <form method="post" action="{{ route('riwayat_ujian') }}">
                    @csrf
                    <input type="hidden" name="no_wa" value="{{ $client->wa_user }}">
                    <input type="hidden" name="roles" value="{{ $client->roles_id }}">
                    <input type="hidden" name="password" value="{{ $password }}">
                    <button type="submit" class="btn btn-primary" role="button">Riwayat Ujian</button>
                </form>
                <form method="post" action="{{ route('riwayat_pembayaran') }}">
                    @csrf
                    <input type="hidden" name="no_wa" value="{{ $client->wa_user }}">
                    <input type="hidden" name="roles" value="{{ $client->roles_id }}">
                    <input type="hidden" name="password" value="{{ $password }}">
                    <button type="submit" class="btn btn-primary" role="button">Riwayat Pembayaran</button>
                </form>
                <form method="post" action="{{ route('clientside') }}">
                    @csrf
                    <input type="hidden" name="no_wa" value="{{ $client->wa_user }}">
                    <input type="hidden" name="roles" value="{{ $client->roles_id }}">
                    <input type="hidden" name="password" value="{{ $password }}">
                    <button type="submit" class="btn btn-primary verif" role="button">Absensi Siswa</button>
                </form>
            </div>
            <br>
            <form action="#">
                <select name="classroom" id="lang">
                  <option value="kelas">November</option>
                  <option value="saintek1">Desember</option>
                  <option value="xiipa1">Januari</option>
                  <option value="saintek2">Februari</option>
                  <option value="saintek3">Maret</option>
                </select>
            </form>
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
                                    Hari
                                </th>
                                <th>
                                    Waktu Masuk
                                </th>
                                <th>
                                    Waktu Kehadiran
                                </th>
                                <th>
                                    Keterangan
                                </th>
                            </tr>
                        </thead>
                        @foreach($presensi as $p)
                        <tr>
                            <td>
                                {{ $p->tanggal_presensi }}
                            </td>
                            <td>
                                {{ $p->hari }}
                            </td>
                            <td>
                                {{ $p->waktu_masuk }}
                            </td>
                            <td>
                                {{ $p->waktu_submit }}
                            </td>
                            <td>
                                {{ $p->keterangan }}
                            </td>
                        </tr>
                        @endforeach
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

