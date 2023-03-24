@php $titlePage = __('translation.setting'); @endphp

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
                        <h6 class="fw-bolder mb-0">{{ $titlePage }}</h6>
                    </div>
                    <form action="">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="mb-4 bg-white-blue p-4 rounded-2 border-gray">
                                    <label for="profilemail" class="form-label fw-bolder">اللغة المفضلة</label>
                                    <div class="d-flex">
                                        <div class="form-check d-flex align-items-center w-50">
                                            <input class="form-check-input form-check-input-box p-2 me-2 shadow-none"
                                                   type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                                   value="option1">
                                            <label class="form-check-label fw-bolder" for="inlineRadio1">العربية</label>
                                        </div>
                                        <div class="form-check d-flex align-items-center w-50">
                                            <input class="form-check-input form-check-input-box p-2 me-2 shadow-none"
                                                   type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                                   value="option2">
                                            <label class="form-check-label fw-bolder"
                                                   for="inlineRadio2">الأنجليزية</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4 bg-white-blue p-4 rounded-2 border-gray">
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input form-check-input-box p-2 shadow-none"
                                               type="checkbox" value="" id="flexCheck">
                                        <label class="form-check-label ms-2" for="flexCheck">
                                            أود استلام رسائل بريدية من خلال البريد المسجل
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-4 bg-white-blue p-4 rounded-2 border-gray">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                               id="flexSwitchCheckChecked" checked>
                                        <label class="form-check-label" for="flexSwitchCheckChecked">الأمن
                                            البيومتري</label>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="d-flex justify-content-end">
                                    <button type="submit"
                                            class="btn-save fw-bolder rounded-pill px-4 py-3 fw-bold d-flex align-items-center justify-content-center mb-3 mb-md-0 border-0">حفظ
                                        التعديلات <img src="build/img/arrow-left-2.svg" alt="" class="ms-3"></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
