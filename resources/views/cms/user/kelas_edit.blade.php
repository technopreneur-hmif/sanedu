<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets') }}/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css" >

    <title>Admin</title>
</head>

<body>
    <div class="container">
        <form action="{{ route('verif_kelas') }}" method="POST" enctype="multipart/form-data" align="center">
            @csrf
            <div class="row mb-3">
                <label for="inputnumber3" class="col-sm-3 col-form-label">Nama Kelas</label>
                <div class="col-sm-9">
                    <input type="text" value="{{ $edit->nama_kelas }}" name="nama_kelas" class="form-control" id="inputnumber3">
                </div>
            </div>
            <input type="hidden" name="id" value="{{ $edit->id }}">
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>

        <script src="{{ asset('assets') }}/js/bootstrap.js"></script>
        <script src="{{ asset('assets') }}/js/popper.min.js"></script>

</body>

</html>
