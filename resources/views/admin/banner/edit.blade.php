@extends('admin.base')

@section('css')

    <link rel="stylesheet" href="{{ asset('plugins/ekko-lightbox/css/ekko-lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/ekko-lightbox/css/lightbox.min.css') }}">

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
                                    <h5 class="m-b-10">Banners</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.banner.index') }}">Banners</a></li>
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
                                    <p>Please confirm that all banner image size should be 1081 x 484 pixels before uploading.</p>
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

                        <!-- [ file-upload ] start -->
                        <div class = "row">

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Upload Image</h5>
                                    </div>

                                    <div class="card-block">

                                        <form action="{{ route('admin.banner.update') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">

                                                <input type="hidden" name="id" value="{{ $banner->id }}"/>
                                                
                                                <div class="col-md-6">
                                                    
                                                    <div class="form-group row">
                                                        <label for="Image" class="col-sm-3 col-form-label">Current Banner</label>
                                                        <div class="col-sm-9">
                                                            <img src = "{{ asset($banner->filepath) }}" class="img-fluid" width = "200px">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label for="Image" class="col-sm-3 col-form-label">Image</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="file" name="image" id="image" autofocus>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Url" class="col-sm-3 col-form-label">Url</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="url" id="url" placeholder="https://google.com" value = "{{ $banner->url }}" autofocus>
                                                        </div>
                                                    </div>              

                                                    <div class="form-group row justify-content-md-right">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ file-upload ] end -->

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

    <!-- ekko-lightbox Js -->
    <script src="{{ asset('plugins/ekko-lightbox/js/ekko-lightbox.min.js') }}"></script>
    <script src="{{ asset('plugins/lightbox2-master/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('js/pages/ac-lightbox.js') }}"></script>

    <!-- sweet alert Js -->
    <script src="{{ asset('plugins/sweetalert/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/pages/ac-alert.js') }}"></script>

@endsection
