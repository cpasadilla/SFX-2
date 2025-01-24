<!--AFTER CREATING A ORDER--><!--No Price-->
@extends('layouts.app')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.3/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.3/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>

<style>
    @media print {
        html, body {
            margin: 0;
            padding: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: hidden;
        }
        footer {
                position: fixed;
                bottom: 0;
                width: 95%;
                font-size: 12px;
                background: #fff;
                padding-bottom: 20px;
        }
        .card {
            display: block;
            width: 8.5in; /* Exactly the paper width */
            height: 13.0in; /* Exactly the paper height */
            margin: 0 !important; /* Remove margins */
            padding: 0 !important; /* Remove padding */
            box-sizing: border-box;
        }
        #printContainer {
            width: 8.5in;
            height: 14.3in;
            margin: 0 !important;
            padding: 0 !important;
            box-sizing: border-box;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
        .table {
            width: 100%; /* Ensure table spans full width */
        }
        /* Ensure the table header uses exact colors */
        .table th {
            background-color: #78BF65 !important;
            color: #fff !important;
        }
        /* Adjust table rows for consistent spacing */
        .table td, .table th {
            padding: 5px; /* Adjust padding for better fit */
            font-size: 12px; /* Adjust font size if necessary */
        }
        /* Ensure no overflow for responsive elements */
        .table-responsive, #top {
            overflow: visible !important;
        }
        @page {
            margin: 0; /* Ensures no margin at the page level */
            size: auto; /* Ensures the content fits the page */
        }
        .content-container {
            width: 100%; /* Expands the content to fill the width */
            max-width: none; /* Removes any max-width constraints */
        }
        /*NEW ADDITIONS*/
        #con {
            display: flex;
            flex-wrap: wrap;
        }
        #cd-1{
            flex: 0 0 8.33%;
            max-width: 8.33%;
        }
        #cd-3{
            flex: 0 0 25%;
            max-width: 25%;
        }
        #cd-4{
            flex: 0 0 33.33%;
            max-width: 33.33%;
        }
        #cd-5{
            flex: 0 0 41.67%;
            max-width: 41.67%;
        }
        #cd-7{
            flex: 0 0 58.33%;
            max-width: 58.33%;
        }
    }
</style>
<div class="container" id="element1">
    <br>
    <div class="col text-right">
        <button class="btn btn-success" onclick="printContent('printContainer')">PRINT</button>
        <a href={{ route('customer')}} class="btn btn-success">FINISH</a>
    </div>
