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

    .btn-primary {
    color: #fff;
    background-color: #28a544;
    border-color: #28a544;
    box-shadow: none;
}
  </style>
  
<!-- Import the QRCode class -->
@php
use SimpleSoftwareIO\QrCode\Facades\QrCode;
@endphp


<div class="container" id = "element1">
  <br>
<a href="{{ route('p.view') }}" style="color:black; font-size:20px; display: inline;"><i class="fa-solid fa-arrow-left-long fa-lg"></i></a>
    <h1 style="display: inline; font-size: 20px; padding-left: 10px; margin-top: 20px;">ORDER CONFIRMATION</h1>
    <br><br><br>
    <div class="col text-right">
    <button class = "btn btn-success" onclick="printContent('printContainer')">Print</button>
</div>
</div>

    <br>
    <div class="d-print-block">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card" >
            <div class="card-body" id="printContainer" style="width: 800px">
                @foreach ($key as $order)
                <div class="row" >
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
                <br><br>

                <div class="row" style="font-size:18px">
                  <table class="table" >
                    <thead>
                      <tr>
                        <th> Item Name </th>
                        <th> Quantity </th>
                        <th> Price </th>
                        <th> Total </th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($parcel as $pars)
                          
                      <tr>
                        <td>{{$pars->itemName}}</td>
                        <td>{{$pars->quantity}} X</td>
                        <td>{{$pars->price}} = </td>
                        <td>{{$pars->total}}</td>
                        
                      
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
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
