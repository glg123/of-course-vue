<li class="{{ activeRoute('profile') }}">
    <a href="{{ route('profile') }}" class="waves-effect">
        <i class="bx bx-user"></i>
        <span key="t-profile">{{__('views.profile')}}</span>
    </a>
</li>

@if (auth()->user()->can('faq-view'))
    <li class="{{ request()->routeIs('faqs.*') ? 'mm-active' : '' }}">
        <a href="{{ route('faqs.index') }}" class="waves-effect">
            <i class="bx bx-question-mark"></i>
            <span key="t-faq">{{__('views.faqs')}}</span>
        </a>
    </li>
@endif

@if (auth()->user()->can('contact-view'))
    <li class="{{ request()->routeIs('contacts.*') ? 'mm-active' : '' }}">
        <a href="{{ route('contacts.index') }}" class="waves-effect">
            <i class="bx bx-world"></i>
            <span key="t-contact">{{__('views.contacts')}}</span>
        </a>
    </li>
@endif

@if (auth()->user()->can('setting-view-and-modify'))
    <li class="{{ activeRoute('general') }}">
        <a href="{{ route('general') }}" class="waves-effect">
            <i class="bx bx-cog"></i>
            <span key="t-configurations">{{__('views.settings')}}</span>
        </a>
    </li>

    <li class="{{ activeRoute('about') }}">
        <a href="{{ route('about') }}" class="waves-effect">
            <i class="bx bx-file"></i>
            <span key="t-terms-and-condition">@lang('translation.about_us')</span>
        </a>
    </li>

    <li class="{{ activeRoute('terms') }}">
        <a href="{{ route('terms') }}" class="waves-effect">
            <i class="bx bx-file"></i>
            <span key="t-terms-and-condition">{{__('views.terms')}}</span>
        </a>
    </li>

    <li class="{{ activeRoute('privacy') }}">
        <a href="{{ route('privacy') }}" class="waves-effect">
            <i class="bx bx-file"></i>
            <span key="t-terms-and-condition">@lang('translation.privacy_policy')</span>
        </a>
    </li>

    <li class="{{ activeRoute('tutorials') }}">
        <a href="{{ route('tutorials') }}" class="waves-effect">
            <i class="bx bx-info-circle"></i>
            <span key="t-tutorials">{{__('views.tutorials')}}</span>
        </a>
    </li>

    <li class="{{ request()->routeIs('settings.appearance.*') ? 'mm-active' : '' }}">
        <a href="javascript: void(0);" class=" waves-effect" aria-expanded="false">
            <i class="bx bx-box"></i>
            <span key="t-stocks">{{ __('translation.general_appearance_settings') }}</span>
        </a>

        <ul class="sub-menu mm-collapse pb-3" aria-expanded="false">
            <li>
                <a href="{{ route('settings.appearance.slider') }}" class="bg-white text-dark rounded {{ activeSubRoute('settings.appearance.slider') }}">
                    {{ __('translation.slider') }}
                </a>
            </li>

            <li class="{{ request()->routeIs('settings.appearance.features.*') ? 'mm-active' : '' }}">
                <a href="{{ route('settings.appearance.features.index') }}" class="bg-white text-dark rounded {{ request()->routeIs('settings.appearance.features.*') ? 'active' : '' }}">
                    {{ __('translation.features') }}
                </a>
            </li>

            <li>
                <a href="{{ route('settings.appearance.banner.bottom') }}" class="bg-white text-dark rounded {{ activeSubRoute('settings.appearance.banner.bottom') }}">
                    {{ __('translation.banner_bottom') }}
                </a>
            </li>
        </ul>
    </li>

@endif
