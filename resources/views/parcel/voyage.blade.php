@extends('layouts.app')
@section('content')
<style>
    .register-button {
        position: fixed;
        left: 50%;
    }

    th {
        cursor: pointer;
    }

    th.ascending::after {
        content: ' \25B2'; /* Up arrow */
    }

    th.descending::after {
        content: ' \25BC'; /* Down arrow */
    }

    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #78BF65;
        border-color: #78BF65;
    }

    .page-link {
        position: relative;
        display: block;
        padding: 0.5rem 0.75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #000000;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }
    .card {
    min-height: 100%;
    height: auto;
    overflow: hidden;
}
.card-body {
    overflow-x: auto;
    white-space: nowrap;
}

</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="content-header">
    <h1 style="padding-left: 10px;">MASTER LIST FOR M/V EVERWIN STAR {{ $shipNum }} VOYAGE {{ $orig }}</h1>
    <br>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
                <!--Search Form-->
                <form action="{{ route('p.search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search by Order ID or Customer ID or Cargo Status" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">SEARCH</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.content-header -->

<!--Main Content-->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>MASTER LIST FOR M/V EVERWIN STAR {{ $shipNum }} VOYAGE {{ $orig }}</h5>
                    </div>
                    <!-- Filter buttons (Add this section above or below your order list/table) -->
                    <div class="btn-group" role="group" aria-label="Order Filter">
                        <a href="{{ route('p.showVoyage', ['shipNum' => $shipNum, 'voyageNum' => $voyageNum, 'dock' => $dock, 'orig' => $orig, 'status' => 'all']) }}" class="btn btn-info">All Orders</a>
                        <a href="{{ route('p.showVoyage', ['shipNum' => $shipNum, 'voyageNum' => $voyageNum, 'dock' => $dock, 'orig' => $orig, 'status' => 'PAID']) }}" class="btn btn-success">Paid Orders</a>
                        <a href="{{ route('p.showVoyage', ['shipNum' => $shipNum, 'voyageNum' => $voyageNum, 'dock' => $dock, 'orig' => $orig, 'status' => 'UNPAID']) }}" class="btn btn-danger">Unpaid Orders</a>
                    </div>
                    <div class="card-body">
                        {{ $orders->links() }}
                        <table id="myTable2" class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th style="text-align: center;">BL#</th>
                                    <th>CONTAINER# 
                                        <select class="filter searchable-dropdown" name="containerNum">
                                            <option value="">All</option>
                                            <option disabled>Search...</option> <!-- Search box placeholder -->
                                            @foreach($filterOrders->pluck('containerNum')->filter()->unique()->sort() as $value)
                                                <option value="{{ $value }}" {{ request()->query('containerNum') == $value ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </th>

                                    <th>SHIPPER 
                                        <select class="filter searchable-dropdown" name="consigneeName">
                                            <option value="">All</option>
                                            <option disabled>Search...</option>
                                            @foreach($filterOrders->pluck('consigneeName')->filter()->unique()->sort() as $value)
                                                <option value="{{ $value }}" {{ request()->query('consigneeName') == $value ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </th>

                                    <th>CONSIGNEE 
                                        <select class="filter searchable-dropdown" name="shipper">
                                            <option value="">All</option>
                                            <option disabled>Search...</option>
                                            @foreach($filterOrders->pluck('customer')->filter()->unique()->sortBy(fn($c) => $c->fName . ' ' . $c->lName) as $customer)
                                                <option value="{{ $customer->fName }} {{ $customer->lName }}" 
                                                    {{ request()->query('shipper') == ($customer->fName . ' ' . $customer->lName) ? 'selected' : '' }}>
                                                    {{ $customer->fName }} {{ $customer->lName }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </th>

                                    <th>CHECKER 
                                        <select class="filter" name="check">
                                            <option value="">All</option>
                                            @foreach($filterOrders->pluck('check')->unique() as $value)
                                                <option value="{{ $value }}" {{ request()->query('check') == $value ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th style="text-align: center;">DATE CREATED</th>
                                    <th style="text-align: center;">TOTAL FREIGHT</th>
                                    <th style="text-align: center;">VALUATION</th>
                                    <th style="text-align: center;">TOTAL AMOUNT</th>
                                    <th style="text-align: center;">OR#</th>
                                    <th style="text-align: center;">AR#</th>
                                    <th>CARGO STATUS 
                                        <select class="filter" name="cargo_status">
                                            <option value="">All</option>
                                            @foreach($filterOrders->pluck('cargo_status')->unique() as $value)
                                                <option value="{{ $value }}" {{ request()->query('cargo_status') == $value ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                        @endforeach
                                        </select>
                                    </th>
                                    <th>BL STATUS 
                                        <select class="filter" name="bl_status">
                                            <option value="">All</option>
                                            @foreach($filterOrders->pluck('bl_status')->unique() as $value)
                                                <option value="{{ $value }}" {{ request()->query('bl_status') == $value ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th style="text-align: center;">BL REMARK</th>
                                    <th style="text-align: center;">VIEW BL</th>
                                    <th>CREATED BY 
                                        <select class="filter" name="createdBy">
                                            <option value="">All</option>
                                            @foreach($filterOrders->pluck('createdBy')->unique() as $value)
                                                <option value="{{ $value }}" {{ request()->query('createdBy') == $value ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th style="text-align: center" scope="col" >Add OR/AR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalFreight = 0;
                                    $totalValuation = 0;
                                    $totalAmount = 0;
                                @endphp
                                @foreach($orders as $order)
                                @php
                                    $freight = $order->totalAmount;
                                    $valuation = (($order->value) + ($order->totalAmount)) * 0.0075;
                                    $amount = $valuation + $freight;
                                    $totalFreight += $freight;
                                    $totalValuation += $valuation;
                                    $totalAmount += $amount;
                                @endphp
                                <tr>
                                    <td style="text-align: center;">{{ $order->orderId }}</td>
                                    <td style="text-transform: uppercase; text-align: center;">{{ $order->containerNum }}</td>
                                    <td style="text-transform: uppercase; text-align: center;">{{ $order->consigneeName }}</td>
                                    <td style="text-transform: uppercase; text-align: center;">
                                        {{ $order->cID }} - {{ $order->customer->fName ?? '' }} {{ $order->customer->lName ?? '' }}
                                    </td>
                                    <td style="text-transform: uppercase; text-align: center;">{{ $order->check }}</td>
                                    <td style="text-align: center;">{{ $order->created_at }}</td>
                                    <td style="text-align: center;">{{ number_format($order->totalAmount, 2) }}</td>
                                    <td style="text-align: center;">{{ number_format(($order->value + $order->totalAmount) * 0.0075, 2) }}</td>
                                    <td style="text-align: center;">{{ number_format(($order->value + $order->totalAmount) * 0.0075 + $order->totalAmount, 2) }}</td>
                                    <td style="text-align: center;">{{ $order->OR }}</td>
                                    <td style="text-align: center;">{{ $order->AR }}</td>
                                    <td style="text-transform: uppercase; text-align: center;">{{ $order->cargo_status }}</td>
                                    <td style="text-align: center;">{{ $order->bl_status }}</td>
                                    <td style="text-transform: uppercase; text-align: center">{{ $order->mark}}</td>
                                    <td style="text-align: center;">
                                        <a href="{{ route('p.bl', ['key' => $order->orderId]) }}">VIEW</a>
                                    </td>
                                    <td style="text-transform: uppercase; text-align: center">{{ $order->createdBy}}</td>
                                    <td style="text-align: center;">
                                            <i class="fas fa-pencil" data-toggle="modal" data-target="#deleteUserModal{{ $order->orderId }}" style="color:grey"></i>
                                        </td>
                                    <!--td style="text-align: center;">
                                        <span
                                            data-toggle="modal"
                                            data-target="#deleteUserModal{{ $order->orderId }}"
                                            style="color: rgb(14, 143, 195); cursor: pointer;">
                                            ADD
                                        </span>
                                    </td-->
                                </tr>
                                <!-- ADD OR/AR -->
                                <div class="modal fade" id="deleteUserModal{{ $order->orderId }}" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel{{ $order->orderId }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteUserModalLabel{{ $order->orderId }}">{{ __('ADD OR/AR') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <form action="{{ route('s.or', ['shipNum' => $shipNum, 'voyageNum' => $voyageNum, 'orderId' => $order->orderId, 'dock' => $dock, 'orig'=> $orig]) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="or" value="{{ $order->orderId }}">
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
                                                        <form action="{{ route('s.ar', ['shipNum' => $shipNum, 'voyageNum' => $voyageNum, 'orderId' => $order->orderId, 'dock' => $dock, 'orig'=> $orig]) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="ar" value="{{ $order->orderId }}">
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
                            <!-- Overall Total Row for the Entire Voyage (Regardless of Page) -->
                            <tr style="font-weight: bold; background-color: #d1ecf1;">
                                <td colspan="6" style="text-align: right;">OVERALL TOTAL FOR SHIP #{{ $shipNum }} - VOYAGE #{{ $voyageNum }}:</td>
                                <td style="text-align: center;">{{ number_format($totalFreightOverall ?? 0, 2) }}</td>
                                <td style="text-align: center;">{{ number_format($totalValuationOverall ?? 0, 2) }}</td>
                                <td style="text-align: center;">{{ number_format($totalAmountOverall ?? 0, 2) }}</td>
                            </tr>
                        </table>
                        {{ $orders->links() }}
                        <p>Page: {{ $orders->currentPage() }}</p>

                        <hr style="border: none; border-top: 1px solid #D2D5DD; margin: 10px 0;">
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div><script>
    $(document).ready(function () {
        $(".filter").on("change", function () {
            var columnName = $(this).attr("name");  // Get the filter name (e.g., "cargo_status")
            var selectedValue = $(this).val();
            var currentUrl = new URL(window.location.href);

            if (selectedValue !== "") {
                currentUrl.searchParams.set(columnName, selectedValue);
            } else {
                currentUrl.searchParams.delete(columnName);
            }

            window.location.href = currentUrl.toString();
        });

        // Preserve filter selections on page reload
        $(".filter").each(function () {
            var columnName = $(this).attr("name");
            var currentUrl = new URL(window.location.href);
            var filterValue = currentUrl.searchParams.get(columnName);

            if (filterValue) {
                $(this).val(filterValue);
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".searchable-dropdown").forEach(select => {
            // Wrap select inside a div and add an input field
            let wrapper = document.createElement("div");
            wrapper.style.position = "relative";
            let searchBox = document.createElement("input");
            searchBox.type = "text";
            searchBox.placeholder = "Search...";
            searchBox.style.width = "100%";
            searchBox.style.marginBottom = "5px";
            searchBox.style.padding = "5px";
            searchBox.style.border = "1px solid #ddd";

            let parent = select.parentNode;
            parent.replaceChild(wrapper, select);
            wrapper.appendChild(searchBox);
            wrapper.appendChild(select);

            searchBox.addEventListener("keyup", function () {
                let filter = searchBox.value.toLowerCase();
                for (let option of select.options) {
                    let text = option.text.toLowerCase();
                    option.style.display = text.includes(filter) ? "" : "none";
                }
            });
        });
    });
</script>

<style>
    th {
        cursor: pointer;
    }

    th.ascending::after {
        content: ' \25B2'; /* Up arrow */
    }

    th.descending::after {
        content: ' \25BC'; /* Down arrow */
    }
</style>
<style>
    .register-button {
        position: fixed;
        left: 50%;
    }

    th {
        cursor: pointer;
        position: relative;
    }

    th.ascending::after {
        content: ' \25B2'; /* Up arrow */
    }

    th.descending::after {
        content: ' \25BC'; /* Down arrow */
    }

    /* Filter dropdown */
    .filter-dropdown {
        position: absolute;
        top: 100%;
        left: 0;
        background: white;
        border: 1px solid #ddd;
        max-height: 200px;
        overflow-y: auto;
        display: none;
        z-index: 10;
        width: 100%;
    }

    .filter-dropdown select {
        width: 100%;
        padding: 5px;
        border: none;
    }
</style>

@endsection