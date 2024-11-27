@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <h1>ORDER UPDATE</h1>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
    <div class="row mb-2" style="padding-left:8px;">

    </div>
    <br>
    <div class="content" style="padding-left:8px; padding-right:8px;">
        <div class="row">

            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h5>PRODUCT CATALOG</h5>
                    </div>
                    <div class="card-body">
                        <!-- Display pagination links -->
                        {{ $products->appends(['cats' => $cats])->links() }}
                        <table class="table" style="background-color: #fcfcfc; border: 1px solid rgb(255, 255, 255);">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Unit</th>
                                    <th>Price</th>
                                    <th style="text-align: center;">Category</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->itemName }}</td>
                                        <td>{{ $product->unit }}</td>
                                        <td>{{ number_format($product->price, 2) }}</td>
                                        @foreach ($cats as $cat)

                                        @if ($cat->id == $product->category)
                                        <td style="text-align: center;">{{ $cat->name }}</td>
                                        @endif
                                        @endforeach
                                        <td style="text-align: center;">
                                            <button type="button" class="btn btn-success" onclick="addToOrder({{ $product->id }}, '{{ $product->itemName }}', '{{ $product->unit }}', {{ $product->price }})" >Add to Order</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Display pagination links -->
                        {{ $products->appends(['cats' => $cats])->links() }}
                        <!-- Display current page number -->
                        <p>Page: {{ $products->currentPage() }}</p>
                    </div>
                </div>
            </div>
            <!--div class="row"-->
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <h5>ORDER SUMMARY</h5>
                        </div>
                        @foreach ($users as $user)
                        @foreach ($orders as $order )

                        <form action={{route('c.update',['key'=>$order->orderId])}} method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="card-body">
                                        <p> Name: {{$user->fName}} {{$user->lName}}</p>
                                        <p> Customer ID: {{$user->cID}}</p>
                                        <input name="id" value="{{ $user->cID }}" hidden>
                                        <p> Phone Number: {{$user->phoneNum}}</p>
                                        <p> BL: {{$order->orderId}}</p>
                                            <!--CONSIGNEE NAME FIELD-->
                                            <div class="input-group mb-1">
                                                <input type="text" name="recs" class="form-control @error('recs') is-invalid @enderror"
                                                placeholder="{{ __('CONSIGNEE FULL NAME') }}" required autocomplete="recs" autofocus
                                                value = "{{$order->consigneeName}}">
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
                                                placeholder="{{ __('CONTACT NUMBER') }}" required autocomplete="cont" autofocus
                                                value = "{{$order->consigneeNum}}">

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
                                                placeholder="{{ __('Ship Number') }}" required autocomplete="ship" autofocus
                                                value = "{{$order->shipNum}}">

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
                                                placeholder="{{ __('Voyage Number') }}" autocomplete="voyage" autofocus
                                                value = "{{$order->voyageNum}}">

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
                                                <input type="text" name="container" class="form-control"
                                                placeholder="{{ __('Container Number') }}" autocomplete="container" autofocus
                                                value = "{{$order->containerNum}}">

                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-ship"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--ORIGIN FIELD-->
                                            <div class="input-group mb-1">
                                                <select class="form-control" id="origin" name="origin">
                                                    @if ($order->origin == 'Manila')
                                                    <option  value="Batanes">Batanes</option>
                                                    <option selected value="Manila">Manila</option>
                                                    @elseif ($order->origin == 'Batanes')
                                                    <option  selected  value="Batanes">Batanes</option>
                                                    <option value="Manila">Manila</option>
                                                    @else
                                                    <option selected>Choose Origin</option>
                                                    <option value="Batanes">Batanes</option>
                                                    <option value="Manila">Manila</option>
                                                    @endif

                                                </select>
                                                @error('origin')
                                                    <span class="error invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>


                                            <br>
                                            <form method="POST" action="{{ route('order.submit') }}">
                                                @csrf
                                                <table class="table" id="orderSummary">
                                                    <thead>
                                                        <tr>
                                                            <th>ItemName</th>
                                                            <th>Unit</th>
                                                            <th>Price</th>
                                                            <th>Quantity</th>
                                                            <th>Total</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <!--CONTAINER NUMBER FIELD-->
                                                    <div class="input-group mb-1">
                                                        <input type="text" name="valuation" class="form-control"
                                                        placeholder="{{ __('VALUATION') }}" autocomplete="valuation" autofocus
                                                        value = "{{$order->value}}">

                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fa-solid fa-hashtag"></i>
                                                            </div>
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
                                                    </tfoot
                                                </table>
                                            <br>
                                            <input type="hidden" name="orderItems" id="orderItemsInput" value="{{ old('orderItems') }}">
                                            <button type="submit" class="btn btn-success btn-block" id="submitOrderBtn">Submit Order</button>
                                            </form>
                                    </div>
                            </form>
                        @endforeach
                        @endforeach

                    </div>
                </div>

        </div>

    </div>
