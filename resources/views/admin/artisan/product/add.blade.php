@extends('admin.base')

@section('css')
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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.artisan.category.index') }}">Artisan Category</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.artisan.product.index', ['ArtisanCategory' => $ArtisanCategory ]) }}">Artisan Product</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.artisan.product.add', ['ArtisanCategory' => $ArtisanCategory ]) }}">Add</a></li>
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
                                        <h5>Add Customize Model</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form method="POST" action="{{ route('admin.artisan.product.store') }}" enctype="multipart/form-data">
                                                    @csrf

                                                    <input type="hidden" name="ArtisanCategory" value="{{ $ArtisanCategory }}"/>
                                                    <div class="form-group row">
                                                        <label for="Name" class="col-sm-3 col-form-label">Name</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="Name" id="Name" placeholder="Name" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Description" class="col-sm-3 col-form-label">Description</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="Description" id="Description" placeholder="Description" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label for="Price" class="col-sm-3 col-form-label">Price</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="Price" id="Price" placeholder="Price" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Size" class="col-sm-3 col-form-label">Size</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="Size" id="Size" placeholder="Size" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Quantity" class="col-sm-3 col-form-label">Quantity</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="Quantity" id="Quantity" placeholder="Quantity" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label for="Preview" class="col-sm-3 col-form-label">Preview Image</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control" name="Preview" id="Preview" multiple required>
                                                        </div>
                                                    </div>

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

@endsection
