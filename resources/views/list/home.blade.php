@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


<script>
$(document).ready(function() {
    var rowData;
    var key;

    function handleUpdateButtonClick(data) {
        console.log(data); // Debugging output to verify data
        $('#itemName').val(data.name);
        $('#cat2').show();
        $('#length').show();
        $('#width').show();
        $('#height').show();
        $('#multiplier').show();

        $('#cats2').val(data.cat);
        $('#id').val(data.id);
        $('#unit').val(data.unit);

        // Corrected this section to ensure the fields are populated
        $('#length').val(data.length);
        $('#width').val(data.width);
        $('#height').val(data.height);


        let inputValue = data.price;
        let sanitizedValue = inputValue.replace(/,/g, '');
        let numericValue = parseFloat(sanitizedValue);
        $('#price').val(numericValue);
        inputValue = data.multiplier;
        sanitizedValue = inputValue.replace(/,/g, '');
        numericValue = parseFloat(sanitizedValue);
        $('#multiplier').val(numericValue);

        $('#cat1').hide();

        $('#create').attr('action', '{{ route('p.update') }}');
        $('#submitButton').text('UPDATE');

        $('#deleteButton').show();
    }

    // Function to handle delete button click event
    function handleDeleteButtonClick(data) {
                // Perform delete operation here
                var id = key;

                $.ajax({
                    url: '{{ route('p.delete') }}', // Replace with your server-side endpoint URL
                    type: 'GET',
                    data: {
                        id: id,
                    },
                    success: function(response) {
                        location.reload();
                    }
                });
            }

    function handleTableRowClick() {
        var name = $(this).find('.name').text();
        var cat = $(this).find('.cat').text();
        var price = $(this).find('.price').text();
        var id = $(this).find('.id').text();
        var length = $(this).find('.length').text();
        var width = $(this).find('.width').text();
        var height = $(this).find('.height').text();
        var multiplier = $(this).find('.multiplier').text();
        var unit = $(this).find('.unit').text();

        key = id;

        rowData = {
            name: name,
            cat: cat,
            price: price,
            id: id,
            length: length,
            width: width,
            height: height,
            multiplier: multiplier,
            unit:unit
        };

        handleUpdateButtonClick(rowData);
    }

    $('.table-row').on('click', handleTableRowClick);
    $('#deleteButton').on('click', handleDeleteButtonClick);
});
</script>

<!-- Content Header (Page header) -->
<div class="content-header" style="background-color: #f5f6fa">
    <h1 style="padding-left:10px;">PRICE LIST</h1>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"></div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.content-header -->