</div><br>
@foreach ($key as $order)
<!--PRINT BLOCK -->
<div class="d-print-block" >
    <div class="container d-flex justify-content-center align-items-center" >
        <div class="card" style="width: 885px;">
            <div class="card-body" id="printContainer" style="width: 875px; padding:0;">
                <div class="row" id="top" style="background-color: #ffffff; color: black; margin: 0; padding: 10px; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
                    <div style="display: flex; justify-content: center; align-items: center; padding-left: 5px;">
                        <img style="width: 700px; height: 100px;" src="{{ asset('images/logo-sfx.png') }}" alt="Logo">
                    </div>
                    <div style="align-items: center;">
                        <p style="font-family: Arial; font-size: 14px; margin: 0;">
                            National Road Brgy. Kaychanarianan Basco Batanes
                        </p>
                        <p style="font-family: Arial; font-size: 14px; margin: 0;">
                            Cellphone Nos.: 0908-815-9300 / 0999-889-5848 / 0999-889-5849
                        </p>
                        <p style="font-family: Arial; font-size: 14px; margin: 0;">
                            Email Address: fxavier_2015@yahoo.com.ph
                        </p>
                    </div>
                </div>
                <div class="row" style="padding: 0; margin: 0; display: flex; justify-content: space-between; align-items: center;">
                    <div style="flex: 1; display: flex; justify-content: center;">
                        <span style="font-family: Arial; font-weight: bold; font-size: 20px; padding-left:50px;">BILL OF LADING</span>
                    </div>
                </div>
                @if(is_null($order->cargo_status) || $order->cargo_status == '')
                    <!-- Display the empty <p> tag when status is null or blank -->
                    <div style="display: flex; font-weight: bold; justify-content: flex-end; align-items: center; padding-right:30px; font-size: 15px; ">
                        <span style="text-transform: uppercase; color: white;">.</span>
                    </div>
                @else
                    <!-- Display the status in a flex container when status has a value -->
                    <div style="display: flex; font-weight: bold; justify-content: flex-end; align-items: center; padding-right:30px; font-size: 15px; ">
                        <span style="text-transform: uppercase;">{{ $order->cargo_status }}</span>
                    </div>
                @endif
                <div class="row" style="padding-left:30px; padding-right:10px;font-size:14px">
                    <div class="col-md-3"id="cd-3">
                        <strong>M/V EVERWIN STAR</strong> <span style="text-align: center;display: inline-block; width: 30%; border-bottom: 1px solid black;">{{ $order->shipNum }}</span><br>
                    </div>
                    <div class="col-md-3"id="cd-3">
                        <strong>VOYAGE NO.</strong> <span style="text-align: center;display: inline-block; width: 50%; border-bottom: 1px solid black;">{{ $order->voyageNum }}</span><br>
                    </div>
                    <div class="col-md-3"id="cd-3">
                        <strong>CONTAINER NO.</strong><span style="text-transform: uppercase; text-align: center;display: inline-block; width: 40%; border-bottom: 1px solid black;">{{ $order->containerNum }}</span><br>
                    </div>
                    <div class="col-md-3"id="cd-3">
                        <strong>BL NO.</strong> <span style="text-align: center;display: inline-block; width: 60%; border-bottom: 1px solid black;"> {{ $order->orderId }}</span><br>
                    </div>
                </div>
                <div class="row" style="padding-left:30px; padding-right:10px;font-size:14px">
                    <div class="col-md-4"id="cd-4">
                        <strong>ORIGIN:</strong> <span style="text-transform: uppercase; text-align: center;display: inline-block; width: 70%; border-bottom: 1px solid black;"> {{ $order->origin }}</span><br>
                    </div>
                    <div class="col-md-4"id="cd-4">
                        <strong>DESTINATION:</strong> <span style="text-transform: uppercase; text-align: center;display: inline-block; width: 60%; border-bottom: 1px solid black;"> {{ $order->destination }}</span><br>
                    </div>
                    <div class="col-md-4"id="cd-4">
                        <strong>DATE:</strong> <span style="text-transform: uppercase; text-align: center;display: inline-block; width: 75%; border-bottom: 1px solid black;"> {{ $order->created_at->format('F j, Y') }}</span><br>
                    </div>
                </div>
                <p style="font-size: 5px;"></p>
                <div class="row" style="padding-left:30px; padding-right:10px;font-size:14px">
                    <div class="col-md-5"id="cd-5">
                        @foreach ($data as $user)
                            <strong>SHIPPER:</strong> <span style="text-transform: uppercase; text-align: center;display: inline-block; width: 78%; border-bottom: 1px solid black;"> {{ $order->consigneeName }}</span><br>
                        @endforeach
                    </div>
                    <div class="col-md-7" style="text-align: right; padding-right:30px;"id="cd-7">
                        @foreach ($data as $user)
                            <strong>CONSIGNEE:</strong> <span style="text-transform: uppercase; text-align: center;display: inline-block; width: 60%; border-bottom: 1px solid black;"> {{ $user->fName }} {{ $user->lName }}</span><br>
                        @endforeach
                    </div>
                </div>
                <div class="row" style="padding-left:30px; font-size:14px">
                    <div class="col-md-5"id="cd-5">
                        @foreach ($data as $user)
                            <strong>CONTACT NO.</strong> <span style="text-align: center;display: inline-block; width: 69%; border-bottom: 1px solid black;"><span style="color: white;">.</span>{{ $order->consigneeNum }}</span><br>
                        @endforeach
                    </div>
                    <div class="col-md-7" style="text-align: right; padding-right:40px;"id="cd-7">
                        @foreach ($data as $user)
                            <strong>CONTACT NO.</strong> <span style="text-align: center;display: inline-block; width: 60%; border-bottom: 1px solid black;"><span style="color: white;">.</span>{{ $user->phoneNum }}</span><br>
                        @endforeach
                    </div>
                </div>
                <div class="row" style="padding-left:30px; font-size:14px">
                    <div class="col-md-5"id="cd-5"></div>
                    <div class="col-md-7" style="text-align: right; padding-right:40px;"id="cd-7">
                        @foreach ($data as $user)
                            <strong>REMARK: </strong> 
                            <span style="text-transform: uppercase; text-align: center; display: inline-block; width: 60%; border-bottom: 1px solid black;">
                                <span style="text-transform: uppercase; color: white;">.</span>
                                <span style="text-transform: uppercase; color: black;">{{ $order->mark }}</span>
                            </span>
                        @endforeach
                    </div>
                </div>
                <p style="font-size: 5px;"></p>
                <div class="row" style="width: 100%; font-size: 13.5px; margin-right: 10px; margin-left: 5px;">
                    <table class="table table-condensed" style="margin: 0;">
                        <thead style="background-color: #78BF65; color: white;">
                            <tr>
                                <th>QTY</th>
                                <th>UNIT</th>
                                <th>DESCRIPTION</th>
                                <th>VALUE</th>
                                <th>WEIGHT</th>
                                <th>MEASUREMENT</th>
                                <th>RATE</th>
                                <th>FREIGHT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Table rows with data -->
                            @foreach ($parcel as $parcel)
                                <tr>
                                    <td style="font-size:14px; text-align: center;">{{ $parcel->quantity }}</td>
                                    <td style="text-transform: uppercase;" >{{ $parcel->unit }}</td>
                                    <td style="text-transform: uppercase;" >{{ $parcel->itemName }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><!--{{ $parcel->price }}--></td>
                                    <td><!--{{ number_format($parcel->total, 2) }}--></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td><strong style="color: black;">VALUE: {{ number_format($order->value, 2) }}</strong></td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td><!--<strong>{{ number_format($order->totalAmount, 2) }}</strong>--></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p style="font-size: 5px;"></p>
                <footer>
                <div class="row pl-3">
                    <div class="col-md-12" id="cd-3" style="font-size: 15px; margin: 0; padding: 0;">
                        <p style="margin: 0;"><strong>Terms and Conditions:</strong></p>
                    </div>
                </div>
                <div class="row pl-3" style="margin: 0; padding: 0;">
                    <div class="col-md-12" style="font-size: 15px; margin: 0; padding: 0;">
                        <p style="margin: 0;">1. We are not responsible for losses and damages due to improper packing.</p>
                    </div>
                </div>
                <div class="row pl-3" style="margin: 0; padding: 0;">
                    <div class="col-md-12" style="font-size: 15px; margin: 0; padding: 0;">
                        <p style="margin: 0;">2. Claims on cargo losses and/or damages must be filed within 5 (five) days after unloading.</p>
                    </div>
                </div>
                <div class="row pl-3" style="margin: 0; padding: 0;">
                    <div class="col-md-12" style="font-size: 15px; margin: 0; padding: 0;">
                        <p style="margin: 0;">3. Unclaimed cargoes shall be considered forfeited after 30 (thirty) days upon unloading.</p>
                    </div>
                </div>
                <div class="row pl-3">
                    <div class="col-md-7"id="cd-7"></div>
                    <div class="col-md-4" style="display: flex; justify-content: space-between; align-items: center;"id="cd-4">
                        <span style="text-align: right; font-size: 15px;">Freight :</span>
                        <span style="text-align: center; display: inline-block; width: 50%; border-bottom: 1px solid black; color:white;">.<!--{{ number_format($order->totalAmount, 2) }}--></span>
                    </div>
                    <div class="col-md-1" style="padding-left:20px;"id="cd-1"></div>
                </div>
                <div class="row pl-3">
                    <div class="col-md-7" style="padding-left:60px; font-size: 15px;"id="cd-7">Received on board vessel in apparent good condition.</div>
                    <div class="col-md-4" style="display: flex; justify-content: space-between; align-items: center;"id="cd-4">
                        <span style="text-align: right; font-size: 15px;">Valuation :</span>
                        <span style="text-align: center; display: inline-block; width: 50%; border-bottom: 1px solid black; color:white;">.
                            <!--{{ number_format((($order->value) + ($order->totalAmount)) * 0.0075, 2) }}-->
                        </span>
                    </div>
                    <div class="col-md-1" style="padding-left:20px;"id="cd-1"></div>
                </div>
                <div class="row pl-3">
                    <div class="col-md-7"id="cd-7"></div>
                    <div class="col-md-4" style="display: flex; justify-content: space-between; align-items: center;"id="cd-4">
                        <span style="text-align: right; font-size: 15px;">Wharfage :</span>
                        <span style="text-align: left; display: inline-block; width: 50%; border-bottom: 1px solid black; color: white;">.</span>
                    </div>
                    <div class="col-md-1" style="padding-left:20px;"id="cd-1"></div>
                </div>
                <div class="row pl-3">
                    <div class="col-md-7" style="display: flex; justify-content: space-between; align-items: center; padding-left:45px;"id="cd-7">
                        <span style="text-transform: uppercase; text-align: center; display: inline-block; width: 90%; border-bottom: 1px solid black; font-size: 15px;"><strong>{{ (($order->check)) }}</strong></span>
                    </div>
                    <div class="col-md-4" style="display: flex; justify-content: space-between; align-items: center;"id="cd-4">
                        <span style="text-align: right; font-size: 15px;">VAT :</span>
                        <span style="text-align: left; display: inline-block; width: 50%; border-bottom: 1px solid black; color: white;">.</span>
                    </div>
                    <div class="col-md-1" style="padding-left:20px;"id="cd-1"></div>
                </div>
                <div class="row pl-3">
                    <div class="col-md-7" style="padding-left:85px; font-size: 15px;"id="cd-7">Vessel's Checker or Authorized Representative</div>
                    <div class="col-md-4" style="display: flex; justify-content: space-between; align-items: center;"id="cd-4">
                        <span style="text-align: right; font-size: 15px;">Other Charges :</span>
                        <span style="text-align: left; font-size: 15px; display: inline-block; width: 50%; border-bottom: 1px solid black; color: white;">.</span>
                    </div>
                    <div class="col-md-1" style="padding-left:20px;"id="cd-1"></div>
                </div>
                <div class="row pl-3">
                    <div class="col-md-7"id="cd-7"></div>
                    <div class="col-md-4" style="display: flex; justify-content: space-between; align-items: center;"id="cd-4">
                        <span style="text-align: right; font-size: 15px;">Stuffing/Stippings :</span>
                        <span style="text-align: center; display: inline-block; width: 50%; border-bottom: 1px solid black; color: white;">.</span>
                    </div>
                    <div class="col-md-1" style="padding-left:20px;"id="cd-1"></div>
                </div>
                <div class="row pl-3">
                    <div class="col-md-7"id="cd-7"></div>
                    <div class="col-md-4" style="display: flex; justify-content: space-between; align-items: center;"id="cd-4">
                        <strong style="text-align: right; font-size: 15px;">TOTAL :</strong>
                        <strong style="text-align: center; display: inline-block; width: 50%; border-bottom: 1px solid black; color: white;">.
                            <!--{{ number_format((($order->value) + ($order->totalAmount)) * 0.0075 + ($order->totalAmount), 2) }}-->
                        </strong>
                    </div>
                    <div class="col-md-1" style="padding-left:20px;"id="cd-1"></div>
                </div>
                </footer><br><br>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- END PRINT-->
<script>
    function printContent(containerId) {
        var container = document.getElementById(containerId);
        var element1 = document.getElementById("element1");
        // Temporarily hide unnecessary elements
        element1.style.display = "none";
        // Print the content
        window.print();
        // Restore visibility
        element1.style.display = "block";
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        // Clear orderItems from localStorage when the page loads
        localStorage.removeItem('orderItems');
        
        // Optional: If you want to confirm it's cleared, you can log to console
        console.log('orderItems have been cleared from localStorage.');
    });
</script>
@endsection