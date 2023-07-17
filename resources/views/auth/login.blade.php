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
            /* Additional styles for the background */
        }

        
    </style>

</head>

<body>
    <div class="background-image">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-3 column" style="background-color:rgba(255, 255, 255, 0.753);height: 100%;">
<div class="row" style=" padding-top:20px; padding-bottom:20px;">
<div class="col-md-3"></div>
<div class="col-md-6">
<img src="{{ asset('images/logo.png') }}" style=" height: 180px; padding-left:17px;">
</div>
<div class="col-md-3"></div>
</div>
                <div class="card-body" style="height: 1000px; background-color:rgba(255, 255, 255, 0);">
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
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="{{ __('Password') }}" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
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
                            <!-- /.col -->
                            <div class="col-12 d-flex justify-content-center pt-3">
                                <br>
                                <button type="submit" class="btn btn-success w-50">{{ __('Login') }}</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
        </div>
        </div>
    </div>
</body>
<script>
    let form = document.getElementById('logout-form');

    let log = document.querySelector("#logout");
    log.onclick = function() {
        form.submit();
    }
</script>
@vite('resources/js/app.js')
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}" defer></script>

@yield('scripts')

</html>
