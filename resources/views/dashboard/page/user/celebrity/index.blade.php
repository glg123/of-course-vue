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
                        <h1 class="page-main-title">المشاهير</h1>
                    </div>

                    <div class="col-12 col-lg-4">

                        <div class="page-card-btn-groub">
                            @if (auth()->user()->can('manager-celebrity-add'))
                                <button type="button"
                                    class="btn btn-light waves-effect waves-light d-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target=".add-new-celebrity"> <i
                                        class="bx bx-plus-circle mx-1"></i> <span>إضــافة شخص</span> </button>
                            @endif
                            <a type="button"
                                class="btn btn-light disabled waves-effect waves-light d-flex align-items-center"> <i
                                    class="bx bx-file-blank mx-1"></i> <span>سجل تدقيق</span> </a>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <form action="{{ route('users.celebrity') }}">
                            <div class="form-content container py-3 filter-box">
                                <div class="row align-items-end">

                                    <div class="col-lg-9">
                                        <div>
                                            <label class="form-label">ابحث </label>
                                            <input name="q" class="form-control" placeholder="ايحث عن مشهور">
                                        </div>
                                    </div>


                                    <div class="col-lg-3 text-start mt-3">
                                        <button type="submit"
                                            class="btn btn-light waves-effect waves-light form-btn px-5"><i
                                                class="bx bx-search-alt-2 font-size-16 mx-2 mt-1"></i>بحث</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="table-title-container">
                            <h3 class="table-title">جدول المشاهير</h3>
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
    <div class="modal fade add-new-celebrity" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">إضـافة أخصائي تغذية</h3>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.celebrity.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row align-items-end justify-content-start">

                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div>
                                    <label class="form-label">اسم الشخصية</label>
                                    <input name="first_name" required class="form-control" placeholder="اسم الشخصية">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div>
                                    <label class="form-label">ارفاق صورة</label>
                                    <div class="position-relative">
                                        <div class="uploadFileLayout p-2">
                                            <button class="btn btn-sm btn-secondary">اختر ملف</button>
                                            <h6 class="m-0 mx-3">لم يتم اختيار صورة</h6>
                                        </div>
                                        <input name="image" class="form-control k-form-input" type="file"
                                            data-validation="req">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-4">
                                <div>
                                    <label class="form-label">رقم ترتيب الطلب</label>
                                    <input name="show_order" type="number" required class="form-control"
                                        placeholder="رقم ترتيب الطلب">
                                </div>
                            </div>

                            <div class="col-lg-12 mt-4">
                                <div class="form-check form-check-right">
                                    <input name="show_order" value="1" class="form-check-input" type="checkbox"
                                        id="formCheckRight2" checked="">
                                    <label class="form-check-label" for="formCheckRight2">
                                        نشط
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-4">
                                <div>
                                    <label class="form-label">اضف نبذة شخصية (باللغة العربية)</label>
                                    <textarea name="description[ar]" required rows="7" class="form-control"
                                        placeholder="اضف نبذة شخصية (باللغة العربية)"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-4">
                                <div>
                                    <label class="form-label">اضف نبذة شخصية (باللغة الإنجليزية)</label>
                                    <textarea name="description[en]" required rows="7" class="form-control"
                                        placeholder="اضف نبذة شخصية (باللغة الإنجليزية)"></textarea>
                                </div>
                            </div>


                            <div class="col-lg-6 mt-4">
                                <div>
                                    <label class="form-label">نسبة العمولة</label>
                                    <input name="commission_percent" required type="number" class="form-control"
                                        placeholder="نسبة العمولة">
                                </div>
                            </div>

                            <div class="col-lg-12 mt-4 text-start">
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
