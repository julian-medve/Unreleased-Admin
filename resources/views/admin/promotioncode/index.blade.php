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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a>Promotion Code</a></li>
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
                                    <p>All Promotion Codes.</p>
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
                        </div>

                        <div class="row justify-content-md-center">
                            <div class="col-sm-12">
                                <div class="card">

                                    <div class="card-header">
                                        <h5>All Promotion Codes</h5>
                                        <div class="card-header-right">
                                            <a href="{{ route('admin.promotioncode.add')}}"><button type="button" class="btn btn-primary">Add Promoton Code</button></a>
                                        </div>
                                    </div>

                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table id="responsive-table-model" class="display table dt-responsive nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Description</th>
                                                        <th>Code</th>
                                                        <th>Percent</th>
                                                        <th>Total Times</th>
                                                        <th>Used Times</th>
                                                        <th>Used Customer</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($PromotionCodes as $item)
                                                    <tr>
                                                        <td>{{ $item->Name }}</td> 
                                                        <td>{{ $item->Description }}</td> 
                                                        <td>{{ $item->Code }}</td> 
                                                        <td>{{ $item->Percent }}</td> 
                                                        <td>{{ $item->Times }}</td> 
                                                        <td>{{ $item->UsedTimes }}</td> 
                                                        <td>{{ $item->UsedCustomer }}</td> 

                                                        <td class="text-center">
                                                            <a class="dropdown-toggle addon-btn" data-toggle="dropdown" aria-expanded="true">
                                                                <i class="fas fa-cog"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="{{ route('admin.promotioncode.edit', ['PromotionCode' => $item->Id] ) }}"><i class="feather icon-edit"></i> &nbsp;&nbsp;Edit</a>
                                                                <a class="dropdown-item" href="{{ route('admin.promotioncode.delete', ['PromotionCode' => $item->Id] ) }}"><i class="feather icon-trash-2"></i> &nbsp;&nbsp;Delete</a>
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

@endsection


@section('javascript')

    <!-- ekko-lightbox Js -->
    <script src="{{ asset('plugins/data-tables/js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/pages/tbl-datatable-custom.js') }}"></script>

@endsection
