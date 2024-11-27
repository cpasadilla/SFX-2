@extends('layouts.app')
@section('content')

<div class="content-header">
    <h1 style="padding-left:10px;">MASTERLIST</h1>
</div>

<div class="content">
    <div class="container fluid">
        <div class="card"
          @foreach ($groupedOrders as $shipNum => $voyages)
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('parcels.showShip', [$shipNum]) }}">
                          M/V EVERWIN STAR {{ $shipNum }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection