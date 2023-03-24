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
                        <h1 class="page-main-title">القطعه </h1>
                    </div>
                    @if (auth()->user()->can('location-add'))
                        <div class="col-12 col-lg-4">
                            <div class="page-card-btn-groub">
                                <button type="button"
                                    class="btn btn-light waves-effect waves-light d-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target=".add-new-one"> <i
                                        class="bx bx-plus-circle mx-1"></i>
                                    <span>إضــافة </span> </button>
                                <a  type="button"
                                    class="btn disabled btn-light waves-effect waves-light d-flex align-items-center"> <i
                                        class="bx bx-file-blank mx-1"></i> <span>سجل تدقيق</span> </a>
                            </div>
                        </div>
                    @endif
                    <div class="col-12 mt-3">
                        <form action="{{ route('locations.block') }}">
                            <div class="form-content container py-3 filter-box">
                                <div class="row align-items-end">

                                    <div class="col-lg-9">
                                        <div>
                                            <label class="form-label">ابحث </label>
                                            <input name="q" class="form-control" placeholder="ابحث عن حاجز">
                                        </div>
                                    </div>


                                    <div class="col-lg-3 text-start mt-3">
                                        <button type="submit" class="btn btn-light waves-effect waves-light form-btn px-5">
                                            <i class="bx bx-search-alt-2 mx-1 mt-1"></i> <span>بحــث</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="table-title-container">
                            <h3 class="table-title"> جدول القطعه</h3>
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
                    <h3 class="modal-title">إضـافة منطقة</h3>
                </div>
                <div class="modal-body">
                    <form action="{{ route('locations.block.store') }}" method="POST">
                        @csrf
                        <div class="row align-items-end justify-content-start">

                            <div class="col-lg-6">
                                <div>
                                    <label class="form-label">اختر المنطقة</label>
                                    <select name="area_id" required class="form-control">
                                        <option value=""> -- اختر المنطقة --</option>
                                        @foreach ($areas as $area)
                                            <option value="{{ $area->id }}"> {{ $area->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-lg-0 mt-3">
                                <div>
                                    <label class="form-label">اسم الحاجـز</label>
                                    <input name="name" required class="form-control" placeholder="اسم الحاجـز">
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
