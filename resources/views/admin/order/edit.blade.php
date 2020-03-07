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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.custompattern.index') }}">Custom Patterns</a></li>
                                    <li class="breadcrumb-item"><a>Edit</a></li>
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
                                    <p>Edit Custom Pattern.</p>
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
                                        <h5>Edit Custom Pattern</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form method="POST" action="{{ route('admin.custompattern.update') }}" enctype="multipart/form-data">
                                                    @csrf

                                                    <input type="hidden" name="CustomPattern" value=" {{ $CustomPattern->Id }}"/>

                                                    <div class="form-group row">
                                                        <label for="Name" class="col-sm-3 col-form-label">Name</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="Name" id="Name" placeholder="Name" value="{{ $CustomPattern->Name }}" required autofocus>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Preview" class="col-sm-3 col-form-label">Preview Image</label>
                                                        <div class="col-sm-9">
                                                            <div class="col-sm-6">
                                                                <img class="img-fluid" src="{{ asset($CustomPattern->Preview) }}" >
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="preview_upload" class="col-sm-3 col-form-label"></label>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control" name="Preview" id="preview_upload">
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="form-group row" id="ApproveArea">
                                                        <label for="Approve" class="col-sm-3 col-form-label">Approve</label>
                                                        <div class="col-sm-9">
                                                            <div class="switch switch-primary d-inline s-r-8">

                                                                @if(Auth::user()->role != Config('Constants.userrole.submitter') && $CustomPattern->Approved)
                                                                    <input type="checkbox" name="Approve" id="Approve" checked>
                                                                @elseif(Auth::user()->role != Config('Constants.userrole.submitter') && $CustomPattern->Approved == false)
                                                                    <input type="checkbox" name="Approve" id="Approve">
                                                                @elseif(Auth::user()->role == Config('Constants.userrole.submitter') && $CustomPattern->Approved)
                                                                    <input type="checkbox" name="Approve" id="Approve" checked disabled>
                                                                @else 
                                                                    <input type="checkbox" name="Approve" id="Approve" disabled>
                                                                @endif
                                                                <label for="Approve" class="cr"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row" id="RejectDescriptionArea">
                                                        <label for="RejectDescription" class="col-sm-3 col-form-label">Reject Description</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control max-textarea" maxlength="255" rows="4" name="RejectDescription" id="RejectDescription" placeholder="Reject Description" value="{{ $CustomPattern->RejectDescription }}" autofocus></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row" id="TypeCategoryArea">
                                                        <label for="TypeCategory" class="col-sm-3 col-form-label">Type Category</label>
                                                        <div class="col-sm-9">

                                                                <select class="form-control" name="TypeCategory" id="TypeCategory">    
                                                          
                                                                <option value>Select Type category...</option>

                                                                @foreach ($TypeCategories as $item)
                                                                    @if($CustomPattern->TypeCategory == $item->Id)
                                                                        <option value="{{ $item->Id }}" selected>{{ $item->Name }}</option>
                                                                    @else
                                                                        <option value="{{ $item->Id }}">{{ $item->Name }}</option>
                                                                    @endif
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row" id="PriceCategoryArea">
                                                        <label for="PriceCategory" class="col-sm-3 col-form-label">Price Category</label>
                                                        <div class="col-sm-9">

                                                                <select class="form-control" name="PriceCategory" id="PriceCategory">    
                                                          
                                                                <option value>Select Price category...</option>

                                                                @foreach ($PriceCategories as $item)
                                                                    @if($CustomPattern->PriceCategory == $item->Id)
                                                                        <option value="{{ $item->Id }}" selected>{{ $item->Name }}</option>
                                                                    @else
                                                                        <option value="{{ $item->Id }}">{{ $item->Name }}</option>
                                                                    @endif
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>



                                                    <div class="form-group row">
                                                        <label for="Accept" class="col-sm-3 col-form-label">Accept</label>
                                                        <div class="col-sm-9">
                                                            <div class="switch switch-primary d-inline s-r-8">

                                                                @if(Auth::user()->role == Config('Constants.userrole.submitter') && $CustomPattern->Accepted)
                                                                    <input type="checkbox" id="Accept" name="Accept" checked >
                                                                @elseif(Auth::user()->role == Config('Constants.userrole.submitter') && $CustomPattern->Accepted == false)
                                                                    <input type="checkbox" id="Accept" name="Accept" >
                                                                @elseif(Auth::user()->role != Config('Constants.userrole.submitter') && $CustomPattern->Accepted)
                                                                    <input type="checkbox" id="Accept" name="Accept" checked disabled>
                                                                @else
                                                                    <input type="checkbox" id="Accept" name="Accept" disabled>
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
    <script>
        $(document).ready(function(){
            
            $('#Approve').change(function() {
                if(this.checked) {
                    $('#RejectDescriptionArea').hide();
                    $('#TypeCategoryArea').show();
                    $('#PriceCategoryArea').show();
                }else {
                    $('#RejectDescriptionArea').show();
                    $('#TypeCategoryArea').hide();
                    $('#PriceCategoryArea').hide();
                }
            });

            if($('#Approve').prop( "checked" )){
                $('#RejectDescriptionArea').hide();
                $('#TypeCategoryArea').show();
                $('#PriceCategoryArea').show();
            }
            else
            {
                $('#RejectDescriptionArea').show();
                $('#TypeCategoryArea').hide();
                $('#PriceCategoryArea').hide();
            }
        });
    </script>
@endsection
