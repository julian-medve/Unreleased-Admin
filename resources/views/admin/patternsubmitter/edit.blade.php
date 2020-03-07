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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.patternsubmitter.index') }}">Pattern Submitters</a></li>
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
                                    <p>Edit Pattern Submitter</p>
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
                                        <h5>Edit Pattern Submitter</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form method="POST" action="{{ route('admin.patternsubmitter.update') }}" enctype="multipart/form-data">
                                                    
                                                    @csrf

                                                    <input type="hidden" name="id" value="{{ $user->id }}"/>
                                                    <div class="form-group row">
                                                        <label for="Accept" class="col-sm-3 col-form-label">Accept</label>
                                                        <div class="col-sm-9">
                                                            <div class="switch switch-primary d-inline s-r-8">

                                                                @if(Auth::user()->role != Config('Constants.userrole.submitter') && $CustomPattern->Accepted)
                                                                    <input type="checkbox" id="Accept" name="Accept" checked>
                                                                @else
                                                                    <input type="checkbox" id="Accept" name="Accept">
                                                                @endif

                                                                <label for="Accept" class="cr"></label>
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

@endsection
