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
                            <a href="{{ route('faqs.edit', $faq->id) }}" class="btn btn-light waves-effect waves-light d-flex align-items-center">
                                <i class="bx bx-edit mx-1"></i>
                                <span>@lang('crud.edit')</span>
                            </a>

                            <a data-url="{{ route('faqs.destroy', $faq->id) }}" class="btn btn-danger waves-effect waves-light me-2 align-items-center confirmActionItem">
                                <i class="bx bx-trash mx-1"></i>
                                <span>@lang('crud.delete')</span>
                            </a>
                        </div>
                    </div>

                    <div class="section-content mt-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="display-elem">
                                    <p class="label-text">{{ __('translation.question') }}:</p>
                                    <p class="content-text mt-1">{!! nl2br($faq->question) !!}</p>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="display-elem">
                                    <p class="label-text">{{ __('translation.answer') }}:</p>
                                    <p class="content-text mt-1">{!! nl2br($faq->answer) !!}</p>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="display-elem">
                                    <p class="label-text">{{ __('translation.show_order') }}:</p>
                                    <p class="content-text mt-1">{{ $faq->show_order }}</p>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="display-elem">
                                    <p class="label-text">{{ __('translation.status') }}:</p>
                                    <p class="content-text mt-1"><span class="badge bg-{{ config('status_color.' . $faq->status_key) }}">{{ $faq->status_name }}</span></p>
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
