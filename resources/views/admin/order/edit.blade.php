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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">Order</a></li>
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
                                    <p>Edit Order.</p>
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
                                        <h5>Edit Order</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form method="POST" action="{{ route('admin.order.update') }}" enctype="multipart/form-data">
                                                    @csrf

                                                    <input type="hidden" name="Order" value=" {{ $Order->Id }}"/>

                                                    <div class="form-group row">
                                                        <label for="Customer" class="col-sm-3 col-form-label">Customer</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="Customer" id="Customer" placeholder="Customer" value="{{ $Order->User->name }}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Date" class="col-sm-3 col-form-label">Date</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="Date" id="Date" placeholder="Date" value="{{ $Order->Date }}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="TotalPrice" class="col-sm-3 col-form-label">TotalPrice</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="TotalPrice" id="TotalPrice" placeholder="TotalPrice" value="{{ $Order->TotalPrice }}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="PromotionCode" class="col-sm-3 col-form-label">PromotionCode</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="PromotionCode" id="PromotionCode" placeholder="PromotionCode" value="{{ $Order->PromotionCode }}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Count" class="col-sm-3 col-form-label">Count</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="Count" id="Count" placeholder="Count" value="{{ $Order->Count }}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Address" class="col-sm-3 col-form-label">Address</label>
                                                        <div class="col-sm-9">
                                                            @if($Order->AddressIndex != 0)
                                                                <input class="form-control" name="Count" id="Count" placeholder="Count" value="{{ $Order->Address->Alias }}" readonly>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="form-group row">
                                                        <label for="Status" class="col-sm-3 col-form-label">Status</label>
                                                        <div class="col-sm-9">

                                                                <select class="form-control" name="Status" id="Status">    
                                                          
                                                                <option value>Select Order Status...</option>

                                                                @foreach ($OrderStatuses as $item)
                                                                    @if($Order->Status == $item->Id)
                                                                        <option value="{{ $item->Id }}" selected>{{ $item->Name }}</option>
                                                                    @else
                                                                        <option value="{{ $item->Id }}">{{ $item->Name }}</option>
                                                                    @endif
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="ItmesForOrder" class="col-sm-3 col-form-label">Order Items</label>
                                                        <div class="col-sm-9">

                                                            @foreach($Carts as $cart)
                                                            
                                                                @if($cart->IsArtisan)
                                                                    <img src = "{{ asset($cart->CustomImage) }}" width = "100"/>
                                                                @else

                                                                    @foreach(explode(':', $cart->CustomImages) as $image)
                                                                        <img src = "{{ asset($image) }}"  width = "100"/>
                                                                    @endforeach
                                                                    
                                                                @endif
                                                            @endforeach
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
