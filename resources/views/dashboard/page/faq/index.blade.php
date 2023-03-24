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

                    <div class="col-12 col-lg-3">
                        <div class="page-card-btn-groub">
                            <a href="{{ route('faqs.create') }}"
                                class="btn btn-light waves-effect waves-light d-flex align-items-center">
                                <i class="bx bx-plus-circle mx-1"></i>
                                <span>@lang('crud.add') @lang('translation.question') </span>
                            </a>
                        </div>
                    </div>
                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="table-title-container">
                            <h3 class="table-title"> @lang('crud.table') {{ $titlePage }}</h3>
                        </div>
                        <div class="btn-group" role="group">
                            <button id="btnAction" type="button"
                                class="btn btn-primary waves-effect waves-light form-btn px-5 dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bx bxs-file-plus font-size-16 mx-2"></i> @lang('crud.export')
                            </button>
                            <ul class="dropdown-menu btn-dt-actions" aria-labelledby="btnAction">
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 table-container">
                        <div class="table-content mt-3">
                            <div class="table-responsive">
                                {!! $dataTable->table(['class' => 'table table-striped mb-0']) !!}
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
@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
