<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets') }}/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css" >

    <title>Scan Presensi</title>
</head>

<body>
    <div class="container">
        <form action="{{ route('bukti') }}" method="POST" enctype="multipart/form-data" align="center">
            @csrf
            <div class="row mb-3">
                <div class="col-sm-12">
                    <label for="inputnumber3" class="col-sm-3 col-form-label">Scan Presensi</label>
                    <div id="reader" width="600px"></div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
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
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
                // alert(decodedText);
                $('#result').val(decodedText);
                let id = decodedText;
                html5QrcodeScanner.clear().then(_ => {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({

                        url: "{{ route('validasi_qrcode') }}",
                        type: 'POST',
                        data: {
                            _methode : "POST",
                            _token: CSRF_TOKEN,
                            qr_code : id
                        },
                        success: function (response) {
                            console.log(response);
                            if(response.status == 200){
                                alert('berhasil');
                            }else{
                                alert('gagal');
                            }

                        }
                    });
                }).catch(error => {
                    alert('something wrong');
                });

            }

    function onScanFailure(error) {
    // handle scan failure, usually better to ignore and keep scanning.
    // for example:
        console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader",
    { fps: 10, qrbox: {width: 250, height: 250} },
    /* verbose= */ false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
</html>