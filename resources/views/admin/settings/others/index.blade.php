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
                                    <h5 class="m-b-10">Progress</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a >Settings</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.settings.others.index') }}">Others</a></li>
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
                                    <p>Faq Url will be shown on mobile application on bottom menu.</p>
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

                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Faq URL</h5>
                                    </div>

                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form action="{{ route('admin.settings.others.update') }}" method="POST" enctype="multipart/form-data">
                                                    
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label for="Faq" class="col-sm-3 col-form-label">Faq URL</label>
                                                        <div class="col-sm-9">    
                                                            <input class="form-control" name="Faq" id="Faq" placeholder="Faq" value="{{ $Faq ?? '' }}" autofocus>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Custom_Color_Price" class="col-sm-3 col-form-label">Custom Color Price</label>
                                                        <div class="col-sm-9">    
                                                            <input class="form-control" name="Custom_Color_Price" id="Custom_Color_Price" placeholder="Custom Color Price" value="{{ $Custom_Color_Price ?? '' }}" autofocus>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Custom_Text_Price" class="col-sm-3 col-form-label">Custom Text Price</label>
                                                        <div class="col-sm-9">    
                                                            <input class="form-control" name="Custom_Text_Price" id="Custom_Text_Price" placeholder="Custom Text Price" value="{{ $Custom_Text_Price ?? '' }}" autofocus>
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
                        <!-- [ file-upload ] end -->

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

@endsection
