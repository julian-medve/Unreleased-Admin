<!DOCTYPE html>

<html lang="en">
  <head>
    <base href="./">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs."/>
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template">
    <meta name="author" content="Codedthemes" />
    
    <title>Unreleased Dashboard</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('plugins/animation/css/animate.min.css') }}">
    <!-- notification css -->
    <link rel="stylesheet" href="{{ asset('plugins/notification/css/notification.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('css')

  </head>

  <body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->


    
    @include('admin.shared.nav-builder')

    @include('admin.shared.header')

    @yield('content')

    @include('admin.shared.footer')

    @yield('javascript')


  </body>
</html>
