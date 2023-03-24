@php $titlePage = __('translation.do_not_want'); @endphp

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
                    <div
                        class="bg-white-blue px-3 py-3 rounded-2 border-right-box mb-4 d-flex align-items-center justify-content-between flex-column flex-lg-row gap-3">
                        <h6 class="fw-bolder mb-0">@lang('translation.do_not_want')</h6>
                    </div>

                    <div class="d-flex flex-column gap-3">
                        <div class="bg-white-blue p-4 rounded-2 box-list">
                            <div
                                class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center justify-content-between gap-3">
                                <h6 class="d-flex align-items-center fw-bolder mb-0">خضراوات</h6>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck">
                                            <label class="form-check-label ms-2" for="flexCheck">
                                                بازلاء مجمدة
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-1">
                                            <label class="form-check-label ms-2" for="flexCheck-1">
                                                باذنجان
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-2">
                                            <label class="form-check-label ms-2" for="flexCheck-2">
                                                طماطم
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-3">
                                            <label class="form-check-label ms-2" for="flexCheck-3">
                                                فلفل
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-4">
                                            <label class="form-check-label ms-2" for="flexCheck-4">
                                                بصل مقلي
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-5">
                                            <label class="form-check-label ms-2" for="flexCheck-5">
                                                فاصوليا
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-6">
                                            <label class="form-check-label ms-2" for="flexCheck-6">
                                                ملوخية مجمدة
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-7">
                                            <label class="form-check-label ms-2" for="flexCheck-7">
                                                براعم الفاصوليا
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white-blue p-4 rounded-2 box-list">
                            <div
                                class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center justify-content-between gap-3">
                                <h6 class="d-flex align-items-center fw-bolder mb-0">خضراوات</h6>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck">
                                            <label class="form-check-label ms-2" for="flexCheck">
                                                بازلاء مجمدة
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-1">
                                            <label class="form-check-label ms-2" for="flexCheck-1">
                                                باذنجان
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-2">
                                            <label class="form-check-label ms-2" for="flexCheck-2">
                                                طماطم
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-3">
                                            <label class="form-check-label ms-2" for="flexCheck-3">
                                                فلفل
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-4">
                                            <label class="form-check-label ms-2" for="flexCheck-4">
                                                بصل مقلي
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-5">
                                            <label class="form-check-label ms-2" for="flexCheck-5">
                                                فاصوليا
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-6">
                                            <label class="form-check-label ms-2" for="flexCheck-6">
                                                ملوخية مجمدة
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-7">
                                            <label class="form-check-label ms-2" for="flexCheck-7">
                                                براعم الفاصوليا
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white-blue p-4 rounded-2 box-list">
                            <div
                                class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center justify-content-between gap-3">
                                <h6 class="d-flex align-items-center fw-bolder mb-0">خضراوات</h6>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck">
                                            <label class="form-check-label ms-2" for="flexCheck">
                                                بازلاء مجمدة
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-1">
                                            <label class="form-check-label ms-2" for="flexCheck-1">
                                                باذنجان
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-2">
                                            <label class="form-check-label ms-2" for="flexCheck-2">
                                                طماطم
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-3">
                                            <label class="form-check-label ms-2" for="flexCheck-3">
                                                فلفل
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-4">
                                            <label class="form-check-label ms-2" for="flexCheck-4">
                                                بصل مقلي
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-5">
                                            <label class="form-check-label ms-2" for="flexCheck-5">
                                                فاصوليا
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-6">
                                            <label class="form-check-label ms-2" for="flexCheck-6">
                                                ملوخية مجمدة
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-7">
                                            <label class="form-check-label ms-2" for="flexCheck-7">
                                                براعم الفاصوليا
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white-blue p-4 rounded-2 box-list">
                            <div
                                class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center justify-content-between gap-3">
                                <h6 class="d-flex align-items-center fw-bolder mb-0">خضراوات</h6>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck">
                                            <label class="form-check-label ms-2" for="flexCheck">
                                                بازلاء مجمدة
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-1">
                                            <label class="form-check-label ms-2" for="flexCheck-1">
                                                باذنجان
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-2">
                                            <label class="form-check-label ms-2" for="flexCheck-2">
                                                طماطم
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-3">
                                            <label class="form-check-label ms-2" for="flexCheck-3">
                                                فلفل
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-4">
                                            <label class="form-check-label ms-2" for="flexCheck-4">
                                                بصل مقلي
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-5">
                                            <label class="form-check-label ms-2" for="flexCheck-5">
                                                فاصوليا
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-6">
                                            <label class="form-check-label ms-2" for="flexCheck-6">
                                                ملوخية مجمدة
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="bg-light-2 p-2 rounded-1 border-gray">
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input form-check-input-box p-2 shadow-none"
                                                   type="checkbox" value="" id="flexCheck-7">
                                            <label class="form-check-label ms-2" for="flexCheck-7">
                                                براعم الفاصوليا
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
