@extends('layouts.app')

@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(document).ready(function() {
            var rowData; // Variable to store the selected row data
            var key;
            // Function to handle update button click event
            function handleUpdateButtonClick(data) {
                // Update the form with the selected row data
                $('#itemName').val(data.name);
                $('#price').val(data.price);
                $('#cat2').show();

                $('#cats2').val(data.cat);
                $('#id').val(data.id);

                $('#cat1').hide();

                // Change the form action and submit button label for updating
                $('#create').attr('action', '{{ route('p.update') }}');
                $('#submitButton').text('UPDATE');

                // Show the delete button
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

            // Function to handle table row click event
            function handleTableRowClick() {
                // Get the data from the clicked row
                var name = $(this).find('.name').text();
                var cat = $(this).find('.cat').text();
                var price = $(this).find('.price').text();
                var id = $(this).find('.id').text();
                key = id;
                // Create an object with the row data
                rowData = {
                    name: name,
                    cat: cat,
                    price: price,
                    id: id
                };

                // Pass the data to the update form
                handleUpdateButtonClick(rowData);

            }

            // Attach click event listener to table rows
            $('.table-row').on('click', handleTableRowClick);

            // Attach click event listener to delete button
            $('#deleteButton').on('click', handleDeleteButtonClick);
        });
    </script>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->

    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">

        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <form action="{{ route('l.search') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control"
                                placeholder="Search by Item Name or Category">
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
                            PRICE LIST
                        </div>
                        <div class="card-body">
                            {{ $items->appends(['cats' => $cats])->links() }}
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Item Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Edit Info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr class="table-row">
                                            <td class="id" ; style="display:none">{{ $item->id }} </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="name">{{ $item->itemName }}</td>
                                            @foreach ($cats as $cat)
                                            @if ($item->category == $cat->id)
                                            <td class="cat">{{ $cat->name }}</td>
                                            @endif
                                            @endforeach
                                            
                                            <td class="price">{{ $item->price }}</td>
                                            <td class="align-middle">
                                                <i class="fas fa-edit" id="updateBtn" style="color:grey"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Display current page number -->
                            <p>Page: {{ $items->currentPage() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header" id="CREATE">
                            CREATE LISTING
                        </div>
                        <div class="card-body">

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('p.cat') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="category"
                                                        class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                                                    <div class="col-md-6">
                                                        <input id="category" type="text"
                                                            class="form-control @error('category') is-invalid @enderror"
                                                            name="category" value="{{ old('category') }}" required
                                                            autocomplete="category" autofocus>
                                                        @error('category')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CREATE -->

                            <form method="POST" action="{{ route('p.create') }}" enctype="multipart/form-data"
                                id="create">
                                @csrf
                                <input style="display:none" id="id" type="text" name="id"
                                    value="{{ old('itemName') }}" autocomplete="id">

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
                                                class="fa-solid fa-plus fa-xl"></i></a>
                                    </div>
                                </div>
                                <div class="form-group row " style="display: none;" id="cat2">
                                    <label for="cats"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                                    <div class="col-md-6">
                                        <input id="cats2" type="text"
                                            class="form-control @error('cats2') is-invalid @enderror" name="cats2"
                                            value="{{ old('cats2') }}" autocomplete="cats2" autofocus>

                                        @error('cats2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="itemName"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Item Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="itemName" type="text"
                                            class="form-control @error('itemName') is-invalid @enderror" name="itemName"
                                            value="{{ old('itemName') }}" required autocomplete="itemName" autofocus>

                                        @error('itemName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="price"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                                    <div class="col-md-6">
                                        <input id="price" type="price"
                                            class="form-control @error('price') is-invalid @enderror" name="price"
                                            value="{{ old('price') }}" required autocomplete="price">

                                        @error('price')
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
                                        <button type="button" style="display: none;" class="btn btn-danger"
                                            id="deleteButton">
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
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

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
