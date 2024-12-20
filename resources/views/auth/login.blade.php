<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app_name', 'SFX SHIPPING LINES INC.') }}</title>
    <!-- icon -->
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/icon type">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/8aa49c4795.js" crossorigin="anonymous" rel="stylesheet"></script>
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    @yield('styles')
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
    
        .background-image {
            background-image: url("{{ asset('images/ship.png') }}");
            background-size: cover;
            background-position: center;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    
        .login-container {
            width: 100%;
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.753);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }
    
        .login-logo img {
            height: 180px;
        }
    
        .card-body {
            background-color: transparent;
        }
    </style>    
</head>

<body>
    <div class="background-image">
        <div class="login-container">
            <div class="login-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </div>
            <div class="card-body">
                <p class="login-box-msg" style="font-size: 30px; font-weight: bold;">{{ __('LOGIN') }}</p>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3" style="padding-top: 10px;">
                        <input type="email" name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="{{ __('Email') }}" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="error invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
    
                    <div class="input-group mb-3" style="padding-top: 10px;">
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="{{ __('Password') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock" id="togglePassword" style="cursor: pointer;"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="error invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
    
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary" style="font-size: 18px; font-weight: bold;">
                                <input type="checkbox" id="remember" name="remember" style="transform: scale(1.3);">
                                <label for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center pt-3">
                            <button type="submit" class="btn btn-success w-50">{{ __('Login') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-lock');
            this.classList.toggle('fa-lock-open');
        });
    </script>
    <script>
        let form = document.getElementById('logout-form');
        let log = document.querySelector("#logout");
        log.onclick = function () {
            form.submit();
        }
    </script>
    @vite('resources/js/app.js')
    <script src="{{ asset('js/adminlte.min.js') }}" defer></script>
    @yield('scripts')
</body>

</html>
