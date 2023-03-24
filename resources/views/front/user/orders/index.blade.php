@php $titlePage = __('translation.orders_list'); @endphp

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
                        <h6 class="fw-bolder mb-0">قائمة الطلبـــات</h6>
                    </div>

                    <div class="d-flex flex-column gap-3">
                        <div class="bg-white-blue p-4 rounded-2 box-list box-list-2">
                            <div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center justify-content-between gap-3">
                                <h6 class="d-flex align-items-center fw-bolder mb-0">دايــت بــلان</h6>
                                <h5 class="fw-bolder h4 text-purple mb-0">209.00 <span class="h6 text-black fw-bold mb-0">دينـــار كويـــتي</span></h5>
                            </div>
                            <hr>
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 gap-lg-5">
                                <div class="d-flex flex-wrap gap-3 gap-lg-5">
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">رقم الطلب</h6>
                                        <h6 class="f14 fw-bolder mb-0">#82618</h6>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">تاريخ الطلب</h6>
                                        <h6 class="f14 fw-bolder mb-0">20 مايو 2022</h6>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">الحالة</h6>
                                        <h6 class="f12 fw-bold mb-0"><span class="bg-success text-white px-3 py-1 d-inline-block rounded-pill">جاري التوصيل</span></h6>
                                    </div>
                                </div>
                                <a href="#" class="btn bg-white-blue-2 rounded-pill px-4 py-2 fw-bold d-flex align-items-center justify-content-center border-purple text-purple">اعادة شراء الحزمة</a>
                            </div>
                        </div>
                        <div class="bg-white-blue p-4 rounded-2 box-list box-list-2">
                            <div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center justify-content-between gap-3">
                                <h6 class="d-flex align-items-center fw-bolder mb-0">دايــت بــلان</h6>
                                <h5 class="fw-bolder h4 text-purple mb-0">209.00 <span class="h6 text-black fw-bold mb-0">دينـــار كويـــتي</span></h5>
                            </div>
                            <hr>
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 gap-lg-5">
                                <div class="d-flex flex-wrap gap-3 gap-lg-5">
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">رقم الطلب</h6>
                                        <h6 class="f14 fw-bolder mb-0">#82618</h6>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">تاريخ الطلب</h6>
                                        <h6 class="f14 fw-bolder mb-0">20 مايو 2022</h6>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">الحالة</h6>
                                        <h6 class="f12 fw-bold mb-0"><span class="bg-success text-white px-3 py-1 d-inline-block rounded-pill">جاري التوصيل</span></h6>
                                    </div>
                                </div>
                                <a href="#" class="btn bg-white-blue-2 rounded-pill px-4 py-2 fw-bold d-flex align-items-center justify-content-center border-purple text-purple">اعادة شراء الحزمة</a>
                            </div>
                        </div>
                        <div class="bg-white-blue p-4 rounded-2 box-list box-list-2">
                            <div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center justify-content-between gap-3">
                                <h6 class="d-flex align-items-center fw-bolder mb-0">دايــت بــلان</h6>
                                <h5 class="fw-bolder h4 text-purple mb-0">209.00 <span class="h6 text-black fw-bold mb-0">دينـــار كويـــتي</span></h5>
                            </div>
                            <hr>
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 gap-lg-5">
                                <div class="d-flex flex-wrap gap-3 gap-lg-5">
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">رقم الطلب</h6>
                                        <h6 class="f14 fw-bolder mb-0">#82618</h6>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">تاريخ الطلب</h6>
                                        <h6 class="f14 fw-bolder mb-0">20 مايو 2022</h6>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">الحالة</h6>
                                        <h6 class="f12 fw-bold mb-0"><span class="bg-success text-white px-3 py-1 d-inline-block rounded-pill">جاري التوصيل</span></h6>
                                    </div>
                                </div>
                                <a href="#" class="btn bg-white-blue-2 rounded-pill px-4 py-2 fw-bold d-flex align-items-center justify-content-center border-purple text-purple">اعادة شراء الحزمة</a>
                            </div>
                        </div>
                        <div class="bg-white-blue p-4 rounded-2 box-list">
                            <div class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center justify-content-between gap-3">
                                <h6 class="d-flex align-items-center fw-bolder mb-0">دايــت بــلان</h6>
                                <h5 class="fw-bolder h4 text-purple mb-0">209.00 <span class="h6 text-black fw-bold mb-0">دينـــار كويـــتي</span></h5>
                            </div>
                            <hr>
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 gap-lg-5">
                                <div class="d-flex flex-wrap gap-3 gap-lg-5">
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">رقم الطلب</h6>
                                        <h6 class="f14 fw-bolder mb-0">#82618</h6>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">تاريخ الطلب</h6>
                                        <h6 class="f14 fw-bolder mb-0">20 مايو 2022</h6>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="f14 text-muted">الحالة</h6>
                                        <h6 class="f12 fw-bold mb-0"><span class="bg-black text-white px-3 py-1 d-inline-block rounded-pill">تم التوصيل</span></h6>
                                    </div>
                                </div>
                                <a href="#" class="btn bg-white-blue-2 rounded-pill px-4 py-2 fw-bold d-flex align-items-center justify-content-center border-purple text-purple">اعادة شراء الحزمة</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