<!-- Main content -->
<div class="content" style="background-color: #f5f6fa">
    <div class="container-fluid">
        <div class="row mb-2">
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
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h5>PRICE LIST</h5>
                    </div>
                    <div class="card-body">
                        {{ $items->appends(['cats' => $cats])->links() }}
                        <table class="table" id="myTable2">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Unit</th>
                                    <th scope="col" style="text-align: center;">Category</th>
                                    <th scope="col" style="text-align: center;">Price</th>
                                    <th scope="col"  style="text-align: center;">Multiplier</th>
                                    <th scope="col"  style="text-align: center;">Edit Info</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                <tr class="table-row">
                                    <td class="id" ; style="display:none">{{ $item->id }} </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="name">{{ $item->itemName }}</td>
                                    <td class="unit">{{ $item->unit }}</td>

                                    @foreach ($cats as $cat)
                                    @if ($item->category == $cat->id)
                                    <td class="cat" style="text-align: center;">{{ $cat->name }}</td>
                                    @endif
                                    @endforeach
                                    <td class="length" hidden>{{ $item->length }}</td>
                                    <td class="width" hidden>{{ $item->width }}</td>
                                    <td class="height" hidden>{{ $item->height }}</td>

                                    <td class="price" style="text-align: right;">{{ number_format($item->price, 2) }}</td>
                                    <td class="multiplier" style="text-align: right;">{{ number_format ($item->multiplier, 2) }}</td>
                                    <td class="align-middle"  style="text-align: center;">
                                        <i class="fa fa-edit" id="updateBtn" style="color:grey"></i>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Display current page number -->
                        <p>Page: {{ $items->currentPage() }}</p>
                        <!-- Display pagination links -->
                        {{ $items->appends(['cats' => $cats])->links() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header" id="CREATE">
                        <h5>CREATE LISTING</h5>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                            <form method="POST" action="{{ route('p.add') }}" enctype="multipart/form-data" id="create1">
                                            @csrf
                                            <!-- Input for Add/Edit -->
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">

                                                    <label for="categoryName">Category Name</label>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a data-toggle="modal" data-target="#editModal">
                                                            <i class="fa-solid fa-pen-to-square fa-xl pl-3"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a data-toggle="modal" data-target="#deleteModal">
                                                            <i class="fa-solid fa-trash fa-xl pl-3"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter Category Name" style="text-transform: uppercase;">

                                            </div>

                                            <!-- Buttons -->
                                            <button type="submit" class="btn btn-primary" id="addCategory">Add</button>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!-- EDIT Modal -->
                         <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                            <form method="POST" action="{{ route('p.upd') }}" enctype="multipart/form-data" id="update">
                                            @csrf
                                            <div class="form-group">
                                                <label for="category">Select Category</label>
                                                <div class="form-group d-flex align-items-center" >
                                                    <select class="form-control me-5" id="categorySelect" name="categorySelect" style="max-width:90%;">
                                                        <option value="">-- Select Category --</option>
                                                        @foreach($cats as $cat)
                                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                                <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter Category Name">

                                            </div>
                                            <button type="submit" class="btn btn-warning" id="editCategory">Edit</button>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- DELETE Modal -->
                         <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                            <form method="POST" action="{{ route('p.del') }}" enctype="multipart/form-data" id="update">
                                            @csrf
                                            <div class="form-group">
                                                <label for="category">Select Category</label>
                                                <div class="form-group d-flex align-items-center" >
                                                    <select class="form-control me-5" id="categorySelect" name="categorySelect" style="max-width:90%;">
                                                        <option value="">-- Select Category --</option>
                                                        @foreach($cats as $cat)
                                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>

                                            </div>
                                            <button type="submit" class="btn btn-danger" id="editCategory">Delete</button>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- CREATE -->
                        <form method="POST" action="{{ route('p.create') }}" enctype="multipart/form-data" id="create">
                            @csrf
                            <input style="display:none" id="id" type="text" name="id" value="{{ old('itemName') }}" autocomplete="id">
                            <div class="form-group row" style="padding-left: 215px" id="cat1">
                                <select class="form-control" id="cats" name="cats" style="max-width:85%;">
                                    <option selected value="0">Choose Category</option>
                                    @foreach ($cats as $value)
                                    <option value={{ $value->id }}>{{ $value->name }}</option>
                                    @endforeach
                                </select>

                                @error('cats')
                                <span class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror

                                <div style="padding-top:5px; padding-left:10px">
                                    <a data-toggle="modal" data-target="#exampleModal"><i
                                        class="fa-solid fa-plus fa-xl"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="form-group row " style="display: none;" id="cat2">
                                <label for="cats" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                                <div class="col-md-6">
                                    <input id="cats2" type="text" class="form-control @error('cats2') is-invalid @enderror" name="cats2" value="{{ old('cats2') }}" autocomplete="cats2" autofocus>

                                    @error('cats2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="itemName" class="col-md-4 col-form-label text-md-right">{{ __('Item Name') }}</label>
                                <div class="col-md-6">
                                    <input id="itemName" type="text" class="form-control @error('itemName') is-invalid @enderror" name="itemName" value="{{ old('itemName') }}" required autocomplete="itemName" autofocus style="text-transform: uppercase;">

                                    @error('itemName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="unit" class="col-md-4 col-form-label text-md-right">{{ __('Unit') }}</label>
                                <div class="col-md-6">
                                    <input id="unit" type="text" class="form-control @error('unit') is-invalid @enderror" name="unit" value="{{ old('unit') }}" autocomplete="unit" autofocus style="text-transform: uppercase;">

                                    @error('unit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>
                                <div class="col-md-6">
                                    <input id="price" type="number" step="any" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" autocomplete="price" autofocus step='0.1'>
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="length" class="col-md-4 col-form-label text-md-right">{{ __('Length') }}</label>
                                <div class="col-md-6">
                                   <input id="length" type="number" step="any" class="form-control" name="length" value="{{ old('length') }}" autocomplete="length" oninput="updatePrice()">
                                    @error('length')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="width" class="col-md-4 col-form-label text-md-right">{{ __('Width') }}</label>
                                <div class="col-md-6">
                                    <input id="width" type="number" step="any" class="form-control" name="width" value="{{ old('width') }}" autocomplete="width" oninput="updatePrice()">
                                    @error('width')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('Height') }}</label>
                                <div class="col-md-6">
                                    <input id="height" type="number" step="any" class="form-control" name="height" value="{{ old('height') }}" autocomplete="height" oninput="updatePrice()">
                                    @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="multiplier" class="col-md-4 col-form-label text-md-right">{{ __('Multiplier') }}</label>
                                <div class="col-md-6">
                                    <input id="multiplier" type="number" class="form-control" name="multiplier" value="{{ old('multiplier') }}" autocomplete="multiplier" oninput="updatePrice()">
                                    @error('multiplier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-4"></div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-success" id="submitButton">
                                        {{ __('CREATE') }}
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" style="display: none;" class="btn btn-danger" id="deleteButton">
                                        {{ __('DELETE') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <style>
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

    </style>
@endsection
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
        const priceField = document.getElementById('price');
        if (!priceField.dataset.manualEdit) {
            // Update the value only if the user hasn't manually edited it
            priceField.value = calculatedPrice.toFixed(2); // Display the result with 2 decimal places
        }
    }

    function enableManualEdit() {
        const priceField = document.getElementById('price');
        priceField.dataset.manualEdit = true; // Mark the field as manually edited
    }

    function resetManualEdit() {
        const priceField = document.getElementById('price');
        priceField.dataset.manualEdit = false; // Allow automatic updates again
    }

    // Attach event listeners to the fields for calculation
    document.getElementById('length').addEventListener('input', updatePrice);
    document.getElementById('width').addEventListener('input', updatePrice);
    document.getElementById('height').addEventListener('input', updatePrice);
    document.getElementById('multiplier').addEventListener('input', updatePrice);

    // Allow the price field to be manually editable
    const priceField = document.getElementById('price');
    priceField.addEventListener('input', enableManualEdit);
    priceField.addEventListener('blur', resetManualEdit); // Reset manual edit mode on blur
</script>
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
