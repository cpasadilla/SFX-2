@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <a href="{{ route('customer') }}" style="color: rgb(57, 57, 57); font-size: 20px; padding: 5px;"><i class="fa-solid fa-arrow-left-long fa-lg"></i></a>

    <div class="row">
        <div class="col-md-6" >
            <br>
            <h1>PRODUCT CATALOG</h1>
            <table class="table table-striped" style="background-color: #fcfcfc; border: 1px solid rgb(255, 255, 255);">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->itemName }}</td>
                        <td>{{ $product->price }}</td>
                        @foreach ($cats as $cat)
                            
                        @if ($cat->id == $product->category)
                        <td>{{ $cat->name }}</td>
                        @endif
                        @endforeach

                        <td>
                            <button type="button" class="btn btn-success" onclick="addToOrder({{ $product->id }}, '{{ $product->itemName }}', {{ $product->price }})" >Add to Order</button>
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
        <div class="col-md-6">
            <br>
            <h1>ORDER SUMMARY</h1>
            <div class="card">
                @foreach ($users as $user)
                
            <form action={{route('c.submit',['key'=>$user->cID])}} method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                        
                    <p> Name: {{$user->user->fName}} {{$user->user->lName}}</p>
                    <p> Customer ID: {{$user->cID}}</p>
                    <p> Email: {{$user->user->email}}

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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="orderItems">
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">Total:</td>
                                <td colspan="2"><span id="orderTotal">0.00</span></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            
            @endforeach
                <input type="hidden" name="orderItems" id="orderItemsInput" value="{{ old('orderItems') }}">

                <button type="submit" class="btn btn-success btn-block" id="submitOrderBtn" >Submit Order</button>
            </form>
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
                <td>${item.price.toFixed(2)}</td>
                <td>${item.quantity}</td>
                <td>${item.total.toFixed(2)}</td>
                <td>
                    <button type="button" class="btn btn-primary" onclick="removeFromOrder(${item.id})">Remove</button>
                </td>
            `;
        orderTotal += item.total;
    });
    $('#orderItems').html(orderItemsHtml);
    $('#orderTotal').html(orderTotal.toFixed(2));
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