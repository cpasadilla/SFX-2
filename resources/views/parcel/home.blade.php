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
                    <input type="text" class="form-control" placeholder="Search by Order ID or Customer ID" name="search">
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
                <div class="card">
                    <div class="card-body">
                        <table class="table" id="myTable2">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">SHIP #</th>
                                    <th scope="col">REFERENCE</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ships as $ship)
                                    <tr class="table-row"  >
                                        <td class="ship">
                                        <a href="{{ route('parcels.showShip', [$ship->number]) }}">
                                            M/V EVERWIN STAR {{ $ship->number }}
                                        </a>
                                        </td>

                                        <td class="ref">{{ $ship->reference }}</td>
                                        <td style="text-align: center;">
                                            <form action="{{ route('s.update', ['shipId'=>$ship->id]) }}" method="POST">
                                                @csrf
                                                <select name="status" class="form-control" onchange="this.form.submit()">
                                                    @if ($ship->status == 'DRYDOCKED')
                                                    <option value="READY" {{ $ship->status == 'READY' ? 'selected' : '' }}>READY</option>
                                                    <option value="ON LAND" {{ $ship->status == 'ON LAND' ? 'selected' : '' }} disabled>ON LAND</option>
                                                    @else
                                                    <option value="READY" {{ $ship->status == 'READY' ? 'selected' : '' }} disabled>READY</option>
                                                    <option value="ON LAND" {{ $ship->status == 'ON LAND' ? 'selected' : '' }}>ON LAND</option>
                                                    @endif
                                                    <option value="ON SEA" {{ $ship->status == 'ON SEA' ? 'selected' : '' }}>ON SEA</option>
                                                    <option value="ARRIVED" {{ $ship->status == 'ARRIVED' ? 'selected' : '' }}>ARRIVED</option>
                                                    <option value="DRYDOCKED" {{ $ship->status == 'DRYDOCKED' ? 'selected' : '' }}>DRYDOCKED</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td class="align-middle">
                                            <i class="fas fa-trash" data-toggle="modal" data-target="#deleteUserModal{{ $ship->id }}" style="color:grey"></i>
                                        </td>
                                    </tr>


        <!-- DELETE MODAL -->
        <div class="modal fade" id="deleteUserModal{{ $ship->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel{{ $ship->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel{{ $ship->id }}">{{ __('Delete Ship?') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('This action cannot be undone.') }}</p>
                <form action="{{ route('s.error') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $ship->id }}">
                    <div class="text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            {{ __('Cancel') }}
                        </button>
                        <button type="submit" class="btn btn-danger">
                            {{ __('Delete Ship Details') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
        </div>
        </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

</div>

<!--SHIP TABLE MODAL-->
<div class="modal fade" id="openShip" tabindex="-1" role="dialog" aria-labelledby="openShipLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="openShipLabel">SHIPS AVAILABLE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createCustomerModal">
                {{ __('ADD SHIP') }}
            </button>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>






<!--CREATE SHIP MODAL-->
<div class="modal fade" id="createCustomerModal" tabindex="-1" role="dialog" aria-labelledby="createCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCustomerModalLabel">Create Ship</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('s.create') }}" method="POST">
                    @csrf
                        <!--ADD SHIP-->
                        <div class="input-group mb-3">
                            <input type="text" name="ship" class="form-control @error('ship') is-invalid @enderror" placeholder="{{ __('Ship Number') }}" required autocomplete="ship" autofocus>
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
                        <div class="input-group mb-3">
                            <input type="text" name="reference" class="form-control @error('reference') is-invalid @enderror" placeholder="{{ __('Reference Number') }}" autocomplete="reference" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-ship"></span>
                                </div>
                            </div>
                            @error('reference')
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
