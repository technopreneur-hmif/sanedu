<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets') }}/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css" >

    <title>Login</title>
</head>

<body>
    <div class="container">
        <form action="{{ route('check_login') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="inputnumber3" class="col-sm-3 col-form-label">No WA</label>
                <div class="col-sm-9">
                    <input type="text" name="no_wa" class="form-control" id="inputnumber3" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" id="inputPassword3" required>
                </div>
            </div>
            <input type="text" name="roles" value="{{ $role }}" hidden>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <div class="alert-text">
                Nomor tidak sesuai
            </div>
        </div>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <div class="alert-text">
                Password salah, jika lupa hubungi admin
            </div>
        </div>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <div class="alert-text">
                Akun anda belum diverifikasi, harap hubungi admin
            </div>
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
