<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets') }}/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <script src="{{ asset('assets') }}/js/popper.min.js "></script>
    <script src="{{ asset('assets') }}/js/bootstrap.js "></script>
    <title>Homepage</title>
</head>

<body>
    <div class="header p-5 mb-2 bg-primary">
    </div>
    <div class=" container my-5 ">
        <!-- Lets Begin -->
        <!-- 1. Image Responsive -->
        <div class="text-center ">
            <img src="{{ asset('assets') }}/img/logo.png " alt=" " class="img-fluid ">
        </div>
        <br>
        <div class="text-center ">
            <h4>Sistem Monitoring Terintegrasi</h4>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Login
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('loginortu') }}">Sebagai Orang Tua</a></li>
                      <li><a class="dropdown-item" href="{{ route('loginsiswa') }}">Sebagai Siswa</a></li>
                    </ul>
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Daftar
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('pendaftaranortu') }}">Sebagai Orang Tua</a></li>
                      <li><a class="dropdown-item" href="{{ route('pendaftaransiswa') }}">Sebagai Siswa</a></li>
                    </ul>
                </div>
            </form>

        </div>
    </div>
    <div class="footer p-5 bg-primary ">
    </div>
    <!-- Bootstrap Javascript -->
</body>

</html>
