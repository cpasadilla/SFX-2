@extends('layouts.app')
@section('content')
<style>
    /* Improved CSS for better layout and design */
    .register-button {
        position: fixed;
        left: 50%;
    }

    th {
        cursor: pointer;
        position: relative;
        padding: 8px !important; /* Reduced padding */
        font-size: 14px; /* Smaller font size */
    }

    th.ascending::after {
        content: ' \25B2'; /* Up arrow */
    }

    th.descending::after {
        content: ' \25BC'; /* Down arrow */
    }

    .filter-container {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        align-items: center;
        margin-bottom: 10px;
    }

    .filter-container select,
    .filter-container input {
        width: auto;
        min-width: 120px; /* Reduced min-width */
        padding: 4px; /* Reduced padding */
        border-radius: 4px;
        border: 1px solid #ccc;
        font-size: 12px; /* Smaller font size */
    }

    .search-box {
        flex: 1;
        max-width: 200px; /* Reduced max-width */
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
        padding: 0.3rem 0.5rem; /* Reduced padding */
        margin-left: -1px;
        line-height: 1.25;
        color: #000000;
        background-color: #fff;
        border: 1px solid #dee2e6;
        font-size: 12px; /* Smaller font size */
    }

    .card {
        min-height: 100%;
        height: auto;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        overflow-x: auto;
        white-space: nowrap;
        padding: 10px; /* Reduced padding */
    }
    
    /* Custom scrollbar for WebKit browsers (Chrome, Safari) */
    .card-body::-webkit-scrollbar {
        height: 8px; /* Height of the horizontal scrollbar */
    }
    
    .card-body::-webkit-scrollbar-track {
        background: #f1f1f1; /* Track color */
        border-radius: 4px;
    }
    
    .card-body::-webkit-scrollbar-thumb {
        background: #888; /* Thumb color */
        border-radius: 4px;
    }
    
    .card-body::-webkit-scrollbar-thumb:hover {
        background: #555; /* Thumb color on hover */
    }
    
    .table {
        width: 100%;
        min-width: 1200px; /* Set a minimum width to ensure horizontal scrolling */
        border-collapse: collapse;
        font-size: 12px; /* Smaller font size */
    }

    .table th,
    .table td {
        padding: 8px; /* Reduced padding */
        text-align: center;
        border: 1px solid #dee2e6;
    }

    .table th {
        background-color: #f8f9fa;
        font-weight: bold;
    }

    .table tr:hover {
        background-color: #f1f1f1;
    }
    
    /* Optional: Add a fixed header for better usability */
    .table thead {
        position: sticky;
        top: 0;
        background-color: #f8f9fa; /* Match the header background */
        z-index: 1; /* Ensure the header stays above the table rows */
    }

    .btn-group {
        margin-bottom: 10px;
    }

    .btn-group .btn {
        margin-right: 5px;
        padding: 5px 10px; /* Reduced padding */
        font-size: 12px; /* Smaller font size */
    }

    .modal-content {
        border-radius: 8px;
    }

    .modal-header {
        background-color: #78BF65;
        color: #fff;
        border-radius: 8px 8px 0 0;
    }

    .modal-title {
        font-weight: bold;
    }

    .modal-body {
        padding: 15px; /* Reduced padding */
    }

    .input-group {
        margin-bottom: 10px;
    }

    .input-group-text {
        background-color: #f8f9fa;
        border: 1px solid #ccc;
        padding: 4px; /* Reduced padding */
    }

    .fas.fa-pencil {
        cursor: pointer;
    }

    .fas.fa-pencil:hover {
        color: #78BF65;
    }

    /* Compact dropdowns */
    .searchable-dropdown {
        width: 120px; /* Reduced width */
        padding: 4px; /* Reduced padding */
        font-size: 12px; /* Smaller font size */
    }

    /* Ensure dropdowns don't overflow */
    .table th {
        overflow: hidden;
        white-space: nowrap;
    }

    /* Column visibility toggle */
    .column-toggle {
        margin-bottom: 10px;
    }

    .column-toggle label {
        margin-right: 10px;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="content-header">
    <h1 style="padding-left: 10px; display: flex; align-items: center; gap: 8px;">
        <span onclick="goBackToVoyage()" style="cursor: pointer; font-size: 24px; color: #1d4ed8;">
            ←
        </span>
        MASTER LIST FOR M/V EVERWIN STAR {{ $shipNum }} VOYAGE {{ $orig }}
    </h1>
    <br>
    <div class="container-fluid">
        <div class="row mb-2">
            <!-- Search Form Column -->
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

            <!-- Button Column -->
            <div class="col-md-6 text-right">
                <a href="{{ route('parcels.showVoy', ['shipNum' => $shipNum, 'voyageNum' => $voyageNum, 'dock' => $dock, 'orig' => $orig]) }}" class="btn btn-primary">
                    Go to Voyage Details
                </a>
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
                        <!-- Column Visibility Toggle -->
                        <div class="column-toggle">
                            <label><input type="checkbox" class="column-toggle-checkbox" data-column="0" checked> BL#</label>
                            <label><input type="checkbox" class="column-toggle-checkbox" data-column="1" checked> DATE CREATED</label>
                            <label><input type="checkbox" class="column-toggle-checkbox" data-column="2" checked> CONTAINER#</label>
                            <label><input type="checkbox" class="column-toggle-checkbox" data-column="3" checked> SHIPPER</label>
                            <label><input type="checkbox" class="column-toggle-checkbox" data-column="4" checked> CONSIGNEE</label>
                            <label><input type="checkbox" class="column-toggle-checkbox" data-column="5" checked> CHECKER</label>
                            <label><input type="checkbox" class="column-toggle-checkbox" data-column="6" checked> DESCRIPTION</label>
                            <label><input type="checkbox" class="column-toggle-checkbox" data-column="7" checked> TOTAL FREIGHT</label>
                            <label><input type="checkbox" class="column-toggle-checkbox" data-column="8" checked> VALUATION</label>
                            <label><input type="checkbox" class="column-toggle-checkbox" data-column="9" checked> TOTAL AMOUNT</label>
                            <label><input type="checkbox" class="column-toggle-checkbox" data-column="10" checked> OR#</label>
                            <label><input type="checkbox" class="column-toggle-checkbox" data-column="11" checked> AR#</label>
                            <label><input type="checkbox" class="column-toggle-checkbox" data-column="12" checked> CARGO STATUS</label>
                            <label><input type="checkbox" class="column-toggle-checkbox" data-column="13" checked> BL STATUS</label>
                            <label><input type="checkbox" class="column-toggle-checkbox" data-column="14" checked> BL REMARK</label>
                            <label><input type="checkbox" class="column-toggle-checkbox" data-column="15" checked> VIEW BL</label>
                            <label><input type="checkbox" class="column-toggle-checkbox" data-column="16" checked> CREATED BY</label>
                            <label><input type="checkbox" class="column-toggle-checkbox" data-column="17" checked> Add OR/AR</label>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $orders->links() }}
                        <table id="myTable2" class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>BL# 
                                        <select class="filter searchable-dropdown" name="orderId">
                                            <option value="">All</option>
                                            <option disabled>Search...</option>
                                            @foreach($filterOrders->pluck('orderId')->filter()->unique()->sort() as $value)
                                                <option value="{{ $value }}" {{ request()->query('orderId') == $value ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th style="text-align: center;">DATE CREATED</th>
                                    <th>CONTAINER# 
                                        <select class="filter searchable-dropdown" name="containerNum">
                                            <option value="">All</option>
                                            <option disabled>Search...</option>
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
                                            @foreach($filterOrders->pluck('check')->unique()->sort() as $value)
                                                <option value="{{ $value }}" {{ request()->query('check') == $value ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th>
                                        DESCRIPTION
                                        <select id="descriptionFilter" class="form-control form-control-sm" style="width: 120px; display: inline-block;">
                                            <option value="">All</option>
                                            @foreach($orders->pluck('parcels')->flatten()->pluck('itemName')->unique()->sort() as $desc)
                                                <option value="{{ $desc }}">{{ $desc }}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th style="text-align: center;">TOTAL FREIGHT</th>
                                    <th style="text-align: center;">VALUATION</th>
                                    <th style="text-align: center;">TOTAL AMOUNT</th>
                                    <th style="text-align: center;">OR#</th>
                                    <th style="text-align: center;">AR#</th>
                                    <th>CARGO STATUS 
                                        <select class="filter" name="cargo_status">
                                            <option value="">All</option>
                                            @foreach($filterOrders->pluck('cargo_status')->unique()->sort() as $value)
                                                <option value="{{ $value }}" {{ request()->query('cargo_status') == $value ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th>BL STATUS 
                                        <select class="filter" name="bl_status">
                                            <option value="">All</option>
                                            @foreach($filterOrders->pluck('bl_status')->unique()->sort() as $value)
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
                                            @foreach($filterOrders->pluck('createdBy')->unique()->sort() as $value)
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
                                    <td style="text-align: center;">{{ $order->created_at }}</td>
                                    <td style="text-transform: uppercase; text-align: center;">{{ $order->containerNum }}</td>
                                    <td style="text-transform: uppercase; text-align: center;">{{ $order->consigneeName }}</td>
                                    <td style="text-transform: uppercase; text-align: center;">
                                        {{ $order->cID }} - {{ $order->customer->fName ?? '' }} {{ $order->customer->lName ?? '' }}
                                    </td>
                                    <td style="text-transform: uppercase; text-align: center;">{{ $order->check }}</td>
                                    <td style="text-align: center;">
                                                @if(isset($order->parcels))
                                                    @foreach ($order->parcels as $parcel)
                                                        {{ $parcel->quantity }} {{ $parcel->unit }} - {{ $parcel->itemName }}<br>
                                                    @endforeach
                                                @else
                                                    No parcels available
                                                @endif
                                            </td>
                                    <td contenteditable="true" class="editable" data-field="totalAmount" data-id="{{ $order->orderId }}">
                                        {{ number_format($order->totalAmount, 2) }}
                                    </td>
                                    <td contenteditable="true" class="editable" data-field="valuation" data-id="{{ $order->orderId }}">
                                        {{ number_format(($order->value + $order->totalAmount) * 0.0075, 2) }}
                                    </td>
                                    <td class="total-amount" data-id="{{ $order->orderId }}">
                                        {{ number_format(($order->value + $order->totalAmount) * 0.0075 + $order->totalAmount, 2) }}
                                    </td>
                                    <td contenteditable="true" class="editable" data-field="OR" data-id="{{ $order->orderId }}">
                                        {{ $order->OR }}
                                    </td>
                                    <td contenteditable="true" class="editable" data-field="AR" data-id="{{ $order->orderId }}">
                                        {{ $order->AR }}
                                    </td>
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
                                                            <input type="hidden" name="page" value="{{ request()->input('page', 1) }}">
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
                                                            <input type="hidden" name="page" value="{{ request()->input('page', 1) }}">
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
                                <td colspan="7" style="text-align: right;">OVERALL TOTAL FOR SHIP #{{ $shipNum }} - VOYAGE #{{ $voyageNum }}:</td>
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
            let wrapper = document.createElement("div");
            wrapper.style.position = "relative";
            let searchBox = document.createElement("input");
            searchBox.type = "text";
            searchBox.placeholder = "Search...";
            searchBox.classList.add("searchable-dropdown");

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
<script>
    $(document).ready(function () {
        $('.filter').on('keyup', function () {
            var columnName = $(this).attr('name');
            var filterValue = $(this).val().toLowerCase();
            $('tbody tr').each(function () {
                var cellText = $(this).find('td[data-column="' + columnName + '"]').text().toLowerCase();
                $(this).toggle(cellText.includes(filterValue));
            });
        });
    });
</script>
<script>
    function goBackToVoyage() {
        let shipNum = @json($shipNum);
        let voyageNum = @json($voyageNum);
        let dock = @json($dock);
        let orig = @json($orig);

        let url = `/orders/ship_${shipNum}/voyage_${voyageNum}/dock_${dock}/${orig}`;
        window.location.href = url;
    }
</script>
<script>
$(document).ready(function () {
    $(".editable").on("blur", function () {
        let orderId = $(this).data("id");   // Get Order ID
        let field = $(this).data("field");  // Get the field name
        let newValue = $(this).text().trim().replace(/,/g, ''); // Remove commas and trim spaces

        // Convert to float if it's a numeric field
        if (["totalAmount", "valuation"].includes(field)) {
            newValue = parseFloat(newValue);
            if (isNaN(newValue)) {
                alert("Invalid input. Please enter a valid number.");
                $(this).text(""); // Reset input if invalid
                return;
            }
        }

        // Send AJAX request to update database
        $.ajax({
            url: "{{ route('parcels.updateOrderField') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                orderId: orderId,
                field: field,
                value: newValue
            },
            success: function (response) {
                // If TOTAL FREIGHT or VALUATION is updated, recalculate TOTAL AMOUNT
                if (["totalAmount", "valuation"].includes(field)) {
                    let newTotalFreight = parseFloat($(`td[data-field='totalAmount'][data-id='${orderId}']`).text().replace(/,/g, '')) || 0;
                    let newValuation = parseFloat($(`td[data-field='valuation'][data-id='${orderId}']`).text().replace(/,/g, '')) || 0;
                    let newTotalAmount = (newTotalFreight + newValuation).toFixed(2);

                    $(`td.total-amount[data-id='${orderId}']`).text(newTotalAmount);
                }
            },
            error: function () {
                alert("Error updating value. Please try again.");
            }
        });
    });
});
</script>
<script>
$(document).ready(function () {
    $("#descriptionFilter").on("change", function () {
        var selectedDescription = $(this).val().toLowerCase();

        $("#myTable2 tbody tr").each(function () {
            var descriptionCell = $(this).find("td:nth-child(7)"); // Target DESCRIPTION column
            var fullDescriptionText = descriptionCell.html(); // Get full content including <br> tags
            
            if (selectedDescription === "") {
                descriptionCell.html(fullDescriptionText); // Restore original content
                $(this).show();
            } else {
                let filteredContent = "";
                let lines = fullDescriptionText.split("<br>");

                // Filter out only the matching item descriptions
                lines.forEach(line => {
                    if (line.toLowerCase().includes(selectedDescription)) {
                        filteredContent += line + "<br>";
                    }
                });

                if (filteredContent !== "") {
                    descriptionCell.html(filteredContent); // Show only matching items
                    $(this).show();
                } else {
                    $(this).hide();
                }
            }
        });
    });
});
</script>
<!-- Column Visibility Toggle Script -->
<script>
$(document).ready(function () {
    $(".column-toggle-checkbox").on("change", function () {
        var columnIndex = $(this).data("column");
        var isChecked = $(this).is(":checked");

        // Toggle visibility of the column
        $("#myTable2 th:nth-child(" + (columnIndex + 1) + "), #myTable2 td:nth-child(" + (columnIndex + 1) + ")").toggle(isChecked);
    });
});
</script>

@endsection