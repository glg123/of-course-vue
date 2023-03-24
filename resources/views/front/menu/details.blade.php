@php $titlePage = __('translation.menu_details'); @endphp

@extends('front.layouts.master')

@section('title', $titlePage)

@section('content')
    @component('front.components.breadcrumb')
        @slot('title', $titlePage)

        @push('breadcrumb_additions')
            <li class="breadcrumb-item"><a href="{{ route('front.menu') }}">@lang('translation.menu')</a></li>
        @endpush
    @endcomponent

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col">
                <div class="details-box bg-box">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <img src="{{ asset('front') }}/build/img/details-box.png" alt="" class="w-100 h-100">
                        </div>
                        <div class="col-lg-8 py-3">
                            <div class="px-3 px-lg-4 py-4">
                                <div class="diet-name mb-2">
                                    <span class="bg-white d-inline-block px-3 py-2 fw-bold h5">دايــت بــلان</span>
                                </div>
                                <h5 class="text-white fw-bold mt-3 mb-4 lh-base">نظام غذائي صحي يساعدك على خســارة الوزن مع المحافظة على أعلى مستويات الطاقة</h5>
                                <div class="d-flex diet-number flex-column flex-md-row gap-4">
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 mb-0 text-white">السعرات</h6>
                                        <h4 class="tahoma-font mb-0 my-2 fw-bold text-white">1200 - 1300</h4>
                                        <h6 class="f14 mb-0 text-white">سعر حراري</h6>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 mb-0 text-white">البروتيــن</h6>
                                        <h4 class="tahoma-font mb-0 my-2 fw-bold text-white">4.25</h4>
                                        <h6 class="f14 mb-0 text-white">جــــرام</h6>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 mb-0 text-white">كاربوهيدرات</h6>
                                        <h4 class="tahoma-font mb-0 my-2 fw-bold text-white">3.12</h4>
                                        <h6 class="f14 mb-0 text-white">جــــرام</h6>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 mb-0 text-white">السعرات</h6>
                                        <h4 class="tahoma-font mb-0 my-2 fw-bold text-white">0.95</h4>
                                        <h6 class="f14 mb-0 text-white">جــــرام</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-4 mb-3 mb-lg-0">
                <div class="bg-white rounded-4 pt-5 p-2 p-lg-4">
                    <h4 class="block-title fw-bolder text-center">
                        محتويــات الحزمــة
                    </h4>
                    <div class="mt-4 d-flex flex-column gap-3 all-days">
                        <div class="bg-white-blue d-flex justify-content-between align-items-center px-3 py-3 rounded-3">
                            <h6 class="fw-bold mb-0">كـل الأيـــام</h6>
                            <div class="d-flex align-items-center eq-days">
                                <span class="d-flex flex-column align-items-center justify-content-center rounded-4">
                                    <span class="mb-1"></span>
                                    <span></span>
                                </span>
                                <div class="d-flex align-items-baseline">
                                    <h4 class="fw-bold mb-0 ms-2 me-1">30</h4>
                                    <h6 class="mb-0">يــوم</h6>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white-blue d-flex justify-content-between align-items-center px-3 py-3 rounded-3">
                            <h6 class="fw-bold mb-0">شهـر بدون الجمعـة</h6>
                            <div class="d-flex align-items-center eq-days">
                                <span class="d-flex flex-column align-items-center justify-content-center rounded-4">
                                    <span class="mb-1"></span>
                                    <span></span>
                                </span>
                                <div class="d-flex align-items-baseline">
                                    <h4 class="fw-bold mb-0 ms-2 me-1">26</h4>
                                    <h6 class="mb-0">يــوم</h6>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white-blue d-flex justify-content-between align-items-center px-3 py-3 rounded-3 active-days">
                            <h6 class="fw-bold mb-0">شهر بدون عطلة نهاية الإسبوع</h6>
                            <div class="d-flex align-items-center eq-days">
                                <span class="d-flex flex-column align-items-center justify-content-center rounded-4">
                                    <span class="mb-1"></span>
                                    <span></span>
                                </span>
                                <div class="d-flex align-items-baseline">
                                    <h4 class="fw-bold mb-0 ms-2 me-1">20</h4>
                                    <h6 class="mb-0">يــوم</h6>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white-blue d-flex justify-content-between align-items-center px-3 py-3 rounded-3">
                            <h6 class="fw-bold mb-0">أسبوعين بـدون جمعــة</h6>
                            <div class="d-flex align-items-center eq-days">
                                <span class="d-flex flex-column align-items-center justify-content-center rounded-4">
                                    <span class="mb-1"></span>
                                    <span></span>
                                </span>
                                <div class="d-flex align-items-baseline">
                                    <h4 class="fw-bold mb-0 ms-2 me-1">12</h4>
                                    <h6 class="mb-0">يــوم</h6>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white-blue d-flex justify-content-between align-items-center px-3 py-3 rounded-3">
                            <h6 class="fw-bold mb-0">أسبوعين بـدون جمعــة</h6>
                            <div class="d-flex align-items-center eq-days">
                                <span class="d-flex flex-column align-items-center justify-content-center rounded-4">
                                    <span class="mb-1"></span>
                                    <span></span>
                                </span>
                                <div class="d-flex align-items-baseline">
                                    <h4 class="fw-bold mb-0 ms-2 me-1">6</h4>
                                    <h6 class="mb-0">يــوم</h6>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white-blue d-flex justify-content-between align-items-center px-3 py-3 rounded-3">
                            <h6 class="fw-bold mb-0">يوم واحد</h6>
                            <div class="d-flex align-items-center eq-days">
                                <span class="d-flex flex-column align-items-center justify-content-center rounded-4">
                                    <span class="mb-1"></span>
                                    <span></span>
                                </span>
                                <div class="d-flex align-items-baseline">
                                    <h4 class="fw-bold mb-0 ms-2 me-1">1</h4>
                                    <h6 class="mb-0">يــوم</h6>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white-blue d-flex justify-content-between align-items-center px-3 py-3 rounded-3">
                            <h6 class="fw-bold mb-0">نظـــام وجبـتين</h6>
                            <div class="d-flex align-items-center eq-days">
                                <span class="d-flex flex-column align-items-center justify-content-center rounded-4">
                                    <span class="mb-1"></span>
                                    <span></span>
                                </span>
                                <div class="d-flex align-items-baseline">
                                    <h4 class="fw-bold mb-0 ms-2 me-1">10</h4>
                                    <h6 class="mb-0">يــوم</h6>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white-blue d-flex justify-content-between align-items-center px-3 py-3 rounded-3">
                            <h6 class="fw-bold mb-0">نظـــام وجبـتين</h6>
                            <div class="d-flex align-items-center eq-days">
                                <span class="d-flex flex-column align-items-center justify-content-center rounded-4">
                                    <span class="mb-1"></span>
                                    <span></span>
                                </span>
                                <div class="d-flex align-items-baseline">
                                    <h4 class="fw-bold mb-0 ms-2 me-1">10</h4>
                                    <h6 class="mb-0">يــوم</h6>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white-blue d-flex justify-content-between align-items-center px-3 py-3 rounded-3">
                            <h6 class="fw-bold mb-0">نظـــام وجبـتين</h6>
                            <div class="d-flex align-items-center eq-days">
                                <span class="d-flex flex-column align-items-center justify-content-center rounded-4">
                                    <span class="mb-1"></span>
                                    <span></span>
                                </span>
                                <div class="d-flex align-items-baseline">
                                    <h4 class="fw-bold mb-0 ms-2 me-1">10</h4>
                                    <h6 class="mb-0">يــوم</h6>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white-blue d-flex justify-content-between align-items-center px-3 py-3 rounded-3">
                            <h6 class="fw-bold mb-0">نظـــام وجبـتين</h6>
                            <div class="d-flex align-items-center eq-days">
                                <span class="d-flex flex-column align-items-center justify-content-center rounded-4">
                                    <span class="mb-1"></span>
                                    <span></span>
                                </span>
                                <div class="d-flex align-items-baseline">
                                    <h4 class="fw-bold mb-0 ms-2 me-1">10</h4>
                                    <h6 class="mb-0">يــوم</h6>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white-blue d-flex justify-content-between align-items-center px-3 py-3 rounded-3">
                            <h6 class="fw-bold mb-0">وجبة واحدة</h6>
                            <div class="d-flex align-items-center eq-days">
                                <span class="d-flex flex-column align-items-center justify-content-center rounded-4">
                                    <span class="mb-1"></span>
                                    <span></span>
                                </span>
                                <div class="d-flex align-items-baseline">
                                    <h4 class="fw-bold mb-0 ms-2 me-1">10</h4>
                                    <h6 class="mb-0">يــوم</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="bg-white rounded-4 p-2 p-lg-4">
                    <div class="bg-white-blue d-flex justify-content-between align-items-center flex-column flex-lg-row px-3 py-3 rounded-2 border-right-box gap-3 mb-4">
                        <div class="d-flex align-items-center w-100">
                            <h6 class="mb-0 fw-bold">شهر بدون عطلة نهاية الإسبوع</h6>
                            <div class="d-flex align-items-baseline bg-white-blue-2 ms-2 px-3 py-1 rounded-2">
                                <h5 class="fw-bold mb-0 me-1">20</h5>
                                <span>يوم</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline justify-content-between justify-content-lg-end w-100">
                            <h6 class="text-purple mb-0 fw-bold">1300 - 1200</h6>
                            <span class="fw-bold ms-2">سعر حراري</span>
                        </div>
                    </div>

                    <div class="d-grid gap-4">
                        <div class="d-flex flex-column gap-1">
                            <div class="d-flex align-items-center d-day">
                                <h4 class="h6 fw-bold">الأحد</h4>
                                <hr class="w-100 ms-3">
                            </div>
                            <div class="d-flex flex-wrap align-items-start align-items-lg-center gap-3 s-diet">
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">1  ريــوق</span>
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">2  غداء و عشاء</span>
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">1 سنـــاك</span>
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">1 سلطة</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-1">
                            <div class="d-flex align-items-center d-day">
                                <h4 class="h6 fw-bold">الإثنــين</h4>
                                <hr class="w-100 ms-3">
                            </div>
                            <div class="d-flex flex-wrap align-items-start align-items-lg-center gap-3 s-diet">
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">1  ريــوق</span>
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">2  غداء و عشاء</span>
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">1 سنـــاك</span>
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">1 سلطة</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-1">
                            <div class="d-flex align-items-center d-day">
                                <h4 class="h6 fw-bold">الثلاثــاء</h4>
                                <hr class="w-100 ms-3">
                            </div>
                            <div class="d-flex flex-wrap align-items-start align-items-lg-center gap-3 s-diet">
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">1  ريــوق</span>
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">2  غداء و عشاء</span>
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">1 سنـــاك</span>
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">1 سلطة</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-1">
                            <div class="d-flex align-items-center d-day">
                                <h4 class="h6 fw-bold">الأربعـاء</h4>
                                <hr class="w-100 ms-3">
                            </div>
                            <div class="d-flex flex-wrap align-items-start align-items-lg-center gap-3 s-diet">
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">1  ريــوق</span>
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">2  غداء و عشاء</span>
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">1 سنـــاك</span>
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">1 سلطة</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-1">
                            <div class="d-flex align-items-center d-day">
                                <h4 class="h6 fw-bold">الخميس</h4>
                                <hr class="w-100 ms-3">
                            </div>
                            <div class="d-flex flex-wrap align-items-start align-items-lg-center gap-3 s-diet">
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">1  ريــوق</span>
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">2  غداء و عشاء</span>
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">1 سنـــاك</span>
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">1 سلطة</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-1">
                            <div class="d-flex align-items-center d-day">
                                <h4 class="h6 fw-bold">الجمعـة</h4>
                                <hr class="w-100 ms-3">
                            </div>
                            <div class="d-flex flex-wrap align-items-start align-items-lg-center gap-3 s-diet">
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">1  ريــوق</span>
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">2  غداء و عشاء</span>
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">1 سنـــاك</span>
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">1 سلطة</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-1">
                            <div class="d-flex align-items-center d-day">
                                <h4 class="h6 fw-bold">السـبت</h4>
                                <hr class="w-100 ms-3">
                            </div>
                            <div class="d-flex flex-wrap align-items-start align-items-lg-center gap-3 s-diet">
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">1  ريــوق</span>
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">2  غداء و عشاء</span>
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">1 سنـــاك</span>
                                <span class="bg-white-blue h6 px-3 py-2 rounded-pill">1 سلطة</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-end align-items-lg-center justify-content-between mt-4 flex-column flex-lg-row gap-3">
                    <p class="mb-0 fw-bolder">تكلفة الإشتراك في الخطة: <span class="text-purple h5 mb-0 mx-2 fw-bolder">209.00</span> دينـــار كويـــتي</p>
                    <a href="#" class="btn-of rounded-pill px-4 py-3 fw-bolder d-flex align-items-center justify-content-center mb-3 mb-md-0">الإشتراك في  الخطة <img src="build/img/arrow-left.svg" alt="" class="ms-3"></a>
                </div>
            </div>
        </div>
    </div>
@endsection
