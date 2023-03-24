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
                            <a href="{{ route('contacts.create') }}"
                                class="btn btn-light waves-effect waves-light d-flex align-items-center">
                                <i class="bx bx-plus-circle mx-1"></i>
                                <span>@lang('crud.add') @lang('translation.contact_method') </span>
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

    <!-- add-new-modal modal -->
    <div class="modal fade add-new-method" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">إضافة طريقة</h3>
                </div>
                <div class="modal-body">
                    <form action="{{ route('contacts.store') }}" method="POST">
                        @csrf
                        <div class="row align-items-end justify-content-start">

                            <div class="col-lg-12">
                                <div>
                                    <label class="form-label">طريقة التواصل (باللغة العربية)</label>
                                    <input name="name[ar]" required class="form-control"
                                        placeholder="طريقة التواصل (باللغة العربية)">
                                </div>
                            </div>


                            <div class="col-lg-12 mt-4">
                                <div>
                                    <label class="form-label">طريقة التواصل (باللغة الإنجليزية)</label>
                                    <input name="name[en]" required class="form-control"
                                        placeholder="طريقة التواصل (باللغة الإنجليزية)">
                                </div>
                            </div>

                            <div class="col-lg-12 text-start mt-3">
                                <button type="submit"
                                    class="btn btn-primary waves-effect waves-light form-btn px-5">إضافة</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
