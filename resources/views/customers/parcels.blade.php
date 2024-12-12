@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!--CONTENT HEADER (PAGE HEADER)-->
<div class="content-header">
    @foreach ($users as $user)
    <h1 style="padding-left: 10px;">ORDERS FOR CUSTOMERS # </h1>
    @endforeach
</div>
<br>
@php
    $name =  $user->fName . ' ' .  $user->lName;
@endphp

<!--MAIN CONTENT-->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12"><!--<div class="col-lg-12">-->
                <div class="card">
                    <div class="card-header">
                        <h5>CUSTOMER NAME: {{ $name }}</h5>
                    </div>
                    <div class="card-body">
                        <table class="table" id="myTable2">
                            <thead class="thead-light">
                                <tr>
                                    <th style="text-align: center">#</th>
                                    <th style="text-align: center">Order ID</th>
                                    <th style="text-align: center">Date Created</th>
                                    <th style="text-align: center">Ship Number</th>
                                    <th style="text-align: center">Voyage Number</th>
                                    <th style="text-align: center">Origin</th>
                                    <th style="text-align: center">Destination</th>
                                    <th style="text-align: center">Total Amount</th>
                                    <th style="text-align: center">OR#</th>
                                    <th style="text-align: center">AR#</th>
                                    <th style="text-align: center">Update</th>
                                    <th style="text-align: center">View BL w/ price</th>
                                    <th style="text-align: center">View BL w/o price</th>
                                    <th style="text-align: center">Add OR/AR</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="id" ; style="display:none">{{ $order->id }} </td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td style="text-align: center">{{ $order->orderId }}</td>
                                        <td style="text-align: center">{{ $order->created_at }}</td>
                                        <td style="text-align: center">{{ $order->shipNum }}</td>
                                        <td style="text-align: center">{{ $order->voyageNum }}</td>
                                        <td style="text-align: center">{{ $order->origin }}</td>
                                        <td style="text-align: center">{{ $order->destination }}</td>
                                        <td style="text-align: center">{{ $order->totalAmount }}</td>
                                        <td style="text-align: center">{{ $order->OR }}</td>
                                        <td style="text-align: center">{{ $order->AR}}</td>

                                        <td style="text-align: center">
                                            <a href="{{ route('c.audit', ['key' => $order->orderId]) }}">Edit</a>
                                        </td>
                                        <td style="text-align: center">
                                            <a href="{{ route('p.bl', ['key' => $order->orderId]) }}">View</a>
                                        </td>
                                        <td style="text-align: center">
                                            <a href="{{ route('p.blnew', ['key' => $order->orderId]) }}">View</a>
                                        </td>
                                        <td style="text-align: center;">
                                            <i class="fas fa-pencil" data-toggle="modal" data-target="#deleteUserModal{{ $order->id }}" style="color:grey"></i>
                                        </td>
                                    </tr>









<!-- ADD OR/AR -->
<div class="modal fade" id="deleteUserModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel{{ $order->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteUserModalLabel{{ $order->id }}">{{ __('ADD OR/AR') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <br>
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('c.or', ['key' => $order->cID, 'orderId' => $order->orderId]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $order->id }}">
                        <div class="input-group mb-3">
                            <input type="text" name="OR" class="form-control @error('OR') is-invalid @enderror" placeholder="{{ __('OR Number') }}" autocomplete="OR" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-hashtag"></span>
                                </div>
                            </div>
                            @error('OR')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success">
                                {{ __('Submit OR') }}
                            </button>
                        </div>
                    </form>

                </div>
                <div class="col-md-6">
                    <form action="{{ route('c.ar', ['key' => $order->cID,'orderId' => $order->orderId]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $order->id }}">
                        <div class="input-group mb-3">
                            <input type="text" name="AR" class="form-control @error('AR') is-invalid @enderror" placeholder="{{ __('AR Number') }}" autocomplete="AR" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-hashtag"></span>
                                </div>
                            </div>
                            @error('AR')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success">
                                {{ __('Submit AR') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
                                @endforeach
                            </tbody>
                        </table>
                        <hr style="border: none; border-top: 1px solid #d2d5dd; margin: 10px 0;">
                    </div>
                    <div class="card-footer clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<script>

    window.addEventListener('popstate', function(event) {
        // Clear orderItems from localStorage when the back button or Alt + Left Arrow is pressed
        localStorage.removeItem('orderItems');
        console.log('orderItems have been cleared from localStorage due to navigation.');
    });

</script>
@endsection
