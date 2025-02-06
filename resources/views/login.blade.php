<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PT LEN Industri</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #003366, #CC0000);
            height: 100vh;
        }
        #auth {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        #auth-left {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }
        .btn-primary {
            background-color: #CC0000;
            border: none;
        }
        .btn-primary:hover {
            background-color: #990000;
        }
        .auth-logo img {
            width: 150px;
            display: block;
            margin: 0 auto 20px;
        }
    </style>
</head>

<body>
    <div id="auth">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="index.html"><img src="../../assets/images/logo/pfplen.png" alt="Logo" srcset=""></a>
            </div>
            <h1 class="auth-title text-center" style="color:#003366;">Login</h1>
            <p class="auth-subtitle text-center text-muted mb-4">Masukkan kredensial Anda untuk masuk.</p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/actionLogin" method="POST">
                @csrf
                @if (session('error'))
                    <p class="text-danger text-center">{{ session('error') }}</p>
                @endif
                <div class="form-group position-relative has-icon-left mb-3">
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" required>
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-3">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>

                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3" type="submit">Login</button>
            </form>
            {{-- <div class="text-center mt-3">
                <p class="text-muted">Belum punya akun? <a href="#" class="text-danger font-weight-bold">Daftar</a></p>
                <p><a class="text-primary font-weight-bold" href="#">Lupa Password?</a></p>
            </div> --}}
        </div>
    </div>
</body>

</html>
