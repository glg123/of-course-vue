@php $titlePage = __('translation.profits'); @endphp

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
                        <h6 class="fw-bolder mb-0">الأربــاح</h6>
                    </div>

                    <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between bg-purple text-white p-3 rounded-2 mb-4 gap-3">
                        <h5 class="mb-0 pe-0 pe-lg-5 lh-lg fw-bold text-start">شارك رمز الإحالة الخاص بك لكسب المزيد من النقاط</h5>
                        <div class="ref-code d-flex align-items-center justify-content-between bg-purple-2 p-3 rounded-2">
                            <div>
                                <h6 class="f12">رمز الإحــالة الخاص بك</h6>
                                <h5 class="fw-bolder mb-0">SDW846547</h5>
                            </div>
                            <a href="#" class="bg-purple text-white px-3 py-1 rounded-2 f14">نسخ الكود</a>
                        </div>
                    </div>

                    <div class="row mb-4 gap-3">
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center justify-content-between points-count px-4 py-4 rounded-2">
                                <h5 class="fw-bolder mb-0">لديك من النقاط</h5>
                                <div class="d-flex align-items-baseline">
                                    <h3 class="fw-bolder mb-0">2750</h3>
                                    <span class="ms-2">نقطة</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center justify-content-between balance-count px-4 py-4 rounded-2">
                                <h5 class="fw-bolder mb-0">رصيدك الحالي</h5>
                                <div class="d-flex align-items-baseline">
                                    <h3 class="fw-bolder mb-0">150.00</h3>
                                    <span class="ms-2">د.ك</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column">
                        <h4 class="mb-0">الأرباح المكتسبة</h4>
                        <hr class="customhr">
                    </div>

                    <div class="d-flex flex-column gap-3">
                        <div class="bg-white-blue p-4 rounded-2 box-list">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="d-flex align-items-center fw-bolder mb-0"><i class="fa-solid fa-trophy me-2 text-warning"></i> حصلت على 250 نقطة</h6>
                            </div>
                            <hr>
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 gap-lg-5">
                                <div class="d-flex flex-wrap gap-3 gap-lg-5">
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">الكود</h6>
                                        <h6 class="f14 fw-bolder mb-0">#84156749310</h6>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">التاريخ</h6>
                                        <h6 class="f14 fw-bolder mb-0">20 اكتـــوبر 2022</h6>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">الحالة</h6>
                                        <h6 class="f12 fw-bold mb-0"><span class="bg-success text-white px-3 py-1 d-inline-block rounded-pill">متاح</span></h6>
                                    </div>
                                </div>
                                <a href="#" class="btn bg-white-blue-2 rounded-pill px-4 py-2 fw-bold d-flex align-items-center justify-content-center border-purple text-purple">استبدال النقاط</a>
                            </div>
                        </div>
                        <div class="bg-white-blue p-4 rounded-2 box-list">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="d-flex align-items-center fw-bolder mb-0"><i class="fa-solid fa-trophy me-2 text-warning"></i> حصلت على 250 نقطة</h6>
                            </div>
                            <hr>
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 gap-lg-5">
                                <div class="d-flex flex-wrap gap-3 gap-lg-5">
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">الكود</h6>
                                        <h6 class="f14 fw-bolder mb-0">#84156749310</h6>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">التاريخ</h6>
                                        <h6 class="f14 fw-bolder mb-0">20 اكتـــوبر 2022</h6>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">الحالة</h6>
                                        <h6 class="f12 fw-bold mb-0"><span class="bg-danger text-white px-3 py-1 d-inline-block rounded-pill">منتهي</span></h6>
                                    </div>
                                </div>
                                <a href="#" class="btn bg-white-blue-2 rounded-pill px-4 py-2 fw-bold d-flex align-items-center justify-content-center border-purple text-purple disabled">تم استبدال النقاط</a>
                            </div>
                        </div>
                        <div class="bg-white-blue p-4 rounded-2 box-list">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="d-flex align-items-center fw-bolder mb-0"><i class="fa-solid fa-trophy me-2 text-warning"></i> حصلت على 250 نقطة</h6>
                            </div>
                            <hr>
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 gap-lg-5">
                                <div class="d-flex flex-wrap gap-3 gap-lg-5">
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">الكود</h6>
                                        <h6 class="f14 fw-bolder mb-0">#84156749310</h6>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">التاريخ</h6>
                                        <h6 class="f14 fw-bolder mb-0">20 اكتـــوبر 2022</h6>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">الحالة</h6>
                                        <h6 class="f12 fw-bold mb-0"><span class="bg-success text-white px-3 py-1 d-inline-block rounded-pill">متاح</span></h6>
                                    </div>
                                </div>
                                <a href="#" class="btn bg-white-blue-2 rounded-pill px-4 py-2 fw-bold d-flex align-items-center justify-content-center border-purple text-purple">استبدال النقاط</a>
                            </div>
                        </div>
                        <div class="bg-white-blue p-4 rounded-2 box-list">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="d-flex align-items-center fw-bolder mb-0"><i class="fa-solid fa-trophy me-2 text-warning"></i> حصلت على 250 نقطة</h6>
                            </div>
                            <hr>
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 gap-lg-5">
                                <div class="d-flex flex-wrap gap-3 gap-lg-5">
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">الكود</h6>
                                        <h6 class="f14 fw-bolder mb-0">#84156749310</h6>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">التاريخ</h6>
                                        <h6 class="f14 fw-bolder mb-0">20 اكتـــوبر 2022</h6>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">الحالة</h6>
                                        <h6 class="f12 fw-bold mb-0"><span class="bg-danger text-white px-3 py-1 d-inline-block rounded-pill">منتهي</span></h6>
                                    </div>
                                </div>
                                <a href="#" class="btn bg-white-blue-2 rounded-pill px-4 py-2 fw-bold d-flex align-items-center justify-content-center border-purple text-purple disabled">تم استبدال النقاط</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
