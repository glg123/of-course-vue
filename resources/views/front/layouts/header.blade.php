<header class="container py-2 py-lg-4 header">
    <div class="row">
        <div class="col d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center order-lg-0">
                <div class="toggle-button d-block d-lg-none me-2">
                    <button class="btn border-0 d-flex align-items-center flex-row-reverse" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>

                        <span class="d-none">@lang('translation.list')</span>
                    </button>
                </div>

                <div class="lang">
                    <a href="{{ route('lang', ['lang' => __('translation.locale_url') ]) }}" class="btn rounded-pill border-0 d-flex align-items-center flex-row-reverse">
                        <img src="{{ asset('front') }}/build/img/language-{{ $dir }}.svg" alt=""> <span class="fw-bold me-2 d-none d-lg-flex">@lang('translation.locale')</span>
                    </a>
                </div>
            </div>

            <div class="d-none d-lg-flex order-last order-lg-1 menu-toggle">
                <ul class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center list-unstyled center-menu">
                    <li><a href="{{ route('front.home') }}">@lang('translation.home')</a></li>

                    <li><a href="{{ route('front.menu') }}">@lang('translation.menu')</a></li>

                    <li class="logo">
                        <a href="{{ route('front.home') }}">
                            <img src="{{ $general_settings['general_logo']->first()->value }}" alt="{{ $general_settings['general_site_name']->first()->value }}">
                        </a>
                    </li>

                    <li><a href="#">@lang('translation.nutritionist')</a></li>

                    <li><a href="#">@lang('translation.celebrities')</a></li>
                </ul>
            </div>

            <div class="d-flex d-lg-none">
                <a href="{{ route('front.home') }}">
                    <img src="{{ $general_settings['general_logo']->first()->value }}" alt="{{ $general_settings['general_site_name']->first()->value }}">
                </a>
            </div>

            <div class="d-none d-lg-block order-lg-3">
                <h6>@lang('translation.join_us_now')</h6>

                <div class="d-flex align-items-center">
                    <a href="{{ route('front.profile') }}">@lang('translation.login')</a>
                    <span class="mx-1">/</span>
                    <a href="{{ route('front.register') }}">@lang('translation.create_account')</a>
                </div>
            </div>

            <div class="d-flex d-lg-none user">
                <a class="btn rounded-pill border-0 d-flex align-items-center flex-row-reverse" href="{{ route('front.login') }}">
                    <img src="{{ asset('front') }}/build/img/user.png">
                </a>
            </div>
        </div>
    </div>
</header>
