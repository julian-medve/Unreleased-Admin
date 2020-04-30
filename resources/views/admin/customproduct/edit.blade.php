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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.customproduct.index') }}">Custom 3D Product</a></li>
                                    <li class="breadcrumb-item"><a href="#!">Edit</a></li>
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
                                    <p>All models are shown, to being customized by users.</p>
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
                                        <h5>Edit Custom 3D Product</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form method="POST" action="{{ route('admin.customproduct.update') }}" enctype="multipart/form-data">
                                                    @csrf

                                                    <input type="hidden" name="CustomProduct" value=" {{ $CustomProduct->Id }}"/>
                                                    
                                                    <div class="form-group row">
                                                        <label for="SKU" class="col-sm-3 col-form-label">SKU</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control" name="SKU" id="SKU" placeholder="SKU" value="{{ $CustomProduct->SKU }}">
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <button class="btn btn-primary" id="Search" type="button">Search</button>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Name" class="col-sm-3 col-form-label">Name</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="Name" id="Name" placeholder="Name" value="{{ $CustomProduct->Name }}" required autofocus>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Description" class="col-sm-3 col-form-label">Description</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="Description" id="Description" placeholder="Description" value="{{ $CustomProduct->Description }}" required autofocus>
                                                        </div>
                                                    </div>
                                                  
                                                    <div class="form-group row">
                                                        <label for="Quantity" class="col-sm-3 col-form-label">Quantity</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="Quantity" id="Quantity" placeholder="Quantity"  value="{{ $CustomProduct->Quantity }}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Price" class="col-sm-3 col-form-label">Base Price</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="Price" id="Price" placeholder="Price"  value="{{ $CustomProduct->Price }}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Sizes" class="col-sm-3 col-form-label">Sizes</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="Sizes" id="Sizes" placeholder="Sizes"  value="{{ $CustomProduct->Sizes }}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="preview" class="col-sm-3 col-form-label">Preview Image</label>
                                                        <div class="col-sm-9">
                                                            <div class="col-sm-6">
                                                                <img class="img-fluid" src="{{ asset($CustomProduct->Preview) }}" >
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="preview_upload" class="col-sm-3 col-form-label"></label>
                                                        <div class="col-sm-9">                                                            
                                                            <input type="file" class="form-control" name="Preview" id="preview_upload">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="model" class="col-sm-3 col-form-label">Model (*.fbx)</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control" name="Model" id="Model" >
                                                        </div>
                                                    </div>

                                                    <div class="form-group row justify-content-sm-center">
                                                        <img class="img-fluid" src="{{ asset(Config('Constants.directory.custom_parts')) }}" width="500">
                                                    </div>


                                                    <div class="form-group row">
                                                        <label for="ColorPrice" class="col-sm-3 col-form-label">Color Price</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="ColorPrice" id="ColorPrice" placeholder="Color Price" value="{{ $CustomProduct->ColorPrice }}" required>
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label for="TextPrice" class="col-sm-3 col-form-label">Text Price</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="TextPrice" id="TextPrice" placeholder="TextPrice"  value="{{ $CustomProduct->TextPrice }}" required>
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label">Part Prices</label>
                                                    </div>

                                                    @foreach($CustomParts as  $PartKey => $item)

                                                    <div class="form-group" style="display: flex; align-item: center">
                                                        <label class="col-sm-2 col-form-label"><b>Part {{ $item }}</b></label>
                                                        
                                                        @foreach($PriceCategories as $PriceKey => $priceCategory)
                                                            <label class="col-sm-2 col-form-label" style="max-width: 100px;">{{ $priceCategory->Name }} : </label>
                                                            <input class="form-control" name="PartPrices[{{ $item }}][{{ $priceCategory->Name }}]" value = "{{ $PartPrices[$PartKey][$PriceKey] }}">
                                                        @endforeach
                                                    </div>
                                                    @endforeach
                                                    

                                                    <div class="form-group row">
                                                        <label for="status" class="col-sm-3 col-form-label">Status</label>
                                                        <div class="col-sm-9">
                                                            <div class="switch switch-primary d-inline s-r-8">
                                                                
                                                                
                                                                @if($CustomProduct->Status)
                                                                    <input type="checkbox" name="Status" id="Status" checked>
                                                                @else
                                                                    <input type="checkbox" name="Status" id="Status">
                                                                @endif
                                                                
                                                                <label for="Status" class="cr"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <input type = "hidden" name = "SellerId" id = "SellerId"/>

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

<!-- Warning Section start -->
<!-- Older IE warning message -->
<!--[if lt IE 11]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade
           <br/>to any of the following web browsers to access this website.
        </p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="../assets/images/browser/chrome.png" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="../assets/images/browser/firefox.png" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="../assets/images/browser/opera.png" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="../assets/images/browser/safari.png" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="../assets/images/browser/ie.png" alt="">
                        <div>IE (11 & above)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
<![endif]-->
<!-- Warning Section Ends -->

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

                        var quantity = "";
                        var sizes = "";
                        var price = 0;
                        var sellerId = "";

                        data['sneakers_sizes'].forEach( (element) => {
                            sizes += element["US"] + ":";

                            if(price == 0)
                                price = parseInt(element["asking_price"]);
                            else if(price > parseInt(element["asking_price"]))
                                price = parseInt(element["asking_price"]);

                            sellerId += element["id"] + ":"; 
                            quantity += element["stock"] + ":";
                        });

                        sizes = sizes.substr(0, sizes.length - 1);
                        sellerId = sellerId.substr(0, sellerId.length - 1);
                        quantity = quantity.substr(0, quantity.length - 1);

                        $('#Sizes').val(sizes);

                        $('#Price').val(price);
                        $('#SellerId').val(sellerId);
                        $('#Quantity').val(quantity);
                    }
                });
            });
        });
    </script>

@endsection
