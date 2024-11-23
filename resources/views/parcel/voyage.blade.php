@extends('layouts.app')
@section('content')

<div class="content-header">
    <h1 style="padding-left:10px;">Orders for Ship Number: {{ $shipNum }}, Voyage Number: {{ $voyageNum }}</h1>
</div>

<div class="content">
    <div class="col-md-6">
        <form action="{{ route('p.search') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by Order ID or Customer ID" value="{{ request()->query('search') }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>

<br>
<div class="content">
    <div class="container fluid">
        <div class="card">
            <div class="card-header">
                <h5>Voyage Number: {{ $voyageNum }}</h5>
            </div>
                <div class="card-body">
                    <table class="table" id="myTable2">
                        <thead class="thead-light">
                            <tr>
                                <th style="text-align: center">Order ID</th>
                                <th style="text-align: center">Customer ID</th>
                                <th style="text-align: center">Date Created</th>
                                <th style="text-align: center">Voyage Number</th>
                                <th style="text-align: center">Ship Number</th>
                                <th style="text-align: center">Origin</th>
                                <th style="text-align: center">Destination</th>
                                <th>Total Amount</th>
                                <th style="text-align: center">Status</th>
                                <th style="text-align: center">View Bill of Lading</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td style="text-align: center">{{ $order->orderId }}</td>
                                    <td style="text-align: center">{{ $order->cID }}</td>
                                    <td style="text-align: center">{{ $order->created_at }}</td>
                                    <td style="text-align: center">{{ $order->voyageNum }}</td>
                                    <td style="text-align: center">{{ $order->shipNum }}</td>
                                    <td style="text-align: center">{{ $order->origin }}</td>
                                    <td style="text-align: center">{{ $order->destination }}</td>
                                    <td style="text-align: center">{{ $order->totalAmount }}</td>
                                    <!--td style="text-align: center">
                                        <a href="{{ route('p.qr', ['key' => $order->orderId]) }}">Print</a>
                                    </td-->
                                    <td>
                                        <form action="{{ route('parcels.updateStatus', ['orderId' => $order->orderId]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-control" onchange="this.form.submit()">
                                                <option value="IN PROGRESS" {{ $order->status == 'IN PROGRESS' ? 'selected' : '' }}>IN PROGRESS</option>
                                                <option value="TRANSFER" {{ $order->status == 'TRANSFER' ? 'selected' : '' }}>TRANSFER</option>
                                                <option value="CHARTERED" {{ $order->status == 'CHARTERED' ? 'selected' : '' }}>CHARTERED</option>
                                                <option value="CANCELLED" {{ $order->status == 'CANCELLED' ? 'selected' : '' }}>CANCELLED</option>
                                                <option value="OFFLOAD" {{ $order->status == 'OFFLOAD' ? 'selected' : '' }}>OFFLOAD</option>
                                                <option value="TOPLOAD" {{ $order->status == 'TOPLOAD' ? 'selected' : '' }}>TOPLOAD</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td style="text-align: center">
                                        <a href="{{ route('p.bl', ['key' => $order->orderId]) }}">View</a>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr style="border: none; border-top: 1px solid #d2d5dd; margin: 10px 0;">
                </div>
            
        </div>                    
    </div>
</div>

@endsection
