<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>U-Trade</title>
    <link rel="shortcut icon" href="{{ asset('public/img/Logo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container d-flex justify-content-between">
            <div class="logo">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('public/img/Logo.png') }}" alt="" width="40">
                </a>
            </div>
            <div class="content-nav">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                @if (Route::has('login'))
                <div class="hidden fixed sm:block collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                @auth
                                <a href="{{ url('/home') }}">
                                    <button class="btn btn-outline-success me-md-2" type="button">Home</button>
                                </a>
                                @else
                                <a href="{{ route('login') }}">
                                    <button class="btn btn-outline-success" type="button">Log In</button>
                                </a>

                                @if (Route::has('register'))
                                <a href="{{ route('register') }}">
                                    <button class="btn btn-outline-secondary" type="button">Register</button>
                                </a>
                                @endif
                                @endauth
                            </div>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </nav>

    <div class="container">
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>