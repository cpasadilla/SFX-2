@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    .register-button {
        position: fixed;
        left: 50%;
    }

    th {
        cursor: pointer;
    }

    th.ascending::after {
        content: ' \25B2'; /* Up arrow */
    }

    th.descending::after {
        content: ' \25BC'; /* Down arrow */
    }

    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #78BF65;
        border-color: #78BF65;
    }

    .page-link {
        position: relative;
        display: block;
        padding: 0.5rem 0.75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #000000;
        background-color: #fff;
        border: 1px solid #dee2e6;
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
                        {{ $users->links() }}

                        <table class="table" id="myTable2">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" onclick="sortTable(0)">FIRST NAME</th>
                                    <th scope="col" onclick="sortTable(1)">LAST NAME</th>
                                    <th scope="col" onclick="sortTable(2)">EMAIL</th>
                                    <th scope="col" onclick="sortTable(3)">PHONE NUMBER</th>
                                    <th scope="col" onclick="sortTable(4)">POSITION</th>
                                    <th scope="col" onclick="sortTable(5)">LOCATION</th>
                                    <th scope="col" onclick="sortTable(5)">LAST LOGIN</th>
                                    <th scope="col" onclick="sortTable(5)">LAST LOGOUT</th>
                                    <th scope="col" onclick="sortTable(5)">LAST ACTIVE</th>
                                    <th scope="col">EDIT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="table-row">
                                        <td style="text-transform: uppercase;" class="fName">{{ $user->fName }}</td>
                                        <td style="text-transform: uppercase;" class="lName">{{ $user->lName }}</td>
                                        <td class="email">{{ $user->email }}</td>
                                        <td class="phoneNum">{{ $user->phoneNum }}</td>
                                        <td class="position">{{ $user->position }}</td>
                                        <td class="location">{{ $user->location }}</td>
                                        <td class="location">{{ $user->login }}</td>
                                        <td class="location">{{ $user->logout}}</td>
                                        <td class="location">{{ $user->lastActive }}</td>
                                        <td class="align-middle">
                                            <span
                                                data-toggle="modal"
                                                data-target="#editCustomerModal{{ $user->id }}"
                                                style="color: rgb(44, 155, 199); cursor: pointer; text-decoration: none;" >
                                                Edit
                                            </span>
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
                                                            <input type="text" name="fName" class="form-control @error('fName') is-invalid @enderror" placeholder="{{ __('First Name') }}" required autocomplete="fName" autofocus value="{{ $user->fName }}" style="text-transform: uppercase;">
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
                                                            <input type="text" name="lName" class="form-control @error('lName') is-invalid @enderror" placeholder="{{ __('Last Name') }}" required autocomplete="lName" autofocus value="{{ $user->lName }}" style="text-transform: uppercase;">
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
                                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" required autocomplete="email" value="{{ $user->email }}"readonly>
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
                                                            <input type="number" name="phoneNum" class="form-control" placeholder="{{ __('Phone Number') }}" autocomplete="phoneNum" autofocus value="{{ $user->phoneNum}}">
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
                                                                @elseif ($user->position == "Staff")
                                                                    <option value="Admin">Admin</option>
                                                                    <option selected value="Staff">Staff</option>
                                                                @else
                                                                    <option value="Admin">Admin</option>
                                                                    <option value="Staff">Staff</option>
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
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteUserModal{{ $user->id }}">
                                                        {{ __('DELETE') }}
                                                    </button>
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
                                    <!-- DELETE MODAL -->
                                    <div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel{{ $user->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteUserModalLabel{{ $user->id }}">{{ __('Delete Staff?') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>{{ __('This action cannot be undone.') }}</p>
                                                    <form action="{{ route('u.delete') }}" method="POST">
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
                        <!-- Display current page number -->
                        <p>Page: {{ $users->currentPage() }}</p>
                        <!-- Display pagination links -->
                        {{ $users->appends(request()->query())->links() }}

                    </div>
                    <div class="card-footer clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--CREATE USER MODAL-->
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
                <form action="{{ route('u.create') }}" method="POST">
                    @csrf
                        <!--FIRST NAME FIELD-->
                        <div class="input-group mb-3">
                            <input type="text" name="fName" class="form-control @error('fName') is-invalid @enderror" placeholder="{{ __('First Name') }}" required autocomplete="fName" autofocus style="text-transform: uppercase;">
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
                            <input type="text" name="lName" class="form-control @error('lName') is-invalid @enderror" placeholder="{{ __('Last Name') }}" required autocomplete="lName" autofocus style="text-transform: uppercase;">
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
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('EMAIL') }}" required autocomplete="email">
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
                            <input type="number" name="phoneNum" class="form-control" placeholder="{{ __('PHONE NUMBER') }}" autocomplete="phoneNum" autofocus>
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
                            <select id="location" name="location" class="form-control @error('location') is-invalid @enderror" placeholder="{{ __('Location') }}" required autocomplete="location" autofocus>
                                <option selected>CHOOSE LOCATION</option>
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
                            <select id="position" name="position" class="form-control @error('position') is-invalid @enderror" placeholder="{{ __('Position') }}" required autocomplete="position" autofocus>
                                <option selected>CHOOSE POSITION</option>
                                <option value="Admin">Admin</option>
                                <option value="Staff">Staff</option>
                                <!--option value="Checker">Checker</option-->
                            </select>
                            @error('position')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <!--PASSWORD FIELD-->
                        <div class="input-group mb-3">
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('PASSWORD') }}" required autocomplete="new-password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock" id="togglePassword"></span>
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
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('CONFIRM PASSWORD') }}" required autocomplete="new-password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock" id="toggleConfirmPassword"></span>
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
    document.addEventListener('DOMContentLoaded', () => {
    // Get password and confirm password fields
    const passwordField = document.getElementById('password');
    const confirmPasswordField = document.getElementById('password_confirmation');

    // Get the toggle password icons
    const togglePasswordIcon = document.getElementById('togglePassword');
    const toggleConfirmPasswordIcon = document.getElementById('toggleConfirmPassword');

    // Function to toggle password visibility
    const togglePasswordVisibility = (field, icon) => {
        if (field.type === 'password') {
            field.type = 'text';  // Show password
            icon.classList.remove('fa-lock');  // Remove lock icon
            icon.classList.add('fa-eye');  // Add eye icon
        } else {
            field.type = 'password';  // Hide password
            icon.classList.remove('fa-eye');  // Remove eye icon
            icon.classList.add('fa-lock');  // Add lock icon
        }
    };

    // Add event listeners to toggle password visibility when the icon is clicked
    togglePasswordIcon.addEventListener('click', () => {
        togglePasswordVisibility(passwordField, togglePasswordIcon);
    });

    toggleConfirmPasswordIcon.addEventListener('click', () => {
        togglePasswordVisibility(confirmPasswordField, toggleConfirmPasswordIcon);
    });
});

