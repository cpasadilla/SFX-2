@extends('layouts.app')

@section('content')
<div class="content-header">
    <h1 style="padding-left:10px;">Orders for Ship: {{ $shipNum }} and Voyage: {{ $voyageNum }}</h1>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Orders for Ship Number: {{ $shipNum }} - Voyage Number: {{ $voyageNum }}</h5>
            </div>
            <div class="card-body">
                <table class="table" id="myTable2">
                    <thead class="thead-light">
                        <tr>
                            <th style="text-align: center">Order ID</th>
                            <th style="text-align: center">Date Created</th>
                            <th>Customer ID</th>
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
                        @foreach($orders as $user)
                            <tr>
                                <td style="text-align: center">{{ $user->orderId }} </td>
                                <td style="text-align: center">{{ $user->orderCreated }}</td>
                                <td>{{ $user->cID }}</td>
                                <td style="text-align: center">{{ $user->voyageNum }}</td>
                                <td style="text-align: center">{{ $user->shipNum }}</td>
                                <td style="text-align: center">{{ $user->origin }}</td>
                                <td style="text-align: center">{{ $user->destination }}</td>
                                <td>{{ $user->totalAmount }}</td>
                                <td style="text-align: center">
                                    @if($user->status == "inProgress")
                                        <p class="bg-primary text-white" style="border-radius:25px; text-align:center;">IN PROGRESS</p>
                                    @else
                                        <p class="bg-success text-white" style="border-radius:25px; text-align:center;">COMPLETE</p>
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    <a href="{{ route('p.bl',['key' => $user->orderId]) }}">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.container-fluid -->
</div>
@endsection
