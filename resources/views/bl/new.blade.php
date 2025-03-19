<!--View BL with no Price-->
@extends('layouts.app')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.3/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.3/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>

<style>
    @media print {
        html, body {
            margin: 0;
            padding: 0;
            width: 8.5in; /* Letter width */
            height: 11in; /* Letter height */
            overflow: hidden;
        }
        footer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            font-size: 12px;
            background: #fff;
            padding-bottom: 10px;
        }
        .card {
            display: block;
            width: 8.5in; /* Exactly the paper width */
            height: 12.5in; /* Exactly the paper height */
            margin: 0 !important; /* Remove margins */
            padding: 0 !important; /* Remove padding */
            box-sizing: border-box;
            position: relative; /* Ensure relative positioning for content */
        }
        #printContainer {
            width: 8.5in;
            height: 12.5in;
            margin: 0 !important;
            padding: 0 !important;
            box-sizing: border-box;
            position: relative; /* Ensure relative positioning for footer */
        }
        .btn {
            display: none !important;
        }
        .delete-row {
            display: none !important; /* Hide delete buttons during print */
        }
        .table {
            width: 100%; /* Ensure table spans full width */
            max-height: calc(100% - 200px); /* Prevent table from overflowing */
            overflow: hidden;
        }
        /* Ensure the table header uses exact colors */
        .table th {
            background-color: #78BF65 !important; /* Ensure the header background color */
            color: #fff !important; /* Ensure the header text color */
            -webkit-print-color-adjust: exact; /* For WebKit browsers (e.g., Chrome, Edge) */
            print-color-adjust: exact; /* For other browsers */
        }
        .table td:nth-child(3) { /* Target the "DESCRIPTION" column */
            text-align: left !important; /* Align text to the left */
        }
        .table td:nth-child(7) { /* Target the "RATE" column */
            text-align: right !important; /* Align text to the right */
        }
        /* Adjust table rows for consistent spacing */
        .table td, .table th {
            padding: 5px; /* Adjust padding for better fit */
            font-size: 12px; /* Adjust font size if necessary */
            line-height: 1; /* Remove extra line height */
        }
        .table td {
            text-align: center; /* Center-align all table cells */
        }
        /* Ensure no overflow for responsive elements */
        .table-responsive, #top {
            overflow: hidden !important; /* Prevent overflow */
        }
        #everwinStarInput {
            display: none; /* Hide the dropdown during print */
        }
        #everwinStarText {
            display: inline-block; /* Show the text span during print */
        }

        @page {
            margin: 0; /* Ensures no margin at the page level */
            size: letter; /* Ensures the content fits the page */
        }
        .content-container {
            width: 100%; /* Expands the content to fill the width */
            max-width: none; /* Removes any max-width constraints */
        }
        /*NEW ADDITIONS*/
        #con {
            display: flex;
            flex-wrap: wrap;
        }
        #cd-1{
            flex: 0 0 8.33%;
            max-width: 8.33%;
        }
        #cd-3{
            flex: 0 0 25%;
            max-width: 25%;
        }
        #cd-4{
            flex: 0 0 33.33%;
            max-width: 33.33%;
        }
        #cd-5{
            flex: 0 0 41.67%;
            max-width: 41.67%;
        }
        #cd-7{
            flex: 0 0 58.33%;
            max-width: 58.33%;
        }
    }
    /* On-screen layout adjustments */
    .table td, .table th {
        line-height: 1; /* Remove extra line height on screen */
    }
    .table td:nth-child(3) { /* Target the "DESCRIPTION" column */
        text-align: left; /* Align text to the left */
    }
    .table td:nth-child(7) { /* Target the "RATE" column */
        text-align: right; /* Align text to the right */
    }
    .card {
        width: 8.5in;
        height: 12.5in; /* Exactly the paper height */
        margin: auto;
        padding: 0;
        box-sizing: border-box;
    }
    #printContainer {
        width: 8.5in;
        height: 12.5in;
        margin: auto;
        padding: 0;
        box-sizing: border-box;
        position: relative;
    }
    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        font-size: 12px;
        background: #fff;
        padding-bottom: 10px;
    }
    <style>
    .table td {
        text-align: center; /* Center-align all table cells */
    }
    .table-container {
        overflow-y: auto;
        margin-bottom: 10px;
        background-color: #f9f9f9; /* Optional: Add a background color */
        /* Remove or increase max-height */
        max-height: none; /* Allow unlimited rows */
    }
