<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsQR/1.4.0/jsQR.min.js"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url('https://source.unsplash.com/1600x900/?nature,water');
            background-size: cover;
            background-position: center;
            color: white;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 150px;
            background-color: #f1f1f1;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h2>WEB INVENTARIS LABKOM</h2>
            <h1 class="display-4"><i class="fas fa-laravel"></i> Welcome To Inventaris LAB</h1>
            <p class="lead">This is the welcome page of your Inventaris application.</p>
            <hr class="my-4">
            <p>Get started by logging in or registering below:</p>
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg mx-2">Log In</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-secondary btn-lg mx-2">Register</a>
            @endif
            <p class="mt-4">Jika Anda Tidak Memiliki Akun Hanya Bisa Melihat Data Inventaris Saja</p>
            <a href="{{ route('home') }}" class="btn btn-success mx-1">Data Inventaris</a>
            <button class="btn btn-info mx-1" data-toggle="modal" data-target="#qrModal">QR Code</button>
        </div>
    </div>

    <!-- Modal QR Code -->
    <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qrModalLabel">QR Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div id="qrcode"></div>
                    <hr>
                    <p>Scan QR Code atau gunakan kamera untuk membaca QR</p>
                    <video id="qr-video" width="100%" style="display:none;"></video>
                    <button id="scan-qr" class="btn btn-success mt-2">Scan QR Code</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let qr = new QRCode(document.getElementById("qrcode"), {
                text: "{{ url('/home') }}",
                width: 200,
                height: 200
            });

            $('#scan-qr').click(function() {
                let video = document.getElementById("qr-video");
                video.style.display = "block";
                navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } }).then(function(stream) {
                    video.srcObject = stream;
                    video.play();
                    let canvas = document.createElement("canvas");
                    let ctx = canvas.getContext("2d");
                    setInterval(function() {
                        if (video.readyState === video.HAVE_ENOUGH_DATA) {
                            canvas.width = video.videoWidth;
                            canvas.height = video.videoHeight;
                            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                            let imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                            let code = jsQR(imageData.data, canvas.width, canvas.height);
                            if (code) {
                                alert("QR Code ditemukan: " + code.data);
                                stream.getTracks().forEach(track => track.stop());
                                video.style.display = "none";
                            }
                        }
                    }, 500);
                }).catch(err => console.error(err));
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
