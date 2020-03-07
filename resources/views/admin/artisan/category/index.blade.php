@extends('admin.base')

@section('css')

    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('plugins/data-tables/css/datatables.min.css') }}">

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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.artisan.category.index')}}">Artisan Category</a></li>
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
                                    <p>All Artisan Categories are shown, to being bought by users.</p>
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
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>All Artisan Categories</h5>

                                        @if(Auth()->user()->role == Config('Constants.userrole.super_admin')
                                            || Auth()->user()->role == Config('Constants.userrole.admin'))
                                        
                                        <div class="card-header-right">
                                            <a href="{{ route('admin.artisan.category.add')}}"><button type="button" class="btn btn-primary">Add Category</button></a>
                                        </div>
                                        @endif

                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table id="responsive-table-model" class="display table dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Description</th>
                                                        <th>Preview Image</th>
                                                        <th>Status</th>
                                                        <th>Submitter</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($artisan_categories as $item)
                                                    <tr>
                                                        <td>{{ $item->Name }}</td>
                                                        <td>{{ $item->Description }}</td>
                                                        <td>
                                                            <img class="img-fluid" src="{{ asset($item->PreviewImage) }}" width="80px">
                                                        </td>
                                                        <td>
                                                            @if( !is_null($item->Status))
                                                                @if( $item->Status)
                                                                    <span class="badge badge-primary"> {{ Config::get('Constants.custom.status.enabled') }} </span>
                                                                @else
                                                                    <span class="badge badge-secondary">{{ Config::get('Constants.custom.status.disabled') }} </span>
                                                                @endif
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->user->name }}</td>

                                                        <td class="text-center">
                                                            <a class="dropdown-toggle addon-btn" data-toggle="dropdown" aria-expanded="true">
                                                                <i class="fas fa-cog"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="{{ route('admin.artisan.product.index',  ['ArtisanCategory' => $item->Id] ) }}"><i class="feather icon-feather"></i> &nbsp;&nbsp;Products</a>
                                                                <div role="separator" class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="{{ route('admin.artisan.category.edit',  ['ArtisanCategory' => $item->Id] ) }}"><i class="feather icon-edit"></i> &nbsp;&nbsp;Edit</a>
                                                                <a class="dropdown-item" href="{{ route('admin.artisan.category.delete',['ArtisanCategory' => $item->Id] ) }}"><i class="feather icon-trash-2"></i>&nbsp;&nbsp;Delete</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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

    <!-- ekko-lightbox Js -->
    <script src="{{ asset('plugins/data-tables/js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/pages/tbl-datatable-custom.js') }}"></script>

@endsection
