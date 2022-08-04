<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">








    <meta name="description" content="RHNextToMe">
    <meta property="og:title" content="Basic Usage | RHNextToMe"/>
    <meta property="og:description" content="RHNextToMe"/>
    <meta property="og:image" content="{{ asset('imgAPP/RHNextToMe.png') }}"/>
    <meta property="og:url" content="{{ route('internaute.home') }}"/>

    <meta property="og:type" content="website" />


    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('imgAPP/RHNextToMe.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('imgAPP/RHNextToMe.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('imgAPP/RHNextToMe.png') }}">
    <link rel="mask-icon" href="{{ asset('imgAPP/RHNextToMe.png') }}" color="#007593">
    <meta name="theme-color" content="#ffffff">
    <link rel="alternate" type="application/atom+xml" href="{{ route('internaute.home') }}" title="All blogposts of the RHNextToMe team">


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('administrateur.layouts.backend-dashboard.stylesheet')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed layout-navbar-fixed sidebar-collapse">
    <div id="app">
        <div class="wrapper">
            @include('administrateur.layouts.backend-dashboard.navbar')
            @include('administrateur.layouts.backend-dashboard.Sidebar')
            <div class="content-wrapper pt-3">
                @yield('content')
            </div>
            @include('administrateur.layouts.backend-dashboard.footer')
            <aside class="control-sidebar control-sidebar-dark">
            </aside>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @include('administrateur.layouts.backend-dashboard.javascript')

</body>
</html>
