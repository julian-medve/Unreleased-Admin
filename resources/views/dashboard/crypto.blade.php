@extends('dashboard.base')

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
                                    <h5 class="m-b-10">Dashboard</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Crypto Dashboard</a></li>
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
                            <!-- [ bitcoin-wallet section ] start-->
                            <div class="col-md-6 col-xl-4">
                                <div class="card theme-bg bitcoin-wallet">
                                    <div class="card-block">
                                        <h5 class="text-white mb-2">Bitcoin Wallet</h5>
                                        <h2 class="text-white mb-2 f-w-300">$9,302</h2>
                                        <span class="text-white d-block">Ratings by Market Capitalization</span>
                                        <i class="fab fa-btc f-70 text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card theme-bg2 bitcoin-wallet">
                                    <div class="card-block">
                                        <h5 class="text-white mb-2">Bitcoin Wallet</h5>
                                        <h2 class="text-white mb-2 f-w-300">$8,101</h2>
                                        <span class="text-white d-block">Ratings by Market Capitalization</span>
                                        <i class="fas fa-dollar-sign f-70 text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-4">
                                <div class="card bg-c-blue bitcoin-wallet">
                                    <div class="card-block">
                                        <h5 class="text-white mb-2">Bitcoin Wallet</h5>
                                        <h2 class="text-white mb-2 f-w-300">$7,501</h2>
                                        <span class="text-white d-block">Ratings by Market Capitalization</span>
                                        <i class="fas fa-pound-sign f-70 text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- [ bitcoin-wallet section ] end-->

                            <!-- [ statistic-line chat ] start -->
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Statistics</h5>
                                        <div class="card-header-right">
                                            <div class="btn-group card-option">
                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="feather icon-more-horizontal"></i>
                                                </button>
                                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div id="line-area2" class="lineAreaDashboard" style="height:330px;"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ statistic-line chat ] end -->

                            <!-- [ notifications section ] start -->
                            <div class="col-xl-4 col-md-12">
                                <div class="card note-bar">
                                    <div class="card-header">
                                        <h5>Notifications</h5>
                                        <div class="card-header-right">
                                            <div class="btn-group card-option">
                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="feather icon-more-horizontal"></i>
                                                </button>
                                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block p-0">
                                        <a href="#!" class="media friendlist-box">
                                            <div class="mr-3 photo-table">
                                                <i class="far fa-bell f-30"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6>New order received</h6>
                                                <span class="f-12 float-right text-muted">12.56</span>
                                                <p class="text-muted m-0">2 unread notification</p>
                                            </div>
                                        </a>
                                        <a href="#!" class="media friendlist-box border-top">
                                            <div class="mr-3 photo-table">
                                                <i class="far fa-bell f-30"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6>New user register</h6>
                                                <span class="f-12 float-right text-muted">12.36</span>
                                                <p class="text-muted m-0">xx messages</p>
                                            </div>
                                        </a>

                                        <a href="#!" class="media friendlist-box border-top">
                                            <div class="mr-3 photo-table">
                                                <i class="far fa-bell f-30"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6>New order register</h6>
                                                <span class="f-12 float-right text-muted">11.45</span>
                                                <p class="text-muted m-0">2 read notification</p>
                                            </div>
                                        </a>

                                        <a href="#!" class="media friendlist-box border-top">
                                            <div class="mr-3 photo-table">
                                                <i class="far fa-bell f-30"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6>New order prepend</h6>
                                                <span class="f-12 float-right text-muted">9.39</span>
                                                <p class="text-muted m-0">xx messages</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- [ notifications section ] end-->

                            <!-- [ worldLow section ] start -->
                            <div class="col-xl-8 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Users From United States</h5>
                                        <div class="card-header-right">
                                            <div class="btn-group card-option">
                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="feather icon-more-horizontal"></i>
                                                </button>
                                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div id="world-low" style="height:350px;"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ worldLow section ] end-->

                            <!-- [ statistic chat ] start -->
                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Statistics</h5>
                                        <div class="card-header-right">
                                            <div class="btn-group card-option">
                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="feather icon-more-horizontal"></i>
                                                </button>
                                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <h3 class="f-w-300">$894.39</h3>
                                    </div>
                                    <div id="Earnings-chart" style="height:310px;"></div>
                                </div>
                            </div>
                            <!-- [ statistic chat ] end -->
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

   <!-- Float Chart js -->
   <script src="{{ asset('plugins/flot/js/jquery.flot.js') }}"></script>
   <script src="{{ asset('plugins/flot/js/jquery.flot.categories.js') }}"></script>
   <script src="{{ asset('plugins/flot/js/curvedLines.js') }}"></script>
   <script src="{{ asset('plugins/flot/js/jquery.flot.tooltip.min.js') }}"></script>

   <!-- dashboard-custom js -->
   <script src="{{ asset('js/pages/dashboard-crypto.js') }}"></script>

@endsection
