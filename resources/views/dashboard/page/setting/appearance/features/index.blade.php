@extends('dashboard.layouts.master')

@section('sidebar')
    @include('dashboard.incudes.back.setting_sidebar')
@endsection

@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'SETTING'])

    @include('dashboard.incudes.alert')


    <div class="page-content">
        <div class="page-card container p-4">
            <h1 class="page-main-title mb-4">{{ $titlePage }}</h1>

            <div class="row">
                <div class="col-md-8">

                    <div class="row justify-content-between align-items-center">
                        <div class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                            <div class="table-title-container">
                                <h3 class="table-title mb-0" style="margin-bottom: 0 !important;">@lang('crud.table') {{ $titlePage }}</h3>
                            </div>

                            <div class="btn-group" role="group">
                                <div class="page-card-btn-groub">
                                    <a href="{{ route('settings.appearance.features.create') }}"
                                       class="btn btn-light waves-effect waves-light d-flex align-items-center">
                                        <i class="bx bx-plus-circle mx-1"></i>
                                        <span>@lang('crud.add') @lang('translation.features') </span>
                                    </a>
                                </div>


                                <ul class="dropdown-menu btn-dt-actions" aria-labelledby="btnAction">

                                </ul>
                            </div>
                        </div>

                        <div class="col-12 table-container">
                            <div class="table-content mt-3">
                                <div class="table-responsive full-width-table">
                                    {!! $dataTable->table(['class' => 'table table-striped mb-0']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <form id="form-1" action="{{ route('settings.appearance.features.index') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-header">
                            <img class="img-fluid" src="{{ asset('back/assets/images/ofCourse-images/shape-1.png') }}" width="10px" height="10px">
                            <h6 class="form-main-title">{{ $titlePage }}</h6>
                            <div class="form-header-line"></div>
                        </div>

                        <div class="form-content container">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div>
                                        <label for="title_features_section_ar" class="form-label me-0">
                                            @lang('translation.title_features_section_ar')
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input
                                            id="title_features_section_ar"
                                            name="title_features_section_ar[value]"
                                            value="{{ old('title_features_section_ar.value', optional($settings['title_features_section_ar'] ?? '')->first()->value ?? '') }}"
                                            class="form-control k-form-input @error('title_features_section_ar.value') is-invalid @enderror"
                                            type="text"
                                            placeholder="@lang('translation.title_features_section_ar')"
                                            data-validation="req"
                                        >
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <div>
                                        <label for="title_features_section_en" class="form-label me-0">
                                            @lang('translation.title_features_section_en')
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input
                                            id="title_features_section_en"
                                            name="title_features_section_en[value]"
                                            value="{{ old('title_features_section_en.value', optional($settings['title_features_section_en'] ?? '')->first()->value ?? '') }}"
                                            class="form-control k-form-input @error('title_features_section_en.value') is-invalid @enderror"
                                            type="text"
                                            placeholder="@lang('translation.title_features_section_en')"
                                            data-validation="req"
                                        >
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-5">
                                    <div>
                                        <label class="form-label">@lang('translation.image_features_section')</label>
                                        @isset($settings['image_features_section'])
                                            <p><img width="100" src="{{ generalSetting('image_features_section', 'value') }}"></p>
                                        @endisset

                                        <div class="position-relative">
                                            <div class="uploadFileLayout p-2 @error('image_features_section.value') is-invalid @enderror">
                                                <button class="btn btn-sm btn-secondary">@lang('crud.choose') @lang('translation.file')</button>
                                                <h6 class="m-0 mx-3">@lang('translation.no_image_selected')</h6>
                                            </div>

                                            <input
                                                name="image_features_section[value]"
                                                class="form-control k-form-input is-invalid @error('image_features_section.value') is-invalid @enderror"
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
        </div>

    </div>
    <!-- End Page-content -->

    <!-- Form Action JS -->
    <form id="action-form" style="display:none;" method="post">@csrf</form>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
