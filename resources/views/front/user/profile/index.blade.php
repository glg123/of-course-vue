@php $titlePage = __('translation.profile'); @endphp

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
                        <h6 class="fw-bolder mb-0">معلومات الملف الشخصي</h6>
                    </div>
                    <form action="">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="profile-picture profile-picture-form d-flex flex-column justify-content-center align-items-center mb-4">
                                    <label for="uploade-profile-pic" class="position-relative">
                                        <img src="{{ asset('front') }}/build/img/profile-picture.png" alt="" class="rounded-pill">
                                        <input type="file" name="" id="uploade-profile-pic" class="d-none">

                                        <div class="bg-purple upload-input position-absolute d-flex align-items-center justify-content-center h6 mb-0 rounded-pill">
                                            <img src="{{ asset('front') }}/build/img/camera.png" alt="">
                                        </div>
                                    </label>
                                </div>

                                <div class="mb-4">
                                    <label for="profilename" class="form-label">الإســـم الأول</label>
                                    <input type="text" class="form-control text-start shadow-none fw-bolder" id="profilename" value="عبدالرحمن">
                                </div>

                                <div class="mb-4">
                                    <label for="profilelastname" class="form-label">الإســـم الأخــير</label>
                                    <input type="text" class="form-control text-start shadow-none fw-bolder" id="profilelastname" value="محمد">
                                </div>

                                <div class="mb-4">
                                    <label for="profilemob" class="form-label">رقم الهاتف</label>
                                    <input type="tel" class="form-control text-start shadow-none fw-bolder" id="profilemob" value="0500000000">
                                </div>

                                <div class="mb-4">
                                    <label for="profilemail" class="form-label">البريد الإلكتروني</label>
                                    <input type="tel" class="form-control text-start shadow-none fw-bolder" id="profilemail" value="abdulrahman_mail_gmail@gmail.com">
                                </div>

                                <div class="mb-4">
                                    <label for="profiledate" class="form-label">تاريخ الميلاد</label>
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="number" class="form-control text-start shadow-none fw-bolder" id="profiledate" value="15">
                                        </div>
                                        <div class="col-4">
                                            <select name="" id="" class="form-select text-start shadow-none fw-bolder">
                                                <option value="1">يناير</option>
                                                <option value="2">فبراير</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <input type="number" class="form-control text-start shadow-none fw-bolder" value="1990">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="profilemail" class="form-label">الجنـــس</label>
                                    <div class="d-flex">
                                        <div class="form-check d-flex align-items-center w-50">
                                            <input class="form-check-input p-2 me-2" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                            <label class="form-check-label fw-bolder" for="inlineRadio1">ذكــر</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center w-50">
                                            <input class="form-check-input p-2 me-2" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                            <label class="form-check-label fw-bolder" for="inlineRadio2">انثــى</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="profileweight" class="form-label">الوزن</label>
                                    <div class="form-w-text position-relative">
                                        <input type="text" class="form-control text-start shadow-none fw-bolder" id="profileweight" value="75">
                                        <span class="fw-bolder border-start ps-4">كجم</span>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="profilelength" class="form-label">الطـول</label>
                                    <div class="form-w-text position-relative">
                                        <input type="text" class="form-control text-start shadow-none fw-bolder" id="profilelength" value="175">
                                        <span class="fw-bolder border-start ps-4">سم</span>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn-save fw-bolder rounded-pill px-4 py-3 fw-bold d-flex align-items-center justify-content-center mb-3 mb-md-0 border-0">
                                        حفظ التعديلات <img src="{{ asset('front') }}/build/img/arrow-left-2.svg" alt="" class="ms-3"></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
