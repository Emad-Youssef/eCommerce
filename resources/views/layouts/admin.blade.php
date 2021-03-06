<!DOCTYPE html>
<html class="loading" lang="{{app()->getLocale()}}"
    data-textdirection="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
        content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('assets/admin/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/admin/images/ico/favicon.ico')}}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/forms/icheck/icheck.css')}}"> -->
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/forms/icheck/custom.css')}}"> -->
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets/admin/vendors/css/tables/datatable/datatables.min.css')}}">

    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/'.getFolder().'/vendors.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/'.getFolder().'/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/'.getFolder().'/custom-rtl.css')}}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets/admin/'.getFolder().'/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/'.getFolder().'/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/cryptocoins/cryptocoins.css')}}">
    <!-- END Page Level CSS-->
   
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets/admin/vendors/css/forms/toggle/bootstrap-switch.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/forms/toggle/switchery.min.css')}}">
    @stack('style')
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/assets/css/'.getFolder().'/style.css')}}">
    <!-- END Custom CSS-->
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Cairo', sans-serif;
    }

    .table .dataTables_length {
        margin-top: 10px;
    }
    </style>
</head>

<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu" data-col="2-columns">
    <!-- fixed-top-->
    @include('dashboard.includes.header')
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    @include('dashboard.includes.sidebar')
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    @yield('content')
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    @include('dashboard.includes.footer')

    <!-- BEGIN VENDOR JS-->
    <script src="{{asset('assets/admin/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    @stack('form_wizard')
    <script src="{{asset('assets/admin/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/admin/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript">
    </script>

    <!-- checkbox -->
    <script src="{{asset('assets/admin/vendors/js/forms/toggle/bootstrap-switch.min.js')}}" type="text/javascript">
    </script>
    <script src="{{asset('assets/admin/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}" type="text/javascript">
    </script>
    <script src="{{asset('assets/admin/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/js/scripts/forms/switch.js')}}" type="text/javascript"></script>

    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('assets/admin/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/vendors/js/charts/echarts/echarts.js')}}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="{{asset('assets/admin/js/core/app-menu.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/js/core/app.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/js/scripts/customizer.js')}}" type="text/javascript"></script>
    <!-- END MODERN JS-->

    <script src="{{asset('assets/admin/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>

    @stack('script')
</body>

</html>