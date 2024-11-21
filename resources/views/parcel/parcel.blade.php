@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <h1 style="padding-left:10px;">Bill of Lading for Order #{{ $order->orderId }}</h1>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"></div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
                <a href="{{ route('p.view') }}" class="btn btn-primary">Back to Orders</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>Order Details</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer ID</th>
                            <th>Date Created</th>
                            <th>Voyage Number</th>
                            <th>Ship Number</th>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $order->orderId }}</td>
                            <td>{{ $order->cID }}</td>
                            <td>{{ $order->orderCreated }}</td>
                            <td>{{ $order->voyageNum }}</td>
                            <td>{{ $order->shipNum }}</td>
                            <td>{{ $order->origin }}</td>
                            <td>{{ $order->destination }}</td>
                            <td>{{ $order->totalAmount }}</td>
                            <td>
                                @if($order->status == 'inProgress')
                                    <p class="bg-primary text-white" style="border-radius:25px; text-align:center;">IN PROGRESS</p>
                                @else
                                    <p class="bg-success text-white" style="border-radius:25px; text-align:center;">COMPLETE</p>
                                @endif
                            </td>
                            <td style="text-align: center">
                                <a href="{{ route('p.bl', ['orderId' => $user->orderId]) }}">View</a>
                            </td>
                            
                        </tr>
                    </tbody>
                </table>

                <div class="card-footer">
                    <h5>Additional Information</h5>
                    <p><strong>Note:</strong> You can add any additional information about the order or shipping details here.</p>
                </div>
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.container-fluid -->
</div><!-- /.content -->

@endsection
<script>
    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("myTable2");
        switching = true;
        // Set the sorting direction to ascending:
        dir = "asc";
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount++;
            } else {
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
</script>
