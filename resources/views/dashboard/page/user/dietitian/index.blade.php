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
                        <h1 class="page-main-title">أخصائيين التغذية</h1>
                    </div>
                    @if (auth()->user()->can('manager-dietitian-add'))
                        <div class="col-12 col-lg-3">
                            <div class="page-card-btn-groub">
                                <button type="button"
                                    class="btn btn-light waves-effect waves-light d-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target=".add-new-dietitians"> <i
                                        class="bx bx-plus-circle mx-1"></i> <span>إضــافة أخصائي</span> </button>
                            </div>
                        </div>
                    @endif
                    <div class="col-12 mt-3">
                        <form action="{{ route('users.dietitian') }}">
                            <div class="form-content container py-3 filter-box">
                                <div class="row align-items-end">

                                    <div class="col-lg-9">
                                        <div>
                                            <label class="form-label">ابحث </label>
                                            <input class="form-control" name="q" placeholder="ابحث عن أخصائي تغذية">
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
                            <h3 class="table-title">جدول خصائيين التغذية</h3>
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
    <div class="modal fade add-new-dietitians" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">إضـافة أخصائي تغذية</h3>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.dietitian.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row align-items-end justify-content-start">

                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div>
                                    <label class="form-label">الإســم الأول</label>
                                    <input name="first_name" required class="form-control" placeholder="الإســم الأول">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div>
                                    <label class="form-label">الإســم الأخـــير</label>
                                    <input name="last_name" required class="form-control" placeholder="الإســم الأخـــير">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-3">
                                <div>
                                    <label class="form-label">رقم الجوال</label>
                                    <input name="phone" required class="form-control" placeholder="رقم الجوال">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-3">
                                <div>
                                    <label class="form-label">كلمة المرور</label>
                                    <input name="password" required class="form-control" placeholder="كلمة المرور">
                                </div>
                            </div>

                            <div class="col-lg-12 mt-3">
                                <div class="form-check form-check-right">
                                    <input name="active" value="1" class="form-check-input" type="checkbox"
                                        id="formCheckRight2" checked="">
                                    <label class="form-check-label" for="formCheckRight2">
                                        نشط
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-3">
                                <div>
                                    <label class="form-label">المصاريف</label>
                                    <input name="expenses" type="number" class="form-control" placeholder="المصاريف">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-3">
                                <div>
                                    <label class="form-label">التعيين</label>
                                    <input name="designation" class="form-control" placeholder="التعيين">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-3">
                                <div>
                                    <label class="form-label">الشهادة</label>
                                    <input name="degree" class="form-control" placeholder="الشهادة">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-3">
                                <div>
                                    <label class="form-label">الشهادة</label>
                                    <div class="position-relative">
                                        <div class="uploadFileLayout p-2">
                                            <button class="btn btn-sm btn-secondary">اختر ملف</button>
                                            <h6 class="m-0 mx-3">لم يتم اختيار ملف</h6>
                                        </div>
                                        <input name="file" class="form-control k-form-input" type="file"
                                            data-validation="req">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-3">
                                <div>
                                    <label class="form-label">اضف وصف</label>
                                    <textarea name="description[ar]" required class="form-control" placeholder="اضف وصف"></textarea>
                                </div>
                            </div>



                            <div class="col-lg-12 mt-3">
                                <div>
                                    <label class="form-label">حدد الأيــام المتاحة</label>
                                    <div class="d-flex justify-content-between flex-wrap">
                                        <div class="form-check form-check-right">
                                            <input name="settings[]" value="سبت" class="form-check-input"
                                                type="checkbox" id="formCheckRight2">
                                            <label class="form-check-label" for="formCheckRight2">
                                                السبت
                                            </label>
                                        </div>

                                        <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" id="formCheckRight2"
                                                name="settings[]" value="حد">
                                            <label class="form-check-label" for="formCheckRight2">
                                                الأحد
                                            </label>
                                        </div>

                                        <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" id="formCheckRight2"
                                                name="settings[]" value="اثنين">
                                            <label class="form-check-label" for="formCheckRight2">
                                                الإثنين
                                            </label>
                                        </div>

                                        <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" id="formCheckRight2"
                                                name="settings[]" value="ثلاثاء">
                                            <label class="form-check-label" for="formCheckRight2">
                                                الثلاثاء
                                            </label>
                                        </div>

                                        <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" id="formCheckRight2"
                                                name="settings[]" value="اريع">
                                            <label class="form-check-label" for="formCheckRight2">
                                                الأربعاء
                                            </label>
                                        </div>

                                        <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" id="formCheckRight2"
                                                name="settings[]" value="خميس">
                                            <label class="form-check-label" for="formCheckRight2">
                                                الخميس
                                            </label>
                                        </div>

                                        <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" id="formCheckRight2"
                                                name="settings[]" value="جمعه">
                                            <label class="form-check-label" for="formCheckRight2">
                                                الجمعة
                                            </label>
                                        </div>
                                    </div>
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
