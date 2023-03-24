<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ $dir }}">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ $general_settings['general_favicon']->first()->value }}" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('front') }}/build/css/bootstrap{{ $dirCss }}.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/build/css/all.min.css"/>
    @yield('css')
    <link rel="stylesheet" href="{{ asset('front') }}/style.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">

    <!-- Include Pixels Code -->
    {!! $general_settings['general_snap_pixel']->first()->value !!}
    {!! $general_settings['general_tiktok_pixel']->first()->value !!}
</head>
<body>

@include('front.layouts.header')

@yield('content')

@include('front.layouts.footer')

<!-- JS -->
<script src="{{ asset('front') }}/build/js/bootstrap.bundle.min.js"></script>
@yield('js')

</body>
</html>
