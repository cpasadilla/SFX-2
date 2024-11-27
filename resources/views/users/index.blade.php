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

<!--CONTENT HEADER (PAGE HEADER)-->
<div class="content-header">
    <h1 style="padding-left: 10px;">STAFF</h1>
        <br>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6"> <!--<div class="col-sm-6"> recommended only-->
                    <!--SEARCH FORM-->
                    <form action="{{ route('u.search') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search by First Name, Last Name or Email" name="search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-success"><!--i class="fa fa-search"></i-->SEARCH</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--CREATE STAFF BUTTON-->
                <div class="col-sm-6 text-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createCustomerModal">
                        {{ __('CREATE STAFF') }}
                    </button>
                </div>
            </div>
        </div>
</div>

<!--MAIN CONTENT-->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>STAFF</h5>
                    </div>
                    <div class="card-body">
                        <table class="table" id="myTable2">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" onclick="sortTable(0)">FIRST NAME</th>
                                    <th scope="col" onclick="sortTable(1)">LAST NAME</th>
                                    <th scope="col" onclick="sortTable(2)">EMAIL</th>
                                    <th scope="col" onclick="sortTable(3)">PHONE NUMBER</th>
                                    <th scope="col" onclick="sortTable(4)">POSITION</th>
                                    <th scope="col" onclick="sortTable(5)">LOCATION</th>
                                    <th scope="col">EDIT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="table-row">
                                        <td class="fName">{{ $user->fName }}</td>
                                        <td class="lName">{{ $user->lName }}</td>
                                        <td class="email">{{ $user->email }}</td>
                                        <td class="phoneNum">{{ $user->phoneNum }}</td>
                                        <td class="position">{{ $user->position }}</td>
                                        <td class="location">{{ $user->location }}</td>
                                        <td class="align-middle">
                                            <i class="fas fa-user-edit" data-toggle="modal" data-target="#editCustomerModal{{ $user->id }}" style="color:grey"></i>
                                        </td>
                                    </tr>
                                    <!--EDIT CUSTOMER MODAL-->
                                    <div class="modal fade" id="editCustomerModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editCustomerModalLabel{{ $user->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editCustomerModalLabel{{ $user->id}}">EDIT STAFF INFO</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('u.edit') }}" method="POST">
                                                        @csrf
                                                        <!--FIRST NAME FIELD-->
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="fName" class="form-control @error('fName') is-invalid @enderror" placeholder="{{ __('First Name') }}" required autocomplete="fName" autofocus value="{{ $user->fName }}">
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
                                                        <!--LAST NAME FIELD-->
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="lName" class="form-control @error('lName') is-invalid @enderror" placeholder="{{ __('Last Name') }}" required autocomplete="lName" autofocus value="{{ $user->lName }}">
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
                                                        <!--EMAIL FIELD-->
                                                        <div class="input-group mb-3">
                                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" required autocomplete="email" value="{{ $user->email }}">
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
                                                        <!--PHONE NUMBER FIELD-->
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="phoneNum" class="form-control @error('phoneNum') is-invalid @enderror" placeholder="{{ __('Phone Number') }}" required autocomplete="phoneNum" autofocus value="{{ $user->phoneNum}}">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-phone"></span>
                                                                </div>
                                                            </div>
                                                            @error('phoneNum')
                                                            <span class="error invalid-feedback">
                                                                {{ $message }}
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <!--LOCATION FIELD-->
                                                        <div class="input-group mb-3">
                                                            <select class="form-control" id="location" name="location">
                                                                @if ($user->location == "Manila")
                                                                    <option value="Batanes">Batanes</option>
                                                                    <option selected value="Manila">Manila</option>
                                                                @else
                                                                    <option selected value="Batanes">Batanes</option>
                                                                    <option value="Manila">Manila</option>
                                                                @endif
                                                            </select>
                                                            @error('location')
                                                            <span class="error invalid-feedback">
                                                                {{ $message }}
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <!--POSITION FIELD-->
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
                                                        <!--UPDATE BUTTON-->
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>
                                                    <br><br>
                                                    <!--DELETE BUTTON-->
                                                    <form action="{{ route('u.delete') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    <br><br>
                                                    <!--RESET BUTTON-->
                                                    <form action="{{ route('u.reset') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                                        <button type="submit" class="btn btn-success">Reset Password</button>
                                                    </form>
                                                    <p>FOR PASSWORDS THAT WERE RESETED, THE DEFAULT WILL BE "Pass1234"</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--CREATE CUSTOMER MODAL-->
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
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                        <!--FIRST NAME FIELD-->
                        <div class="input-group mb-3">
                            <input type="text" name="fName" class="form-control @error('fName') is-invalid @enderror" placeholder="{{ __('First Name') }}" required autocomplete="fName" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            @error('fName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!--LAST NAME FIELD-->
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
                        <!--EMAIL FIELD-->
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
                        <!--PHONE NUMBER FIELD-->
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
                        <!--LOCATION FIELD-->
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
                        <!--POSITION FIELD-->
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
                        <!--PASSWORD FIELD-->
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
                        <!--CONFIRM PASSWORD FIELD-->
                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <!--SUBMIT BUTTON-->
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

<script>
    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("myTable2");
        switching = true;
        dir = "asc"; // SORTING DIRECTION
        console.log(`Sorting column: ${n}`); // DEBUGGING

        while(switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (row.length -1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                if (!x || !y) continue; // SKIP INVALID ROWS

                var xContent = x.textContent.trim().toLowerCase();
                var yContent = y.textContent.trim().toLowerCase();
                var xValue = isNaN(xContent) ? xContent : parseFloat(xContent);
                var yValue = isNaN(yContent) ? yContent : parseFloat(yContent);

                console.log(`Comparing ${xValue} with ${yValue}`); //DEBUGGING

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