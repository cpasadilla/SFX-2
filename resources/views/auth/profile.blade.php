@extends('layouts.app')

@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 mx-auto"> <!-- Added mx-auto class -->
<h1 style="padding-top: 20px;" class="m-0 text-center font-weight-bold">{{ __('MY PROFILE') }}</h1> <!-- Added text-center class -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content d-flex align-items-center justify-content-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card">

                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-body">

                                <div class="input-group mb-3">
                                    <input type="text" name="fName"
                                           class="form-control @error('fName') is-invalid @enderror"
                                           placeholder="{{ __('First Name') }}" value="{{ old('fName', auth()->user()->fName) }}" required readonly>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('fName')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" name="lName"
                                           class="form-control @error('lName') is-invalid @enderror"
                                           placeholder="{{ __('Last Name') }}" value="{{ old('lName', auth()->user()->lName) }}" required readonly>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('lName')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>


                                <div class="input-group mb-3">
                                    <input type="email" name="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required readonly>
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

                                <!-- Password -->
                                <div class="input-group mb-3">
                                    <input type="password" name="password"
                                        id="password" 
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="{{ __('New password') }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text" id="togglePassword">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                    @error('password')
                                    <span class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <!-- Password Confirmation -->
                                <div class="input-group mb-3">
                                    <input type="password" name="password_confirmation"
                                        id="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        placeholder="{{ __('New password confirmation') }}"
                                        autocomplete="new-password">
                                    <div class="input-group-append">
                                        <div class="input-group-text" id="togglePasswordConfirmation">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-center pb-4" style="background-color: white;">
                                <button type="submit" class="btn btn-success">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <script>
        $(document).ready(function() {
            // Toggle password visibility
            $('#togglePassword').on('click', function() {
                var passwordField = $('#password');
                var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);
                
                // Change icon based on visibility
                $(this).find('span').toggleClass('fa-lock fa-unlock');
            });
    
            // Toggle password confirmation visibility
            $('#togglePasswordConfirmation').on('click', function() {
                var passwordConfirmationField = $('#password_confirmation');
                var type = passwordConfirmationField.attr('type') === 'password' ? 'text' : 'password';
                passwordConfirmationField.attr('type', type);
    
                // Change icon based on visibility
                $(this).find('span').toggleClass('fa-lock fa-unlock');
            });
        });
    </script>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection

@section('scripts')
    @if ($message = Session::get('success'))
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script>
            toastr.options = {
                "closeButton": true,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            toastr.success('{{ $message }}')
        </script>
    @endif
@endsection
