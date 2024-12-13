@section('print')
@foreach ($key as $order)

<div class="d-print-block">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card">
            <div class="card-body" id="printContainer" style="width: 800px; padding:0;">
                <div class="row" id="top" style="background-color: #78BF65; color: white; margin-left:0.2px; margin-right:0.2px; padding:10px; ">
                    <br>
                    <div class="" style="display:flex; ">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo"
                            style="width: 80px; height: 80px; margin-right:1px;">
                        <h2 style="margin-top: 22px">St. Francis Xavier Star Shipping Lines Inc.</h2>
                    </div>
                    <p> National Road Brgy. Kaychanrianan Basco Batanes<br />
                        Cellphone Nos.: 0908-815-9300 / 0999-889-5848 / 0999-889-5849<br />
                        Email Address: fxavier_2015@yahoo.com.ph</p>
                </div>
                <div class="row" style="padding-left:20px; padding-right:20px;">
                    <div class="col-md-6" style="font-size:20px;">
                        Bill of Lading
                    </div>
                    <div class="col-md-6" style=" font-size:20px;text-align:right;">
                        <strong>#{{ $order->orderId }}</strong>
                        <p style=" font-size:16px">Issued: {{ $order->created_at->format('F j, Y') }}</p>
                    </div>
                </div>
                <div class="row" style="padding-left:20px; padding-right:20px; font-size:16px">
                    <div class="col-md-4">
                        <p> M/V EVERWIN STAR <span> {{ $order->shipNum }}</span><br>

                            ORIGIN: <span> {{ $order->origin }}</span><br>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <p> CONTAINER NO. <span>
                                @if ($order->cargoNum == '0')
                                    NOT YET ASSIGNED
                                @else
                                    {{ $order->origin }}
                                @endif
                            </span><br>

                            DESTINATION: <span> {{ $order->destination }}</span>
                        </p>
                    </div>
                </div>
                <div class="row" style="padding:20px; border-bottom:3px;">
                    <div class="col-md-6" style="font-size:17px;">
                        @foreach ($data as $user)
                            <p>Shipper <br>
                                <strong> {{ $user->fName }} {{ $user->lName }}</strong><br>
                                {{ $user->phoneNum }}<br>
                            </p>
                        @endforeach
                    </div>
                    <div class="col-md-6" style=" font-size:17px;">
                        <p>Consignee <br>
                            <strong> {{ $order->consigneeName }}</strong><br>
                            {{ $order->consigneeNum }}<br>
                        </p>
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
                                <td>{{ $order->totalAmount }}</td>
                            </tr>
                            @endforeach
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="row pl-3">
                    <div class="col-md-3">
                        <p><strong>Terms and Conditions:</strong></p>
                    </div>
                    
                    <ol>
                        <li>We are not responsible for losses and damages due to improper packing.</li>
                        <li>Claims on cargo losses and / or damages must be filed within 5 (five) days after unloading.
                        </li>
                        <li>Unclaimed cargoes shall be considered forfeited after 30 (thirty) days upon unloading.</li>
                    </ol>
                </div>
                <br>
                <div class="row pl-3">
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        Received on board vessel in apparent good condition.
                        <br>
                        <br>
                        <br>
                        <p>__________________________________________________ <br>
                            &emsp;Vessel's Checker or Authorized Representative</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection