@extends('layouts.app')

@section('content')
<div class="container">
    <!-- this function of java Script play Camera -->
<script src="https://reeteshghimire.com.np/wp-content/uploads/2021/05/html5-qrcode.min_.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Header --> 
<div class="container-fluid header_se">
  <br>
  <br>
  <div class="row">
    <div class="col-md-2"></div>
   <div class="col-md-8">
    <h4 style="text-align: center; padding-bottom: 10px;" class="pl-4"> SCAN ORDER QR TO BE ADDED INSIDE THE CARGO</h4>

    <div id="reader"></div>
   </div>
   <div class="col-md-2"></div>

  </div>
  <div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">


    <form action={{route('o.submit')}} method="post" enctype="multipart/form-data">
      @csrf
            <div class="card">
                <br>
                <h4 class="pl-4"> CARGO QR CREATION</h4>

                <div class="card-body">
                  <div class="input-group mb-1">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                           placeholder="{{ __('INPUT CARGO CONTAINER NUMBER') }}" required autocomplete="name" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fa-solid fa-truck-ramp-box"></i>
                        </div>
                    </div>
                    @error('name')
                    <span class="error invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="input-group mb-1">
                  <input type="text" name="num" class="form-control @error('num') is-invalid @enderror"
                         placeholder="{{ __('INPUT SHIP NUMBER') }}" required autocomplete="num" autofocus>
                  <div class="input-group-append">
                      <div class="input-group-text">
                        <i class="fa-solid fa-ship"></i>
                      </div>
                  </div>
                  @error('num')
                  <span class="error invalid-feedback">
                      {{ $message }}
                  </span>
                  @enderror
              </div> 

              <div class="input-group mb-1">
                <input type="text" name="weight" class="form-control @error('weight') is-invalid @enderror"
                       placeholder="{{ __('INPUT CARGO WEIGHT') }}" required autocomplete="weight" value="{{$key}}" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <i class="fa-solid fa-weight-scale"></i>
                    </div>
                </div>
                @error('weight')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div> 

            
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                            </tr>
                        </thead>
                        <tbody id="orderItems">
                        </tbody>
                    </table>
                </div>
            </div>
            
                <input type="hidden" name="orderItems" id="orderIdInput">
                <button type="submit" class="btn btn-success btn-block" id="submitOrderBtn" disabled>Update Order</button>
            </form>
  </div>

  <div class="col-md-2"></div>

</div>
 <script type="text/javascript">

let orderItems = [];

  function onScanSuccess(orderId) {
    
    // Check if the product is already in the order
    let orderItem = orderItems.find(item => item.id === orderId);
        if (orderItem) {
            //Do nothing
        } else {
            // If not, add it to the order
            orderItem = {
                id: orderId,
            };
            orderItems.push(orderItem);
        }

        // Update the UI
        updateOrderItems();
  }
  
  function updateOrderItems() {
        let orderItemsHtml = '';
        orderItems.forEach(item => {
            orderItemsHtml += `
                <tr>
                    <td>${item.id}</td>
                    <td>
                        <button type="button" class="btn btn-primary" onclick="remover('${item.id}')">Remove</button>
                    </td>
                </tr>
            `;
    });
    $('#orderItems').html(orderItemsHtml);
    if (orderItems.length > 0) {
    $('#submitOrderBtn').prop('disabled', false);
} else {
    $('#submitOrderBtn').prop('disabled', true);
}
    $('#orderIdInput').val(JSON.stringify(orderItems));
}

function remover(productId) {
    // Find the index of the order item to remove
    let index = orderItems.findIndex(item => item.id === productId);
    if (index !== -1) {
        // If found, remove it from the order
        orderItems.splice(index, 1);
    }

    // Update the UI
    updateOrderItems();
}



  var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
  html5QrcodeScanner.render(onScanSuccess);
 </script>
 </div>
 </div>


<script type="text/javascript">
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
  });
</script>
<style>
  .result{
    background-color: green;
    color:#fff;
    padding:20px;
  }
  .row{
    display:flex;
  }
  #reader {
    background: black;
    width:100%;
    margin-bottom: 30px
  }
  button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 6px;
}
a#reader__dashboard_section_swaplink {
  background-color: blue; /* Green */
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 6px;
}
span a{
  display:none
}

#reader__camera_selection{
  background: blueviolet;
  color: aliceblue;
}
#reader__dashboard_section_csr span{
  color:red
}
</style>
@endsection