</div>


<script>
    // Clear the previous order items in localStorage
    localStorage.removeItem('orderItems');
    localStorage.removeItem('orderTotal');

let initialOrderItems = {!! $data !!};// Parse the initial data passed from the backend

// Use this data to populate the `orderItems` array
let orderItems = initialOrderItems.length ? initialOrderItems : [];
let orderTotal = 0;

// Check if there are saved order items in localStorage and load them
if (localStorage.getItem('orderItems')) {
    orderItems = JSON.parse(localStorage.getItem('orderItems'));
    orderTotal = JSON.parse(localStorage.getItem('orderTotal')) || 0;
}

function addToOrder(productId, productName, productUnit, productPrice) {
    // Check if the product is already in the order based on the name
    let orderItem = orderItems.find(item => item.name === productName);

    if (orderItem) {
        // If the item exists, just increase the quantity and update the total
        orderItem.quantity++;
        orderItem.total = orderItem.quantity * productPrice;
    } else {
        // If it's a new item, create a new object and add it to the order
        orderItem = {
            id: productId,
            name: productName,
            unit: productUnit,
            price: productPrice,
            quantity: 1,
            total: productPrice
        };
        orderItems.push(orderItem);
    }

    // Recalculate the order total after adding the item
    orderTotal = orderItems.reduce((total, item) => total + item.total, 0);

    // Update the UI with the new order summary
    updateOrderItems();

    // Save the updated order items to localStorage to persist across pages
    localStorage.setItem('orderItems', JSON.stringify(orderItems));
    localStorage.setItem('orderTotal', JSON.stringify(orderTotal));  // Optionally, store the total too

    // Prevent form submission
    event.preventDefault();
}


function updateOrderItems() {
    let orderItemsHtml = '';
    orderTotal = 0; // Ensure orderTotal is reset as a number

    orderItems.forEach(item => {
        orderItemsHtml += `
            <tr>
                <td>${item.name}</td>
                <td>${item.unit}</td>
                <td>${item.price.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                <td>${item.quantity}</td>
                <td>${item.total.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                <td>
                    <button type="button" class="btn btn-primary" onclick="removeFromOrder(${item.id})">Remove</button>
                </td>
            </tr>`;
        // Ensure proper addition
        orderTotal += Number(item.total); // Explicitly convert item.total to a number
    });

    // Update the table
    $('#orderItems').html(orderItemsHtml);

    // Update the total display
    $('#orderTotal').html(orderTotal.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));

    // Enable or disable the submit button
    $('#submitOrderBtn').prop('disabled', orderItems.length === 0);

    // Save the current order items to a hidden input field
    $('#orderItemsInput').val(JSON.stringify(orderItems));
}


function removeFromOrder(productId) {
    let orderItem = orderItems.find(item => item.id === productId);

    if (orderItem) {
        // Decrease quantity if more than 1
        if (orderItem.quantity > 1) {
            orderItem.quantity--;
            orderItem.total = orderItem.quantity * orderItem.price;  // Update the total
        } else {
            // If quantity is 1, remove the item completely from the array
            let index = orderItems.findIndex(item => item.id === productId);
            if (index !== -1) {
                orderItems.splice(index, 1);
            }
        }
    }

    updateOrderItems();  // Update the UI
    localStorage.setItem('orderItems', JSON.stringify(orderItems));  // Update localStorage
}

// Load all data from the JSON file upon page load
$(document).ready(function() {
    $.getJSON('/path/to/json/file.json', function(data) {
        let productsHtml = '';
        data.forEach(product => {
            productsHtml += `
                <tr>
                    <td>${product.itemName}</td>
                    <td>${product.unit}</td>
                    <td>${product.price}</td>
                    <td>
                        <button type="button" class="btn btn-primary" onclick="addToOrder(${product.id}, '${product.itemName}', '${product.unit}', ${product.price})">Add to Order</button>
                    </td>
                </tr>
            `;
        });
        $('#productCatalog').html(productsHtml);
    });

    updateOrderItems();  // Initialize order items
});

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
