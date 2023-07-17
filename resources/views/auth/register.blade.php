@extends('layouts.guest')

@section('content')
    <div class="modal fade" id="createCustomerModal" tabindex="-1" role="dialog"
                aria-labelledby="createCustomerModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createCustomerModalLabel">Create Customer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-header">
                                    CUSTOMER INFORMATION
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('c.create') }}" enctype="multipart/form-data"
                                        id="create">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="fName"
                                                class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="fName" type="text"
                                                    class="form-control @error('fName') is-invalid @enderror"
                                                    name="fName" value="{{ old('fName') }}" required
                                                    autocomplete="fName" autofocus>

                                                @error('fName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="lName"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="lName" type="text"
                                                    class="form-control @error('lName') is-invalid @enderror"
                                                    name="lName" value="{{ old('lName') }}" required
                                                    autocomplete="lName" autofocus>

                                                @error('lName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="email"
                                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="phoneNum"
                                                class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                            <div class="col-md-6">
                                                <input id="phoneNum" type="text"
                                                    class="form-control @error('phoneNum') is-invalid @enderror"
                                                    name="phoneNum" value="{{ old('phoneNum') }}" required
                                                    autocomplete="phoneNum" autofocus>

                                                @error('phoneNum')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="password"
                                                class="col-md-4 col-form-label text-md-right">{{ __('DEFAULT PASSWORD: ') }}</label>
                                            <div class="col-md-6">
                                                {{ __('Pass1234') }}
                                            </div>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-2 d-flex justify-content-center"> <!-- Update the column class to col-md-4 and add text-center class -->
                                            <button type="submit" class="btn btn-primary" id="submitButton">
                                                {{ __('REGISTER') }}
                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.row -->
            </div>
@endsection
