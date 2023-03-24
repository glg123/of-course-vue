@php $titlePage = __('translation.add_create'); @endphp

@extends('front.layouts.master')

@section('title', $titlePage)

@section('content')
    @component('front.components.breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('front.address') }}">{{ __('translation.addresses') }}</a></li>

        @slot('title', $titlePage)
    @endcomponent

    <div class="container mt-5 mb-5">
        <div class="row">

            @include('front.user.user-panel')

            <div class="col-lg-8">
                <div class="bg-white rounded-4 p-2 p-lg-4">

                    <div class="bg-white-blue px-3 py-3 rounded-2 border-right-box mb-4 d-flex align-items-center justify-content-between flex-column flex-lg-row gap-3">
                        <h6 class="fw-bolder mb-0">إضافة / تعديل عنوان</h6>
                    </div>

                    <form action="">
                        <div class="mb-4">
                            <label for="address-name" class="form-label">اسم العنوان</label>
                            <input type="text" class="form-control text-start shadow-none" id="address-name"
                                   placeholder="اسم العنوان">
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <label for="choose-city" class="form-label">اختر المدينة</label>
                                <select name="" id="choose-city" class="form-select text-start shadow-none">
                                    <option value="">-- اختر المدينة --</option>
                                    <option value="">الرياض</option>
                                </select>
                            </div>

                            <div class="col-lg-6">
                                <label for="choose-area" class="form-label">اختر المنطقة</label>
                                <select name="" id="choose-area" class="form-select text-start shadow-none">
                                    <option value="">-- اختر المنطقة --</option>
                                    <option value="">المنطقة الوسطي</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <label for="street-name" class="form-label">اختر الشارع</label>
                                <input type="text" class="form-control text-start shadow-none" id="street-name"
                                       placeholder="اسم الشارع">
                            </div>

                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="street-name" class="form-label">رقم البيت</label>
                                        <input type="text" class="form-control text-start shadow-none" id="street-name"
                                               placeholder="رقم البيت">
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="street-name" class="form-label">رقم الطابق</label>
                                        <input type="text" class="form-control text-start shadow-none" id="street-name"
                                               placeholder="رقم الطابق">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
