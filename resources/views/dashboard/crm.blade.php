@extends('admin.base')

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
                                    <li class="breadcrumb-item"><a href="#!">Dashboard CRM</a></li>
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
                            <!-- [ Transactions chart ] starts-->
                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Transactions</h5>
                                        <span class="d-block pt-2">Jun 23 - Jul 23</span>
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
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-6">
                                                <h3 class="f-w-300 mb-0">$ 59,48</h3>
                                            </div>
                                            <div class="col-6">
                                                <div id="transactions" style="height:80px;width:80px;margin:0 auto;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Project Rating</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-6">
                                                <h2 class="f-w-300 d-flex align-items-center float-left">4.3 <i class="fas fa-star f-12 m-l-10 text-c-yellow"></i></h2>
                                            </div>
                                            <div class="col-6">
                                                <h6 class="f-w-300 d-flex  align-items-center float-right">0.4 <i class="fas fa-caret-up text-c-green f-24 m-l-10"></i></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Transactions chart ] end -->

                            <!-- [ new statistics chart ] start -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>News Statistics</h5>
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
                                    <div class="card-block pl-0 pr-0 pb-2">
                                        <div id="bar-chart" class="ChartShadow BarChart" style="height:225px;"></div>
                                    </div>
                                    <div class="card-block border-top">
                                        <div class="row">
                                            <div class="col text-center">
                                                <span class="theme-bg d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
                                                <h6 class="mb-2">53</h6>
                                                <h6 class="mt-2 mb-0">Sport</h6>
                                            </div>
                                            <div class="col text-center">
                                                <span class="theme-bg2 d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
                                                <h6 class="mb-2">13</h6>
                                                <h6 class="mt-2 mb-0">Music</h6>
                                            </div>
                                            <div class="col text-center">
                                                <span class="bg-c-blue d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
                                                <h6 class="mb-2">30</h6>
                                                <h6 class="mt-2 mb-0">Travel</h6>
                                            </div>
                                            <div class="col text-center">
                                                <span class="bg-c-red d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
                                                <h6 class="mb-2">4</h6>
                                                <h6 class="mt-2 mb-0">News</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ new statistics chart ] end -->

                            <!-- [ call-chart ] start -->
                            <div class="col-xl-4 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Phone Calls</h5>
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
                                    <div id="call-chart" style="height:380px;"></div>
                                </div>
                            </div>
                            <!-- [ call-chart ] end -->

                            <!-- [ Recent Users ] start -->
                            <div class="col-xl-8 col-md-12">
                                <div class="card Recent-Users">
                                    <div class="card-header">
                                        <h5>Recent Users</h5>
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
                                    <div class="card-block px-0 py-3">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr class="unread">
                                                        <td><img class="rounded-circle" style="width:40px;" src="{{ asset('images/user/avatar-1.jpg') }}" alt="activity-user"></td>
                                                        <td>
                                                            <h6 class="mb-1">Isabella Christensen</h6>
                                                            <p class="m-0">Lorem Ipsum is simply dummy text of…</p>
                                                        </td>
                                                        <td>
                                                            <h6 class="text-muted"><i class="fas fa-circle text-c-green f-10 m-r-15"></i>11 MAY 12:56</h6>
                                                        </td>
                                                        <td><a href="#!" class="label theme-bg2 text-white f-12">Reject</a><a href="#!" class="label theme-bg text-white f-12">Approve</a></td>
                                                    </tr>
                                                    <tr class="unread">
                                                        <td><img class="rounded-circle" style="width:40px;" src="{{ asset('images/user/avatar-2.jpg') }}" alt="activity-user"></td>
                                                        <td>
                                                            <h6 class="mb-1">Mathilde Andersen</h6>
                                                            <p class="m-0">Lorem Ipsum is simply dummy text of…</p>
                                                        </td>
                                                        <td>
                                                            <h6 class="text-muted"><i class="fas fa-circle text-c-red f-10 m-r-15"></i>11 MAY 10:35</h6>
                                                        </td>
                                                        <td><a href="#!" class="label theme-bg2 text-white f-12">Reject</a><a href="#!" class="label theme-bg text-white f-12">Approve</a></td>
                                                    </tr>
                                                    <tr class="unread">
                                                        <td><img class="rounded-circle" style="width:40px;" src="{{ asset('images/user/avatar-3.jpg') }}" alt="activity-user"></td>
                                                        <td>
                                                            <h6 class="mb-1">Karla Sorensen</h6>
                                                            <p class="m-0">Lorem Ipsum is simply dummy text of…</p>
                                                        </td>
                                                        <td>
                                                            <h6 class="text-muted"><i class="fas fa-circle text-c-green f-10 m-r-15"></i>9 MAY 17:38</h6>
                                                        </td>
                                                        <td><a href="#!" class="label theme-bg2 text-white f-12">Reject</a><a href="#!" class="label theme-bg text-white f-12">Approve</a></td>
                                                    </tr>
                                                    <tr class="unread">
                                                        <td><img class="rounded-circle" style="width:40px;" src="{{ asset('images/user/avatar-1.jpg') }}" alt="activity-user"></td>
                                                        <td>
                                                            <h6 class="mb-1">Ida Jorgensen</h6>
                                                            <p class="m-0">Lorem Ipsum is simply dummy text of…</p>
                                                        </td>
                                                        <td>
                                                            <h6 class="text-muted f-w-300"><i class="fas fa-circle text-c-red f-10 m-r-15"></i>19 MAY 12:56</h6>
                                                        </td>
                                                        <td><a href="#!" class="label theme-bg2 text-white f-12">Reject</a><a href="#!" class="label theme-bg text-white f-12">Approve</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Recent Users ] end -->

                            <!-- [ Leaderboard section ] start -->
                            <div class="col-xl-4 col-md-12 m-b-30">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Today</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">This Week</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">All</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="media friendlist-box align-items-center justify-content-center m-b-20">
                                            <div class="m-r-10 photo-table">
                                                <a href="#!"><img class="rounded-circle" style="width:40px;" src="{{ asset('images/user/avatar-1.jpg') }}" alt="activity-user"></a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0 d-inline">Silje Larsen</h6>
                                                <span class="float-right d-flex  align-items-center"><i class="fas fa-caret-up f-22 m-r-10 text-c-green"></i>3784</span>
                                            </div>
                                        </div>
                                        <div class="media friendlist-box align-items-center justify-content-center m-b-20">
                                            <div class="m-r-10 photo-table">
                                                <a href="#!"><img class="rounded-circle" style="width:40px;" src="{{ asset('images/user/avatar-2.jpg') }}" alt="activity-user"></a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0 d-inline">Julie Vad</h6>
                                                <span class="float-right d-flex  align-items-center"><i class="fas fa-caret-up f-22 m-r-10 text-c-green"></i>3544</span>
                                            </div>
                                        </div>
                                        <div class="media friendlist-box align-items-center justify-content-center m-b-20">
                                            <div class="m-r-10 photo-table">
                                                <a href="#!"><img class="rounded-circle" style="width:40px;" src="{{ asset('images/user/avatar-3.jpg') }}" alt="activity-user"></a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0 d-inline">Storm Hanse</h6>
                                                <span class="float-right d-flex  align-items-center"><i class="fas fa-caret-down f-22 m-r-10 text-c-red"></i>2739</span>
                                            </div>
                                        </div>
                                        <div class="media friendlist-box align-items-center justify-content-center m-b-20">
                                            <div class="m-r-10 photo-table">
                                                <a href="#!"><img class="rounded-circle" style="width:40px;" src="{{ asset('images/user/avatar-1.jpg') }}" alt="activity-user"></a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0 d-inline">Frida Thomse</h6>
                                                <span class="float-right d-flex  align-items-center"><i class="fas fa-caret-down f-22 m-r-10 text-c-red"></i>1032</span>
                                            </div>
                                        </div>
                                        <div class="media friendlist-box align-items-center justify-content-center m-b-15">
                                            <div class="m-r-10 photo-table">
                                                <a href="#!"><img class="rounded-circle" style="width:40px;" src="{{ asset('images/user/avatar-2.jpg') }}" alt="activity-user"></a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0 d-inline">Silje Larsen</h6>
                                                <span class="float-right d-flex  align-items-center"><i class="fas fa-caret-up f-22 m-r-10 text-c-green"></i>8750</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="media friendlist-box align-items-center justify-content-center m-b-20">
                                            <div class="m-r-10 photo-table">
                                                <a href="#!"><img class="rounded-circle" style="width:40px;" src="{{ asset('images/user/avatar-1.jpg') }}" alt="activity-user"></a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0 d-inline">Silje Larsen</h6>
                                                <span class="float-right d-flex  align-items-center"><i class="fas fa-caret-up f-22 m-r-10 text-c-green"></i>3784</span>
                                            </div>
                                        </div>
                                        <div class="media friendlist-box align-items-center justify-content-center m-b-20">
                                            <div class="m-r-10 photo-table">
                                                <a href="#!"><img class="rounded-circle" style="width:40px;" src="{{ asset('images/user/avatar-2.jpg') }}" alt="activity-user"></a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0 d-inline">Julie Vad</h6>
                                                <span class="float-right d-flex  align-items-center"><i class="fas fa-caret-up f-22 m-r-10 text-c-green"></i>3544</span>
                                            </div>
                                        </div>
                                        <div class="media friendlist-box align-items-center justify-content-center m-b-20">
                                            <div class="m-r-10 photo-table">
                                                <a href="#!"><img class="rounded-circle" style="width:40px;" src="{{ asset('images/user/avatar-3.jpg') }}" alt="activity-user"></a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0 d-inline">Storm Hanse</h6>
                                                <span class="float-right d-flex  align-items-center"><i class="fas fa-caret-down f-22 m-r-10 text-c-red"></i>2739</span>
                                            </div>
                                        </div>
                                        <div class="media friendlist-box align-items-center justify-content-center m-b-20">
                                            <div class="m-r-10 photo-table">
                                                <a href="#!"><img class="rounded-circle" style="width:40px;" src="{{ asset('images/user/avatar-1.jpg') }}" alt="activity-user"></a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0 d-inline">Frida Thomse</h6>
                                                <span class="float-right d-flex  align-items-center"><i class="fas fa-caret-down f-22 m-r-10 text-c-red"></i>1032</span>
                                            </div>
                                        </div>
                                        <div class="media friendlist-box align-items-center justify-content-center m-b-15">
                                            <div class="m-r-10 photo-table">
                                                <a href="#!"><img class="rounded-circle" style="width:40px;" src="{{ asset('images/user/avatar-2.jpg') }}" alt="activity-user"></a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0 d-inline">Silje Larsen</h6>
                                                <span class="float-right d-flex  align-items-center"><i class="fas fa-caret-up f-22 m-r-10 text-c-green"></i>8750</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="media friendlist-box align-items-center justify-content-center m-b-20">
                                            <div class="m-r-10 photo-table">
                                                <a href="#!"><img class="rounded-circle" style="width:40px;" src="{{ asset('images/user/avatar-1.jpg') }}" alt="activity-user"></a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0 d-inline">Silje Larsen</h6>
                                                <span class="float-right d-flex  align-items-center"><i class="fas fa-caret-up f-22 m-r-10 text-c-green"></i>3784</span>
                                            </div>
                                        </div>
                                        <div class="media friendlist-box align-items-center justify-content-center m-b-20">
                                            <div class="m-r-10 photo-table">
                                                <a href="#!"><img class="rounded-circle" style="width:40px;" src="{{ asset('images/user/avatar-2.jpg') }}" alt="activity-user"></a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0 d-inline">Julie Vad</h6>
                                                <span class="float-right d-flex  align-items-center"><i class="fas fa-caret-up f-22 m-r-10 text-c-green"></i>3544</span>
                                            </div>
                                        </div>
                                        <div class="media friendlist-box align-items-center justify-content-center m-b-20">
                                            <div class="m-r-10 photo-table">
                                                <a href="#!"><img class="rounded-circle" style="width:40px;" src="{{ asset('images/user/avatar-3.jpg') }}" alt="activity-user"></a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0 d-inline">Storm Hanse</h6>
                                                <span class="float-right d-flex  align-items-center"><i class="fas fa-caret-down f-22 m-r-10 text-c-red"></i>2739</span>
                                            </div>
                                        </div>
                                        <div class="media friendlist-box align-items-center justify-content-center m-b-20">
                                            <div class="m-r-10 photo-table">
                                                <a href="#!"><img class="rounded-circle" style="width:40px;" src="{{ asset('images/user/avatar-1.jpg') }}" alt="activity-user"></a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0 d-inline">Frida Thomse</h6>
                                                <span class="float-right d-flex  align-items-center"><i class="fas fa-caret-down f-22 m-r-10 text-c-red"></i>1032</span>
                                            </div>
                                        </div>
                                        <div class="media friendlist-box align-items-center justify-content-center m-b-15">
                                            <div class="m-r-10 photo-table">
                                                <a href="#!"><img class="rounded-circle" style="width:40px;" src="{{ asset('images/user/avatar-2.jpg') }}" alt="activity-user"></a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="m-0 d-inline">Silje Larsen</h6>
                                                <span class="float-right d-flex  align-items-center"><i class="fas fa-caret-up f-22 m-r-10 text-c-green"></i>8750</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- [ Leaderboard section ] end -->

                            <!-- [page-view section] start -->
                            <div class="col-md-6 col-xl-4">
                                <div class="card theme-bg earning-date">
                                    <div class="card-header borderless">
                                        <h5 class="text-white">Page View</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="bd-example bd-example-tabs">
                                            <div class="tab-content" id="pills-tabContent2">
                                                <div class="tab-pane fade show active" id="view-mon" role="tabpanel" aria-labelledby="pills-view-mon">
                                                    <h2 class="text-white mb-3 f-w-300">9,456<i class="feather icon-arrow-up"></i></h2>
                                                    <span class="text-white mb-4 d-block">TOTAL VIEWS</span>
                                                </div>
                                                <div class="tab-pane fade" id="view-tue" role="tabpanel" aria-labelledby="pills-view-tue">
                                                    <h2 class="text-white mb-3 f-w-300">8,568<i class="feather icon-arrow-down"></i></h2>
                                                    <span class="text-white mb-4 d-block">TOTAL VIEWS</span>
                                                </div>
                                                <div class="tab-pane fade" id="view-wed" role="tabpanel" aria-labelledby="pills-view-wed">
                                                    <h2 class="text-white mb-3 f-w-300">3,756<i class="feather icon-arrow-up"></i></h2>
                                                    <span class="text-white mb-4 d-block">TOTAL VIEWS</span>
                                                </div>
                                                <div class="tab-pane fade" id="view-thu" role="tabpanel" aria-labelledby="pills-view-thu">
                                                    <h2 class="text-white mb-3 f-w-300">9,635<i class="feather icon-arrow-up"></i></h2>
                                                    <span class="text-white mb-4 d-block">TOTAL VIEWS</span>
                                                </div>
                                                <div class="tab-pane fade" id="view-fri" role="tabpanel" aria-labelledby="pills-view-fri">
                                                    <h2 class="text-white mb-3 f-w-300">23,486<i class="feather icon-arrow-down"></i></h2>
                                                    <span class="text-white mb-4 d-block">TOTAL VIEWS</span>
                                                </div>
                                                <div class="tab-pane fade" id="view-sat" role="tabpanel" aria-labelledby="pills-view-sat">
                                                    <h2 class="text-white mb-3 f-w-300">86,789<i class="feather icon-arrow-up"></i></h2>
                                                    <span class="text-white mb-4 d-block">TOTAL VIEWS</span>
                                                </div>
                                                <div class="tab-pane fade" id="view-sun" role="tabpanel" aria-labelledby="pills-view-sun">
                                                    <h2 class="text-white mb-3 f-w-300">93,628<i class="feather icon-arrow-down"></i></h2>
                                                    <span class="text-white mb-4 d-block">TOTAL VIEWS</span>
                                                </div>
                                            </div>
                                            <ul class="nav nav-pills align-items-center justify-content-center" id="pills-tab2" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="pills-view-mon" data-toggle="pill" href="#view-mon" role="tab" aria-controls="view-mon" aria-selected="true">Mon</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-view-tue" data-toggle="pill" href="#view-tue" role="tab" aria-controls="view-tue" aria-selected="false">Tue</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-view-wed" data-toggle="pill" href="#view-wed" role="tab" aria-controls="view-wed" aria-selected="false">Wed</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-view-thu" data-toggle="pill" href="#view-thu" role="tab" aria-controls="view-thu" aria-selected="false">Thu</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-view-fri" data-toggle="pill" href="#view-fri" role="tab" aria-controls="view-fri" aria-selected="false">Fri</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-view-sat" data-toggle="pill" href="#view-sat" role="tab" aria-controls="view-sat" aria-selected="false">Sat</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-view-sun" data-toggle="pill" href="#view-sun" role="tab" aria-controls="view-sun" aria-selected="false">Sun</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-block">
                                        <h2 class="mb-3 f-w-300">$894.39</h2>
                                        <h5 class="text-muted"><span class="f-14 mr-1">Deposits:</span>$10,000</h5>
                                        <h5 class="mt-3 text-c-blue mb-4"><i class="fas fa-caret-down text-c-blue f-22"></i> 5.2% ($456)</h5>
                                        <a href="#!" class="btn btn-primary text-uppercase shadow-2 btn-block" style="max-width:150px;margin:0 auto;">Add funds</a>
                                    </div>
                                </div>
                            </div>
                            <!-- [page-view section] end -->

                            <!-- [statistial-visit section] start -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card statistial-visit">
                                    <div class="card-header">
                                        <h5>Statistical</h5>
                                        <span class="text-muted d-block mt-1">Status : live</span>
                                    </div>
                                    <div class="card-block">
                                        <h3 class="f-w-300">4,445,701</h3>
                                        <span class="d-block"><i class="fas fa-map-marker-alt m-r-10"></i>256 Countries, 5667 Cites </span>
                                        <div class="media mt-4">
                                            <div class="photo-table">
                                                <h6> Our Overseas visits</h6>
                                                <div class="progress">
                                                    <div class="progress-bar progress-c-theme" role="progressbar" style="width:60%;height:6px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <label class="label theme-bg text-white f-14 float-right">14%</label>
                                            </div>
                                        </div>
                                        <div class="media mt-4">
                                            <div class="photo-table">
                                                <h6> Our Overseas visits</h6>
                                                <div class="progress">
                                                    <div class="progress-bar progress-c-theme2" role="progressbar" style="width:60%;height:6px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <label class="label theme-bg2 text-white f-14 float-right">14%</label>
                                            </div>
                                        </div>
                                        <div class="media mt-4">
                                            <div class="photo-table">
                                                <h6> Our Overseas visits</h6>
                                                <div class="progress">
                                                    <div class="progress-bar progress-c-blue" role="progressbar" style="width:60%;height:6px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <label class="label bg-c-blue text-white f-14 float-right">14%</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [statistial section] end -->

                            <!-- [market section] start -->
                            <div class="col-xl-4 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Markets</h5>
                                    </div>
                                    <div class="card-block">
                                        <div class="media">
                                            <div class="photo-table">
                                                <h6 class="text-muted">Dash/USD<span class="text-c-green ml-3">2.56%</span></h6>
                                                <h6>1,0452 <span class="ml-2"> USD</span></h6>
                                            </div>
                                            <div class="media-body">
                                                <div id="app-sale" class="float-right" style="height:40px;width:100px"></div>
                                            </div>
                                        </div>
                                        <div class="media mt-4">
                                            <div class="photo-table">
                                                <h6 class="text-muted">ETH/USD<span class="text-c-red ml-3">-0.87%</span></h6>
                                                <h6>0,0157<span class="ml-2"> USD</span></h6>
                                            </div>
                                            <div class="media-body">
                                                <div id="app-sale1" class="float-right" style="height:40px;width:100px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media mt-4">
                                            <div class="photo-table">
                                                <h6 class="text-muted">ZEC/USD<span class="text-c-purple ml-3">1.56%</span></h6>
                                                <h6>2,0764<span class="ml-2"> USD</span></h6>
                                            </div>
                                            <div class="media-body">
                                                <div id="app-sale2" class="float-right" style="height:40px;width:100px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media mt-4">
                                            <div class="photo-table">
                                                <h6 class="text-muted">BTC/USD<span class="text-c-green ml-3">2.56%</span></h6>
                                                <h6>1,0452<span class="ml-2"> USD</span></h6>
                                            </div>
                                            <div class="media-body">
                                                <div id="app-sale3" class="float-right" style="height:40px;width:100px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-block">
                                        <h5 class="text-center">Total Leads</h5>
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-auto">
                                                <h3 class="f-w-300 m-t-20">$59,48<i class="fas fa-caret-up text-c-green f-26 m-l-10"></i></h3>
                                                <span>EARNINGS</span>
                                            </div>
                                            <div class="col text-right">
                                                <i class="fas fa-chart-pie f-30 text-c-purple"></i>
                                            </div>
                                        </div>
                                        <div class="leads-progress mt-3">
                                            <h6 class="mb-3 text-center">Organic <span class="ml-4">Purchesed</span></h6>
                                            <div class="progress">
                                                <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 30%; height:10px;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width: 36%; height:10px;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h6 class="text-muted f-w-300 mt-4">Organic Leads <span class="float-right">340</span></h6>
                                            <h6 class="text-muted f-w-300 mt-4">Purchesed Leads <span class="float-right">150</span></h6>
                                            <h6 class="text-muted f-w-300 mt-4">Blocked Leads <span class="float-right">120</span></h6>
                                            <h6 class="text-muted f-w-300 mt-4 mb-0">Buy Leads <span class="float-right">245</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [market section] end -->
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

   <!-- Float Chart js -->
   <script src="{{ asset('plugins/flot/js/jquery.flot.js') }}"></script>
   <script src="{{ asset('plugins/flot/js/jquery.flot.categories.js') }}"></script>
   <script src="{{ asset('plugins/flot/js/curvedLines.js') }}"></script>
   <script src="{{ asset('plugins/flot/js/jquery.flot.tooltip.min.js') }}"></script>

   <!-- dashboard-custom js -->
   <script src="{{ asset('js/pages/dashboard-crm.js') }}"></script>

@endsection