</style>

<div class="container" id="element1">
    <br>
    <div class="col text-right">
        <button class="btn btn-success" onclick="printContent('printContainer')">PRINT</button>
    </div>
</div><br>
<!-- PRINT BLOCK -->
<div class="d-print-block">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card" style="width: 885px;">
            <div class="card-body" id="printContainer" style="width: 875px; padding:0;">
                <div class="row" id="top" style="background-color: #ffffff; color: black; margin: 0; padding: 10px; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
                    <div style="display: flex; justify-content: center; align-items: center; padding-left: 5px;">
                        <img style="width: 700px; height: 100px;" src="{{ asset('images/logo-sfx.png') }}" alt="Logo">
                    </div>
                    <div style="align-items: center;">
                        <p style="font-family: Arial; font-size: 14px; margin: 0;">
                            National Road Brgy. Kaychanarianan Basco Batanes
                        </p>
                        <p style="font-family: Arial; font-size: 14px; margin: 0;">
                            Cellphone Nos.: 0908-815-9300 / 0999-889-5848 / 0999-889-5849
                        </p>
                        <p style="font-family: Arial; font-size: 14px; margin: 0;">
                            Email Address: fxavier_2015@yahoo.com.ph
                        </p>
                    </div>
                </div>
                <div class="row" style="padding: 0; margin: 0; display: flex; justify-content: space-between; align-items: center;">
                    <div style="flex: 1; display: flex; justify-content: center;">
                        <span style="font-family: Arial; font-weight: bold; font-size: 20px; padding-left:50px;">BILL OF LADING</span>
                    </div>
                </div>
                <!-- Display the empty <p> tag when status is null or blank -->
                    <div style="display: flex; font-weight: bold; justify-content: flex-end; align-items: center; padding-right:30px; font-size: 15px; ">
                        <span style="color: white;"></span>
                    </div>

                <div class="row" style="padding-left:30px; padding-right:10px;font-size:14px">
                    <div class="col-md-3" id="cd-3">
                        <strong>M/V EVERWIN STAR</strong>
                        <select id="everwinStarInput" style="text-align: center; display: inline-block; width: 30%; border: none; border-bottom: 1px solid black; -webkit-appearance: none; -moz-appearance: none; appearance: none; background: transparent;">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <br>
                    </div>
                    <div class="col-md-3"id="cd-3">
                        <strong>VOYAGE NO.</strong> <input type="text" style="text-align: center;display: inline-block; width: 50%; border: none; border-bottom: 1px solid black;" /><br>
                    </div>
                    <div class="col-md-3"id="cd-3">
                        <strong>CONTAINER NO.</strong><input type="text" style="text-transform: uppercase; text-align: center;display: inline-block; width: 40%; border: none; border-bottom: 1px solid black;" /><br>
                    </div>
                    <div class="col-md-3"id="cd-3">
                        <strong>BL NO.</strong> <input type="text" style="text-align: center;display: inline-block; width: 60%; border: none; border-bottom: 1px solid black;" /><br>
                    </div>
                </div>
                <div class="row" style="padding-left:30px; padding-right:10px;font-size:14px">
                    <div class="col-md-4" id="cd-4">
                        <strong>ORIGIN:</strong>
                        <select id="originInput" style="text-transform: uppercase; text-align: center; display: inline-block; width: 70%; border: none; border-bottom: 1px solid black; -webkit-appearance: none; -moz-appearance: none; appearance: none; background: transparent;">
                            <option value="MANILA">MANILA</option>
                            <option value="BATANES">BATANES</option>
                        </select>
                        <br>
                    </div>
                    <div class="col-md-4" id="cd-4">
                        <strong>DESTINATION:</strong>
                        <select id="destinationInput" style="text-transform: uppercase; text-align: center; display: inline-block; width: 60%; border: none; border-bottom: 1px solid black; -webkit-appearance: none; -moz-appearance: none; appearance: none; background: transparent;">
                            <option value="BATANES">BATANES</option>
                            <option value="MANILA">MANILA</option>
                        </select>
                        <br>
                    </div>
                    <div class="col-md-4" id="cd-4">
                        <strong>DATE:</strong> 
                        <input type="text" id="currentDate" style="text-transform: uppercase; text-align: center; display: inline-block; width: 75%; border: none; border-bottom: 1px solid black;" readonly /><br>
                    </div>
                </div>
                <p style="font-size: 5px;"></p>
                <div class="row" style="padding-left:30px; padding-right:10px;font-size:14px">
                    <div class="col-md-5" id="cd-5">
                        <strong>SHIPPER:</strong> 
                        <input type="text" style="text-transform: uppercase; text-align: center; display: inline-block; width: 83%; border: none; border-bottom: 1px solid black;" /><br>
                    </div>
                    <div class="col-md-7" style="text-align: right; padding-right:30px;" id="cd-7">
                        <strong>CONSIGNEE:</strong> 
                        <input type="text" style="text-transform: uppercase; text-align: center; display: inline-block; width: 69%; border: none; border-bottom: 1px solid black;" /><br>
                    </div>
                </div>
                <div class="row" style="padding-left:30px; font-size:14px">
                    <div class="col-md-5" id="cd-5">
                        <strong>CONTACT NO.</strong> 
                        <input type="text" style="text-align: center; display: inline-block; width: 75%; border: none; border-bottom: 1px solid black;" /><br>
                    </div>
                    <div class="col-md-7" style="text-align: right; padding-right:40px;" id="cd-7">
                        <strong>CONTACT NO.</strong> 
                        <input type="text" style="text-align: center; display: inline-block; width: 69%; border: none; border-bottom: 1px solid black;" /><br>
                    </div>
                </div>
                <div class="row" style="padding-left:30px; font-size:14px">
                    <div class="col-md-5" id="cd-5">
                        <strong>GATE PASS NO.</strong> 
                        <input type="text" style="text-align: center; display: inline-block; width: 73%; border: none; border-bottom: 1px solid black;" /><br>
                    </div>
                    <div class="col-md-7" style="text-align: right; padding-right:40px;" id="cd-7">
                        <strong>REMARK:</strong> 
                        <input type="text" style="text-transform: uppercase; text-align: center; display: inline-block; width: 69%; border: none; border-bottom: 1px solid black;" /><br>
                    </div>
                </div>
                <p style="font-size: 5px;"></p>
                <!-- Wrap the table and button in a container -->
                <div class="table-container" style="max-height: 500px; overflow-y: auto; margin-bottom: 10px;">
                    <table class="table table-condensed" id="mainTable" style="margin: 0;">
                        <thead style="background-color: #78BF65; color: white;">
                            <tr>
                                <th style="text-align: center;">QTY</th>
                                <th style="text-align: center;">UNIT</th>
                                <th>DESCRIPTION</th>
                                <th>VALUE</th>
                                <th>WEIGHT</th>
                                <th>MEASUREMENT</th>
                                <th>RATE</th>
                                <th>FREIGHT</th>
                                <th style="text-align: center;">ACTION</th> <!-- New column for delete button -->
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Initial row -->
                            <tr style="font-size:14px">
                                <td style="text-align: center;"><input type="number" style="font-size:15px; text-align: center; width: 100%; border: none;" oninput="calculateFreight()" /></td>
                                <td style="text-align: center;"><input type="text" style="font-size:15px; text-align: center; text-transform: uppercase; width: 100%; border: none;" /></td>
                                <td><input type="text" style="font-size:15px; text-transform: uppercase; width: 100%; border: none; white-space: normal;" /></td>
                                <td style="text-align: center;"><input type="text" style="width: 100%; text-align: center; border: none;" /></td>
                                <td style="text-align: center;"><input type="text" style="width: 100%; text-align: center; border: none;" /></td>
                                <td style="text-align: center;"><input type="text" style="width: 100%; text-align: center; border: none;" /></td>
                                <td style="text-align: right;"><input type="number" style="width: 100%; border: none; text-align: right;" oninput="calculateFreight()" /></td>
                                <td style="text-align: center;"><input type="text" style="width: 100%; border: none; background-color: #f9f9f9; text-align: center;" readonly /></td>
                                <td style="text-align: center;">
                                    <button class="btn btn-danger btn-sm delete-row" onclick="deleteRow(this)">Delete</button>
                                </td>
                            </tr>
                            <!-- VALUE row -->
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <input type="text" value="VALUE:" style="font-size:15px; color: black; font-weight: bold; width: 100%; border: none; text-align: left;" />
                                </td>
                                <td></td>
                                <td></td>
                                <td style="font-weight: bold; text-align: center;">
                                    <input type="text" value="₱" style="font-size:15px; color: black; font-weight: bold; width: 100%; text-align: center; border: none;" />
                                </td>
                                <td style="font-weight: bold; text-align: center;">
                                    <input type="text" style="font-size:15px; color: black; font-weight: bold; width: 100%; text-align: center; border: none;" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Keep the button outside the scrollable container -->
                <div class="text-center">
                    <button class="btn btn-primary mt-2" onclick="addRow()">Add Row</button>
                </div>
                <p style="font-size: 5px;"></p>
                <footer>
                    <div class="row pl-3">
                        <div class="col-md-12" id="cd-3" style="font-size: 15px; margin: 0; padding: 0;">
                            <p style="margin: 0;"><strong style="color: black;">Terms and Conditions:</strong></p>
                        </div>
                    </div>
                    <div class="row pl-3" style="margin: 0; padding: 0;">
                        <div class="col-md-12" style="font-size: 15px; margin: 0; padding: 0;">
                            <p style="margin: 0;">1. We are not responsible for losses and damages due to improper packing.</p>
                        </div>
                    </div>
                    <div class="row pl-3" style="margin: 0; padding: 0;">
                        <div class="col-md-12" style="font-size: 15px; margin: 0; padding: 0;">
                            <p style="margin: 0;">2. Claims on cargo losses and/or damages must be filed within 5 (five) days after unloading.</p>
                        </div>
                    </div>
                    <div class="row pl-3" style="margin: 0; padding: 0;">
                        <div class="col-md-12" style="font-size: 15px; margin: 0; padding: 0;">
                            <p style="margin: 0;">3. Unclaimed cargoes shall be considered forfeited after 30 (thirty) days upon unloading.</p>
                        </div>
                    </div>
                    <div class="row pl-3">
                        <div class="col-md-7"id="cd-7"></div>
                        <div class="col-md-4" style="display: flex; justify-content: space-between; align-items: center;"id="cd-4">
                            <span style="text-align: right; font-size: 15px;">Freight :</span>
                            <input type="text" style="width: 50%; border: none; border-bottom: 1px solid black; text-align: center;" />
                        </div>
                        <div class="col-md-1" style="padding-left:20px;"id="cd-1"></div>
                    </div>
                    <div class="row pl-3">
                        <div class="col-md-7" style="padding-left:60px; font-size: 15px;"id="cd-7">Received on board vessel in apparent good condition.</div>
                        <div class="col-md-4" style="display: flex; justify-content: space-between; align-items: center;"id="cd-4">
                            <span style="text-align: right; font-size: 15px;">Valuation :</span>
                            <input type="text" style="width: 50%; border: none; border-bottom: 1px solid black; text-align: center;" />
                        </div>
                        <div class="col-md-1" style="padding-left:20px;"id="cd-1"></div>
                    </div>
                    <div class="row pl-3">
                        <div class="col-md-7"id="cd-7"></div>
                        <div class="col-md-4" style="display: flex; justify-content: space-between; align-items: center;"id="cd-4">
                            <span style="text-align: right; font-size: 15px;">Wharfage :</span>
                            <input type="text" style="width: 50%; border: none; border-bottom: 1px solid black; text-align: center;" />
                        </div>
                        <div class="col-md-1" style="padding-left:20px;"id="cd-1"></div>
                    </div>
                    <div class="row pl-3">
                        <div class="col-md-7" style="display: flex; justify-content: space-between; align-items: center; padding-left:45px;" id="cd-7">
                            <select id="nameDropdown" style="width: 90%; border: none; border-bottom: 1px solid black; text-align: center; -webkit-appearance: none; -moz-appearance: none; appearance: none; background: transparent;">
                                <option value=" "> </option>
                                <option value="ALDAY">ALDAY</option>
                                <option value="ANCHETA">ANCHETA</option>
                                <option value="BERNADOS">BERNADOS</option>
                                <option value="CACHO">CACHO</option>
                                <option value="ESGUERRA">ESGUERRA</option>
                                <option value="MORENO">MORENO</option>
                                <option value="VICTORIANO">VICTORIANO</option>
                                <option value="YUMUL">YUMUL</option>
                                <option value="ZERRUDO">ZERRUDO</option>
                                <option value="SOL">SOL</option>
                                <option value="TIRSO">TIRSO</option>
                                <option value="VARGAS">VARGAS</option>
                                <option value="NICK">NICK</option>
                                <option value="JOSIE">JOSIE</option>
                                <option value="JEN">JEN</option>
                            </select>
                        </div>
                        <div class="col-md-4" style="display: flex; justify-content: space-between; align-items: center;"id="cd-4">
                            <span style="text-align: right; font-size: 15px;">VAT :</span>
                            <input type="text" style="width: 50%; border: none; border-bottom: 1px solid black; text-align: center;" />
                        </div>
                        <div class="col-md-1" style="padding-left:20px;"id="cd-1"></div>
                    </div>
                    <div class="row pl-3">
                        <div class="col-md-7" style="padding-left:130px; font-size: 15px;"id="cd-7">Vessel's Checker or Authorized Representative</div>
                        <div class="col-md-4" style="display: flex; justify-content: space-between; align-items: center;"id="cd-4">
                            <span style="text-align: right; font-size: 15px;">Other Charges :</span>
                            <input type="text" style="width: 50%; border: none; border-bottom: 1px solid black; text-align: center;" />
                        </div>
                        <div class="col-md-1" style="padding-left:20px;"id="cd-1"></div>
                    </div>
                    <div class="row pl-3">
                        <div class="col-md-7"id="cd-7"></div>
                        <div class="col-md-4" style="display: flex; justify-content: space-between; align-items: center;"id="cd-4">
                            <span style="text-align: right; font-size: 15px;">Stuffing/Stippings :</span>
                            <input type="text" style="width: 50%; border: none; border-bottom: 1px solid black; text-align: center;" />
                        </div>
                        <div class="col-md-1" style="padding-left:20px;"id="cd-1"></div>
                    </div>
                    <div class="row pl-3">
                        <div class="col-md-7"id="cd-7"></div>
                        <div class="col-md-4" style="display: flex; justify-content: space-between; align-items: center;"id="cd-4">
                            <span style="text-align: right; font-weight: bold; font-size: 15px;">TOTAL :</span>
                            <input type="text" style="width: 50%; border: none; border-bottom: 1px solid black; text-align: center;" />
                        </div>
                        <div class="col-md-1" style="padding-left:20px;"id="cd-1"></div>
                    </div>
                </footer><br><br>
            </div>
        </div>
    </div>
