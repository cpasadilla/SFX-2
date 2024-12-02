@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Content Header (Page header) -->
<div class="content-header">
    <h1 style="padding-left:10px;">ORDERS BY SHIP AND VOYAGE</h1>
</div>

<div class="content">
  <div class="col-md-6">
      <form action="{{ route('p.search') }}" method="GET">
          <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search by Order ID or Customer ID">
              <div class="input-group-append">
                  <button type="submit" class="btn btn-success">Search</button>
              </div>
          </div>
      </form>
  </div>
<div class="content">
    <div class="container-fluid">
        @foreach($groupedOrders as $shipNum => $voyages)
            <div class="card">
                <div class="card-header">
                    <h5>Ship Number: {{ $shipNum }}</h5>
                </div>
                <div class="card-body">
                    @foreach($voyages as $voyageNum => $orders)
                        <h6>Voyage Number: {{ $voyageNum }}</h6>
                        <table class="table" id="myTable2">
                            <thead class="thead-light">
                                <tr>
                                    <th style="text-align: center">Order ID</th>
                                    <th style="text-align: center">Customer ID</th>
                                    <th style="text-align: center">Date Created</th>
                                    <th style="text-align: center">Voyage Number</th>
                                    <th style="text-align: center">Ship Number</th>
                                    <th style="text-align: center">Origin</th>
                                    <th style="text-align: center">Destination</th>
                                    <th>Total Amount</th>
                                    <th style="text-align: center">Status</th>
                                    <th style="text-align: center">View Bill of Lading</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $user)
                                    <tr>
                                        <td style="text-align: center">{{ $user->orderId }} </td>
                                        <td style="text-align: center">{{ $user->cID }}</td>
                                        <td style="text-align: center">{{ $user->orderCreated }}</td>
                                        <td style="text-align: center">{{ $user->voyageNum }}</td>
                                        <td style="text-align: center">{{ $user->shipNum }}</td>
                                        <td style="text-align: center">{{ $user->origin }}</td>
                                        <td style="text-align: center">{{ $user->destination }}</td>
                                        <td>{{ $user->totalAmount }}</td>
                                        <td><a href={{route('p.qr',['key'=>$user->orderId])}} >Print</a></td>
                                        <td style="text-align: center">
                                            <a href={{ route('p.bl',['key' => $user->orderId]) }}>View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr style="border: none; border-top: 1px solid #d2d5dd; margin: 10px 0;">
                    @endforeach
                </div><!-- /.card-body -->
            </div><!-- /.card -->
            <br>
        @endforeach
    </div><!-- /.container-fluid -->
</div>
@endsection


<script>
    function sortTable(n) {
      var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
      table = document.getElementById("myTable2");
      switching = true;
      // Set the sorting direction to ascending:
      dir = "asc";
      /* Make a loop that will continue until
      no switching has been done: */
      while (switching) {
        // Start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /* Loop through all table rows (except the
        first, which contains table headers): */
        for (i = 1; i < (rows.length - 1); i++) {
          // Start by saying there should be no switching:
          shouldSwitch = false;
          /* Get the two elements you want to compare,
          one from current row and one from the next: */
          x = rows[i].getElementsByTagName("TD")[n];
          y = rows[i + 1].getElementsByTagName("TD")[n];
          /* Check if the two rows should switch place,
          based on the direction, asc or desc: */
          if (dir == "asc") {
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
              // If so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
          } else if (dir == "desc") {
            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
              // If so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
          }
        }
        if (shouldSwitch) {
          /* If a switch has been marked, make the switch
          and mark that a switch has been done: */
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
          // Each time a switch is done, increase this count by 1:
          switchcount ++;
        } else {
          /* If no switching has been done AND the direction is "asc",
          set the direction to "desc" and run the while loop again. */
          if (switchcount == 0 && dir == "asc") {
            dir = "desc";
            switching = true;
          }
        }
      }
    }
    </script>
