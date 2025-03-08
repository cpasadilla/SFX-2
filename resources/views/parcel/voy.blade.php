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

    .table-sm {
        width: 100%; /* Make sure table uses full A4 width */
        font-size: 16px; /* Larger font for readability */
    }

    .table-sm th, .table-sm td {
        padding: 6px; /* More padding for spacing */
        text-align: center;
        white-space: normal; /* Allow text wrapping */
        word-wrap: break-word;
    }

    .table-sm th {
        font-weight: bold;
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
    }

    /* Reduce specific column sizes */
    .cont-col, .shipper-col, .consignee-col, .rmk-col {
        width: 80px; /* Smaller columns */
    }

    .num-col {
        width: 50px; /* Fixed width for numeric columns */
    }

    .crg-col {
        width: 40px; /* Fixed width for numeric columns */
    }

    /* Set table for A4 portrait PDF */
    @media print {
        body {
            width: 210mm; /* A4 width */
            height: 297mm; /* A4 height */
        }

        .table-sm {
            font-size: 14px; /* Keep readable size */
        }
    }
</style>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script> <!-- Include xlsx library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>

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
            <div class="col-md-6 text-right">
                <!-- Export Button -->
                <button id="exportBtn" class="btn btn-success">Export to Excel</button>
                <button id="exportPdfBtn" class="btn btn-danger">Export to PDF</button>
            </div>
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
                        <h6 style="font-size: 16px;">MASTER LIST FOR M/V EVERWIN STAR {{ $shipNum }} VOYAGE {{ $orig }}</h6>
                    </div>
                    <div class="card-body">
                        <table id="myTable2" class="table table-sm table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th class="num-col">BL#</th>
                                    <th style="text-align: center;">DATE CREATED</th>
                                    <th class="cont-col">CONTAINER#</th>
                                    <th class="shipper-col">SHIPPER</th>
                                    <th class="consignee-col">CONSIGNEE</th>
                                    <th class="check-col">CHECKER</th>
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
                                    <th class="crg-col">CARGO STATUS</th>
                                    <th style="text-align: center;">BL STATUS</th>
                                    <th class="rmk-col">REMARK</th>
                                    <th style="text-align: center;">CREATED BY</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($orders) && count($orders) > 0)
                                    @foreach($orders as $order)
                                        <tr>
                                            <td class="num-col">{{ $order->orderId }}</td>
                                            <td style="text-align: center;">{{ \Carbon\Carbon::parse($order->created_at)->format('m/d/Y') }}</td>
                                            <td class="cont-col">{{ strtoupper($order->containerNum) }}</td>
                                            <td class="shipper-col">{{ strtoupper($order->consigneeName) }}</td>
                                            <td class="consignee-col">
                                                {{ strtoupper(optional($order->customer)->fName ?? '') }} 
                                                {{ strtoupper(optional($order->customer)->lName ?? '') }}
                                            </td>
                                            <td class="rmk-col">{{ strtoupper($order->check) }}</td>
                                            <td style="font-size:15px; text-align: center;">
                                                @if(isset($order->parcels))
                                                    @foreach ($order->parcels as $parcel)
                                                        {{ $parcel->quantity }} {{ $parcel->unit }} - {{ $parcel->itemName }}<br>
                                                    @endforeach
                                                @else
                                                    No parcels available
                                                @endif
                                            </td>
                                            <td style="text-align: center;">{{ number_format($order->totalAmount, 2) }}</td>
                                            <td style="text-align: center;">{{ number_format(($order->value + $order->totalAmount) * 0.0075, 2) }}</td>
                                            <td style="text-align: center;">{{ number_format(($order->value + $order->totalAmount) * 0.0075 + $order->totalAmount, 2) }}</td>
                                            <td style="text-align: center;">{{ $order->OR }}</td>
                                            <td style="text-align: center;">{{ $order->AR }}</td>
                                            <td class="crg-col">{{ strtoupper($order->cargo_status) }}</td>
                                            <td style="text-align: center;">{{ $order->bl_status }}</td>
                                            <td class="rmk-col">{{ strtoupper($order->mark) }}</td>
                                            <td style="text-transform: uppercase; text-align: center">{{ $order->createdBy }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="15" style="text-align: center; color: red;">
                                            No orders found
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("exportBtn").addEventListener("click", function () {
        const table = document.getElementById("myTable2");
        const headers = ["BL#", "DATE CREATED", "CONTAINER#", "SHIPPER", "CONSIGNEE", "CHECKER", "DESCRIPTION", "TOTAL FREIGHT", "VALUATION", "TOTAL AMOUNT", "OR#", "AR#", "CARGO STATUS", "BL STATUS", "REMARK", "CREATED BY"];
        let data = [];

        // Extract table rows
        let rows = table.querySelectorAll("tbody tr");
        rows.forEach(row => {
            let rowData = [];
            let cells = row.querySelectorAll("td");
            cells.forEach(cell => rowData.push(cell.innerText.trim()));
            data.push(rowData);
        });

        // Create a new worksheet
        let ws = XLSX.utils.aoa_to_sheet([headers, ...data]);

        // Create a workbook and export
        let wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "MasterList");
        XLSX.writeFile(wb, "MasterList.xlsx");
    });

    // Sorting functionality
    document.querySelectorAll("th").forEach(th => {
        th.addEventListener("click", () => {
            const table = th.closest("table");
            const tbody = table.querySelector("tbody");
            const rows = Array.from(tbody.querySelectorAll("tr"));
            const index = Array.from(th.parentNode.children).indexOf(th);
            const isAscending = th.classList.contains("ascending");

            rows.sort((a, b) => {
                const aValue = a.children[index].textContent.trim();
                const bValue = b.children[index].textContent.trim();
                return aValue.localeCompare(bValue, undefined, { numeric: true });
            });

            if (!isAscending) {
                rows.reverse();
                th.classList.add("ascending");
                th.classList.remove("descending");
            } else {
                th.classList.add("descending");
                th.classList.remove("ascending");
            }

            tbody.innerHTML = "";
            rows.forEach(row => tbody.appendChild(row));
        });
    });
