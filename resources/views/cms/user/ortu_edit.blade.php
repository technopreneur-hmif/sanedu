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
        <form action="{{ route('verif_ortu') }}" method="POST" enctype="multipart/form-data" align="center">
            @csrf
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" id="inputPassword3">
                </div>
            </div>
            <input type="hidden" name="wa_user" value="{{ $edit->wa_user }}">
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>

        <script src="{{ asset('assets') }}/js/bootstrap.js"></script>
        <script src="{{ asset('assets') }}/js/popper.min.js"></script>

</body>

</html>
