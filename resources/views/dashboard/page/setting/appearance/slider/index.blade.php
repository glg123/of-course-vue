@extends('dashboard.layouts.master')

@section('sidebar')
    @include('dashboard.incudes.back.setting_sidebar')
@endsection

@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'SETTING'])

    @include('dashboard.incudes.alert')

    <div class="page-content" id="terms">
        <div class="page-card container p-4">
            <h1 class="page-main-title mb-4">{{ $titlePage }}</h1>
            <form id="form-1" action="{{ route('settings.appearance.slider') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-header">
                    <img class="img-fluid" src="{{ asset('back/assets/images/ofCourse-images/shape-1.png') }}" width="10px" height="10px">
                    <h6 class="form-main-title">{{ $titlePage }}</h6>
                    <div class="form-header-line"></div>
                </div>

                <div class="form-content container">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="title_banner_home_page_ar" class="form-label me-0">@lang('translation.title_banner_ar')</label>
                                <input
                                    id="title_banner_home_page_ar"
                                    name="title_banner_home_page_ar[value]"
                                    value="{{ old('title_banner_home_page_ar.value', optional($generalSettings['title_banner_home_page_ar'] ?? '')->first()->value ?? '') }}"
                                    class="form-control k-form-input @error('title_banner_home_page_ar.value') is-invalid @enderror"
                                    type="text"
                                    placeholder="@lang('translation.title_banner_ar')"
                                    data-validation="req"
                                >
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="title_banner_home_page_en" class="form-label me-0">@lang('translation.title_banner_en')</label>
                                <input
                                    id="title_banner_home_page_en"
                                    name="title_banner_home_page_en[value]"
                                    value="{{ old('title_banner_home_page_en.value', optional($generalSettings['title_banner_home_page_en'] ?? '')->first()->value ?? '') }}"
                                    class="form-control k-form-input @error('title_banner_home_page_en.value') is-invalid @enderror"
                                    type="text"
                                    placeholder="@lang('translation.title_banner_en')"
                                    data-validation="req"
                                >
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="description_banner_home_page_ar" class="form-label me-0">@lang('translation.description_banner_ar')</label>
                                <textarea
                                    id="description_banner_home_page_ar"
                                    rows="4"
                                    name="description_banner_home_page_ar[value]"
                                    class="form-control k-form-input @error('description_banner_home_page_ar.value') is-invalid @enderror"
                                    type="text"
                                    placeholder="@lang('translation.description_banner_ar')"
                                    data-validation="req"
                                >{{ old('description_banner_home_page_ar.value', optional($generalSettings['description_banner_home_page_ar'] ?? '')->first()->value ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="description_banner_home_page_en" class="form-label me-0">@lang('translation.description_banner_en')</label>
                                <textarea
                                    id="description_banner_home_page_en"
                                    rows="4"
                                    name="description_banner_home_page_en[value]"
                                    class="form-control k-form-input @error('description_banner_home_page_en.value') is-invalid @enderror"
                                    type="text"
                                    placeholder="@lang('translation.description_banner_en')"
                                    data-validation="req"
                                >{{ old('description_banner_home_page_en.value', optional($generalSettings['description_banner_home_page_en'] ?? '')->first()->value ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-3">
                            <div>
                                <label for="link_1_banner_home_page" class="form-label me-0">@lang('translation.link_1_banner')</label>
                                <input
                                    id="link_1_banner_home_page"
                                    name="link_1_banner_home_page[value]"
                                    value="{{ old('link_1_banner_home_page.value', optional($generalSettings['link_1_banner_home_page'] ?? '')->first()->value ?? '') }}"
                                    class="form-control k-form-input @error('link_1_banner_home_page.value') is-invalid @enderror"
                                    type="url"
                                    placeholder="@lang('translation.link_1_banner')"
                                    data-validation="req"
                                >
                            </div>
                        </div>

                        <div class="col-lg-4 mb-3">
                            <div>
                                <label for="text_link_1_banner_home_page_ar" class="form-label me-0">@lang('translation.text_link_1_banner_ar')</label>
                                <input
                                    id="text_link_1_banner_home_page_ar"
                                    name="text_link_1_banner_home_page_ar[value]"
                                    value="{{ old('text_link_1_banner_home_page_ar.value', optional($generalSettings['text_link_1_banner_home_page_ar'] ?? '')->first()->value ?? '') }}"
                                    class="form-control k-form-input @error('text_link_1_banner_home_page_ar.value') is-invalid @enderror"
                                    type="text"
                                    placeholder="@lang('translation.text_link_1_banner_ar')"
                                    data-validation="req"
                                >
                            </div>
                        </div>

                        <div class="col-lg-4 mb-3">
                            <div>
                                <label for="text_link_1_banner_home_page_en" class="form-label me-0">@lang('translation.text_link_1_banner_en')</label>
                                <input
                                    id="text_link_1_banner_home_page_en"
                                    name="text_link_1_banner_home_page_en[value]"
                                    value="{{ old('text_link_1_banner_home_page_en.value', optional($generalSettings['text_link_1_banner_home_page_en'] ?? '')->first()->value ?? '') }}"
                                    class="form-control k-form-input @error('text_link_1_banner_home_page_en.value') is-invalid @enderror"
                                    type="text"
                                    placeholder="@lang('translation.text_link_1_banner_en')"
                                    data-validation="req"
                                >
                            </div>
                        </div>

                        <div class="col-lg-4 mb-3">
                            <div>
                                <label for="link_2_banner_home_page" class="form-label me-0">@lang('translation.link_2_banner')</label>
                                <input
                                    id="link_2_banner_home_page"
                                    name="link_2_banner_home_page[value]"
                                    value="{{ old('link_2_banner_home_page.value', optional($generalSettings['link_2_banner_home_page'] ?? '')->first()->value ?? '') }}"
                                    class="form-control k-form-input @error('link_2_banner_home_page.value') is-invalid @enderror"
                                    type="url"
                                    placeholder="@lang('translation.link_2_banner')"
                                    data-validation="req"
                                >
                            </div>
                        </div>

                        <div class="col-lg-4 mb-3">
                            <div>
                                <label for="text_link_2_banner_home_page_ar" class="form-label me-0">@lang('translation.text_link_2_banner_ar')</label>
                                <input
                                    id="text_link_2_banner_home_page_ar"
                                    name="text_link_2_banner_home_page_ar[value]"
                                    value="{{ old('text_link_2_banner_home_page_ar.value', optional($generalSettings['text_link_2_banner_home_page_ar'] ?? '')->first()->value ?? '') }}"
                                    class="form-control k-form-input @error('text_link_2_banner_home_page_ar.value') is-invalid @enderror"
                                    type="text"
                                    placeholder="@lang('translation.text_link_2_banner_ar')"
                                    data-validation="req"
                                >
                            </div>
                        </div>

                        <div class="col-lg-4 mb-3">
                            <div>
                                <label for="text_link_2_banner_home_page_en" class="form-label me-0">@lang('translation.text_link_2_banner_en')</label>
                                <input
                                    id="text_link_2_banner_home_page_en"
                                    name="text_link_2_banner_home_page_en[value]"
                                    value="{{ old('text_link_2_banner_home_page_en.value', optional($generalSettings['text_link_2_banner_home_page_en'] ?? '')->first()->value ?? '') }}"
                                    class="form-control k-form-input @error('text_link_2_banner_home_page_en.value') is-invalid @enderror"
                                    type="text"
                                    placeholder="@lang('translation.text_link_2_banner_en')"
                                    data-validation="req"
                                >
                            </div>
                        </div>

                        <div class="col-lg-12 mb-5">
                            <div>
                                <label class="form-label">@lang('translation.image_banner_home_page')</label>
                                @isset($generalSettings['image_banner_home_page'])
                                    <p><img width="100" src="{{ generalSetting('image_banner_home_page', 'value') }}"></p>
                                @endisset

                                <div class="position-relative">
                                    <div class="uploadFileLayout p-2 @error('image_banner_home_page.value') is-invalid @enderror">
                                        <button class="btn btn-sm btn-secondary">@lang('crud.choose') @lang('translation.file')</button>
                                        <h6 class="m-0 mx-3">@lang('translation.no_image_selected')</h6>
                                    </div>

                                    <input
                                        name="image_banner_home_page[value]"
                                        class="form-control k-form-input is-invalid @error('image_banner_home_page.value') is-invalid @enderror"
                                        type="file"
                                        data-validation="req">
                                </div>
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
