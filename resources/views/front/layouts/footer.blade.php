<footer class="text-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="d-flex align-items-center flex-column flex-lg-row">
                    @if(isset($general_settings['general_logo_white']))
                        <img src="{{ $general_settings['general_logo_white']->first()->value }}" alt="{{ $general_settings['general_site_name']->first()->value }}">
                    @endif

                    @if(isset($general_settings['general_short_description_' . app()->getLocale()]))
                        <div class="border-right ps-4 ms-4 mt-4 mt-lg-0">
                            <p class="mb-0 fw-normal lh-base">{{ $general_settings['general_short_description_' . app()->getLocale()]->first()->value }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-6 d-flex align-items-center ">
                <div class="d-flex align-items-center justify-content-between w-100 dw-app rounded-3 px-4 py-4 mt-4 mt-lg-0 flex-column flex-lg-row">
                    <h6 class="fw-bold mb-4 mb-lg-0">@lang('translation.you_can_download_app')</h6>
                    <div class="d-flex align-items-center">
                        @if(isset($general_settings['general_play_store_link']) && $general_settings['general_play_store_link']->first()->value)
                            <a href="{{ $general_settings['general_play_store_link']->first()->value }}" class="me-2">
                                <img src="{{ asset('front') }}/build/img/google-play.png" alt="">
                            </a>
                        @endif

                        @if(isset($general_settings['general_app_store_link']) && $general_settings['general_app_store_link']->first()->value)
                            <a href="{{ $general_settings['general_play_store_link']->first()->value }}">
                                <img src="{{ asset('front') }}/build/img/app-store.png" alt="">
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row py-3">
            <div class="col-lg-6 col-md-12">
                <ul class="m-0 p-0 list-unstyled d-flex footer-links justify-content-center justify-content-lg-start mb-3 mb-lg-0 flex-column flex-lg-row">
                    <li><a href="{{ route('front.home') }}">@lang('translation.home')</a></li>

                    <li><a href="{{ route('front.menu') }}">@lang('translation.menu')</a></li>

                    <li><a href="#">@lang('translation.nutritionist')</a></li>

                    <li><a href="#">@lang('translation.celebrities')</a></li>

                    <li><a href="{{ route('front.about.index') }}">@lang('translation.about_us')</a></li>

                    <li><a href="#">@lang('translation.contact_us')</a></li>
                </ul>
            </div>

            <div class="col-lg-6 col-md-12">
                <ul class="m-0 p-0 list-unstyled d-flex footer-contact justify-content-center justify-content-lg-start flex-column text-center text-lg-start flex-lg-row">
                    <li>
                        <a href="mailto:{{ $general_settings['general_email']->first()->value }}" class="d-flex align-items-center">
                            <img src="{{ asset('front') }}/build/img/email.svg" alt="">
                            <span class="text-white ms-2 ps-2">{{ $general_settings['general_email']->first()->value }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="tel:{{ $general_settings['general_phone']->first()->value }}" class="d-flex align-items-center">
                            <img src="{{ asset('front') }}/build/img/call.svg" alt="">
                            <span class="ltr text-white ms-2 ps-2">{{ $general_settings['general_phone']->first()->value }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="https://wa.me/{{ $general_settings['general_whatsapp_phone']->first()->value }}?text={{ $general_settings['general_whatsapp_text']->first()->value }}" class="d-flex align-items-center">
                            <img src="{{ asset('front') }}/build/img/whats.svg" alt="">
                            <span class="ltr text-white ms-2 ps-2">{{ $general_settings['general_whatsapp_phone']->first()->value }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-lg-5 order-1 order-lg-0">
                <p class="mb-0 text-center text-lg-start mt-4 mt-lg-0">
                    © {{ date('Y') }}
                    @lang('translation.copyrights')
                </p>
            </div>

            <div class="col-lg-7 d-flex align-items-center justify-content-between order-0 order-lg-1 flex-column flex-lg-row">
                <ul class="m-0 p-0 list-unstyled d-flex footer-links mb-4 mb-lg-0">
                    <li>
                        <a href="{{ route('front.terms.index') }}">@lang('translation.terms_and_conditions')</a>
                    </li>

                    <li>
                        <a href="{{ route('front.privacy.index') }}">@lang('translation.privacy_policy')</a>
                    </li>
                </ul>

                <ul class="m-0 p-0 list-unstyled d-flex align-items-center footer-social">
                    <li>
                        <a href="https://wa.me/{{ $general_settings['general_whatsapp_phone']->first()->value }}?text={{ $general_settings['general_whatsapp_text']->first()->value }}" class="d-flex align-items-center justify-content-center rounded-pill">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </li>

                    <li>
                        <a href="{{ $general_settings['general_facebook']->first()->value }}" class="d-flex align-items-center justify-content-center rounded-pill">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </li>

                    <li>
                        <a href="{{ $general_settings['general_twitter']->first()->value }}" class="d-flex align-items-center justify-content-center rounded-pill">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </li>

                    <li>
                        <a href="{{ $general_settings['general_youtube']->first()->value }}" class="d-flex align-items-center justify-content-center rounded-pill">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </li>

                    <li>
                        <a href="{{ $general_settings['general_instagram']->first()->value }}" class="d-flex align-items-center justify-content-center rounded-pill">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