</div>
<!-- END PRINT-->
<script>
    function printContent(containerId) {
        const container = document.getElementById(containerId);

        // Replace input elements with spans for printing
        const inputs = container.querySelectorAll('input');
        inputs.forEach(input => {
            const span = document.createElement('span');
            span.style.textAlign = input.style.textAlign;
            span.style.display = input.style.display;
            span.style.width = input.style.width;
            span.style.borderBottom = input.style.borderBottom;

            // Format RATE and FREIGHT columns for printing
            if (input.type === 'number' && input.value) {
                span.textContent = formatNumber(parseFloat(input.value.replace(/,/g, '')));
            } else {
                span.textContent = input.value;
            }

            input.parentNode.replaceChild(span, input);
        });

        // Print the content
        window.print();

        // Restore input elements after printing, except for specified spans
        const spans = container.querySelectorAll('span');
        spans.forEach(span => {
            // Check if the span matches the specified non-editable elements
            const nonEditableTexts = [
                "BILL OF LADING",
                "Freight :",
                "Valuation :",
                "Wharfage :",
                "VAT :",
                "Other Charges :",
                "Stuffing/Stippings :",
                "TOTAL :"
            ];

            if (!nonEditableTexts.includes(span.textContent.trim())) {
                const input = document.createElement('input');
                input.type = 'text';
                input.style.textAlign = span.style.textAlign;
                input.style.display = span.style.display;
                input.style.width = span.style.width;
                input.style.border = 'none'; // Remove borders
                input.style.borderBottom = span.style.borderBottom;
                input.value = span.textContent.replace(/,/g, ''); // Remove commas for restoration
                span.parentNode.replaceChild(input, span);
            }
        });
    }
