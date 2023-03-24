@php
    $user = Auth::user();
@endphp
<div class="col-lg-4" style="margin-bottom: 20px ">
    <div class="bg-white rounded-4 p-2 p-lg-4">
        <div class="profile-head">
            <img src="{{ asset('assets/front/build/img/bg-profile.png') }}" alt="">
        </div>
        <div class="profile-picture d-flex flex-column justify-content-center align-items-center mb-4">
            <img src=" {{  asset('assets/images/' . $user->photo) }}" alt="" class="rounded-pill">
            <h5 class="fw-bolder mt-3 mb-0">{{ $user->displayName() }}</h5>
        </div>
        <ul class="d-flex flex-column gap-3 profile-menu list-unstyled p-0 m-0">

            <li class="  {{ request()->is('user/dashboard') ? 'active-profile-menu' : '' }} ">
                <a class="bg-white-blue d-flex justify-content-between align-items-center fw-bolder px-3 py-3 rounded-3"
                    href="{{ route('user.dashboard') }}">
                    <div>
                        <i class="fa-regular fa-user me-2"></i> {{ __('Dashboard') }}
                    </div>
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </li>

            <li class="  {{ request()->is('user/profile') ? 'active-profile-menu' : '' }} ">
                <a class="bg-white-blue d-flex justify-content-between align-items-center fw-bolder px-3 py-3 rounded-3 {{ request()->is('user/profile') ? 'active' : '' }}"
                    href="{{ route('user.profile') }}">
                    <div>
                        <i class="fa-regular fa-user me-2"></i> معلومات الملف الشخصي
                    </div>
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </li>

            <li class="  {{ request()->is('user/addresses') ? 'active-profile-menu' : '' }} ">
                <a class="bg-white-blue d-flex justify-content-between align-items-center fw-bolder px-3 py-3 rounded-3 "
                    href="{{ route('user.address') }}">
                    <div>
                        <i class="fa-solid fa-location-dot me-2"></i> إدارة العناوين
                    </div>
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </li>

            <li class="  {{ request()->is('user/orders') ? 'active-profile-menu' : '' }} ">
                <a class="bg-white-blue d-flex justify-content-between align-items-center fw-bolder px-3 py-3 rounded-3 "
                    href="{{ route('user.order.index') }}">
                    <div>
                        <i class="fa-solid fa-list-check me-2"></i> قائمة الطلبــــات
                    </div>
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </li>



            <li>
                <a class="bg-white-blue d-flex justify-content-between align-items-center fw-bolder px-3 py-3 rounded-3"
                    href="{{ route('user.logout') }}">
                    <div>
                        <i class="fa-solid fa-arrow-right-from-bracket me-2"></i> تسجيل الخروج
                    </div>
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </li>
        </ul>
    </div>


    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Remove Account') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Are You Sure?') }}</p>
                    <p>{{ __('Do you remove you account?') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <a href="{{ route('user.account.remove') }}" type="button"
                        class="btn btn-danger">{{ __('Remove Account') }}</a>
                </div>
            </div>
        </div>
    </div>

</div>
