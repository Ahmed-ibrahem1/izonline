<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Sport Programs">

    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href={{ asset('assets/images/logos/logo-square.png') }} type="image/x-icon">
    <!-- Mobile Specific Meta-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/bootstrap.css') }}">
    <!-- Iconfont Css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/awesome/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/gilroy/font-gilroy.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/magnific-popup/magnific-popup.css') }}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate-css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/animated-headline/animated-headline.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl/assets/owl.theme.default.min.css') }}">

    <!-- Main Stylesheet -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/woocomerce.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @if(app()->isLocale('ar'))
    <link rel="stylesheet" href="{{ asset('assets/css/custom-rtl.css') }}">
    @endif

    @if (app()->isProduction())
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9XDP7P79WH"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-9XDP7P79WH');
    </script>
    @endif

    @yield('head')

</head>