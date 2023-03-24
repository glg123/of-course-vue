<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ $dir }}">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
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

    <title>@yield('title')</title>
</head>
<body>

<div class="form-box py-3 py-lg-5">
    <div class="container">
        <div class="row min-vh-100 align-items-center justify-content-center">
            <div class="col-md-12 col-lg-4">
                <div class="bg-white p-4 rounded-4">
                    <div class="text-center mb-5">
                        <img src="{{ $general_settings['general_logo']->first()->value }}" alt="{{ $general_settings['general_site_name']->first()->value }}">
                    </div>

                    @yield('content')
                </div>
                <p class="mt-4 text-center">
                    © {{ date('Y') }}
                    @lang('translation.copyrights')
                </p>
            </div>
        </div>
    </div>
</div>


<!-- JS -->
<script src="{{ asset('front') }}/build/js/bootstrap.bundle.min.js"></script>
@yield('js')

</body>
</html>