</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const table = document.getElementById('myTable2');
        const headers = table.querySelectorAll('th');
        const tableBody = table.querySelector('tbody');
        const rows = Array.from(tableBody.querySelectorAll('tr'));

        // Function to sort rows based on the column index
        const sortTable = (index, ascending) => {
            rows.sort((rowA, rowB) => {
                const cellA = rowA.children[index].textContent.trim();
                const cellB = rowB.children[index].textContent.trim();

                if (!isNaN(cellA) && !isNaN(cellB)) {
                    // Compare as numbers if both values are numeric
                    return ascending ? cellA - cellB : cellB - cellA;
                } else {
                    // Compare as strings otherwise
                    return ascending
                        ? cellA.localeCompare(cellB)
                        : cellB.localeCompare(cellA);
                }
            });

            // Append the sorted rows back to the table
            rows.forEach(row => tableBody.appendChild(row));
        };

        // Attach click events to headers for sorting
        headers.forEach((header, index) => {
            let ascending = true; // Initial sort order

            header.addEventListener('click', () => {
                // Toggle sort order on subsequent clicks
                ascending = !ascending;
                sortTable(index, ascending);

                // Optionally, update header styles to indicate sort order
                headers.forEach(h => h.classList.remove('ascending', 'descending'));
                header.classList.add(ascending ? 'ascending' : 'descending');
            });
        });
    });
</script>

