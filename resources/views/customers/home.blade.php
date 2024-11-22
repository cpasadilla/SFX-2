@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
.register-button {
    position: fixed;
    left: 50%;
}
</style>

<!-- Content Header (Page header) -->
<div class="content-header">
    <h1 style="padding-left:10px;">CUSTOMERS</h1>
    <br>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <!-- Search Form -->
                <form action="{{ route('c.search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search by Customer ID, First Name or Last Name">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success">Search</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.col -->
            <div class="col-sm-6 text-right">
                <!-- Create Customer Button -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createCustomerModal">
                    {{ __('CREATE CUSTOMER') }}
                </button>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>CUSTOMERS</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="text-align: center;">Customer ID</th>
                                    <th scope="col" style="text-align: center;">First Name</th>
                                    <th scope="col" style="text-align: center;">Last Name</th>
                                    <!--th scope="col">Email</th-->
                                    <th scope="col" style="text-align: center;">Phone Number</th>
                                    <th scope="col" style="text-align: center;">Edit Info</th>
                                    <th scope="col" style="text-align: center;">View All BL</th>
                                    <th scope="col" style="text-align: center;">Create Order</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="table-row">
                                        <td style="text-align: center;">{{ $user->cID }}</td>
                                        <td class="fName" style="text-align: center;">{{ $user->user->fName }}</td>
                                        <td class="lName" style="text-align: center;">{{ $user->user->lName }}</td>
                                        <!--td class="email">{{ $user->user->email }}</td-->
                                        <td class="phoneNum" style="text-align: center;">{{ $user->user->phoneNum }}</td>
                                        <td class="align-middle" style="text-align: center;">
                                            <i class="fas fa-user-edit" data-toggle="modal" data-target="#editCustomerModal{{ $user->cID }}" style="color:grey"></i>
                                        </td>
                                        <td class="align-middle" style="text-align: center;">
                                            <a href={{ route('c.parcels', ['key' => $user->cID]) }}><i class='fas fa-folder' style="color:grey"></i></a>
                                        </td>
                                        <td class="align-middle" style="text-align: center;">
                                            <a href={{ route('c.order', ['key' => $user->cID]) }}><i class='fas fa-cart-plus' style="color:grey"></i></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="editCustomerModal{{ $user->cID }}" tabindex="-1" role="dialog" aria-labelledby="editCustomerModal{{ $user->cID }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editCustomerModal{{ $user->cID }}">
                                                        Create Customer
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <form method="POST" action="{{ route('c.edit') }}" enctype="multipart/form-data" id="create">
                                                            @csrf

                                                                <div class="form-group row">
                                                                    <label for="fName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                                                                    <div class="col-md-6">
                                                                        <input id="fName" type="text" class="form-control @error('fName') is-invalid @enderror" name="fName" value="{{ $user->user->fName }}" required autocomplete="fName" autofocus>
                                                                        @error('fName')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="lName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                                                                    <div class="col-md-6">
                                                                        <input id="lName" type="text" class="form-control @error('lName') is-invalid @enderror" name="lName" value="{{ $user->user->lName }}" required autocomplete="lName" autofocus>
                                                                        @error('lName')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label for="email"class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                                                    <div class="col-md-6">
                                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->user->email }}" required autocomplete="email">
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
                                                                                name="phoneNum"
                                                                                value="{{ $user->user->phoneNum }}"
                                                                                required autocomplete="phoneNum" autofocus>

                                                                            @error('phoneNum')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <button type="submit" class="btn btn-primary" id="submitButton">
                                                                    {{ __('UPDATE') }}
                                                                </button>
                                                        </form>

                                                        <br><br>
                                                        <form method="POST" action="{{ route('c.error') }}">
                                                            @csrf
                                                                <input name="id" value="{{ $user->id }}" hidden>
                                                                <input name="user" value="{{ $user->user_id }}" hidden>
                                                                <button type="submit" class="btn btn-danger">{{ __('DELETE') }}</button>
                                                        </form>
                                                        <br><br>

                                                        <form method="POST" action="{{ route('c.reset') }}">
                                                            @csrf
                                                                <input name="id" value="{{ $user->id }}" hidden>
                                                                <input name="user" value="{{ $user->user_id }}" hidden>
                                                                <button type="submit" class="btn btn-success">Reset Password</button>
                                                                <P>FOR PASSWORDS THAT WERE RESETED, THE DEFAULT WILL BE "Pass1234"</P>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="createCustomerModal" tabindex="-1" role="dialog" aria-labelledby="createCustomerModalLabel" aria-hidden="true">
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
                                <form method="POST" action="{{ route('c.create') }}" enctype="multipart/form-data" id="create">
                                    @csrf

                                        <div class="form-group row">
                                            <label for="fName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                                            <div class="col-md-6">
                                                <input id="fName" type="text" class="form-control @error('fName') is-invalid @enderror" name="fName" value="{{ old('fName') }}" required autocomplete="fName" autofocus>
                                                @error('fName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="lName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                                            <div class="col-md-6">
                                                <input id="lName" type="text"class="form-control @error('lName') is-invalid @enderror" name="lName" value="{{ old('lName') }}" required autocomplete="lName" autofocus>
                                                @error('lName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email"class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="phoneNum" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                                            <div class="col-md-6">
                                                <input id="phoneNum" type="text" class="form-control @error('phoneNum') is-invalid @enderror" name="phoneNum" value="{{ old('phoneNum') }}" required autocomplete="phoneNum" autofocus>
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
                                                <span
                                                    style="display: inline-block; vetical-align: middle; text-align: center;">
                                                    {{ __('Pass1234') }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="form-group row mb-0">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-2 d-flex justify-content-center">
                                                <!-- Update the column class to col-md-4 and add text-center class -->
                                                <button type="submit" class="btn btn-success" id="submitButton">
                                                    {{ __('REGISTER') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
