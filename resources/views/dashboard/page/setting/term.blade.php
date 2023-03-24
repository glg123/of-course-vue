@extends('dashboard.layouts.master')
@section('sidebar')
    @include('dashboard.incudes.back.setting_sidebar')
@endsection


@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'SETTING'])
    @include('dashboard.incudes.alert')

    <div class="page-content" id="terms">
        <div class="page-card container p-4">
            <h1 class="page-main-title mb-4"> الشروط و الأحكام </h1>
            <form id="form-1" action="{{ route('terms.update') }}" method="POST">
                @csrf

                <div class="form-header">
                    <img class="img-fluid" src="{{ asset('back/assets/images/ofCourse-images/shape-1.png') }}" width="10px" height="10px">
                    <h6 class="form-main-title"> بيانات الشروط والأحكام </h6>
                    <div class="form-header-line"></div>
                </div>

                <div class="form-content container">
                    <div class="row">
                        <div class="col-lg-12 mb-5">
                            <div>
                                <label class="form-label">الشروط والأحكام (باللغة العربية)</label>
                                <textarea rows="7" name="term_desc_ar[value]" class="form-control k-form-input tinymce" type="text"
                                    placeholder="الشروط والأحكام (باللغة العربية)" data-validation="req">{{ $termsSettings['term_desc_ar']->first()->value ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-5">
                            <div>
                                <label class="form-label">الشروط والأحكام (باللغة الإنجليزية)</label>
                                <textarea rows="7" name="term_desc_en[value]" class="form-control k-form-input tinymce" type="text"
                                    placeholder="الشروط والأحكام (باللغة الإنجليزية)" data-validation="req">{{ $termsSettings['term_desc_en']->first()->value ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-header">
                    <img class="img-fluid" src="{{ asset('back/assets/images/ofCourse-images/shape-1.png') }}" width="10px" height="10px">
                    <h6 class="form-main-title"> سياسة الدفع والإسترجاع النقدي</h6>
                    <div class="form-header-line"></div>
                </div>

                <div class="form-content container">
                    <div class="row">
                        <div class="col-lg-12 mb-5">
                            <div>
                                <label class="form-label">سياسة الدفع والإسترجاع النقدي (باللغة العربية)</label>
                                <textarea rows="7" name="term_payment_policy_ar[value]" class="form-control k-form-input tinymce" type="text"
                                    placeholder="سياسة الدفع والإسترجاع النقدي (باللغة العربية)" data-validation="req">{{ $termsSettings['term_payment_policy_ar']->first()->value ?? '' }}
                                </textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-5">
                            <div>
                                <label class="form-label">سياسة الدفع والإسترجاع النقدي (باللغة الإنجليزية)</label>
                                <textarea rows="7" name="term_payment_policy_en[value]" class="form-control k-form-input tinymce" type="text"
                                    placeholder="سياسة الدفع والإسترجاع النقدي (باللغة الإنجليزية)" data-validation="req">{{ $termsSettings['term_payment_policy_en']->first()->value ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-content container mt-4">
                    <div class="row">
                        <div class="col-lg-12 text-end">
                            <button type="submit" class="btn btn-light waves-effect waves-light form-btn px-5">@lang('translation.updating_data')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <!-- End Page-content -->

@endsection
