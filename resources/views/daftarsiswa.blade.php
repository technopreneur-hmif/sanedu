<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets') }}/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">

    <title>Daftar Siswa</title>
</head>

<body>
    <div class="container">
        <form action="{{ route('daftarsiswa') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="inputtext3" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" name="nama" class="form-control" id="inputtext3">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputnumber3" class="col-sm-3 col-form-label">No WA</label>
                <div class="col-sm-9">
                    <input type="text" name="no_wa" class="form-control" id="inputnumber3">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" id="inputPassword3">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Re-Password</label>
                <div class="col-sm-9">
                    <input type="password" name="repassword" class="form-control" id="inputPassword3">
                </div>
            </div>
            @if(session('nomor'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <div class="alert-text">
                    Nomor sudah terdaftar
                </div>
            </div>
            @elseif(session('password'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <div class="alert-text">
                    Password tidak sama harap ulangi!
                </div>
            </div>
            @endif
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{ asset('assets') }}/js/bootstrap.js"></script>
    <script src="{{ asset('assets') }}/js/popper.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
