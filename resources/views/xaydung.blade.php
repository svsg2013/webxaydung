<!DOCTYPE html>
<html lang="en">
<head>
    <title>Công ty TNHH XDTH Thiên Bình|Trang chủ</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    @yield('meta')
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('/assets/images/icons/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('/assets/images/icons/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('/assets/images/icons/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/assets/images/icons/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('/assets/images/icons/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('/assets/images/icons/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('/assets/images/icons/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('/assets/images/icons/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/assets/images/icons/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('/assets/images/icons/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/assets/images/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('/assets/images/icons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/assets/images/icons/favicon-16x16.png')}}">
    <link rel="shortcut icon" href="{{asset('/assets/images/icons/favicon.ico')}}">
    <link rel="manifest" href="{{asset('/assets/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#f05b28">
    <meta name="msapplication-TileImage" content="{{asset('/assets/images/icons/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#f05b28">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="{{asset('/assets/css/styles.css')}}" rel="stylesheet">
    {!! (!empty($systemInfo->analytic)||isset($systemInfo->analytic))?$systemInfo->analytic:null !!}
</head>
<body>
@include('xaydung.partial.header')
<main class="wrapper">
    @yield('content')
</main>
<!-- End Main Content-->
@include('xaydung.partial.footer')
<!-- End Footer-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{asset('/assets/js/library.js')}}"></script>
<script src="{{asset('/assets/js/main.js')}}"></script>
{!! (!empty($systemInfo->livechat)||isset($systemInfo->livechat))?$systemInfo->livechat:null !!}
</body>
</html>