@extends('admin.base')

@section('css')

    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-tagsinput-latest/css/bootstrap-tagsinput.css') }}">

@endsection


@section('content')

   <!-- [ Main Content ] start -->
   <div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Progress</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.customproduct.index') }}">Custom 3D Products</a></li>
                                    <li class="breadcrumb-item"><a href="#!">Add</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->

                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-primary" role="alert">
                                    <p>If you enter SKU and press the "Search" button, Quantity, Price, Sizes will be fetched from API. 
                                        <br>Price will be selected the lowest prices of asking_price on API.
                                    </p>
                                </div>

                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                        
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
                            </div>
                            <!-- [ carousel ] start -->
                        </div>

                        <div class="row justify-content-md-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Add Custom 3D Model</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <form method="POST" action="{{ route('admin.customproduct.store') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label for="SKU" class="col-sm-3 col-form-label">SKU</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control" name="SKU" id="SKU" placeholder="SKU">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <button class="btn btn-primary" id="Search">Search</button>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Name" class="col-sm-3 col-form-label">Name</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="Name" id="Name" placeholder="Name">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Description" class="col-sm-3 col-form-label">Description</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="Description" id="Description" placeholder="Description">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Quantity" class="col-sm-3 col-form-label">Quantity</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="Quantity" id="Quantity" placeholder="Quantity" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Price" class="col-sm-3 col-form-label">Base Price</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="Price" id="Price" placeholder="Price" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Sizes" class="col-sm-3 col-form-label">Sizes</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="Sizes" id="Sizes" placeholder="Sizes" readonly>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label for="Preview" class="col-sm-3 col-form-label">Preview Image</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control" name="Preview" id="Preview" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Model" class="col-sm-3 col-form-label">Model (*.fbx)</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control" name="Model" id="Model" required>
                                                        </div>
                                                    </div>


                                                    <div class="form-group row justify-content-sm-center">
                                                        <img class="img-fluid" src="{{ asset(Config('Constants.directory.custom_parts')) }}" width="500">
                                                    </div>


                                                    <div class="form-group row">
                                                        <label for="ColorPrice" class="col-sm-3 col-form-label">Color Price</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="ColorPrice" id="ColorPrice" placeholder="Color Price" required>
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label for="TextPrice" class="col-sm-3 col-form-label">Text Price</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="TextPrice" id="TextPrice" placeholder="TextPrice" required>
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label">Part Prices</label>
                                                    </div>

                                                    @foreach($CustomParts as $item)

                                                    <div class="form-group" style="display: flex; align-item: center">
                                                        <label class="col-sm-2 col-form-label"><b>Part {{ $item }}</b></label>
                                                        
                                                        @foreach($PriceCategories as $priceCategory)
                                                            <label class="col-sm-2 col-form-label" style="max-width: 100px;">{{ $priceCategory->Name }} : </label>
                                                            <input class="form-control" name="PartPrices[{{ $item }}][{{$priceCategory->Name}}]">
                                                        @endforeach
                                                    </div>
                                                    @endforeach
                                                    
                                                    <div class="form-group row">
                                                        <label for="Status" class="col-sm-3 col-form-label">Status</label>
                                                        <div class="col-sm-9">
                                                            <div class="switch switch-primary d-inline s-r-8">
                                                                <input type="checkbox" name="Status" id="Status">
                                                                <label for="Status" class="cr"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row justify-content-md-right">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->

@endsection


@section('javascript')

    <script src="{{ asset('js/pages/form-advance-custom.js') }}"></script>

    <script>
        $(document).ready(function(){

            $('#Search').click(function(){

                var sku = $('#SKU').val();

                $.ajax({
                    method: "GET",
                    url: "{{ route('admin.customproduct.search')}}",
                    data: { SKU: sku, _token: "{{ csrf_token() }}" },
                    dataType: 'JSON',

                    success: function (data) { 
                        
                        $('#Name').val(data['display_name']);
                        $('#Description').val(data['display_name']);
                        $('#Quantity').val(data['qty']);

                        var sizes = "";
                        var price = 0;

                        data['sneakers_sizes'].forEach( (element) => {
                            sizes += element["US"] + ":";

                            if(price == 0)
                                price = parseInt(element["asking_price"]);
                            else if(price > parseInt(element["asking_price"]))
                                price = parseInt(element["asking_price"]);
                        });

                        sizes = sizes.substr(0, sizes.length - 1);
                        $('#Sizes').val(sizes);

                        $('#Price').val(price);
                    }
                });
            });
        });
    </script>

@endsection