</script>
<script>
    function printContent(containerId) {
        const container = document.getElementById(containerId);

        // Hide the "ACTION" column and "Delete" buttons
        const actionColumnIndex = 8; // Index of the "ACTION" column
        const rows = container.querySelectorAll('tr');
        rows.forEach(row => {
            const cells = row.cells;
            if (cells[actionColumnIndex]) {
                cells[actionColumnIndex].style.display = 'none'; // Hide the "ACTION" column
            }
        });

        // Replace input elements with spans for printing
        const inputs = container.querySelectorAll('input');
        inputs.forEach(input => {
            const span = document.createElement('span');
            span.style.textAlign = input.style.textAlign;
            span.style.display = input.style.display;
            span.style.width = input.style.width;
            span.style.borderBottom = input.style.borderBottom;

            // Format RATE and FREIGHT columns for printing
            if (input.type === 'number' && input.value) {
                span.textContent = formatNumber(parseFloat(input.value.replace(/,/g, '')));
            } else {
                span.textContent = input.value;
            }

            input.parentNode.replaceChild(span, input);
        });

        // Print the content
        window.print();

        // Restore input elements and "ACTION" column after printing
        const spans = container.querySelectorAll('span');
        spans.forEach(span => {
            const input = document.createElement('input');
            input.type = 'text';
            input.style.textAlign = span.style.textAlign;
            input.style.display = span.style.display;
            input.style.width = span.style.width;
            input.style.border = 'none'; // Remove borders
            input.style.borderBottom = span.style.borderBottom;
            input.value = span.textContent.replace(/,/g, ''); // Remove commas for restoration
            span.parentNode.replaceChild(input, span);
        });

        rows.forEach(row => {
            const cells = row.cells;
            if (cells[actionColumnIndex]) {
                cells[actionColumnIndex].style.display = ''; // Restore the "ACTION" column
            }
        });
    }
