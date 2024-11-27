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
    <h1 style="padding-left: 10px;">CUSTOMERS</h1>
        <br>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6"> <!--<div class="col-sm-6"> recommended only-->
                    <!--SEARCH FORM-->
                    <form action="{{ route('c.search') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search by Customer ID, First Name, Last Name" name="search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-success"><!--i class="fa fa-search"></i-->SEARCH</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--CREATE CUSTOMER BUTTON-->
                <div class="col-sm-6 text-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createCustomerModal">
                        {{ __('CREATE CUSTOMER') }}
                    </button>
                </div>
            </div>
        </div>
</div>

<!--MAIN CONTENT-->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12"><!--<div class="col-lg-12">-->
                <div class="card">
                    <div class="card-header">
                        <h5>CUSTOMERS</h5>
                    </div>
                    <div class="card-body">
                        <table class="table" id="myTable2">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" onclick="sortTable(0)">CUSTOMER ID</th>
                                    <th scope="col" onclick="sortTable(1)">FIRST NAME</th>
                                    <th scope="col" onclick="sortTable(2)">LAST NAME</th>
                                    <th scope="col" onclick="sortTable(4)">PHONE NUMBER</th>
                                    <th scope="col">EDIT</th>
                                    <th scope="col" style="text-align: center;">VIEW ALL BL</th>
                                    <th scope="col" style="text-align: center;">CREATE ORDER</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="table-row">
                                        <td>{{ $user->cID }}</td>
                                        <td class="fName">{{ $user->fName }}</td>
                                        <td class="lName">{{ $user->lName }}</td>
                                        <td class="phoneNum">{{ $user->phoneNum }}</td>
                                        <td class="align-middle">
                                            <i class="fas fa-user-edit" data-toggle="modal" data-target="#editCustomerModal{{ $user->cID }}" style="color:grey"></i>
                                        </td>
                                        <td class="align-middle" style="text-align: center;">
                                            <a href={{ route('c.parcels', ['key' => $user->cID]) }}><i class='fas fa-folder' style="color:grey"></i></a>
                                        </td>
                                        <td class="align-middle" style="text-align: center;">
                                            <a href={{ route('c.order', ['key' => $user->cID]) }}><i class='fas fa-cart-plus' style="color:grey"></i></a>
                                        </td>
                                    </tr>
                                    <!--EDIT CUSTOMER MODAL-->
                                    <div class="modal fade" id="editCustomerModal{{ $user->cID }}" tabindex="-1" role="dialog" aria-labelledby="editCustomerModal{{ $user->cID }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editCustomerModal{{ $user->cID}}">EDIT CUSTOMER INFO</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('c.edit') }}" method="POST">
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
                                                        <input type="hidden" name="id" value="{{ $user->id }}">

                                                        <button type="submit" class="btn btn-primary" id="submitButton">
                                                            {{ __('UPDATE')}}
                                                        </button>
                                                    </form>
                                                    <br><br>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteUserModal{{ $user->id }}">
                                                        {{ __('DELETE') }}
                                                    </button>


                                                    <br><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


<!-- DELETE MODAL -->
<div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel{{ $user->id }}">{{ __('Delete Customer?') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('This action cannot be undone.') }}</p>
                <form action="{{ route('c.error') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            {{ __('Cancel') }}
                        </button>
                        <button type="submit" class="btn btn-danger">
                            {{ __('Delete Account') }}
                        </button>
                    </div>
                </form>
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
                <h5 class="modal-title" id="createCustomerModalLabel">Create Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('c.create') }}" method="POST">
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
                        <!--PHONE NUMBER FIELD-->
                        <div class="input-group mb-3">
                            <input type="text" name="phoneNum" class="form-control @error('phoneNum') is-invalid @enderror" placeholder="{{ __('Phone Number') }}" required autocomplete="phoneNum" autofocus>
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
                        <!--SUBMIT BUTTON-->
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success btn-block" id="submitButton">
                                    {{ __('REGISTER') }}
                                </button>
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
