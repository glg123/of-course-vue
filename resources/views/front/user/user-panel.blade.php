<div class="col-lg-4">
    <div class="bg-white rounded-4 p-2 p-lg-4">
        <div class="profile-head">
            <img src="{{ asset('front') }}/build/img/bg-profile.png">
        </div>

        <div class="profile-picture d-flex flex-column justify-content-center align-items-center mb-4">
            <img src="{{ asset('front') }}/build/img/profile-picture.png" alt="" class="rounded-pill">
            <h5 class="fw-bolder mt-3 mb-0">عبدالرحمن عبدالله</h5>
        </div>

        <ul class="d-flex flex-column gap-3 profile-menu list-unstyled p-0 m-0">
            <li class="{{ request()->routeIs('front.profile') ? 'active-profile-menu' : '' }}">
                <a href="{{ route('front.profile') }}" class="bg-white-blue d-flex justify-content-between align-items-center fw-bolder px-3 py-3 rounded-3">
                    <div>
                        <i class="fa-regular fa-user me-2"></i> @lang('translation.profile')
                    </div>
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </li>

            <li class="{{ request()->routeIs('front.address.*') ? 'active-profile-menu' : '' }}">
                <a href="{{ route('front.address') }}" class="bg-white-blue d-flex justify-content-between align-items-center fw-bolder px-3 py-3 rounded-3">
                    <div>
                        <i class="fa-solid fa-location-dot me-2"></i> @lang('translation.addresses')
                    </div>
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </li>

            <li class="{{ request()->routeIs('front.profits') ? 'active-profile-menu' : '' }}">
                <a href="{{ route('front.profits') }}" class="bg-white-blue d-flex justify-content-between align-items-center fw-bolder px-3 py-3 rounded-3">
                    <div>
                        <i class="fa-regular fa-credit-card me-2"></i> @lang('translation.profits')
                    </div>
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </li>

            <li class="{{ request()->routeIs('front.orders') ? 'active-profile-menu' : '' }}">
                <a href="{{ route('front.orders') }}" class="bg-white-blue d-flex justify-content-between align-items-center fw-bolder px-3 py-3 rounded-3">
                    <div>
                        <i class="fa-solid fa-list-check me-2"></i> @lang('translation.orders_list')
                    </div>
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </li>

            <li class="{{ request()->routeIs('front.invoices') ? 'active-profile-menu' : '' }}">
                <a href="{{ route('front.invoices') }}" class="bg-white-blue d-flex justify-content-between align-items-center fw-bolder px-3 py-3 rounded-3">
                    <div>
                        <i class="fa-solid fa-receipt me-2"></i> @lang('translation.invoices')
                    </div>
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </li>

            <li class="{{ request()->routeIs('front.dislike.*') ? 'active-profile-menu' : '' }}">
                <a href="{{ route('front.dislike.index') }}" class="bg-white-blue d-flex justify-content-between align-items-center fw-bolder px-3 py-3 rounded-3">
                    <div>
                        <i class="fa-regular fa-thumbs-down me-2"></i> @lang('translation.do_not_want')
                    </div>
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </li>

            <li class="{{ request()->routeIs('front.allergy.*') ? 'active-profile-menu' : '' }}">
                <a href="{{ route('front.allergy.index') }}" class="bg-white-blue d-flex justify-content-between align-items-center fw-bolder px-3 py-3 rounded-3">
                    <div>
                        <i class="fa-regular fa-thumbs-up me-2"></i> @lang('translation.allergy')
                    </div>
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </li>

            <li class="{{ request()->routeIs('front.setting.*') ? 'active-profile-menu' : '' }}">
                <a href="{{ route('front.setting.index') }}" class="bg-white-blue d-flex justify-content-between align-items-center fw-bolder px-3 py-3 rounded-3">
                    <div>
                        <i class="fa-solid fa-gear me-2"></i> @lang('translation.setting')
                    </div>
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </li>

            <li>
                <a href="#" class="bg-white-blue d-flex justify-content-between align-items-center fw-bolder px-3 py-3 rounded-3">
                    <div>
                        <i class="fa-solid fa-arrow-right-from-bracket me-2"></i> @lang('translation.logout')
                    </div>
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