</script>
<script>
    function goBackToVoyage() {
        let shipNum = @json($shipNum);
        let voyageNum = @json($voyageNum);
        let dock = @json($dock);
        let orig = @json($orig);

        let url = `/parcels/${shipNum}/${voyageNum}/${dock}/${orig}`;
        window.location.href = url;
    }
</script>
<script>
    document.getElementById("exportPdfBtn").addEventListener("click", function () {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF('l', 'mm', 'a4'); // Landscape, millimeters, A4

        // Get Blade variables as JavaScript variables
        let shipNum = @json($shipNum);
        let orig = @json($orig);

        doc.setFontSize(12);
        doc.text(`MASTER LIST FOR M/V EVERWIN STAR ${shipNum} VOYAGE ${orig}`, 10, 10);

        const headers = [["BL#", "CONTAINER#", "SHIPPER", "CONSIGNEE", "CHECKER", "DESCRIPTION", "CARGO STATUS", "REMARK"]];
        let data = [];

        // Allowed words for description filtering
        const allowedWords = ["LPG", "RICE 25KG", "RICE 50KG", "CEMENT", "FUEL", "AVGAS", "BALIKBAYAN", "VARIOUS", "UK", "DRUMS", "DIESEL", "UNLEADED", "PREMIUM", "MOTOR", "FEED", "MODEL"];

        // Extract table data
        document.querySelectorAll("#myTable2 tbody tr").forEach(row => {
            let rowData = [];
            let cells = row.querySelectorAll("td");

            let descriptionText = cells[6].innerHTML.trim(); // Get raw HTML content for line breaks
            let filteredDescription = "";

            // Split by <br> tags to get each line separately
            let descriptionParts = descriptionText.split("<br>");
            descriptionParts.forEach(part => {
                let words = part.trim().split(" ");
                let quantity = words[0] || ""; // First word is quantity
                let unit = words[1] || "";     // Second word is unit
                let itemName = words.slice(2).join(" "); // Remaining words form item name

                // Check if itemName matches any allowed words
                let matchingWord = allowedWords.find(word => itemName.toUpperCase().includes(word));

                if (matchingWord) {
                    filteredDescription += `${quantity} ${unit} ${matchingWord}\n`; // Append item in multiple lines
                }
            });

            rowData.push(cells[0].innerText.trim());  // BL#
            rowData.push(cells[2].innerText.trim());  // CONTAINER#
            rowData.push(cells[3].innerText.trim());  // SHIPPER
            rowData.push(cells[4].innerText.trim());  // CONSIGNEE
            rowData.push(cells[5].innerText.trim());  // CHECKER
            rowData.push(filteredDescription.trim()); // DESCRIPTION (Mirrors table format)
            rowData.push(cells[12].innerText.trim()); // CARGO STATUS
            rowData.push(cells[14].innerText.trim()); // REMARK

            data.push(rowData);
        });

        doc.autoTable({
            head: headers,
            body: data,
            startY: 15, // Reduce top margin
            theme: 'striped',
            styles: { fontSize: 10, cellPadding: 2 },
            columnStyles: {
                0: { cellWidth: 18 },  // BL#
                1: { cellWidth: 30 },  // CONTAINER#
                2: { cellWidth: 40 },  // SHIPPER
                3: { cellWidth: 40 },  // CONSIGNEE
                4: { cellWidth: 30 },  // CHECKER
                5: { cellWidth: 55 },  // DESCRIPTION (Formatted with line breaks)
                6: { cellWidth: 30 },  // CARGO STATUS
                7: { cellWidth: 30 }   // REMARK
            },
            margin: { top: 10, left: 5, right: 5, bottom: 5 } // Remove margins
        });

        doc.save(`MasterList_Ship${shipNum}_Voyage${orig}.pdf`);
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

@endsection