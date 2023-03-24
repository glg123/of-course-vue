@extends('dashboard.layouts.master')

@section('sidebar')
    @include('dashboard.incudes.back.setting_sidebar')
@endsection

@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'SETTING'])

    <div class="page-content">

        <!-- Flash Message -->
        <div class="container">
            <div class="row">
                @include('dashboard.incudes.alert')
            </div>
        </div>

        <div class="page-card container p-4">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-3">
                        <h1 class="page-main-title">{{ $titlePage }}</h1>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="page-card-btn-groub">
                            <a href="{{ route('settings.appearance.features.edit', $feature->id) }}" class="btn btn-light waves-effect waves-light d-flex align-items-center">
                                <i class="bx bx-edit mx-1"></i>
                                <span>@lang('crud.edit')</span>
                            </a>

                            <a data-url="{{ route('settings.appearance.features.destroy', $feature->id) }}" class="btn btn-danger waves-effect waves-light me-2 align-items-center confirmActionItem">
                                <i class="bx bx-trash mx-1"></i>
                                <span>@lang('crud.delete')</span>
                            </a>
                        </div>
                    </div>

                    <div class="section-content mt-3">
                        <div class="row">
                            @foreach(config('app.supported_locales') as $locale)
                                <div class="col-12">
                                    <div class="display-elem">
                                        <p class="label-text">@lang("translation.feature_name_{$locale}"):</p>
                                        <p class="content-text mt-1">{{ $feature->getTranslation('name', $locale) }}</p>
                                    </div>
                                </div>
                            @endforeach

                            @foreach(config('app.supported_locales') as $locale)
                                <div class="col-12">
                                    <div class="display-elem">
                                        <p class="label-text">@lang("translation.feature_description_{$locale}"):</p>
                                        <p class="content-text mt-1">{!! nl2br($feature->getTranslation('description', $locale)) !!}</p>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-12">
                                <div class="display-elem">
                                    <p class="label-text">@lang("translation.image"):</p>
                                    <p class="content-text mt-1"><img width="100" src="{{ $feature->image_path }}"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page-content -->

    <!-- Form Action JS -->
    <form id="action-form" style="display:none;" method="post">@csrf</form>
@endsection
