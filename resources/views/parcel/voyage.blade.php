@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="content-header">
    <h1 style="padding-left: 10px;">MASTERLIST FOR M/V EVERWIN STAR {{ $shipNum }} VOYAGE {{ $voyageNum }}</h1>
    <br>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
                <!--Search Form-->
                <form action="{{ route('p.search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search by Order ID or Customer ID"" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">SEARCH</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.content-header -->

<!--Main Content-->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>VOYAGE {{ $voyageNum }}</h5>
                    </div>
                    <div class="card-body">
                        <table id="myTable2" class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th style="text-align: center;">ORDER ID</th>
                                    <th style="text-align: center;">CUSTOMER ID</th>
                                    <th style="text-align: center;">CUSTOMER NAME</th>
                                    <th style="text-align: center;">CONSIGNEE NAME</th>
                                    <th style="text-align: center;">CHECKER NAME</th>
                                    <th style="text-align: center;">DATE CREATED</th>
                                    <th style="text-align: center;">SHIP NUMBER</th>
                                    <!--th style="text-align: center;">ORIGIN</th>
                                    <th style="text-align: center;">DESTINATION</th-->
                                    <th style="text-align: center;">TOTAL AMOUNT</th>
                                    <th style="text-align: center;">STATUS</th>
                                    <th style="text-align: center;">VIEW BL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td style="text-align: center;">{{ $order->orderId }}</td>
                                    <td style="text-align: center;">{{ $order->cID }}</td>
                                    <td style="text-align: center;">
                                        {{ $order->customer->fName ?? '' }} {{ $order->customer->lName ?? '' }}
                                    </td>
                                    <td style="text-align: center;">{{ $order->consigneeName }}</td>
                                    <td style="text-align: center;">{{ $order->check }}</td>
                                    <td style="text-align: center;">{{ $order->created_at }}</td>
                                    <td style="text-align: center;">{{ $order->shipNum }}</td>
                                    <!--td style="text-align: center;">{{ $order->origin }}</td>
                                    <td style="text-align: center;">{{ $order->destination }}</td-->
                                    <td style="text-align: center;">{{ $order->totalAmount }}</td>
                                    <td style="text-align: center;">
                                        <form action="{{ route('parcels.updateStatus', ['shipNum' => $shipNum, 'voyageNum' => $voyageNum, 'orderId' => $order->orderId]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-control" onchange="this.form.submit()">
                                                <option value="IN PROGRESS" {{ $order->status == 'IN PROGRESS' ? 'selected' : '' }}>IN PROGRESS</option>
                                                <option value="TRANSFER" {{ $order->status == 'TRANSFER' ? 'selected' : '' }}>TRANSFER</option>
                                                <option value="CHARTERED" {{ $order->status == 'CHARTERED' ? 'selected' : '' }}>CHARTERED</option>
                                                <option value="CANCELLED" {{ $order->status == 'CANCELLED' ? 'selected' : '' }}>CANCELLED</option>
                                                <option value="OFFLOAD" {{ $order->status == 'OFFLOAD' ? 'selected' : '' }}>OFFLOAD</option>
                                                <option value="TOPLOAD" {{ $order->status == 'TOPLOAD' ? 'selected' : '' }}>TOPLOAD</option>
                                                <option value="SHIP" {{ $order->status == 'SHIP' ? 'selected' : '' }}>SHIP</option>
                                                <option value="COMPLETE" {{ $order->status == 'COMPLETE' ? 'selected' : '' }}>COMPLETE</option>
                                            </select>
                                        </form>
                                    </td>

                                    <td style="text-align: center;">
                                        <a href="{{ route('p.bl', ['key' => $order->orderId]) }}">VIEW</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr style="border: none; border-top: 1px solid #D2D5DD; margin: 10px 0;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
