<?php

$lang_route = 'admin.dashboard.lang';
?>
<div class="main-nav container py-2">
    <div class="row mobileLogoBar justify-content-between align-items-center d-flex d-lg-none">
        <div class="col-4 mx-3">
            <img class="img-fluid" src="assets/images/ofCourse-images/logo.png">
        </div>
        <div class="col-3 text-start">
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="bx bx-menu font-size-24 text-white border border-white p-2 rounded"></i>
            </button>
        </div>
    </div>
    <div class="row justify-content-between">
        <div class="col-12 col-lg-7">
            <div class="main-nav-btn-groub">
                <a href="{{route('dashboard.index')}}" type="button"
                    class="btn btn-light waves-effect waves-light {{ headerTypeActive($HEADER_TYPE, 1) }}">{{__('views.sales')}}</a>
                <a href="{{route('food.stock.index')}}" type="button"
                    class="btn btn-light waves-effect waves-light {{ headerTypeActive($HEADER_TYPE, 2) }}">{{__('views.operations')}}</a>
                <a href="{{route('orders.report')}}" type="button"
                    class="btn btn-light waves-effect waves-light {{ headerTypeActive($HEADER_TYPE, 3) }}">{{__('views.reports')}}</a>
                <a href="{{route('profile')}}" type="button"
                    class="btn btn-light waves-effect waves-light {{ headerTypeActive($HEADER_TYPE, 4) }}">{{__('views.settings')}}</a>



            </div>

        </div>
        <div class="col-6 col-lg-2 text-center">

            <div class="dropdown d-inline-block">
                <button type="button"
                    class="btn header-item waves-effect d-flex align-items-center justify-content-center"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{ asset('back/assets/images/ofCourse-images/profile-image.jpg') }}" alt="Header Avatar">
                    <div>
                        <span class="d-none d-xl-inline-block ms-1 header-user-name"
                            key="t-user-name">{{ auth()->user()->first_name }}
                        </span>
                        <span class="d-none d-xl-inline-block ms-1 header-user-email"
                            key="t-user-name">{{ auth()->user()->email }}</span>
                    </div>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"> <span key="t-logout">تسجيل
                            خروج</span> <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> </a>
                </div>
            </div>


        </div>
        <div class="col-6 col-lg-2  text-center">
        <div class="dropdown d-inline-block">
            <div class="main-nav-btn-groub">
                <button class="btn btn-black" id="showbutton">
                    @if(app()->getLocale() === "en")
                        {{__('views.English_swicher')}}
                    @else
                        {{__('views.Arabic_swicher')}}
                    @endif
                    <span class="glyphicon glyphicon-chevron-down"></span></button>
            </div>
            <div class="dropdown-menu" id="showing">


                <?php
                $lang_list = [
                    'ar' => [
                        'code' => 'ar',
                        'text' => __('views.Arabic_swicher'),
                    ],
                    'en' => [
                        'code' => 'en',
                        'text' => __('views.English_swicher'),
                    ],
                ];
                ?>
                @foreach($lang_list as $lang_item )

                    <a class="dropdown-item" href="{{ route($lang_route, $lang_item['code']) }}">{{$lang_item['text']}}</a>
                @endforeach

            </div>
        </div>
        </div>
    </div>
</div>
