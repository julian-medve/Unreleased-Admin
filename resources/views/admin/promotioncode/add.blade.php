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
                                <li class="breadcrumb-item"><a href="{{ route('admin.promotioncode.index') }}">Promotion Code</a></li>
                                <li class="breadcrumb-item"><a>Add</a></li>
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
                                    <p>Add Promotion Code</p>
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
                                        <h5>Add Promotion Code</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form method="POST" action="{{ route('admin.promotioncode.store') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label for="Name" class="col-sm-3 col-form-label">Name</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="Name" id="Name" required autofocus>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Description" class="col-sm-3 col-form-label">Description</label>
                                                        <div class="col-sm-9">

                                                        <input class="form-control" name="Description" id="Description" required autofocus>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Code" class="col-sm-3 col-form-label">Code</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="Code" id="Code" required autofocus>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Percent" class="col-sm-3 col-form-label">Percent</label>
                                                        <div class="col-sm-9">
                                                            <input type="number" min="0" max="100" class="form-control" name="Percent" id="Percent" required autofocus >
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Times" class="col-sm-3 col-form-label">Times</label>
                                                        <div class="col-sm-9">
                                                            <input type="number" class="form-control" name="Times" id="Times" required autofocus >
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

@endsection
