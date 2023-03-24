@extends('dashboard.layouts.master')
@section('sidebar')
    @include('dashboard.incudes.back.operation_sidebar')
@endsection


@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'OPERATION'])
    @include('dashboard.incudes.alert')


    <div class="page-content">

        <div class="page-card container p-4">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-3">
                        <h1 class="page-main-title">المنطقة والفـترة </h1>
                    </div>

                    <div class="col-12 col-lg-3">
                        <div class="page-card-btn-groub">
                            <button type="button" class="btn btn-light waves-effect waves-light d-flex align-items-center"
                                data-bs-toggle="modal" data-bs-target=".add-new-one"> <i class="bx bx-plus-circle mx-1"></i>
                                <span>إضــافة </span> </button>
                        </div>
                    </div>

                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="col-lg-6 table-title-container">
                            <h3 class="table-title"> جدول المنطقة والفترة</h3>
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

    <!-- add-new-modal modal -->
    <div class="modal fade add-new-one" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">إضـافة فترة</h3>
                </div>
                <div class="modal-body">
                    <form action="{{ route('locations.zone.driver.store') }}" method="POST">
                        @csrf
                        <div class="row align-items-end justify-content-start">

                            <div class="col-lg-6">
                                <div>
                                    <label class="form-label">اختر المنطقة</label>
                                    <select class="form-control" required name="zone_id">
                                        <option value=""> -- اختر المنطقة-- </option>
                                        @foreach ($zones as $zone)
                                            <option value="{{ $zone->id }}"> {{ $zone->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div>
                                    <label class="form-label">اختر سائق الفترة الصباحية</label>
                                    <select class="form-control" name="morning_driver_id">
                                        <option value=""> -- اختر سائق الفترة الصباحية--</option>
                                        @foreach ($drivers as $driver)
                                            <option value="{{ $driver->id }}"> {{ $driver->first_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-3">
                                <div>
                                    <label class="form-label">اختر سائق الفترة المسائية</label>
                                    <select class="form-control" name="evening_driver_id">
                                        <option value=""> -- اختر سائق الفترة المسائية -- </option>
                                        @foreach ($drivers as $driver)
                                            <option value="{{ $driver->id }}"> {{ $driver->first_name }}</option>
                                        @endforeach
                                    </select>
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
