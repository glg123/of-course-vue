@extends('dashboard.layouts.master')
@section('sidebar')
    @include('dashboard.incudes.back.setting_sidebar')
@endsection

@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'SETTING'])
    @include('dashboard.incudes.alert')

    <div class="page-content">
        <div class="page-card container p-4">
            <h1 class="page-main-title mb-4">حول التطبيق </h1>
            <form id="form-1" method="POST" action="{{ route('tutorials.update') }}">
                @csrf

                <div class="form-header">
                    <img class="img-fluid" src="{{ asset('back/assets/images/ofCourse-images/shape-1.png') }}" width="10px"
                        height="10px">
                    <h6 class="form-main-title"> جولات حول التطبيق</h6>
                    <div class="form-header-line"></div>
                </div>

                <div class="form-content container">
                    <div class="row">
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">إضافة رابط يوتيوب</label>
                                <input value="{{ $tutorialSettings['tutorial_video_url']->first()->value ?? '' }}"
                                    name="tutorial_video_url[value]" class="form-control k-form-input"
                                    value="tutorialSettings" type="text" placeholder="رابط يوتيوب" data-validation="req">
                            </div>
                        </div>

                        <div class="col-lg-12 mb-5">
                            <div>
                                <label class="form-label">الشروط والأحكام (باللغة العربية)</label>
                                <textarea rows="7" class="form-control k-form-input" type="text" name="tutorial_script_ar[value]"
                                    placeholder="الشروط والأحكام (باللغة العربية)" data-validation="req"> {{ $tutorialSettings['tutorial_script_ar']->first()->value ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-5">
                            <div>
                                <label class="form-label">الشروط والأحكام (باللغة الإنجليزية)</label>
                                <textarea rows="7" class="form-control k-form-input" type="text" name="tutorial_script_en[value]"
                                    placeholder="الشروط والأحكام (باللغة الإنجليزية)" data-validation="req">{{ $tutorialSettings['tutorial_script_en']->first()->value ?? '' }}</textarea>
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
@endsection
