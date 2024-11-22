@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('ORDERS CREATED') }}</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">


                <div class="row mb-2">
                    <div class="col-md-6">
                        <form action="{{ route('p.search') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search by Order ID or Customer ID">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-success">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-0">
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date Created</th>
                                    <th>Customer ID</th>
                                    <th>Total Amount</th>
                                    <th>Origin</th>
                                    <th>Destination</th>
                                    <th>Ship Number</th>
                                    <th>Status</th>
                                    <th>Print QR</th>
                                    <th>View Bill of Lading</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($order as $user)
                                <tr>
                                    <td>{{ $user->orderId}} </td>
                                    <td>{{ $user->orderCreated }}</td>
                                    <td>{{ $user->cID}}</td>
                                    <td>{{ $user->totalAmount }}</td>
                                    <td>{{ $user->origin }}</td>
                                    <td>{{ $user->destination }}</td>
                                    <td>{{ $user->shipNum }}</td>
                                    <td>
                                        @if($user->status == "inProgress")
                                        <p class="bg-primary text-white" style="border-radius:25px; text-align:center;">IN PROGRESS</p>
                                        @else
                                        <p class="bg-success text-white" style="border-radius:25px; text-align:center;">COMPLETE</p>
                                        @endif
                                    </td>
                                    <td><a href={{route('p.qr',['key'=>$user->orderId])}} >Print</a></td>
                                    <td><a href={{route('p.bl',['key'=>$user->orderId])}}>View</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer clearfix">
                    </div>
                </div>

            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

  
@endsection