<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets') }}/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
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
                <select name="roles" id="roles">
                  <option value="1">Orang Tua</option>
                  <option value="2">Siswa</option>
                </select>
                <br><br>
                <button class="btn bg-primary" name="tombol" value="Login" type="submit">Login</button>
                <button class="btn bg-primary" name="tombol" value="Daftar" type="submit">Daftar</button>
            </form>
        </div>
    </div>
    <div class="footer p-5 bg-primary ">
    </div>
    <!-- Bootstrap Javascript -->
    <script src="{{ asset('assets') }}/js/bootstrap.js "></script>

    <!-- Popper Javascript -->
    <script src="{{ asset('assets') }}/js/popper.min.js "></script>
</body>

</html>
