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
        @foreach ($data as $dock => $voyages)
            <div class="card mt-4">
                <div class="card-header bg-success text-white">
                    <h4 class="m-0">Dock {{ $dock }}</h4>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach ($voyages as $voyage)
                            <a href="{{ route('parcels.showVoyage', [$shipNum, $voyage, $dock]) }}" class="list-group-item list-group-item-action">
                                <strong>VOYAGE NO. {{ $voyage }} - OUT</strong>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
