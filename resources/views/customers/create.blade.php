@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<div class="container-fluid">
    <div class="content-header">
        <h1>ORDERS CREATED</h1>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
            </div>
        </div>
    </div>
    <div class="row mb-2" style="padding-left:8px;">
        @foreach ($users as $user)
            <div class="col-md-6">
                <form action="{{ route('c.scout', ['key' => $user->cID]) }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search by Item Name or Category">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        @endforeach
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
                        {{ $products->appends(['cats' => $cats])->links() }}
                        <table class="table" style="background-color: #fcfcfc; border: 1px solid rgb(255, 255, 255);">
                            <thead class="thead-light">
                                <tr>
                                    <th>NAME</th>
                                    <th>UNIT</th>
                                    <th><!--PRICE--></th>
                                    <th style="text-align: center;">CATEGORY</th>
                                    <th style="text-align: center;">QUANTITY ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->itemName }}</td>
                                        <td>{{ $product->unit }}</td>
                                        <td><!--{{ number_format($product->price, 2) }}--></td>
                                        @foreach ($cats as $cat)
                                            @if ($cat->id == $product->category)
                                                <td style="text-align: center;">{{ $cat->name }}</td>
                                            @endif
                                        @endforeach
                                        <td style="text-align: center;">
                                            <input type="number" class="form-control quantity-input" min="1" value="1"
                                                   id="quantity-{{ $product->id }}" style="width: 80px; display: inline;">
                                            <button type="button" class="btn btn-success"
                                                    onclick="addToOrder({{ $product->id }}, '{{ $product->itemName }}', '{{ $product->unit }}', {{ $product->price }})">
                                                Add
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->appends(['cats' => $cats])->links() }}
                        <p>Page: {{ $products->currentPage() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h5>ORDER SUMMARY</h5>
                        <p> NOTE: Collect order first before inputting all neccesarry information</p>
                    </div>
                    @foreach ($users as $user)

                        <form action={{route('c.submit',['key'=>$user->cID])}} method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="card-body">
                                    <p> Name: {{$user->fName}} {{$user->lName}}</p>
                                    <p> CUSTOMER ID: {{$user->cID}}</p>
                                    <p> PHONE NUMBER: {{$user->phoneNum}}
                                        <div class="input-group mb-1"><!--CONSIGNEE NAME FIELD-->
                                            <input type="text" name="recs" class="form-control @error('recs') is-invalid @enderror"
                                            placeholder="{{ __('CONSIGNEE NAME') }}" required autocomplete="recs" autofocus>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fa-solid fa-signature"></i>
                                                </div>
                                            </div>
                                            @error('recs')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-1"><!--CONSIGNEE CONTACT NUMBER FIELD-->
                                            <input type="text" name="cont" class="form-control @error('cont') is-invalid @enderror"
                                            placeholder="{{ __('CONTACT NUMBER') }}" required autocomplete="cont" autofocus>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fa-solid fa-hashtag"></i>
                                                </div>
                                            </div>
                                            @error('cont')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-1"><!--SHIP NUMBER FIELD-->
                                            <input type="text" name="ship" class="form-control @error('ship') is-invalid @enderror"
                                            placeholder="{{ __('SHIP NUMBER') }}" required autocomplete="ship" autofocus>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fas fa-ship"></i>
                                                </div>
                                            </div>
                                            @error('ship')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-1"><!--VOYAGE NUMBER FIELD-->
                                            <input type="text" name="voyage" class="form-control @error('voyage') is-invalid @enderror"
                                            placeholder="{{ __('VOAYGE NUMBER') }}" autocomplete="voyage" autofocus>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fas fa-ship"></i>
                                                </div>
                                            </div>
                                            @error('voyage')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-1"><!--CONTAINER NUMBER FIELD-->
                                            <input type="text" name="container" class="form-control"
                                            placeholder="{{ __('CONTAINER NUMBER') }}" autocomplete="container" autofocus>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fas fa-ship"></i>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6 ml-1"> ORIGIN </div>
                                                <div class="col-md-5"> DESTINATION</div>
                                            </div>
                                        <div class="input-group mb-1"><!--ORIGIN FIELD-->
                                            <select id="origin" name="origin" onchange="updateDestinationOptions()"
                                            class="form-control @error('origin') is-invalid @enderror"
                                            placeholder="{{ __('origin') }}" required autocomplete="origin" autofocus>
                                                <option value="Manila">Manila</option>
                                                <option value="Batanes">Batanes</option>
                                                <!--option value="Infanta">Infanta</option-->
                                            </select>

                                            <!-- Destination Dropdown -->
                                            <select id="destination" name="destination" class="form-control">
                                                <!-- This will be dynamically populated based on the origin -->
                                            </select>
                                            @error('origin')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                            @error('destination')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <form method="POST" action="{{ route('order.submit') }}">
                                            @csrf
                                                <table class="table" id="orderSummary">
                                                    <thead>
                                                        <tr>
                                                            <th>NAME</th>
                                                            <th>UNIT</th>
                                                            <th><!--PRICE--></th>
                                                            <th>QUANTITY</th>
                                                            <th><!--TOTAL--></th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <div class="input-group mb-1">
                                                        <input type="text" name="valuation" class="form-control"
                                                        placeholder="{{ __('VALUATION') }}" autocomplete="valuation" autofocus>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fa-solid fa-hashtag"></i>
                                                            </div>
                                                        </div>
                                                        @error('valuation')
                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <!--div class="input-group mb-1"><!--CHECKER NAME FIELD>
                                                        <input type="text" name="checker" class="form-control"
                                                        placeholder="{{ __('CHECKER NAME') }}" autocomplete="checker" autofocus>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fa-solid fa-hashtag"></i>
                                                            </div>
                                                        </div>
                                                        @error('checker')
                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div--><br>

                                                    <tbody id="orderItems"></tbody>
                                                </table><br>
                                                <input type="hidden" name="orderItems" id="orderItemsInput" value="{{ old('orderItems') }}">
                                                <div class="d-flex justify-content-between mt-3">
                                                    <button type="button" class="btn btn-danger" onclick="clearOrderSummary()">Clear All</button>
                                                    <button type="submit" class="btn btn-success" id="submitOrderBtn">Submit Order</button>
                                                </div>
                                        </form>
                                </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div> <!--/div></div-->
</div>
<script>
    // Function to dynamically update the destination options based on the selected origin
    function updateDestinationOptions() {
        var origin = document.getElementById('origin').value;
        var destination = document.getElementById('destination');

        // Clear existing options
        destination.innerHTML = '';

        // Dynamically add destination options based on the selected origin
        if (origin === 'Manila') {
            var option1 = document.createElement("option");
            option1.value = "Batanes";
            option1.text = "Batanes";
            destination.appendChild(option1);
        } else if (origin === 'Batanes') {
            var option1 = document.createElement("option");
            option1.value = "Manila";
            option1.text = "Manila";
            destination.appendChild(option1);
        }
    }

    // Call the function on page load to initialize the destination options based on the default origin
    window.onload = updateDestinationOptions;
</script>
<script>
    let orderItems = JSON.parse(localStorage.getItem('orderItems')) || [];
    let orderTotal = 0;

    function addToOrder(productId, productName, productUnit, productPrice) {
    const quantityInput = document.getElementById(`quantity-${productId}`);
    const quantity = parseInt(quantityInput.value) || 1;

        let orderItem = orderItems.find(item => item.id === productId);
        if (orderItem) {
            orderItem.quantity += quantity;
            orderItem.total = orderItem.quantity * productPrice;
        } else { // If not, add it to the order
            orderItem = {
                id: productId,
                name: productName,
                unit: productUnit,
                price: productPrice,
                quantity: quantity,
                total: quantity * productPrice
            };
            orderItems.push(orderItem);

            quantityInput.value = 1;
        }

        updateOrderItems(); // Update the UI
        localStorage.setItem('orderItems', JSON.stringify(orderItems));// Save the updated order items to localStorage
        //event.preventDefault();// Prevent form submission
    }

    function updateOrderItems() {
        let orderItemsHtml = '';
        orderTotal = 0;
        orderItems.forEach(item => {
            orderItemsHtml += `
            <tr>
                <td>${item.name}</td>
                <td>${item.unit}</td>
                <td></td>
                <td>${item.quantity}</td>
                <td></td>
                <td><button type="button" class="btn btn-primary" onclick="removeFromOrder(${item.id})">Remove</button></td>
            </tr>`;
            orderTotal += item.total;
        });

        $('#orderItems').html(orderItemsHtml);//$('#orderTotal').html(orderTotal.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
        if (orderItems.length > 0) {
            $('#submitOrderBtn').prop('disabled', false);
        } else {
            $('#submitOrderBtn').prop('disabled', true);
        }
        $('#orderItemsInput').val(JSON.stringify(orderItems));
    }
    function updateItemQuantity(productId, quantity) {
    let orderItem = orderItems.find(item => item.id === productId);
    if (orderItem) {
        orderItem.quantity = parseInt(quantity, 10); // Ensure valid number
        orderItem.total = orderItem.quantity * orderItem.price;
        updateOrderItems();
        localStorage.setItem('orderItems', JSON.stringify(orderItems));
    }
}
function removeFromOrder(productId) {
    const index = orderItems.findIndex(item => item.id === productId);
    if (index !== -1) {
        orderItems.splice(index, 1); // Remove item from the array
        updateOrderItems();
        localStorage.setItem('orderItems', JSON.stringify(orderItems));
    }
}
function clearOrderSummary() {
    orderItems = []; // Clear the order items array
    localStorage.removeItem('orderItems'); // Remove items from localStorage
    updateOrderItems(); // Update UI
}

function updateOrderItems() {
    let orderItemsHtml = '';
    orderTotal = 0;

    orderItems.forEach(item => {
        orderItemsHtml += `
            <tr>
                <td>${item.name}</td>
                <td>${item.unit}</td>
                <td><!--${item.price.toFixed(2)}--></td>
                <td>

                     <input type="number" value="${item.quantity}" min="1" onchange="updateItemQuantity(${item.id}, this.value)" style="width: 60px; text-align: center;">
                    <button class="btn btn-light" onclick="updateItemQuantity(${item.id}, ${item.quantity - 1})" ${item.quantity <= 1 ? 'disabled' : ''}>-</button>

                    <button class="btn btn-light" onclick="updateItemQuantity(${item.id}, ${item.quantity + 1})">+</button>
                </td>
                <td><!--${item.total.toFixed(2)}--></td>
                <td><button class="btn btn-danger btn-sm" onclick="removeFromOrder(${item.id})">Remove</button></td>
            </tr>`;
        orderTotal += item.total;
    });

    document.getElementById('orderItems').innerHTML = orderItemsHtml;
    document.getElementById('orderItemsInput').value = JSON.stringify(orderItems);

    // Enable or disable the submit button based on orderItems length
    document.getElementById('submitOrderBtn').disabled = orderItems.length === 0;
}

document.addEventListener('DOMContentLoaded', () => {
    updateOrderItems(); // Load and update items on page load
});

    $(document).ready(function() { // Load all data from the JSON file upon page load
        $.getJSON('/path/to/json/file.json', function(data) { // Process the data and add it to the product catalog
            let productsHtml = '';
            data.forEach(product => {
                productsHtml += `
                <tr>
                    <td>${product.itemName}</td>
                    <td>${product.unit}</td>
                    <td>${product.price}</td>
                    <td><button type="button" class="btn btn-primary" onclick="addToOrder(${product.id}, '${product.itemName}', '${product.unit}', ${product.price})">Add to Order</button></td>
                </tr>
                `;
            });
            $('#productCatalog').html(productsHtml);
        });

        updateOrderItems();
    });
</script>
<script>
    function updatePrice() { // Get values from input fields
        const length = parseFloat(document.getElementById('length').value) || 0;
        const width = parseFloat(document.getElementById('width').value) || 0;
        const height = parseFloat(document.getElementById('height').value) || 0;
        const multiplier = parseFloat(document.getElementById('multiplier').value) || 0;

        const calculatedPrice = length * width * height * multiplier; // Calculate the price (length * width * height * multiplier)

        document.getElementById('price').value = calculatedPrice.toFixed(2); // Display the result with 2 decimal places
    }

    function clearOrderSummary() { // Clear the orderItems array
    orderItems = []; // Remove all items from localStorage
    localStorage.removeItem('orderItems'); // Update the UI to reflect the cleared order

    updateOrderItems();
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
