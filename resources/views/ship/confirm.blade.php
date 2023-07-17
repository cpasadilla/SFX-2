@extends('layouts.app')

@section('content')
    <style>
        @media print {
            .container {
                /* Add your custom print styles here */
                /* Example styles */
                width: 100%;
                padding: 10px;
            }

            .container img {
                /* Styles for the image */
            }

            .container h1 {
                /* Styles for the heading */
            }

            .container .info {
                float: right;
            }
        }
    </style>

    <!-- Import the QRCode class -->
    @php
        use SimpleSoftwareIO\QrCode\Facades\QrCode;
    @endphp


    <div class="container" id="element1">
        <a href="{{ route('o.table') }}" style="color:black; font-size:30px;"><i
                class="fa-solid fa-arrow-left-long fa-lg"></i></a>

        <h1>CARGO QR</h1>
        <br><br><br>
        <div class="col text-right">
            <button class="btn btn-primary" onclick="printContent('printContainer')">Print</button>
        </div>
    </div>

    <br>
    <div class="d-print-block">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="card">
                <div class="card-body" id="printContainer" style="width: 800px">
                    @foreach ($key as $order)
                        <div class="row">
                            <div class="col-md-7">

                                <h4> <b> CARGO ID: {{ $order->cargoID }} </b></h4>

                                <!-- Generate the QR code image -->
                                <div>
                                    {{ QrCode::size(400)->generate($order->cargoID) }}
                                </div>

                            </div>

                            <div class="col-md-5" id="info" style="font-size:30px" style="width: 800px">

                                <br><br>
                                <p>CARGO INFORMATION </p>
                                <p>CARGO# {{ $order->cargoNum }}</p>
                                <p>WEIGHT: {{ $order->weight }}</p>
                    @endforeach

                            </div>


                </div>
                <br><br>


                <div class="row" style="font-size:18px">
                  <table class="table" >
                    <thead>
                      <tr>
                        <th>Order ID </th>
                        <th>Customer ID </th>
                        <th>Date Created </th>
                        <th>Total Value </th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $pars)
                          
                      <tr>
                        <td>{{$pars->orderId}}</td>
                        <td>{{$pars->cID}}</td>
                        <td>{{$pars->orderCreated}}</td>
                        <td>{{$pars->totalAmount}}</td>
                        
                      
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
            </div>
        </div>


    </div>
    <script>
        function printContent(containerId) {
            var container = document.getElementById(containerId);
            var element1 = document.getElementById("element1");


            element1.style.display = "none";

            window.print();
            element1.style.display = "block";

        }
        /*
            function printContent(containerId) {
            var container = document.getElementById(containerId);
            var content = container.innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = content;
            window.print();
            
        }

        */
    </script>
@endsection
