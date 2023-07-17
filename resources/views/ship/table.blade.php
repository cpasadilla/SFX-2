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



                <div class="card">
                    <div class="card-body p-0">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>CARGO ID</th>
                                    <th>CARGO NUMBER</th>
                                    <th>SHIP NUMBER</th>
                                    <th>WEIGHT</th>
                                    <th>Print QR</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($table as $user)
                                <tr>
                                    <td>{{ $user->id}} </td>
                                    <td>{{ $user->cargoID }}</td>
                                    <td>{{ $user->cargoNum}}</td>
                                    <td>{{ $user->shipNum }}</td>
                                    <td>{{ $user->weight }}</td>
                                    <td><a href={{route('o.qr',['key'=>$user->id])}} >Print</a></td>
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