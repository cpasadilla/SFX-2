@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<div class="container-fluid">
    <div class="content-header">
        <h1>UPDATE ORDER</h1>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
            </div>
        </div>
    </div>
    <div class="row mb-2" style="padding-left:8px;">
        @foreach ($orders as $order)
            <div class="col-md-6">
                <form action="{{ route('c.find', ['key' => $order->orderId]) }}" method="GET">
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
                                    <th>#</th>
                                    <th>NAME</th>
                                    <th>UNIT</th>
                                    <th>PRICE</th>
                                    <th style="text-align: center;">CATEGORY</th>
                                    <th style="text-align: center;">QUANTITY ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td class="id" ; style="display:none">{{ $product->id }} </td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td style="text-transform: uppercase;">{{ $product->itemName }}</td>
                                        <td style="text-transform: uppercase;">{{ $product->unit }}</td>
                                        <td>{{ number_format($product->price, 2) }}</td>
                                        @foreach ($cats as $cat)
                                            @if ($cat->id == $product->category)
                                                <td style="text-align: center;">{{ $cat->name }}</td>
                                            @endif
                                        @endforeach
                                        <td style="text-align: center;">
                                            <input type="number" class="form-control quantity-input" min="1" value="1"
                                                   id="quantity-{{ $product->id }}" style="width: 80px; display: inline;">
                                            <button type="button" class="btn btn-success"
                                                   onclick="addToOrder({{ $product->id }}, '{{ $product->itemName }}', '{{ $product->unit }}', {{ $product->price }})" >
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
                    </div>
                    @foreach ($users as $user)
                    @foreach ($orders as $order )
                        <form action={{route('c.update',['key'=>$order->orderId])}} method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p style="text-transform: uppercase;"> Name: {{$user->fName}} {{$user->lName}}</p>

                                        </div>
                                        <div class="col-md-6">
                                            <p> Customer ID: {{$user->cID}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input name="id" value="{{ $user->cID }}" hidden>
                                            <p> Phone Number: {{$user->phoneNum}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p> BL: {{$order->orderId}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Invoice Handler: <span style="text-transform: uppercase;">{{$order->createdBy}}</span></p>
                                            <input name="creator" value="{{$order->createdBy}}" hidden>
                                        </div>
                                        <div class="col-md-6"></div>
                                    </div>
                                        <div class="input-group mb-1">
                                            <input type="text" name="recs" class="form-control @error('recs') is-invalid @enderror"
                                            placeholder="{{ __('CONSIGNEE FULL NAME') }}" required autocomplete="recs" autofocus
                                            value = "{{$order->consigneeName}}" style="text-transform: uppercase;">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fa-solid fa-signature"></i>
                                                </div>
                                            </div>
                                            @error('recs')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-1">
                                            <input type="text" name="cont" class="form-control"
                                            placeholder="{{ __('CONTACT NUMBER') }}" autocomplete="cont" autofocus
                                            value = "{{$order->consigneeNum}}">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fa-solid fa-phone"></i>
                                                </div>
                                            </div>
                                            @error('cont')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-1">
                                            <input type="text" name="ship" class="form-control @error('ship') is-invalid @enderror"
                                            placeholder="{{ __('Ship Number') }}" required autocomplete="ship" autofocus
                                            value = "{{$order->shipNum}}"readonly>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fas fa-ship"></i>
                                                </div>
                                            </div>
                                            @error('ship')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-1">
                                            <input type="text" name="voyage" class="form-control @error('voyage') is-invalid @enderror"
                                            placeholder="{{ __('Voyage Number') }}" autocomplete="voyage" autofocus
                                            value = "{{$order->voyageNum}}" readonly>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fas fa-hashtag"></i>
                                                </div>
                                            </div>
                                            @error('voyage')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-1">
                                            <input type="text" name="container" class="form-control"
                                            placeholder="{{ __('Container Number') }}" autocomplete="container" autofocus
                                            value = "{{$order->containerNum}}" style="text-transform: uppercase;">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fas fa-box"></i>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6 ml-1"> ORIGIN </div>
                                                <div class="col-md-5"> DESTINATION</div>
                                            </div>
                                        <div class="input-group mb-1"><!--ORIGIN FIELD-->
                                            @if ($order->containerNum == "Manila")
                                            <select id="origin" name="origin" class="form-control" onchange="updateDestinationOptions()">
                                                <option value="Manila" selected>Manila</option>
                                                <option value="Batanes">Batanes</option>
                                                <!--option value="Infanta">Infanta</option-->
                                            </select>
                                            @elseif ($order->origin == "Batanes")
                                            <select id="origin" name="origin" class="form-control" onchange="updateDestinationOptions()">
                                                <option value="Manila">Manila</option>
                                                <option value="Batanes" selected>Batanes</option>
                                                <!--option value="Infanta">Infanta</option-->
                                            </select>
                                            @else
                                            <select id="origin" name="origin" class="form-control" onchange="updateDestinationOptions()">
                                                <option value="Manila">Manila</option>
                                                <option value="Batanes">Batanes</option>
                                                <!--option value="Infanta" selected>Infanta</option-->
                                            </select>
                                            @endif
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
                                                            <th>PRICE</th>
                                                            <th>QUANTITY</th>
                                                            <th>TOTAL</th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
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
                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="input-group mb-1">
                                                        <input type="text" name="checker" class="form-control"
                                                        placeholder="{{ __('CHECKER') }}" autocomplete="checker" autofocus
                                                        value = "{{$order->check}}" style="text-transform: uppercase;">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fa-solid fa-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        @error('checker')
                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="input-group mb-1">
                                                        <input  type="text" name="remark" class="form-control"
                                                                placeholder="{{ __('REMARK') }}" autocomplete="remark" autofocus
                                                                value = "{{$order->mark}}" style="text-transform: uppercase;">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fa-solid fa-bars"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        @error('remark')
                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="input-group mb-1">
                                                        <input  type="text" name="cargostatus" class="form-control"
                                                                placeholder="{{ __('CARGO STATUS') }}" autocomplete="cargostatus" autofocus
                                                                value = "{{$order->cargo_status}}" style="text-transform: uppercase;">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fa-solid fa-dolly"></i>
                                                            </div>
                                                        </div>
                                                        @error('cargostatus')
                                                            <span class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <br>
                                                    <tbody id="orderItems"></tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="4"><strong>Total:</strong></td>
                                                            <td id="orderTotal">0.00</td>
                                                            <td></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            <br>
                                            <input type="hidden" name="orderItems" id="orderItemsInput" value="{{ old('orderItems') }}">
                                            <button type="submit" class="btn btn-success btn-block" id="submitOrderBtn">Update Order</button>
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
    // Function to dynamically update the destination options based on the selected origin
    function updateDestinationOptions() {
        var origin = document.getElementById('origin').value;
        var destination = document.getElementById('destination');

        // Clear existing options
        destination.innerHTML = '';
        @foreach ($orders as $order)
            // Dynamically add destination options based on the selected origin
            if (origin === 'Manila') {

                @if ($order->destination == "Batanes")
                    var option1 = document.createElement("option");
                    option1.value = "Batanes";
                    option1.text = "Batanes";
                    destination.appendChild(option1);
                @else
                    var option1 = document.createElement("option");
                    option1.value = "Batanes";
                    option1.text = "Batanes";
                    destination.appendChild(option1);
                @endif
            } else if (origin === 'Batanes') {
                @if ($order->destination == "Manila")
                    var option1 = document.createElement("option");
                    option1.value = "Manila";
                    option1.text = "Manila";
                    destination.appendChild(option1);
                @else
                    var option1 = document.createElement("option");
                    option1.value = "Manila";
                    option1.text = "Manila";
                    destination.appendChild(option1);
                @endif
            }
        @endforeach
    }
    // Call the function on page load to initialize the destination options based on the default origin
    window.onload = updateDestinationOptions;
</script>
<script>
    // Retrieve initial order items from the server
    let initialOrderItems = {!! $data !!};

    // Retrieve local storage items, default to an empty array if not present
    let storedOrderItems = JSON.parse(localStorage.getItem('orderItems')) || [];

    // Combine initialOrderItems with storedOrderItems, ensuring no duplicates
    let orderItems = [...storedOrderItems]; // Start with items from local storage

    initialOrderItems.forEach(item => {
        // Check if the item already exists in orderItems by its ID
        let existingItem = orderItems.find(orderItem => orderItem.name === item.name);
        if (!existingItem) {
            // Add the item if it doesn't already exist
            orderItems.push({
                id: item.id,
                name: item.name || item.itemName, // Use 'itemName' if 'name' is missing
                unit: item.unit,
                price: item.price,
                quantity: item.quantity, // Default quantity for new items
                total: item.price, // Default total for new items
            });
            console.log(item.id);
        }
    });

    // Calculate the total order amount
    let orderTotal = orderItems.reduce((total, item) => total + item.total, 0);

    // Save the combined orderItems and orderTotal back to localStorage
    localStorage.setItem('orderItems', JSON.stringify(orderItems));
    localStorage.setItem('orderTotal', JSON.stringify(orderTotal));

    // Debugging Logs
    console.log("Initial Order Items:", initialOrderItems);
    console.log("Stored Order Items:", storedOrderItems);
    console.log("Merged Order Items:", orderItems);
    console.log("Order Total:", orderTotal);

    function addToOrder(productId, productName, productUnit, productPrice) {
        const quantityInput = document.getElementById(`quantity-${productId}`);
        const quantity = parseInt(quantityInput.value) || 1;

        let orderItem = orderItems.find(item => item.name === productName);
        if (orderItem) {
            orderItem.quantity += quantity;
            orderItem.total = orderItem.quantity * productPrice;
        } else {
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
        orderTotal = orderItems.reduce((total, item) => total + item.total, 0);
        updateOrderItems();
        localStorage.setItem('orderItems', JSON.stringify(orderItems));
        localStorage.setItem('orderTotal', JSON.stringify(orderTotal));
        event.preventDefault();
    }

    function updateOrderItems() {
    let orderItemsHtml = '';
    orderTotal = 0;
    orderItems.forEach(item => {
        const priceFormatted = Number(item.price).toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        const totalFormatted = Number(item.total).toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        
        orderItemsHtml += `
            <tr>
                <td style="text-transform: uppercase;">${item.name}</td>
                <td style="text-transform: uppercase;">${item.unit}</td>
                <td>${priceFormatted}</td>
                <td>
                    <input type="number" min="1" value="${item.quantity}" class="form-control" onchange="updateQuantity(${item.id}, this.value)" />
                </td>
                <td>${totalFormatted}</td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="removeFromOrder(${item.id})">Remove</button>
                </td>
            </tr>
        `;
        orderTotal += Number(item.total);
    });
    $('#orderItems').html(orderItemsHtml);
    
    // Format the total order amount similarly
    const orderTotalFormatted = Number(orderTotal).toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    $('#orderTotal').html(orderTotalFormatted);

    // Disable submit if no items
    $('#submitOrderBtn').prop('disabled', orderItems.length === 0);
    $('#orderItemsInput').val(JSON.stringify(orderItems));
}


    function updateQuantity(productId, quantity) {
        console.log("Updating productId:", productId, "to quantity:", quantity);
        let orderItem = orderItems.find(item => item.id === productId);
        console.log("Found orderItem:", orderItem);
        if (orderItem) {
            orderItem.quantity = parseInt(quantity, 10); // Ensure integer conversion
            orderItem.total = orderItem.quantity * orderItem.price;
            updateOrderItems();
            localStorage.setItem('orderItems', JSON.stringify(orderItems));
            localStorage.setItem('orderTotal', JSON.stringify(orderTotal));
        }
    }

    function removeFromOrder(productId) {
        const index = orderItems.findIndex(item => item.id === productId);
        if (index !== -1) {
            orderItems.splice(index, 1); // Remove the item
            updateOrderItems();
            localStorage.setItem('orderItems', JSON.stringify(orderItems));
            localStorage.setItem('orderTotal', JSON.stringify(orderTotal));
        }
    }

    $(document).ready(function() {
        $.getJSON('/path/to/json/file.json', function(data) {
            let productsHtml = '';
            data.forEach(product => {
                productsHtml += `
                    <tr>
                        <td style="text-transform: uppercase;">${product.itemName}</td>
                        <td style="text-transform: uppercase;">${product.unit}</td>
                        <td>${product.price}</td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="addToOrder(${product.id}, '${product.itemName}', '${product.unit}', ${product.price})">Add to Order</button>
                        </td>
                    </tr>
                `;
            });
            $('#productCatalog').html(productsHtml);
        });

        updateOrderItems();
    });
    $.ajax({
    url: '/update-price', // Your update endpoint
    type: 'POST',
    data: {
        id: itemId,
        price: updatedPrice,
        _token: '{{ csrf_token() }}'
    },
    success: function(response) {
        // Update the price on the page without reloading
        $('#price-' + itemId).text(response.newPrice);
    },
    error: function(error) {
        console.log(error);
    }
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
