@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <h1>CREATE BL</h1>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
    <div class="row mb-2" style="padding-left:8px;">
        <div class="col-md-6">
            <form action="{{ route('l.search') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by Item Name or Category">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="content" style="padding-left: 8px; padding-right:8px;">
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h5>PRODUCT CATALOG</h5>
                    </div>
                    <div class="card-body">
                        <!-- Display pagination links -->
                       
                        <table class="table" style="background-color: #fcfcfc; border: 1px solid rgb(255, 255, 255);">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th style="text-align: center;">Category</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h5>ORDER SUMMARY</h5>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="card-body">
                                <div class="input-group mb-1">
                                    <input type="text" name="recs" class="form-control @error('recs') is-invalid @enderror"
                                    placeholder="{{ __('CONSIGNEE FULL NAME') }}" required autocomplete="recs" autofocus>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fa-solid fa-signature"></i>
                                        </div>
                                    </div>
                                    @error('recs')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-1">
                                    <input type="text" name="recs" class="form-control @error('recs') is-invalid @enderror"
                                    placeholder="{{ __('CONSIGNEE FULL NAME') }}" required autocomplete="recs" autofocus>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fa-solid fa-signature"></i>
                                        </div>
                                    </div>
                                    @error('recs')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <p> Name: </p>
                                <p> Customer ID: </p>
                                <p> Phone Number: </p>
                                <div class="input-group mb-1">
                                    <input type="text" name="recs" class="form-control @error('recs') is-invalid @enderror"
                                    placeholder="{{ __('CONSIGNEE FULL NAME') }}" required autocomplete="recs" autofocus>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fa-solid fa-signature"></i>
                                        </div>
                                    </div>
                                    @error('recs')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <!--CONSIGNEE CONTACT NUMBER FIELD-->
                                <div class="input-group mb-1">
                                    <input type="text" name="cont" class="form-control @error('cont') is-invalid @enderror"
                                    placeholder="{{ __('CONTACT NUMBER') }}" required autocomplete="cont" autofocus>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fa-solid fa-hashtag"></i>
                                        </div>
                                    </div>
                                    @error('cont')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <!--SHIP NUMBER FIELD-->
                                <div class="input-group mb-1">
                                    <input type="text" name="ship" class="form-control @error('ship') is-invalid @enderror"
                                    placeholder="{{ __('Ship Number') }}" required autocomplete="ship" autofocus>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-ship"></i>
                                        </div>
                                    </div>
                                    @error('ship')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <!--VOYAGE NUMBER FIELD-->
                                <div class="input-group mb-1">
                                    <input type="text" name="voyage" class="form-control @error('voyage') is-invalid @enderror"
                                    placeholder="{{ __('Voyage Number') }}" autocomplete="voyage" autofocus>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-ship"></i>
                                        </div>
                                    </div>
                                    @error('voyage')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <!--CONTAINER NUMBER FIELD-->
                                <div class="input-group mb-1">
                                    <input type="text" name="container" class="form-control" placeholder="{{ __('Container Number') }}" autocomplete="container" autofocus>

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-ship"></i>
                                        </div>
                                    </div>
                                </div>
                                
                                <!--ORIGIN FIELD-->
                                <div class="input-group mb-1">
                                    <select class="form-control" id="origin" name="origin">
                                        <option selected>Choose Origin</option>
                                        <option value="Batanes">Batanes</option>
                                        <option value="Manila">Manila</option>
                                    </select>
                                    @error('origin')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <br>
                                <form method="POST" action="">
                                    @csrf
                                        <table class="table" id="orderSummary">
                                            <thead>
                                                <tr>
                                                    <th>ItemName</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <div class="input-group mb-1">
                                                <input type="text" name="valuation" class="form-control @error('valuation') is-invalid @enderror"
                                                placeholder="{{ __('VALUATION') }}" required autocomplete="valuation" autofocus>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="fa-solid fa-hashtag"></i>
                                                    </div>
                                                </div>
                                                @error('valuation')
                                                    <span class="error invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <br>
                                            <tbody id="orderItems"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="3"><strong>Total:</strong></td>
                                                    <td id="orderTotal">0.00</td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                </form>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
let orderItems = JSON.parse(localStorage.getItem('orderItems')) || [];
let orderTotal = 0;

function addToOrder(productId, productName, productPrice) {
    // Check if the product is already in the order
    let orderItem = orderItems.find(item => item.id === productId);
    if (orderItem) {
        // If so, increase the quantity
        orderItem.quantity++;
        orderItem.total = orderItem.quantity * productPrice;
    } else {
        // If not, add it to the order
        orderItem = {
            id: productId,
            name: productName,
            price: productPrice,
            quantity: 1,
            total: productPrice
        };
        orderItems.push(orderItem);
    }

    // Update the UI
    updateOrderItems();
    // Save the updated order items to localStorage
    localStorage.setItem('orderItems', JSON.stringify(orderItems));

    // Prevent form submission
    event.preventDefault();
}

function updateOrderItems() {
    let orderItemsHtml = '';
    orderTotal = 0;
    orderItems.forEach(item => {
        orderItemsHtml += `
            <tr>
                <td>${item.name}</td>
                <td>${item.price.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                <td>${item.quantity}</td>
                <td>${item.total.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                <td>
                    <button type="button" class="btn btn-primary" onclick="removeFromOrder(${item.id})">Remove</button>
                </td>
            `;
        orderTotal += item.total;
    });
    $('#orderItems').html(orderItemsHtml);
    $('#orderTotal').html(orderTotal.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));

    if (orderItems.length > 0) {
        $('#submitOrderBtn').prop('disabled', false);
    } else {
        $('#submitOrderBtn').prop('disabled', true);
    }
    $('#orderItemsInput').val(JSON.stringify(orderItems));
}

function removeFromOrder(productId) {
    // Find the index of the order item to remove
    let index = orderItems.findIndex(item => item.id === productId);
    if (index !== -1) {
        // If found, remove it from the order
        orderItems.splice(index, 1);
    }

    // Update the UI
    updateOrderItems();
    // Save the updated order items to localStorage
    localStorage.setItem('orderItems', JSON.stringify(orderItems));
}

// Load all data from the JSON file upon page load
$(document).ready(function() {
    $.getJSON('/path/to/json/file.json', function(data) {
        // Process the data and add it to the product catalog
        let productsHtml = '';
        data.forEach(product => {
            productsHtml += `
                <tr>
                    <td>${product.itemName}</td>
                    <td>${product.price}</td>
                    <td>
                        <button type="button" class="btn btn-primary" onclick="addToOrder(${product.id}, '${product.itemName}', ${product.price})">Add to Order</button>
                    </td>
                </tr>
            `;
        });
        $('#productCatalog').html(productsHtml);
    });

    updateOrderItems();
});

</script>
<script>
    function updatePrice() {
        // Get values from input fields
        const length = parseFloat(document.getElementById('length').value) || 0;
        const width = parseFloat(document.getElementById('width').value) || 0;
        const height = parseFloat(document.getElementById('height').value) || 0;
        const multiplier = parseFloat(document.getElementById('multiplier').value) || 0;

        // Calculate the price (length * width * height * multiplier)
        const calculatedPrice = length * width * height * multiplier;

        // Update the price field with the calculated value
        document.getElementById('price').value = calculatedPrice.toFixed(2); // Display the result with 2 decimal places
    }
</script>
<style>
    .btn-primary {
    color: #fff;
    background-color: #28a745;
    border-color: #28a745;
    box-shadow: none;
}

.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #28a544;
    border-color: #28a544;
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



@endsection