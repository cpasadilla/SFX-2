@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
        <div class="col-md-6 text-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createCustomerModal">
                {{ __('ADD SHIP') }}
            </button>
        </div>
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



<!--CREATE USER MODAL-->
<div class="modal fade" id="createCustomerModal" tabindex="-1" role="dialog" aria-labelledby="createCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCustomerModalLabel">Create Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('s.create') }}" method="POST">
                    @csrf
                        <!--ADD SHIP-->
                        <div class="input-group mb-3">
                            <input type="text" name="ship" class="form-control @error('ship') is-invalid @enderror" placeholder="{{ __('Sip Number') }}" required autocomplete="ship" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-ship"></span>
                                </div>
                            </div>
                            @error('ship')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!--LOCATION FIELD
                        <div class="input-group mb-3">
                            <select id="location" name="location" class="form-control @error('location') is-invalid @enderror" placeholder="{{ __('Location') }}" required autocomplete="location" autofocus>
                                <option selected>Choose Location</option>
                                <option value="Batanes">Batanes</option>
                                <option value="Manila">Manila</option>
                            </select>
                            @error('location')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>-->
                        <!--SUBMIT BUTTON-->
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success btn-block">{{ __('Add Ship') }}</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
