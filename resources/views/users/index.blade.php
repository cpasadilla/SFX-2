@extends('layouts.app')

@section('content')

<div class="content-header">
<h1 style="padding-left:10px;">STAFF</h1>
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createCustomerModal">
            {{ __('CREATE STAFF') }}
        </button>
    </div>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="row mb-2" style="padding-left: 15px;">
    <div class="col-md-6">
        <form action="{{ route('u.search') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by First Name, Last Name or Email">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
    <!-- Main content -->

    
    <div class="content" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card" >
                        <div class="card-body p-0">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone Num</th>
                                        <th>Position</th>
                                        <th>Location</th>
                                        <th>Edit</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->user->fName }} </td>
                                            <td>{{ $user->user->lName }}</td>
                                            <td>{{ $user->user->email }}</td>
                                            <td>{{ $user->user->phoneNum }}</td>
                                            <td>{{ $user->position }}</td>
                                            <td>{{ $user->location }}</td>
                                            <td class="align-middle">
                                                <i class="fas fa-user-edit" data-toggle="modal" data-target="#editCustomerModal{{ $user->id }}" style="color:grey"></i>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="editCustomerModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editCustomerModalLabel{{ $user->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editCustomerModalLabel{{ $user->id }}">Edit Staff</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{ route('u.edit')}}">
                                                            @csrf
                                                            <div class="input-group mb-3">
                                                                <input type="text" name="fName"
                                                                    class="form-control @error('fName') is-invalid @enderror"
                                                                    placeholder="{{ __('First Name') }}" required autocomplete="fName" autofocus value="{{ $user->user->fName }}">
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
                                                                    placeholder="{{ __('Last Name') }}" required autocomplete="lName" autofocus value="{{ $user->user->lName }}">
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
                                                                <input type="text" name="phoneNum"
                                                                    class="form-control @error('phoneNum') is-invalid @enderror"
                                                                    placeholder="{{ __('Phone Number') }}" required autocomplete="phoneNum"
                                                                    autofocus
                                                                    value="{{ $user->user->phoneNum}}">
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text">
                                                                        <span class="fas fa-phone alt"></span>
                                                                    </div>
                                                                </div>
                                                                @error('phoneNum')
                                                                    <span class="error invalid-feedback">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            </div>
                        
                                                            <div class="input-group mb-3">
                                                                <input type="email" name="email"
                                                                    class="form-control @error('email') is-invalid @enderror"
                                                                    placeholder="{{ __('Email') }}" required autocomplete="email"
                                                                    value="{{ $user->user->email }}">
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
                                                            <div class="input-group mb-3">
                                                                <select class="form-control" id="location" name="location">
                                                                    @if ($user->location == "Manila") 
                                                                    <option  value="Batanes">Batanes</option>
                                                                    <option selected value="Manila">Manila</option>
                                                                    @else
                                                                    <option selected value="Batanes">Batanes</option>
                                                                    <option   value="Manila">Manila</option>  
                                                                    @endif
                                                                    
                                                                </select>
                                                                @error('location')
                                                                    <span class="error invalid-feedback">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            </div>
                        
                                                            <div class="input-group mb-3">
                                                                <select class="form-control" id="position" name="position">
                                                                    @if ($user->position == "Admin")
                                                                    <option selected value="Admin">Admin</option>
                                                                    <option value="Staff">Staff</option>
                                                                    <option value="Engineer">Engineer</option>
                                                                    @elseif ($user->position == "Staff")
                                                                    <option value="Admin">Admin</option>
                                                                    <option selected value="Staff">Staff</option>
                                                                    <option value="Engineer">Engineer</option>
                                                                    @else
                                                                    <option value="Admin">Admin</option>
                                                                    <option value="Staff">Staff</option>
                                                                    <option selected value="Engineer">Engineer</option>
                                                                    @endif
                                                                    
                                                                </select>
                                                                @error('position')
                                                                    <span class="error invalid-feedback">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </form>
                                                        <br>
                                                        <br>

                                                        <form method="POST" action="{{ route('u.delete')}}">
                                                            @csrf
                                                            <input name="id" value="{{$user->id}}" hidden>
                                                            <input name="user" value="{{$user->user_id}}" hidden>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                        <br>
                                                        <br>
                                                        
                                                        <form method="POST" action="{{ route('u.reset')}}">
                                                            @csrf
                                                            <input name="id" value="{{$user->id}}" hidden>
                                                            <input name="user" value="{{$user->user_id}}" hidden>
                                                            <button type="submit" class="btn btn-success">Reset Password</button>
                                                        </form>
                                                        <P>FOR PASSWORDS THAT WERE RESETED, THE DEFAULT WILL BE "Pass1234"</P>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->


    <div class="modal fade" id="createCustomerModal" tabindex="-1" role="dialog"
        aria-labelledby="createCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCustomerModalLabel">Create Staff</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="input-group mb-3">
                                        <input type="text" name="fName"
                                            class="form-control @error('fName') is-invalid @enderror"
                                            placeholder="{{ __('First Name') }}" required autocomplete="fName" autofocus>
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
                                            placeholder="{{ __('Last Name') }}" required autocomplete="lName" autofocus>
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
                                        <input type="text" name="phoneNum"
                                            class="form-control @error('phoneNum') is-invalid @enderror"
                                            placeholder="{{ __('Phone Number') }}" required autocomplete="phoneNum"
                                            autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @error('phoneNum')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="{{ __('Email') }}" required autocomplete="email">
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
                                    <div class="input-group mb-3">
                                        <select class="form-control" id="location" name="location">
                                            <option selected>Choose Location</option>
                                            <option value="Batanes">Batanes</option>
                                            <option value="Manila">Manila</option>
                                        </select>
                                        @error('location')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <select class="form-control" id="position" name="position">
                                            <option selected>Choose Position</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Staff">Staff</option>
                                            <option value="Engineer">Engineer</option>
                                        </select>
                                        @error('position')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="input-group mb-3">
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="{{ __('Password') }}" required autocomplete="new-password">
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

                                    <div class="input-group mb-3">
                                        <input type="password" name="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            placeholder="{{ __('Confirm Password') }}" required
                                            autocomplete="new-password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit"
                                                class="btn btn-success btn-block">{{ __('Register') }}</button>
                                        </div>
                                    </div>
                                </form>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @endsection
