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
                        <h1 class="page-main-title"> {{__('views.sales_request')}} </h1>
                    </div>


                    <div class="col-12 mt-3">
                        <form>
                            <div class="form-content container py-3 filter-box">
                                <div class="row align-items-start justify-content-end">

                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <div>
                                            <label class="form-label">{{__('views.sales_request_categories')}}</label>
                                            <select class="form-control">
                                                <option value=""> -- {{__('views.select')}} -- </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <div>
                                            <label class="form-label">{{__('views.start_at')}}</label>
                                            <div class="position-relative">
                                                <div class="pickDateLayout p-2">
                                                    <h5 class="m-0 mt-1 mx-3">{{__('views.day - month - year')}}</h5>
                                                    <h5 class="m-0 mt-1 mx-3"> <i class="dripicons-calendar"></i></h6>
                                                </div>
                                                <input type="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <div>
                                            <label class="form-label">{{__('views.start_at')}}</label>
                                            <div class="position-relative">
                                                <div class="pickDateLayout p-2">
                                                    <h5 class="m-0 mt-1 mx-3">{{__('views.day - month - year')}}</h5>
                                                    <h5 class="m-0 mt-1 mx-3"> <i class="dripicons-calendar"></i></h6>
                                                </div>
                                                <input type="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-3 text-start mt-0 mt-lg-3">
                                        <button type="button"
                                            class="btn btn-light waves-effect waves-light form-btn px-5"><i
                                                class="bx bxs-file-plus font-size-16 mx-2"></i>
                                            <span>@lang('crud.export')</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="table-title-container">
                            <h3 class="table-title"> {{__('views.sales_request')}} </h3>
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
    <div class="modal fade get-info-modal" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">@lang('crud.export')</h3>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row align-items-end justify-content-center">

                            <div class="col-lg-6">
                                <div>
                                    <label class="form-label">{{__('views.start_at')}}</label>
                                    <div class="position-relative">
                                        <div class="pickDateLayout p-2">
                                            <h5 class="m-0 mt-1 mx-3">{{__('views.day - month - year')}}</h5>
                                            <h5 class="m-0 mt-1 mx-3"> <i class="dripicons-calendar"></i></h5>
                                        </div>
                                        <input class="form-control" type="date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-3">
                                <div>
                                    <label class="form-label">{{__('views.end_at')}}</label>
                                    <div class="position-relative">
                                        <div class="pickDateLayout p-2">
                                            <h5 class="m-0 mt-1 mx-3">{{__('views.day - month - year')}}</h5>
                                            <h5 class="m-0 mt-1 mx-3"> <i class="dripicons-calendar"></i></h5>
                                        </div>
                                        <input class="form-control" type="date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 text-start mt-3">
                                <button type="button" class="btn btn-primary waves-effect waves-light form-btn px-5">@lang('crud.export')</button>
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
