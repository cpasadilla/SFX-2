@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="content-header">
    <h1 style="padding-left: 10px;">MASTERLIST FOR M/V EVERWIN STAR {{ $shipNum }} VOYAGE {{ $orig }}</h1>
    <br>
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
</div><!-- /.content-header -->

<!--Main Content-->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>VOYAGE {{ $voyageNum }}</h5>
                    </div>
                    <div class="card-body">
                        <table id="myTable2" class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th style="text-align: center;" onclick="sortTable(0)">ORDER ID</th>
                                    <th style="text-align: center;" onclick="sortTable(1)">CUSTOMER ID</th>
                                    <th style="text-align: center;" onclick="sortTable(2)">VOYAGE NUMBER</th>
                                    <th style="text-align: center;" onclick="sortTable(3)">CUSTOMER NAME</th>
                                    <th style="text-align: center;" onclick="sortTable(4)">CONSIGNEE NAME</th>
                                    <th style="text-align: center;" onclick="sortTable(5)">CHECKER NAME</th>
                                    <th style="text-align: center;" onclick="sortTable(6)">DATE CREATED</th>
                                    <th style="text-align: center;" onclick="sortTable(7)">OR#</th>
                                    <th style="text-align: center;" onclick="sortTable(8)">AR#</th>
                                    <th style="text-align: center;" onclick="sortTable(9)">TOTAL AMOUNT</th>
                                    <th style="text-align: center;">STATUS</th>
                                    <th style="text-align: center;">VIEW BL</th>
                                    <th style="text-align: center;">ADD OR/AR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td style="text-align: center;">{{ $order->orderId }}</td>
                                    <td style="text-align: center;">{{ $order->cID }}</td>
                                    <td style="text-align: center;">{{ $order->voyageNum }}</td>
                                    <td style="text-align: center;">
                                        {{ $order->customer->fName ?? '' }} {{ $order->customer->lName ?? '' }}
                                    </td>
                                    <td style="text-align: center;">{{ $order->consigneeName }}</td>
                                    <td style="text-align: center;">{{ $order->check }}</td>
                                    <td style="text-align: center;">{{ $order->created_at }}</td>
                                    <td style="text-align: center;">{{ $order->OR }}</td>
                                    <td style="text-align: center;">{{ $order->AR }}</td>
                                    <td style="text-align: center;">{{ $order->totalAmount }}</td>
                                    <td style="text-align: center;">{{ $order->status }}</td>

                                    <td style="text-align: center;">
                                        <a href="{{ route('p.bl', ['key' => $order->orderId]) }}">VIEW</a>
                                    </td>
                                    <td style="text-align: center;">
                                        <span 
                                            data-toggle="modal" 
                                            data-target="#deleteUserModal{{ $order->orderId }}" 
                                            style="color: rgb(14, 143, 195); cursor: pointer;">
                                            ADD
                                        </span>
                                    </td>
                                    
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
                        </table>
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
