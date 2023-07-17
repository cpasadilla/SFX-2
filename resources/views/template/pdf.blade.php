<!DOCTYPE html>
<html lang="en">
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
</head>
<body>


    @php
use SimpleSoftwareIO\QrCode\Facades\QrCode;
@endphp

    <div class="d-print-block">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card" style="width: 800px">
            <div class="card-body" id="printContainer">
                @foreach ($key as $order)
                <div class="row">
                    <div class="col-md-7">

                        <h4> <b> ORDER ID: {{$order->orderId}}  </b></h4>  
                    
                        <!-- Generate the QR code image -->
                        <div>
                            {{ QrCode::size(400)->generate($order->orderId) }}
                        </div>
                        @endforeach

                    </div>
                    
                    <div class="col-md-5" id = "info" style="font-size:30px" style="width: 800px">

                        <br><br>
                        <p>CUSTOMER INFORMATION </p>
                        
            
                        @foreach ($data as $user)
            
                        <p>CUSTOMER ID: {{$user->cID}} </p>
                        <p>NAME: {{$user->user->fName}} {{$user->user->lName}} </p>
                        <p> Email: {{$user->user->email}}
            
                        @endforeach
    
                    </div>

                </div>
                
            </div>
        </div>
    </div>
           
            
</div>

</body>
</html>