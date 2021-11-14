<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Mouldifi - A fully responsive, HTML5 based admin theme">
    <meta name="keywords" content="Responsive, HTML5, admin theme, business, professional, Mouldifi, web design, CSS3">
    <title>@yield('title')</title>
    <!-- Site favicon -->
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('assets/admin/images/favicon.ico') }}" />
    <!-- /site favicon -->

    <!-- Entypo font stylesheet -->
    <link href="{{ asset('assets/admin/css/entypo.css') }}" rel="stylesheet">
    <!-- /entypo font stylesheet -->

    <!-- Font iran-sans stylesheet -->
    <link href="{{ asset('assets/admin/css/iran-sans.css') }}" rel="stylesheet">
    <!-- /font iran-sans stylesheet -->

    <!-- Font awesome stylesheet -->
    <link href="{{ asset('assets/admin/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- /font awesome stylesheet -->

    <!-- CSS3 Animate It Plugin Stylesheet -->
    <link href="{{ asset('assets/admin/css/plugins/css3-animate-it-plugin/animations.css') }}" rel="stylesheet">
    <!-- /css3 animate it plugin stylesheet -->

    <!-- Bootstrap stylesheet min version -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- /bootstrap stylesheet min version -->

    <!-- Mouldifi core stylesheet -->
    <link href="{{ asset('assets/admin/css/mouldifi-core.css') }}" rel="stylesheet">
    <!-- /mouldifi core stylesheet -->

    <!-- Bootstrap RTL stylesheet min version -->
    <link href="{{ asset('assets/admin/css/bootstrap-rtl.min.css') }}" rel="stylesheet">
    <!-- /bootstrap rtl stylesheet min version -->

    <!-- Mouldifi RTL core stylesheet -->
    <link href="{{ asset('assets/admin/css/mouldifi-rtl-core.css') }}" rel="stylesheet">
    <!-- /mouldifi rtl core stylesheet -->

    <link href="{{ asset('assets/admin/css/mouldifi-forms.css') }}" rel="stylesheet">


    @yield('style');

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="{{ asset('assets/admin/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body>

<!-- Page container -->
<div class="page-container">

@include('admin.includes.sidebar')

<!-- Main container -->
    <div class="main-container">

    @include('admin.includes.header')

    <!-- Main content -->
        <div class="main-content">

        @yield('main-content')

        </div>
        <!-- /main content -->

    </div>
    <!-- /main container -->

</div>
<!-- /page container -->

<!--Load JQuery-->
<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<!-- Load CSS3 Animate It Plugin JS -->
<script src="{{ asset('assets/admin/js/plugins/css3-animate-it-plugin/css3-animate-it.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/plugins/metismenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('assets/admin/js/functions.js') }}"></script>
@yield('script');
</body>


</html>

