@extends('dashboard.layouts.master')
@section('sidebar')
    @include('dashboard.incudes.back.sales_sidebar')
@endsection


@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'SAlES'])
    @include('dashboard.incudes.alert')

    <div class="page-content">

        <div class="page-card container p-4">
            <div class="container">
                <div class="row justify-content-between align-items-center">

                    <div class="col-12 col-lg-3">
                        <h1 class="page-main-title"> العملاء المسجلين عبر (OTP)
                        </h1>

                    </div>


                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="table-title-container">
                            <h3 class="table-title"> العملاء المسجلين عبر otp </h3>
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
                            {!! $dataTable->table(['class' => 'table table-striped mb-0']) !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- End Page-content -->

    <!-- get informations modal -->
    <div class="modal fade get-info-modal" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">استخراج بيانات العميل</h3>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row align-items-end justify-content-center">

                            <div class="col-lg-6">
                                <div>
                                    <label class="form-label">اختــر بدايـة المـدة</label>
                                    <div class="position-relative">
                                        <div class="pickDateLayout p-2">
                                            <h5 class="m-0 mt-1 mx-3">يوم - شهر - سنة</h5>
                                            <h5 class="m-0 mt-1 mx-3"> <i class="dripicons-calendar"></i></h5>
                                        </div>
                                        <input class="form-control" type="date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-3">
                                <div>
                                    <label class="form-label">اختــر نهــاية المـدة</label>
                                    <div class="position-relative">
                                        <div class="pickDateLayout p-2">
                                            <h5 class="m-0 mt-1 mx-3">يوم - شهر - سنة</h5>
                                            <h5 class="m-0 mt-1 mx-3"> <i class="dripicons-calendar"></i></h5>
                                        </div>
                                        <input class="form-control" type="date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 text-start mt-3">
                                <button type="button" class="btn btn-primary waves-effect waves-light form-btn px-5">استخرج
                                    البيانات</button>
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
