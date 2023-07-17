@extends('layouts.app')

@section('content')
<style>
    @media print {
      .container {
        /* Add your custom print styles here */
        /* Example styles */
        width: 100%;
        background-color: #ffffff;
        padding: 10px;
      }

      .btn-success {
    color: #fff;
    background-color: #28a544;
    border-color: #28a544;
    box-shadow: none;
}
  
    }
  </style>
  
<!-- Import the QRCode class -->
@php
use SimpleSoftwareIO\QrCode\Facades\QrCode;
@endphp


<div class="container" id = "element1">
    <h1>Order Confirmation</h1>
    <br><br><br>
    <div class="col text-right">
    <button class = "btn btn-success" onclick="printContent('printContainer')">PRINT</button>
    @foreach ($key as $keys)      
    <a href={{route('c.bl',['key'=> $keys->orderId])}} class ="btn btn-success"> NEXT </a>
    @endforeach

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