</script>
<script>
    // Function to add a new row above the "VALUE:" row
    function addRow() {
        const table = document.getElementById('mainTable').getElementsByTagName('tbody')[0];
        const valueRow = table.querySelector('tr:last-child'); // Target the "VALUE:" row (last row in this case)
        const newRow = table.insertRow(valueRow.rowIndex - 1); // Insert the new row above the "VALUE:" row

        // Add cells with input elements
        for (let i = 0; i < 9; i++) { // Add an extra column for the delete button
            const newCell = newRow.insertCell(i);

            if (i === 8) { // Add the delete button in the last column
                const deleteButton = document.createElement('button');
                deleteButton.textContent = 'Delete';
                deleteButton.className = 'btn btn-danger btn-sm delete-row'; // Add a class for styling
                deleteButton.onclick = () => newRow.remove(); // Attach the delete function
                newCell.appendChild(deleteButton);
                newCell.style.textAlign = 'center'; // Center-align the button
            } else {
                const input = document.createElement('input');
                input.type = 'text';
                input.style = 'width: 100%; border: none;'; // Default styles

                // Apply specific alignment for "DESCRIPTION" and "RATE" columns
                if (i === 2) { // DESCRIPTION column
                    newCell.style.textAlign = 'left';
                    input.style.textAlign = 'left';
                    input.style.textTransform = 'uppercase'; // Apply uppercase for description
                    input.style.whiteSpace = 'normal'; // Allow text wrapping
                } else if (i === 6) { // RATE column
                    newCell.style.textAlign = 'right';
                    input.style.textAlign = 'right';
                    input.type = 'number'; // Ensure RATE is numeric
                    input.step = '0.01'; // Allow decimal values
                } else {
                    newCell.style.textAlign = 'center'; // Default alignment for other columns
                    input.style.textAlign = 'center';
                }

                if (i === 0 || i === 6) {
                    input.type = 'number'; // Ensure QTY and RATE are numeric inputs
                    input.step = '0.01'; // Allow decimal values
                }
                if (i === 7) {
                    input.type = 'text'; // FREIGHT is computed and not editable
                    input.readOnly = true;
                    input.style.backgroundColor = '#f9f9f9'; // Make it visually distinct
                }
                input.addEventListener('input', calculateFreight); // Attach event listener for calculation
                newCell.appendChild(input);
            }
        }
    }

    function deleteRow(button) {
        const row = button.closest('tr'); // Find the closest row to the button
        row.remove(); // Remove the row
    }

    // Function to calculate FREIGHT for each row
    function calculateFreight() {
        const table = document.getElementById('mainTable').getElementsByTagName('tbody')[0];
        const rows = table.querySelectorAll('tr');

        rows.forEach(row => {
            const qtyInput = row.cells[0]?.querySelector('input'); // QTY column
            const rateInput = row.cells[6]?.querySelector('input'); // RATE column
            const freightInput = row.cells[7]?.querySelector('input'); // FREIGHT column

            if (qtyInput && rateInput && freightInput) {
                const qty = parseFloat(qtyInput.value) || 0; // Default to 0 if empty
                const rate = parseFloat(rateInput.value.replace(/,/g, '')) || 0; // Remove commas before parsing
                const freight = qty * rate;

                // Format FREIGHT with two decimal points and commas
                freightInput.value = freight > 0 ? formatNumber(freight) : '';
            }
        });
    }

    // Function to format numbers with commas and two decimal points
    function formatNumber(num) {
        return num.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }
</script>
<script>
    // Function to format the current date
    function formatDate(date) {
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        return date.toLocaleDateString('en-US', options).toUpperCase();
    }

    // Set the current date in the input field
    document.getElementById('currentDate').value = formatDate(new Date());
</script>
<script>
    // Sync the selected value of the dropdown to the span
    const dropdown = document.getElementById('everwinStarInput');
    const textSpan = document.getElementById('everwinStarText');

    dropdown.addEventListener('change', () => {
        textSpan.textContent = dropdown.options[dropdown.selectedIndex].text;
    });

    // Set the initial value of the span
    textSpan.textContent = dropdown.options[dropdown.selectedIndex].text;
</script>

@endsection