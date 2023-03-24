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
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-light waves-effect waves-light d-flex align-items-center">
                                <i class="bx bx-edit mx-1"></i>
                                <span>@lang('crud.edit')</span>
                            </a>

                            <a data-url="{{ route('contacts.destroy', $contact->id) }}" class="btn btn-danger waves-effect waves-light me-2 align-items-center confirmActionItem">
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
                                        <p class="label-text">@lang("translation.contact_method_{$locale}"):</p>
                                        <p class="content-text mt-1">{{ $contact->getTranslation('name', $locale) }}</p>
                                    </div>
                                </div>
                            @endforeach
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
