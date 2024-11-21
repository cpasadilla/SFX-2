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
    <h1 style="padding-left:10px;">STAFFS</h1>
    <br>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
                <!-- Search Form -->
                <form action="{{ route('u.search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search by First Name, Last Name or Email">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success">Search</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.col -->
            <div class="col-sm-6 text-right">
                <!-- Create Staff Button -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createCustomerModal">
                    {{ __('CREATE STAFF') }}
                </button>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.content-header -->

<!-- Main content -->
<div class="content" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>STAFFS</h5>
                    </div>
                    <div class="card-body">
                        <table class="table" id="myTable2">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" onclick="sortTable(0)">First Name</th>
                                    <th scope="col" onclick="sortTable(1)">Last Name</th>
                                    <th scope="col" onclick="sortTable(2)">Email</th>
                                    <th scope="col" onclick="sortTable(3)">Phone Num</th>
                                    <th scope="col" onclick="sortTable(4)">Position</th>
                                    <th scope="col" onclick="sortTable(5)">Location</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="table-row">
                                        <td class="fName">{{ $user->user->fName }} </td>
                                        <td class="lName">{{ $user->user->lName }}</td>
                                        <td class="email">{{ $user->user->email }}</td>
                                        <td class="phoneNum">{{ $user->user->phoneNum }}</td>
                                        <td class="position">{{ $user->position }}</td>
                                        <td class="location">{{ $user->location }}</td>
                                        <td class="align-middle">
                                            <i class="fas fa-user-edit" data-toggle="modal" data-target="#editCustomerModal{{ $user->id }}" style="color:grey"></i>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="editCustomerModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editCustomerModalLabel{{ $user->id }}" aria-hidden="true"> 
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editCustomerModalLabel{{ $user->id }}">
                                                        Edit Staff
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="{{ route('u.edit')}}">
                                                        @csrf
                                                            <div class="input-group mb-3">
                                                                <input type="text" name="fName" class="form-control @error('fName') is-invalid @enderror" placeholder="{{ __('First Name') }}" required autocomplete="fName" autofocus value="{{ $user->user->fName }}">
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
                                                                <input type="text" name="lName" class="form-control @error('lName') is-invalid @enderror" placeholder="{{ __('Last Name') }}" required autocomplete="lName" autofocus value="{{ $user->user->lName }}">
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
                                                                <input type="text" name="phoneNum" class="form-control @error('phoneNum') is-invalid @enderror" placeholder="{{ __('Phone Number') }}" required autocomplete="phoneNum" autofocus value="{{ $user->user->phoneNum}}">
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
                                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" required autocomplete="email" value="{{ $user->user->email }}">
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
                                                    <br><br>
                                                    
                                                    <form method="POST" action="{{ route('u.delete')}}">
                                                        @csrf
                                                            <input name="id" value="{{$user->id}}" hidden>
                                                            <input name="user" value="{{$user->user_id}}" hidden>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    <br><br>
                                                    
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
                    </div><!-- /.card-body -->
                    
                    <div class="card-footer clearfix"></div>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.content -->

<div class="modal fade" id="createCustomerModal" tabindex="-1" role="dialog" aria-labelledby="createCustomerModalLabel" aria-hidden="true">
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
                            <input type="text" name="fName" class="form-control @error('fName') is-invalid @enderror" placeholder="{{ __('First Name') }}" required autocomplete="fName" autofocus>
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
                            <input type="text" name="lName" class="form-control @error('lName') is-invalid @enderror" placeholder="{{ __('Last Name') }}" required autocomplete="lName" autofocus>
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
                            <input type="text" name="phoneNum" class="form-control @error('phoneNum') is-invalid @enderror" placeholder="{{ __('Phone Number') }}" required autocomplete="phoneNum" autofocus>
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
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" required autocomplete="email">
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
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" required autocomplete="new-password">
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
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success btn-block">{{ __('Register') }}</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<script>function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("myTable2");
    switching = true;
    dir = "asc"; // Set the initial sorting direction
    console.log(`Sorting column: ${n}`); // Debugging
    
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            if (!x || !y) continue; // Skip invalid rows
            
            var xContent = x.textContent.trim().toLowerCase();
            var yContent = y.textContent.trim().toLowerCase();
            var xValue = isNaN(xContent) ? xContent : parseFloat(xContent);
            var yValue = isNaN(yContent) ? yContent : parseFloat(yContent);
            
            console.log(`Comparing ${xValue} with ${yValue}`); // Debugging
            
            if (dir === "asc" && xValue > yValue) {
                shouldSwitch = true;
                break;
            } else if (dir === "desc" && xValue < yValue) {
                shouldSwitch = true;
                break;
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount++;
        } else if (switchcount === 0 && dir === "asc") {
            dir = "desc";
            switching = true;
        }
    }
}

</script>