@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-left">M/V EVERWIN STAR {{ $shipNum }}</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        @foreach ($data as $dock => $origin)
    <div class="card mt-4">
        <div class="card-header bg-success text-white">
            <h4 class="m-0">Dock {{ $dock }}</h4>
        </div>
        <div class="card-body">
            @if ($shipNum == 3)
                <div class="list-group">
                    @foreach ($origin as $voyage => $trip)
                    <a href="{{ route('parcels.showVoyage', [$shipNum, $trip, $dock, $voyage]) }}" class="list-group-item list-group-item-action">
                        <strong>VOYAGE NO. {{ $voyage }}</strong>
                    </a>
                    
                    @endforeach
                </div>
            @else
                @foreach ($origin as $orig => $trip)
                    <h5>{{ $orig == 'IN' ? 'MANILA' : 'BATANES' }}</h5>
                    <div class="list-group">
                        @foreach ($trip as $voyage => $value)
                            <a href="{{ route('parcels.showVoyage', [$shipNum, $value, $dock, $voyage]) }}" class="list-group-item list-group-item-action">
                                <strong>VOYAGE NO. {{ $voyage }}</strong>
                            </a>
                        @endforeach
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endforeach

    </div>
</div>
@endsection
