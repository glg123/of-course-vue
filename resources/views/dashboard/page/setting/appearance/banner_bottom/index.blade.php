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
            <form id="form-1" action="{{ route('settings.appearance.banner.bottom') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="title_banner_bottom_ar" class="form-label me-0">@lang('translation.title_banner_bottom_ar')</label>
                                <input
                                    id="title_banner_bottom_ar"
                                    name="title_banner_bottom_ar[value]"
                                    value="{{ old('title_banner_bottom_ar.value', optional($generalSettings['title_banner_bottom_ar'] ?? '')->first()->value ?? '') }}"
                                    class="form-control k-form-input @error('title_banner_bottom_ar.value') is-invalid @enderror"
                                    type="text"
                                    placeholder="@lang('translation.title_banner_bottom_ar')"
                                    data-validation="req"
                                >
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="title_banner_bottom_en" class="form-label me-0">@lang('translation.title_banner_bottom_en')</label>
                                <input
                                    id="title_banner_bottom_en"
                                    name="title_banner_bottom_en[value]"
                                    value="{{ old('title_banner_bottom_en.value', optional($generalSettings['title_banner_bottom_en'] ?? '')->first()->value ?? '') }}"
                                    class="form-control k-form-input @error('title_banner_bottom_en.value') is-invalid @enderror"
                                    type="text"
                                    placeholder="@lang('translation.title_banner_bottom_en')"
                                    data-validation="req"
                                >
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="description_banner_bottom_ar" class="form-label me-0">@lang('translation.description_banner_bottom_ar')</label>
                                <textarea
                                    id="description_banner_bottom_ar"
                                    rows="4"
                                    name="description_banner_bottom_ar[value]"
                                    class="form-control k-form-input @error('description_banner_bottom_ar.value') is-invalid @enderror"
                                    type="text"
                                    placeholder="@lang('translation.description_banner_bottom_ar')"
                                    data-validation="req"
                                >{{ old('description_banner_bottom_ar.value', optional($generalSettings['description_banner_bottom_ar'] ?? '')->first()->value ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="description_banner_bottom_en" class="form-label me-0">@lang('translation.description_banner_bottom_en')</label>
                                <textarea
                                    id="description_banner_bottom_en"
                                    rows="4"
                                    name="description_banner_bottom_en[value]"
                                    class="form-control k-form-input @error('description_banner_bottom_en.value') is-invalid @enderror"
                                    type="text"
                                    placeholder="@lang('translation.description_banner_bottom_en')"
                                    data-validation="req"
                                >{{ old('description_banner_bottom_en.value', optional($generalSettings['description_banner_bottom_en'] ?? '')->first()->value ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-3">
                            <div>
                                <label for="link_banner_bottom" class="form-label me-0">@lang('translation.link_banner_bottom')</label>
                                <input
                                    id="link_banner_bottom"
                                    name="link_banner_bottom[value]"
                                    value="{{ old('link_banner_bottom.value', optional($generalSettings['link_banner_bottom'] ?? '')->first()->value ?? '') }}"
                                    class="form-control k-form-input @error('link_banner_bottom.value') is-invalid @enderror"
                                    type="url"
                                    placeholder="@lang('translation.link_banner_bottom')"
                                    data-validation="req"
                                >
                            </div>
                        </div>

                        <div class="col-lg-4 mb-3">
                            <div>
                                <label for="text_link_banner_bottom_ar" class="form-label me-0">@lang('translation.text_link_banner_bottom_ar')</label>
                                <input
                                    id="text_link_banner_bottom_ar"
                                    name="text_link_banner_bottom_ar[value]"
                                    value="{{ old('text_link_banner_bottom_ar.value', optional($generalSettings['text_link_banner_bottom_ar'] ?? '')->first()->value ?? '') }}"
                                    class="form-control k-form-input @error('text_link_banner_bottom_ar.value') is-invalid @enderror"
                                    type="text"
                                    placeholder="@lang('translation.text_link_banner_bottom_ar')"
                                    data-validation="req"
                                >
                            </div>
                        </div>

                        <div class="col-lg-4 mb-3">
                            <div>
                                <label for="text_link_banner_bottom_en" class="form-label me-0">@lang('translation.text_link_banner_bottom_en')</label>
                                <input
                                    id="text_link_banner_bottom_en"
                                    name="text_link_banner_bottom_en[value]"
                                    value="{{ old('text_link_banner_bottom_en.value', optional($generalSettings['text_link_banner_bottom_en'] ?? '')->first()->value ?? '') }}"
                                    class="form-control k-form-input @error('text_link_banner_bottom_en.value') is-invalid @enderror"
                                    type="text"
                                    placeholder="@lang('translation.text_link_banner_bottom_en')"
                                    data-validation="req"
                                >
                            </div>
                        </div>

                        <div class="col-lg-12 mb-5">
                            <div>
                                <label class="form-label">@lang('translation.image_banner_bottom')</label>
                                @isset($generalSettings['image_banner_bottom'])
                                    <p><img width="100" src="{{ generalSetting('image_banner_bottom', 'value') }}"></p>
                                @endisset

                                <div class="position-relative">
                                    <div class="uploadFileLayout p-2 @error('image_banner_bottom.value') is-invalid @enderror">
                                        <button class="btn btn-sm btn-secondary">@lang('crud.choose') @lang('translation.file')</button>
                                        <h6 class="m-0 mx-3">@lang('translation.no_image_selected')</h6>
                                    </div>

                                    <input
                                        name="image_banner_bottom[value]"
                                        class="form-control k-form-input is-invalid @error('image_banner_bottom.value') is-invalid @enderror"
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
