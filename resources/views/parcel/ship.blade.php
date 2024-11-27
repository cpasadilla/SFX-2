@extends('layouts.app')
@section('content')

<div class="content-header">
    <h1 style="padding-left:10px;">M/V EVERWIN STAR {{ $shipNum }}</h1>
</div>

<div class="content">
    <div class="container fluid">
        <div class="card"
            @foreach ($voyages as $voyageNum => $orders)
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('parcels.showVoyage', [$shipNum, $voyageNum]) }}">
                            VOYAGE {{ $voyageNum }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
