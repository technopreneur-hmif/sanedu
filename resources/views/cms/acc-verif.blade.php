<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css">
    <link href="{{ asset('assets') }}/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css" >

    <title>Verifikasi User</title>
</head>

<body>
    <div class="container">
        <form action="{{ route('verifikasi_update') }}" method="POST" enctype="multipart/form-data" align="center">
            @csrf
            <div class="row mb-3">
                <label for="inputnumber3" class="col-form-label">Nominal yang dibayarkan</label>
                    <input type="text" name="nominal" class="form-control" id="inputnumber3" required>
            </div>
            <div class="row mb-3">
                <label for="inputnumber3" class="col-form-label">Kelas</label>
                    <select name="kelas" class="custom-select">
                        <option selected>Pilih Kelas</option>
                        @foreach($kelas as $k)
                        <option value="{{ $k->nama_kelas }}">{{ $k->nama_kelas }}</option>
                        @endforeach
                      </select>
            </div>
            <input type="text" name="id" value="{{ $verif->id }}" hidden>
            <input type="text" name="wa_siswa" value="{{ $verif->wa_siswa }}">
            <input type="text" name="wa_user" value="{{ $verif->wa_user }}" hidden>
            <button type="submit" class="btn btn-primary">Acc</button>
        </form>



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
