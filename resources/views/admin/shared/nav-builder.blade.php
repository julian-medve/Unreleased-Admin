<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="index.html" class="b-brand">
                <div class="b-bg">
                    <i class="feather icon-trending-up"></i>
                </div>
                <span class="b-title">Unreleased</span>
            </a>
            <a class="mobile-menu" id="mobile-collapse"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                
                @if(Auth()->user()->role == Config('Constants.userrole.super_admin'))
                <li data-username="Administrator" class="nav-item {{ Request::is('admin/administrator*') ? 'active' : '' }}">
                    <a href="{{ route('admin.administrator.index') }}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-user-shield"></i></span><span class="pcoded-mtext">Administrators</span></a>
                </li>
                @endif

                @if(Auth()->user()->role == Config('Constants.userrole.super_admin') 
                    || Auth()->user()->role == Config('Constants.userrole.admin'))
                    
                <li data-username="Pattern Submitters" class="nav-item {{ Request::is('admin/patternsubmitter*') ? 'active' : '' }}">
                    <a href="{{ route('admin.patternsubmitter.index') }}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-user-tag"></i></span><span class="pcoded-mtext">Pattern Submitters</span></a>
                </li>

                <li data-username="Customer" class="nav-item {{ Request::is('admin/customer*') ? 'active' : '' }}">
                    <a href="{{ route('admin.customer.index') }}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-user-tie"></i></span><span class="pcoded-mtext">Customers</span></a>
                </li>

                @endif
                
                <li data-username="Artisan" class="nav-item {{ Request::is('admin/artisan*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.artisan.category.index') }}"><span class="pcoded-micon"><i class="fas fa-palette"></i></span><span class="pcoded-mtext">Artisan Models</span></a>
                </li>

                <li data-username="Custom 3D Products" class="nav-item {{ Request::is('admin/customproduct*') ? 'active' : '' }}">
                    <a href="{{ route('admin.customproduct.index') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-package"></i></span><span class="pcoded-mtext">Custom 3D Models</span></a>
                </li>

                <li data-username="Custom Patterns" class="nav-item {{ Request::is('admin/custompattern*') ? 'active' : '' }}">
                    <a href="{{ route('admin.custompattern.index') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Custom Patterns</span></a>
                </li> 

                <li data-username="Shipping Costs" class="nav-item {{ Request::is('admin/shippingcost*') ? 'active' : '' }}">
                    <a href="{{ route('admin.shippingcost.index') }}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-people-carry"></i></span><span class="pcoded-mtext">Shipping Costs</span></a>
                </li>

                <li data-username="Promotion Codes" class="nav-item {{ Request::is('admin/promotioncode*') ? 'active' : '' }}">
                    <a href="{{ route('admin.promotioncode.index') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-tag"></i></span><span class="pcoded-mtext">Promotion Codes</span></a>
                </li>

                <li data-username="Orders" class="nav-item {{ Request::is('admin/order*') ? 'active' : '' }}">
                    <a href="{{ route('admin.order.index') }}" class="nav-link"><span class="pcoded-micon"><i class="fa fa-receipt"></i></span><span class="pcoded-mtext">Orders</span></a>
                </li>

                @if(Auth()->user()->role == Config('Constants.userrole.super_admin'))

                <li data-username="Banner" class="nav-item {{ Request::is('admin/banner*') ? 'active' : '' }}">
                    <a href="{{ route('admin.banner.index') }}" class="nav-link"><span class="pcoded-micon"><i class="feather icon-image"></i></span><span class="pcoded-mtext">Banners</span></a>
                </li>
                @endif


                <li data-username="Settings" class="nav-item {{ Request::is('admin/settings*') ? 'active pcoded-trigger' : '' }} pcoded-hasmenu">
                    <a class="nav-link"><span class="pcoded-micon"><i class="feather icon-settings"></i></span><span class="pcoded-mtext">Settings</span></a>
                    <ul class="pcoded-submenu">
                        <li class="{{ Request::is('admin/settings/pricecategory*') ? 'active' : '' }}"><a href="{{ route('admin.settings.pricecategory.index')}}" class="">Price Category</a></li>
                        <li class="{{ Request::is('admin/settings/typecategory*') ? 'active' : '' }}"><a href="{{ route('admin.settings.typecategory.index')}}" class="">Type Category</a></li>
                        
                        @if(Auth()->user()->role == Config('Constants.userrole.super_admin'))
                        <li class="{{ Request::is('admin/settings/others*') ? 'active' : '' }}"><a href="{{ route('admin.settings.others.index')}}" class="">Others</a></li>
                        @endif
                        
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
