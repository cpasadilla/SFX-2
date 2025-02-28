<!DOCTYPE html>
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app_name', 'SFX SHIPPING LINES INC.') }}</title>
        
        <!-- icon -->
        <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/icon type">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/8aa49c4795.js" crossorigin="anonymous" rel="stylesheet"></script>
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
        <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
        @yield('styles')
    </head>
    <body class="hold-transition sidebar-mini"  style="background-color: #f4f5fa">
        <div class="wrapper">
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap');
                body {
                    font-family: 'Roboto Condensed', sans-serif;
                }
                .navbar-green {
                    background-color: green
                }
            </style>
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-light" style="background-color: rgba(40, 165, 68, 1);">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link d-flex align-items-center" data-widget="pushmenu" href="#" role="button">
                            <i class="fas fa-bars" style="color: white; margin-right: 10px;"></i>
                            <span class="brand-link d-flex align-items-center">
                                <span class="brand-text font-weight-light" style="color: white; font-size: 20px; font-weight: bold;">
                                    ST. FRANCIS XAVIER STAR SHIPPING LINES INC.
                                </span>
                            </span>
                        </a>
                    </li>
                </ul>
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#" aria-expanded="false">
                            <span style="color: white; margin-right: 10px;">
                                {{ Auth::user()->fName }} {{ Auth::user()->lName }} - {{ Auth::user()->position }}
                            </span>
                            <img src="{{ asset('images/icon.PNG') }}" style="height: 30px;">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px;">
                            <a href="{{ route('profile.show') }}" class="dropdown-item">
                                <i class="mr-2 fas fa-file"></i>
                                {{ __('My profile') }}
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="mr-2 fas fa-sign-out-alt"></i>
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-light-green elevation-4" style="background:#28A544">
                <!-- Brand Logo -->
                <span class="brand-link d-flex align-items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo"
                        class="brand-image img-circle elevation-3"
                        style="opacity: .8; height: 60px; margin-right: 10px;">
                    <strong class="brand-text font-weight-light" style="color: white; font-size: 24px; font-weight: bold;">SFXSSLI</strong>
                </span>
                @include('layouts.navigation')
            </aside>
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div> <!-- /.content-wrapper -->
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
                <div class="p-3">
                    <h5>Title</h5>
                    <p>Sidebar content</p>
                </div>
            </aside> <!-- /.control-sidebar -->
        </div> <!-- ./wrapper -->
        
        <!-- REQUIRED SCRIPTS -->
        @vite('resources/js/app.js')
        
        <!-- AdminLTE App -->
        <script src="{{ asset('js/adminlte.min.js') }}" defer></script>
        @yield('scripts')
    </body>
</html>