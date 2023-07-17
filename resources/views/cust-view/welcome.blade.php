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
        .full-width-with-padding {
            width: 85%;
            /* Set the width to 100% of the viewport width */
            padding: 10px;
            /* Adjust the padding values as per your requirement */
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-white navbar-light" style="background: #28A544; height: 60px;">
        <!-- Left -->
        <div class="container-fluid">
            <p class="navbar-brand">
                <img src="{{ asset('images/logo.png') }}" alt="" width="50" height="60"
                    class="d-inline-block align-text-top" style="padding-top: 12px;">
            </p>
        </div>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false"
                    style="color: white; white-space: nowrap;">
                    <span style="display: inline-block;">
                        <img src="{{ asset('images/icon.png') }}"Y
                            style="vertical-align: middle; margin-right: 5px; width: 20px; height: 20px;">
                        {{ Auth::user()->fName }} {{ Auth::user()->lName }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px;">
                    <a href="#" data-toggle="modal" data-target="#profileModal" class="dropdown-item">
                        <i class="mr-2 fas fa-file"></i>
                        {{ __('Settings') }}
                    </a>
                    <!-- Personal Info  -->
                    @if (Auth::user()->isStaff == 1)
                        
                    @else
                    <div class="dropdown-divider"></div>
                    <a href="#" data-toggle="modal" data-target="#personalInformationModal" class="dropdown-item">
                        <i class="mr-2 fas fa-user"></i>
                        {{ __('Personal Information') }}
                    </a>
                    @endif
                    

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
    <!-- /.navbar -->

    <!-- Modal -->



    @if (Auth::user()->isStaff == 1)

    
    <div class="d-flex justify-content-center align-items-center" style="height: 70vh; margin-left:600px">
        <div class="container">
            <div class="row ">
                <div class="col-md-5">
                    <!-- Top container -->
                    <div class="card mb-3 " style=" border-radius: 10px;">
                        <div class="card-header">
                            <h3>Personal Information
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Name:</strong> {{ Auth::user()->fName }} {{ Auth::user()->lName }}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Position:</strong> {{ Auth::user()->staff->position }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Phone Number:</strong> {{ Auth::user()->phoneNum }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Date Created:</strong>
                                            {{ Auth::user()->created_at->format('F j, Y') }}</p>

                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Location:</strong> {{ Auth::user()->staff->location }}</p>
                                    </div>
                                </div>
                            </div>
                            <a href={{ route('home') }} class="btn btn-success">RETURN TO DASHBOARD</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="modal fade" id="personalInformationModal" tabindex="-1" role="dialog"
            aria-labelledby="personalInformationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div style="background:#e7e6e8;"class="modal-content">
                    <div style="background:#28A544;"class="modal-header">
                        <h5 style="color: white;"class="modal-title" id="personalInformationModalLabel">User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <!-- Top container -->
                        <div class="card mb-3 " style=" border-radius: 10px;">
                            <div class="card-header">
                                <h3>Personal Information
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Name:</strong> {{ Auth::user()->fName }} {{ Auth::user()->lName }}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>ID:</strong> {{ Auth::user()->customerID->cID }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Phone Number:</strong> {{ Auth::user()->phoneNum }}</p>
                                    </div>
                                </div>
                                <p><strong>Date Created:</strong> {{ Auth::user()->created_at->format('F j, Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <!-- Bottom container -->
        </div>
        <div class="full-width-with-padding"
            style="border-top-left-radius: 10px; border-top-right-radius: 10px; text-align: center; background: #78BF65; margin-top: 80px;">
            <h3 style="margin-bottom: 1px; "><strong>HISTORY</strong></h3>
            <p>CLICK THE BL NUMBER TO VIEW OR PRINT YOUR BILL OF LADING</p>
        </div>
        <div class="full-width-with-padding"
            style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; background: #E0E0E0; text-align: center;  ">
            <div class="card-body" style="max-height: 300px; overflow-y: auto;">
                <!-- Add a wrapper div with a fixed height and scrollable overflow -->
                @foreach ($status as $stats)
                    <a href="{{ route('cust.bl', ['key' => $stats->orderId]) }}" style="color: black;">
                        <div class="rounded p-3 mb-3" style="background-color: #78BF65; border: 2px solid black;">
                            <div class="row">
                                <div class="col-md-5">

                                    <p><strong>{{ $stats->orderId }}</strong></p>
                                </div>
                                <div class="col-md-7">
                                    <p>DATE CREATED: {{ $stats->orderCreated }}</p>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    @if ($stats->status == 'complete')
                                        <p>STATUS: COMPLETE</p>
                                    @else
                                        <p>STATUS: IN PROGRESS</p>
                                    @endif
                                </div>
                                <div class="col-md-7">
                                    @if ($stats->parcelReceived == 0)
                                    @else
                                        <p>DATE COMPLETED: {{ $stats->parcelReceived }}
                                    @endif
                                </div>
                            </div>


                    </a>
            </div>
    @endforeach
    </div>
    </div>

    </div>

    <div class="full-width-with-padding">
        <div class="card" style=" border-radius: 10px; background: #78BF65; margin-top:30px;">
            <div class="card-header"
                style=" border-top-left-radius: 10px; border-top-right-radius: 10px; background: #78BF65; text-align: center;">
                <h3><strong>DELIVERY STATUS</strong>
            </div>
            <div class="card-body">
                <h3><strong> Order Details</strong> </h3>
                <br>
                <div class="row">

                    <div class="col-md-6">
                        <p><strong>Order# </strong>&nbsp<span
                                style="background-color: white;border-radius: 10px; padding: 5px; padding-left:10px; padding-right: 100px;">{{ $order->orderId }}</span>
                        </p>

                    </div>
                    <div class="col-md-6">
                        <p><strong>Date Created:</strong>&nbsp<span
                                style="background-color: white;border-radius: 10px; padding: 5px; padding-left:10px; padding-right: 100px;">
                                {{ $order->created_at->format('F j, Y') }}</span></p>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <p><strong>Ship# </strong>&nbsp<span
                                style="background-color: white;border-radius: 10px; padding: 5px; padding-left:10px; padding-right: 100px;">{{ $order->shipNum }}</span>
                        </p>
                    </div>
                    <div class="col-md-6">
                        @if ($order->cargoNum == '0')
                            <p><strong>Cargo# </strong><span
                                    style="background-color: white;border-radius: 10px; padding: 5px; padding-left:10px; padding-right: 100px;">
                                    STILL ON LAND</span></p>
                        @else
                            <p><strong>Cargo# </strong><span
                                    style="background-color: white;border-radius: 10px; padding: 5px; padding-left:10px; padding-right: 100px;">
                                    {{ $order->cargoNum }}</span></p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    @foreach ($parcel as $orders)
                        <div class="col-md-5">
                            <p><strong>Item Name:</strong>
                            <div
                                style="background-color: white;border-radius: 10px; padding: 5px; padding-left: 10px;">
                                {{ $orders->itemName }}</div>
                            </p>
                        </div>
                        <div class="col-md-2">
                            <p><strong>Quantity:</strong>
                            <div
                                style="background-color: white;border-radius: 10px; padding: 5px; padding-left: 10px;">
                                {{ $orders->quantity }}</div>
                            </p>
                        </div>
                        <div class="col-md-2">
                            <p><strong>Price:</strong>
                            <div
                                style="background-color: white;border-radius: 10px; padding: 5px; padding-left: 10px;">
                                {{ $orders->price }}</div>
                            </p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Total:</strong>
                            <div
                                style="background-color: white;border-radius: 10px; padding: 5px; padding-left: 10px;">
                                {{ $orders->total }}</div>
                            </p>
                        </div>
                    @endforeach

                </div>
                <div style="border-top: 1px solid rgb(139, 139, 139);"></div>

                <div class="non"
                    style="overflow-y: auto;overflow-x:hidden; background: #E0E0E0 ; border-radius: 25px; margin-top: 10px;">
                    @if ($order->parcelReceived != '0')
                        <div class="row">

                            <div class="col-md-12">
                                <br>
                                <p>&emsp;<i class="fa-regular fa-circle"></i>&emsp; - &emsp; PARCEL RECEIVED
                                    <br> &emsp;&emsp;&emsp;&emsp;&emsp;{{ $order->parcelReceived }} &emsp;&emsp;
                                    RECEIVER: {{ $order->personRec }} &emsp;&emsp;CONTACT NUMBER:
                                    {{ $order->personNum }}
                                </p>

                            </div>
                        </div>
                    @endif

                    @if ($order->unloading != '0')
                        <div class="row">

                            <div class="col-md-6">
                                <br>
                                <p>&emsp;<i class="fa-regular fa-circle"></i>&emsp; - &emsp; UNLOADING <br>
                                    &emsp;&emsp;&emsp;&emsp;&emsp;{{ $order->unloading }}</p>

                            </div>
                        </div>
                    @endif


                    @if ($order->arrival != '0')
                        <div class="row">

                            <div class="col-md-6">
                                <br>
                                <p>&emsp;<i class="fa-regular fa-circle"></i>&emsp; - &emsp; ARRIVAL <br>
                                    &emsp;&emsp;&emsp;&emsp;&emsp;{{ $order->arrival }}</p>

                            </div>
                        </div>
                    @endif

                    @if ($order->inTransit != '0')
                        <div class="row">

                            <div class="col-md-8">
                                <br>
                                <p>&emsp;<i class="fa-regular fa-circle"></i>&emsp; - &emsp; IN TRANSIT <br>
                                    &emsp;&emsp;&emsp;&emsp;&emsp;{{ $order->inTransit }}</p>

                            </div>
                        </div>
                    @endif

                    @if ($order->loading != '0')
                        <div class="row">

                            <div class="col-md-6">
                                <br>
                                <p>&emsp;<i class="fa-regular fa-circle"></i>&emsp; - &emsp; LOADING <br>
                                    &emsp;&emsp;&emsp;&emsp;&emsp;{{ $order->loading }}</p>

                            </div>
                        </div>
                    @endif


                    @if ($order->inWarehouse != '0')
                        <div class="row">

                            <div class="col-md-6">
                                <br>
                                <p>&emsp;<i class="fa-regular fa-circle"></i>&emsp; - &emsp; IN WAREHOUSE <br>
                                    &emsp;&emsp;&emsp;&emsp;&emsp;{{ $order->inWarehouse }}</p>

                            </div>
                        </div>
                    @endif

                    @if ($order->orderCreate != '0')
                        <div class="row">


                            <div class="col-md-8">
                                <br>
                                <p>&emsp;<i class="fa-regular fa-circle"></i>&emsp; - &emsp; ORDER CREATED AND
                                    PROCESSED <br> &emsp;&emsp;&emsp;&emsp;&emsp;{{ $order->orderCreated }}</p>

                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    @endif

    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Profile form code here -->


                    <div class="content">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <form action="{{ route('cust.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')


                                    <div class="input-group mb-3">
                                        <input type="text" name="fName"
                                            class="form-control @error('fName') is-invalid @enderror"
                                            placeholder="{{ __('First Name') }}"
                                            value="{{ old('fName', auth()->user()->fName) }}" required readonly>
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
                                            placeholder="{{ __('Last Name') }}"
                                            value="{{ old('lName', auth()->user()->lName) }}" required readonly>
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
                                            placeholder="{{ __('Email') }}"
                                            value="{{ old('email', auth()->user()->email) }}" required>
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
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="{{ __('New password') }}">
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
                                            placeholder="{{ __('New password confirmation') }}"
                                            autocomplete="new-password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card-footer d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success">{{ __('Submit') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
