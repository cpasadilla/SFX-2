@extends('layouts.app')
@section('content')

<div class="content-header">
    @foreach ($users as $user)

    <h1 style="padding-left:10px;">Orders for Customer#: {{$user->cID}}</h1>
</div>

<div class="content">

</div>
@php
    $name =  $user->fName . ' ' .  $user->lName;
@endphp
<br>
<div class="content">
    <div class="container fluid">
        <div class="card">
            <div class="card-header">
                <h5>Customer Name: {{$name}} </h5>
            </div>
    @endforeach

                <div class="card-body">
                    <table class="table" id="myTable2">
                        <thead class="thead-light">
                            <tr>
                                <th style="text-align: center">Order ID</th>
                                <th style="text-align: center">Date Created</th>
                                <th style="text-align: center">Voyage Number</th>
                                <th style="text-align: center">Ship Number</th>
                                <th style="text-align: center">Origin</th>
                                <th style="text-align: center">Destination</th>
                                <th>Total Amount</th>
                                <th style="text-align: center">Update</th>
                                <th style="text-align: center">View BL w/ price</th>
                                <th style="text-align: center">View BL w/o price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td style="text-align: center">{{ $order->orderId }}</td>
                                    <td style="text-align: center">{{ $order->created_at }}</td>
                                    <td style="text-align: center">{{ $order->voyageNum }}</td>
                                    <td style="text-align: center">{{ $order->shipNum }}</td>
                                    <td style="text-align: center">{{ $order->origin }}</td>
                                    <td style="text-align: center">{{ $order->destination }}</td>
                                    <td style="text-align: center">{{ $order->totalAmount }}</td>
                                    <td style="text-align: center">
                                        <a href="{{ route('c.audit', ['key' => $order->orderId]) }}">Edit</a>
                                    </td>
                                    <td style="text-align: center">
                                        <a href="{{ route('p.bl', ['key' => $order->orderId]) }}">View</a>
                                    </td>
                                    <td style="text-align: center">
                                        <a href="{{ route('p.blnew', ['key' => $order->orderId]) }}">View</a>
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
<br>

@endsection
