<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Pembayaran</title>

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
    <div>
        <div class="verif-bayar">
            <div class="wrap-verif">
                <div class="kurang">
                    <h6>Kekurangan Pembayaran</h6>
                    <p><b>Rp. {{ $kekurangan }}</b></p>
                </div>
                <div class="rek">
                    <h6>Nomor Rekening Pembayaran</h6>
                    <p><b>BNI : 21213-39393-933 </b></p>
                    <p><b>MANDIRI : 21929-03033-099</b></p>
                </div>
                <a class="btn btn-primary" href="{{ '../upload_pembayaran/'.$akun->wa_user }}" role="button">Verifikasi Pembayaran</a>
            </div>
        </div>
    </div>
</body>

</html>
