<html lang="ar">

@include('layout.head')
@include('layout.header')

<body id="top-header" dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
    @yield('content')
    @include('components.flash-message')
</body>

@include('layout.footer')
@include('layout.foot')

</html>