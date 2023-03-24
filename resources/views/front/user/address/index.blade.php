@php $titlePage = __('translation.addresses'); @endphp

@extends('front.layouts.master')

@section('title', $titlePage)

@section('content')
    @component('front.components.breadcrumb')
        @slot('title', $titlePage)
    @endcomponent

    <div class="container mt-5 mb-5">
        <div class="row">

            @include('front.user.user-panel')

            <div class="col-lg-8">
                <div class="bg-white rounded-4 p-2 p-lg-4">
                    <div class="bg-white-blue px-3 py-3 rounded-2 border-right-box mb-4 d-flex align-items-center justify-content-between flex-column flex-lg-row gap-3">
                        <h6 class="fw-bolder mb-0">إدارة العناوين</h6>
                        <a href="{{ route('front.address.create') }}" class="btn-of rounded-3 px-4 py-2 fw-bold d-flex align-items-center justify-content-center mb-3 mb-md-0">أضف عنوان شحن</a>
                    </div>

                    <div class="bg-white-blue p-5 text-center rounded-2 mb-4">
                        <img src="{{ asset('front') }}/build/img/address-icon.png">

                        <h6 class="fw-bolder my-3">لم يتم إضافة اي عناوين شحن</h6>

                        <div class="d-flex justify-content-center">
                            <a href="{{ route('front.address.create') }}" class="btn bg-white-blue-2 rounded-pill px-4 py-3 fw-bold d-flex align-items-center justify-content-center mb-3 mb-md-0 border-purple">
                                إضافة عنوان شحن
                                <img src="{{ asset('front') }}/build/img/arrow-left-2.svg" alt="" class="ms-2">
                            </a>
                        </div>
                    </div>

                    <div class="d-flex flex-column gap-3">
                        <div class="bg-white-blue p-4 rounded-2 box-list">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="d-flex align-items-center fw-bolder mb-0"><i class="fa-solid fa-location-dot me-2"></i> العنوان الرئيسي</h6>
                                <div class="dropdown">
                                    <button class="bg-white-blue-2 dropdown-toggle border-0 rounded-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end bg-white-blue-2 border-0">
                                        <li><a class="dropdown-item" href="#">تعديل</a></li>
                                        <li><a class="dropdown-item" href="#">حذف</a></li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex flex-wrap gap-3 gap-lg-5">
                                <div class="d-flex flex-column">
                                    <h6 class="f14 text-muted">المدينة</h6>
                                    <h6 class="f14 fw-bolder mb-0">شمال غرب الصليبيخات</h6>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="f14 text-muted">المنطقة</h6>
                                    <h6 class="f14 fw-bolder mb-0">عنوان الرياض</h6>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="f14 text-muted">الشارع</h6>
                                    <h6 class="f14 fw-bolder mb-0">شارع المدينة</h6>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="f14 text-muted">رقم البيت</h6>
                                    <h6 class="f14 fw-bolder mb-0">3333</h6>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="f14 text-muted">رقم الطابق</h6>
                                    <h6 class="f14 fw-bolder mb-0">2</h6>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white-blue p-4 rounded-2 box-list">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="d-flex align-items-center fw-bolder mb-0"><i class="fa-solid fa-location-dot me-2"></i> عنوان محافظة الفروانية</h6>
                                <div class="dropdown">
                                    <button class="bg-white-blue-2 dropdown-toggle border-0 rounded-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end bg-white-blue-2 border-0">
                                        <li><a class="dropdown-item" href="#">تعديل</a></li>
                                        <li><a class="dropdown-item" href="#">حذف</a></li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex flex-wrap gap-3 gap-lg-5">
                                <div class="d-flex flex-column">
                                    <h6 class="f14 text-muted">المدينة</h6>
                                    <h6 class="f14 fw-bolder mb-0">الفروانية</h6>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="f14 text-muted">المنطقة</h6>
                                    <h6 class="f14 fw-bolder mb-0">الأندلس</h6>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="f14 text-muted">الشارع</h6>
                                    <h6 class="f14 fw-bolder mb-0">شارع الأندلس</h6>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="f14 text-muted">رقم البيت</h6>
                                    <h6 class="f14 fw-bolder mb-0">3333</h6>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="f14 text-muted">رقم الطابق</h6>
                                    <h6 class="f14 fw-bolder mb-0">2</h6>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white-blue p-4 rounded-2 box-list">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="d-flex align-items-center fw-bolder mb-0"><i class="fa-solid fa-location-dot me-2"></i> عنوان محافظة الفروانية</h6>
                                <div class="dropdown">
                                    <button class="bg-white-blue-2 dropdown-toggle border-0 rounded-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end bg-white-blue-2 border-0">
                                        <li><a class="dropdown-item" href="#">تعديل</a></li>
                                        <li><a class="dropdown-item" href="#">حذف</a></li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex flex-wrap gap-3 gap-lg-5">
                                <div class="d-flex flex-column">
                                    <h6 class="f14 text-muted">المدينة</h6>
                                    <h6 class="f14 fw-bolder mb-0">الفروانية</h6>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="f14 text-muted">المنطقة</h6>
                                    <h6 class="f14 fw-bolder mb-0">الأندلس</h6>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="f14 text-muted">الشارع</h6>
                                    <h6 class="f14 fw-bolder mb-0">شارع الأندلس</h6>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="f14 text-muted">رقم البيت</h6>
                                    <h6 class="f14 fw-bolder mb-0">3333</h6>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="f14 text-muted">رقم الطابق</h6>
                                    <h6 class="f14 fw-bolder mb-0">2</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
