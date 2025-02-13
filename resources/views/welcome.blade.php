<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
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

        /* Jumbotron dengan Latar Belakang Biru */
        .jumbotron {
            background-color: #007bff; /* Biru background */
            padding: 3rem 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.6);
            color: white;
            text-shadow: none;
        }

        .jumbotron h1, .jumbotron h2, .jumbotron p {
            color: white;
        }

        .jumbotron hr {
            border-top: 1px solid #fff;
        }

        /* Tombol Biru */
        .btn-primary {
            background-color: #0056b3; /* Biru gelap */
            border: none;
            box-shadow: 0 4px 8px rgba(0, 86, 179, 0.4);
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #004085; /* Biru lebih gelap */
            box-shadow: 0 6px 12px rgba(0, 86, 179, 0.6);
            transform: translateY(-2px);
        }

        /* Tombol Sekunder */
        .btn-secondary {
            background-color: #0056b3; /* Biru gelap */
            border: none;
            box-shadow: 0 4px 8px rgba(0, 86, 179, 0.4);
            transition: all 0.3s ease-in-out;
        }

        .btn-secondary:hover {
            background-color: #004085; /* Biru lebih gelap */
            box-shadow: 0 6px 12px rgba(0, 86, 179, 0.6);
            transform: translateY(-2px);
        }

        /* Tombol Sukses */
        .btn-success {
            background-color: #28a745;
            border: none;
            box-shadow: 0 4px 8px rgba(40, 167, 69, 0.4);
            transition: all 0.3s ease-in-out;
        }

        .btn-success:hover {
            background-color: #218838;
            box-shadow: 0 6px 12px rgba(40, 167, 69, 0.6);
            transform: translateY(-2px);
        }

        /* Navbar Biru */
        .navbar {
            padding: 1rem;
            background-color: #0056b3; /* Biru navbar */
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #fff;
        }

        .nav-link {
            color: white !important;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        /* Container dengan latar belakang abu-abu muda */
        .container {
            max-width: 1200px;
            margin-top: 150px;
            background-color: #f1f1f1; /* Light gray (abu-abu) */
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .auth-logo img {
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        }

        .lead {
            font-size: 1.2rem;
        }

        .jumbotron h1 {
            font-size: 3rem;
            font-weight: 700;
        }

        .jumbotron h2 {
            font-size: 2.5rem;
            font-weight: 700;
        }

        @media (max-width: 768px) {
            .jumbotron {
                padding: 2rem 1rem;
            }
            .jumbotron h1 {
                font-size: 2.5rem;
            }
            .jumbotron h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a class="navbar-brand" href="#">Laravel INVENTARIS</a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary" href="{{ route('login') }}">Log in</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link btn btn-secondary" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="jumbotron text-center">
            <div class="mb-4">
                <a href="{{ route('login') }}" class="auth-logo">
                    <img src="{{ asset('backend/assets/images/download.png') }}" alt="logo-dark" class="mx-auto" height="100" />
                </a>
                <h2>WEB INVENTARIS LABKOM</h2>
            </div>
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
        </div>
    </div>
</body>
</html>
