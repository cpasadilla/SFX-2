@extends('layouts.app')
@section('content')

<div class="content-header">
    <h1 style="padding-left:10px;">MASTERLIST</h1>
</div>
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-md-6">
            <!--Search Form-->
            <form action="{{ route('p.search') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search by Order ID or Customer ID"" name="search">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">SEARCH</button>
                    </div>
                </div>
            </form>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
<br>
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
