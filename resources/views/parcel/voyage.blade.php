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
                                    <th style="text-align: center;" onclick="sortTable(0)">ORDER ID</th>
                                    <th style="text-align: center;" onclick="sortTable(3)">SHIPPER NAME</th>
                                    <th style="text-align: center;" onclick="sortTable(4)">CONSIGNEE NAME</th>
                                    <th style="text-align: center;" onclick="sortTable(5)">CHECKER NAME</th>
                                    <th style="text-align: center;" onclick="sortTable(6)">DATE CREATED</th>
                                    <th style="text-align: center;">CONTAINER NUMBER</th>
                                    <th style="text-align: center;" onclick="sortTable(7)">OR#</th>
                                    <th style="text-align: center;" onclick="sortTable(8)">AR#</th>
                                    <th style="text-align: center;" onclick="sortTable(9)">TOTAL AMOUNT</th>
                                    <th style="text-align: center;">CARGO STATUS</th>
                                    <th style="text-align: center;">BL STATUS</th>
                                    <th style="text-align: center;">BL REMARK</th>
                                    <th style="text-align: center;">VIEW BL</th>
                                    <th style="text-align: center;">REMARK</th>
                                    <th style="text-align: center;">CREATED BY</th>
                                    <th style="text-align: center" scope="col" >Add OR/AR</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td style="text-align: center;">{{ $order->orderId }}</td>
                                    <td style="text-transform: uppercase; text-align: center;">{{ $order->consigneeName }}</td>
                                    <td style="text-transform: uppercase; text-align: center;">
                                        {{ $order->customer->fName ?? '' }} {{ $order->customer->lName ?? '' }}
                                    </td>
                                    <td style="text-transform: uppercase; text-align: center;">{{ $order->check }}</td>
                                    <td style="text-align: center;">{{ $order->created_at }}</td>
                                    <td style="text-transform: uppercase; text-align: center;">{{ $order->containerNum }}</td>
                                    <td style="text-align: center;">{{ $order->OR }}</td>
                                    <td style="text-align: center;">{{ $order->AR }}</td>
                                    <td style="text-align: center;">{{ number_format((($order->value) + ($order->totalAmount)) * 0.0075 + ($order->totalAmount), 2) }}</td>
                                    <td style="text-transform: uppercase; text-align: center;">{{ $order->cargo_status }}</td>
                                    <td style="text-align: center;">{{ $order->bl_status }}</td>
                                    <td style="text-transform: uppercase; text-align: center">{{ $order->mark}}</td>
                                    <td style="text-align: center;">
                                        <a href="{{ route('p.bl', ['key' => $order->orderId]) }}">VIEW</a>
                                    </td>
                                    <td style="text-transform: uppercase; text-align: center">{{ $order->mark}}</td>
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
                                                    <div class="col-md-4">
                                                        <form action="{{ route('s.remark', ['shipNum' => $shipNum, 'voyageNum' => $voyageNum, 'orderId' => $order->orderId, 'dock' => $dock, 'orig'=> $orig]) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="remark_orderId" value="{{ $order->orderId }}">
                                                            <div class="input-group mb-3">
                                                                <input type="text" name="remark" class="form-control @error('remark') is-invalid @enderror" placeholder="Remark" autocomplete="remark" value="{{ $order->mark }}">
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text">
                                                                        <span class="fas fa-comment"></span>
                                                                    </div>
                                                                </div>
                                                                @error('remark')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <button type="submit" class="btn btn-success w-100">
                                                                {{ __('Submit Remark') }}
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                        <p>Page: {{ $orders->currentPage() }}</p>

                        <hr style="border: none; border-top: 1px solid #D2D5DD; margin: 10px 0;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const table = document.getElementById('myTable2');
        const headers = table.querySelectorAll('th');
        const tableBody = table.querySelector('tbody');
        const rows = Array.from(tableBody.querySelectorAll('tr'));

        // Function to sort rows based on the column index
        const sortTable = (index, ascending) => {
            rows.sort((rowA, rowB) => {
                const cellA = rowA.children[index].textContent.trim();
                const cellB = rowB.children[index].textContent.trim();

                if (!isNaN(cellA) && !isNaN(cellB)) {
                    // Compare as numbers if both values are numeric
                    return ascending ? cellA - cellB : cellB - cellA;
                } else {
                    // Compare as strings otherwise
                    return ascending
                        ? cellA.localeCompare(cellB)
                        : cellB.localeCompare(cellA);
                }
            });

            // Append the sorted rows back to the table
            rows.forEach(row => tableBody.appendChild(row));
        };

        // Attach click events to headers for sorting
        headers.forEach((header, index) => {
            let ascending = true; // Initial sort order

            header.addEventListener('click', () => {
                // Toggle sort order on subsequent clicks
                ascending = !ascending;
                sortTable(index, ascending);

                // Optionally, update header styles to indicate sort order
                headers.forEach(h => h.classList.remove('ascending', 'descending'));
                header.classList.add(ascending ? 'ascending' : 'descending');
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


@endsection
