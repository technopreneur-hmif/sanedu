<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Pembayaran</title>

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
                    <p><b>Rp. {{ number_format($kekurangan) }}</b></p>
                </div>
                <div class="rek">
                    <h6>Nomor Rekening Pembayaran</h6>
                    <p><b>BRI : 0098-01-002211-56-3 </b></p>
                    <p><b>An. PT. Wahana Gerak Indonesia </b></p><br>

                    <p><b>Mandiri : 114002-54805-45</b></p>
                    <p><b>An . Wahana Gerak Indonesia</b></p>


                </div>
                <a class="btn btn-primary" href="{{ '../upload_pembayaran/'.$akun->wa_user }}" role="button">Verifikasi Pembayaran</a>
            </div>
        </div>
    </div>
</body>

</html>
