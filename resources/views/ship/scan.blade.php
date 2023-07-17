@extends('layouts.app')

@section('content')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div class="container">
        <!-- this function of java Script play Camera -->
        <script src="https://reeteshghimire.com.np/wp-content/uploads/2021/05/html5-qrcode.min_.js"></script>
        <!-- Header -->
        <div class="container-fluid header_se" >
            <br><br>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                     <div id="reader"></div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8" style="">
                        <h4 style="text-align:center; margin-top: 10px;">SCAN RESULT</h4>
                        
                            @if ($key == '')
                            @else
                            <div class="container"
                            style=" border:2px solid; border-color:rgb(92, 92, 92); border-radius: 10px; padding-top:15px; width: 700px;"> 
                                    @if (substr($key, 0, 1) == 'S')
                                        <div class="row">
                                            @foreach ($cargo as $cargo)
                                                <div class="col-md-6">
                                                    <p><strong>CARGO ID </strong>{{ $cargo->cargoID }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><strong>SHIP#: </strong>
                                                        {{ $cargo->shipNum }}</p>
                                                </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <p><strong>WEIGHT: </strong>{{ $cargo->weight }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>CARGO#: </strong>
                                                    {{ $cargo->cargoNum }}</p>
                                            </div>

                                        </div>
                                    @endforeach


                                    @foreach ($order as $parcel)
                                        <div class="row pl-3" style=" max-width:100%">
                                            <table class="table table-bordered table-condensed">
                                                <thead style="background-color: #78BF65; color:white;">
                                                    <tr>
                                                        <th>ORDER ID</th>
                                                        <th>CUSTOMER ID</th>
                                                        <th>TOTAL VALUE</th>
                                                        <th>ORDER CREATED</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Table rows with data -->
                                                    <tr>
                                                        <td>{{ $parcel->orderId }}</td>
                                                        <td>{{ $parcel->cID }}</td>
                                                        <td>{{ $parcel->totalAmount }}</td>
                                                        <td>{{ $parcel->orderCreated }}</td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="row">
                                        @foreach ($key as $key)
                                            
                                        @endforeach
                                        <div class="col-md-6">
                                            <p><strong>Order# </strong>{{ $key->orderId }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>Date Created:</strong>
                                                {{ $key->created_at->format('F j, Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <p><strong>Ship# </strong>{{ $key->shipNum }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($key->cargoNum == '0')
                                                <p><strong>Cargo# </strong> NOT YET ASSIGNED</p>
                                            @else
                                                <p><strong>Cargo# </strong> {{ $key->cargoNum }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    @foreach ($data as $user)
                                        <div class="row">

                                            <div class="col-md-6">
                                                <p><strong>Name: </strong>{{ $user->user->fName }}
                                                    {{ $user->user->lName }}
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Customer ID:</strong> {{ $user->cID }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <br>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <strong>PARCELS: </strong>
                                        </div>
                                    </div>

                                    <div class="row pl-3" style=" max-width:100%">
                                        <table class="table table-bordered table-condensed">
                                            <thead style="background-color: #78BF65; color:white;">
                                                <tr>
                                                    <th>DESCRIPTION</th>
                                                    <th>QTY</th>
                                                    <th>VALUE</th>
                                                    <th>TOTAL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Table rows with data -->
                                                @foreach ($parcel as $parcel)
                                                    <tr>
                                                        <td>{{ $parcel->itemName }}</td>
                                                        <td>{{ $parcel->quantity }}</td>
                                                        <td>{{ $parcel->price }}</td>
                                                        <td>{{ $parcel->total }}</td>

                                                    </tr>
                                                @endforeach

                                                <tr>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td> </td>

                                                    <td>{{ $key->totalAmount }}</td>

                                                </tr>
                                                <!-- Add more rows as needed -->
                                            </tbody>
                                        </table>
                                @endif


                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <script type="text/javascript">
                // after success to play camera Webcam Ajax paly to send data to Controller
                function onScanSuccess(data) {
                    var txt;
                    $.ajax({
                        url: '{{ route('scan') }}',
                        method: 'GET',
                        data: {
                            data: data
                        },
                        success: function(response) {
                            // Handle the response from the server
                            displayUserData(response);
                        },

                    });
                }

                function displayUserData(userData) {
                    var data = userData;
                    var url = "{{ route('o.scan', ['key' => ':key']) }}".replace(':key', userData);
                    window.location = url;
                }
                var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
  html5QrcodeScanner.render(onScanSuccess);
            </script>
        
    </div>
    </div>
    <hr />


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <style>
        .result{
    background-color: green;
    color:#fff;
    padding:20px;
  }
  .row{
    display:flex;
  }
  #reader {
    background: black;
    width:100%;
    margin-bottom: 30px
  }
  button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 6px;
}
a#reader__dashboard_section_swaplink {
  background-color: blue; /* Green */
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 6px;
}
span a{
  display:none
}

#reader__camera_selection{
  background: blueviolet;
  color: aliceblue;
}
#reader__dashboard_section_csr span{
  color:red
}

    </style>
@endsection
