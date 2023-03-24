@extends('dashboard.layouts.master')
@section('sidebar')
    @include('dashboard.incudes.back.operation_sidebar')
@endsection


@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'OPERATION'])
    @include('dashboard.incudes.alert')

    <div class="page-content" id="e-clinic">

        <div class="page-card container p-4">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-3">
                        <h1 class="page-main-title"> الاستبيانات</h1>
                    </div>
                    @if (auth()->user()->can('e-clinic-add'))
                        <div class="col-12 col-lg-4">
                            <div class="page-card-btn-groub">
                                <button type="button"
                                    class="btn btn-light waves-effect waves-light d-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target=".add-new-clinic"> <i
                                        class="bx bx-plus-circle mx-1"></i> <span>إضــافة أستبيان</span> </button>
                            </div>
                        </div>
                    @endif
                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="table-title-container">
                            <h3 class="table-title">جدول الاستبيانات </h3>
                        </div>

                        <div class="btn-group" role="group">
                            <button id="btnAction" type="button"
                                class="btn btn-primary waves-effect waves-light form-btn px-5 dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bx bxs-file-plus font-size-16 mx-2"></i> استخــراج
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

    <!-- add-new-modal modal -->
    <div class="modal fade add-new-clinic" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">إضـافة استبيان </h3>
                </div>
                <div class="modal-body">
                    <form action="{{ route('clinic.store') }}" method="POST">
                        @csrf
                        <div class="row align-items-end justify-content-start">

                            <div class="col-lg-12">
                                <div>
                                    <label class="form-label">نص السـؤال</label>
                                    <textarea name="question" rows="7" class="form-control" placeholder="نص السـؤال"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-4">
                                <label class="form-label">قابلية التعديل</label>
                                <div>
                                    <div class="form-check form-radio-primary mb-3 ml-4 form-check-right">
                                        <input name="is_editable" value="1" class="form-check-input" type="radio"
                                            name="formRadioColor3" id="formRadioColor1" checked="">
                                        <label class="form-check-label" for="formRadioColor1">
                                            نعم،، قابل للتعديل
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-primary mb-3 mx-4 form-check-right">
                                        <input name="is_editable" value="0" class="form-check-input" type="radio"
                                            name="formRadioColor3" id="formRadioColor2">
                                        <label class="form-check-label" for="formRadioColor2">
                                            غير قابل للتعديل
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-4">
                                <div>
                                    <label class="form-label">الإشـارة Tags</label>
                                    <input name="tag" required class="form-control" placeholder="الإشارة">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-4">
                                <div>
                                    <label class="form-label">الترتيب</label>
                                    <input name="order" type="number" class="form-control" placeholder="الترتيب">
                                </div>
                            </div>

                            <div class="col-lg-12 mt-4">
                                <div>
                                    <label class="form-label">التكرار</label>
                                    <div class="d-flex justify-content-evenly">
                                        <div class="form-check form-check-right">
                                            <input name="frequency[]" value="daily" class="form-check-input"
                                                type="checkbox" id="formCheckRight2">
                                            <label class="form-check-label" for="formCheckRight2">
                                                يومياً
                                            </label>
                                        </div>

                                        <div class="form-check form-check-right">
                                            <input name="frequency[]" value="start_date" class="form-check-input"
                                                type="checkbox" id="formCheckRight2">
                                            <label class="form-check-label" for="formCheckRight2">
                                                بداية التاريخ
                                            </label>
                                        </div>

                                        <div class="form-check form-check-right">
                                            <input name="frequency[]" value="middle_date" class="form-check-input"
                                                type="checkbox" id="formCheckRight2">
                                            <label class="form-check-label" for="formCheckRight2">
                                                منتصف التاريخ
                                            </label>
                                        </div>

                                        <div class="form-check form-check-right">
                                            <input name="frequency[]" value="end_date" class="form-check-input"
                                                type="checkbox" id="formCheckRight2">
                                            <label class="form-check-label" for="formCheckRight2">
                                                نهاية التاريخ
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-4">
                                <label class="form-label">نوع الاجابه</label>
                                <div>
                                    <div class="form-check form-radio-primary mb-3 ml-4 form-check-right">
                                        <input name="answer_type" value="text" class="form-check-input" type="radio"
                                            name="formRadioColor" id="formRadioColor1" checked="">
                                        <label class="form-check-label" for="formRadioColor1">
                                            نص
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-primary mb-3 mx-4 form-check-right">
                                        <input name="answer_type" value="multi_choise" class="form-check-input"
                                            type="radio" name="formRadioColor" id="formRadioColor1">
                                        <label class="form-check-label" for="formRadioColor1">
                                            إختيارات متعددة
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-primary mb-3 mx-4 form-check-right">
                                        <input name="answer_type" value="polar" class="form-check-input" type="radio"
                                            name="formRadioColor" id="formRadioColor1">
                                        <label class="form-check-label" for="formRadioColor1">
                                            إختيار واحد
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-11 mt-4 bg-secondary py-3 mx-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="m-0 fw-bold">أضف خيارات</h4>
                                    <button type="button"
                                        class="btn btn-dark btn-sm waves-effect waves-light d-flex align-items-center"
                                        id="addNewOption"> <span>إضــافة </span> </button>
                                </div>
                                <div class="row options-items-container mt-3">
                                    <div class="col-12 row option-item">
                                        <div class="col-10">

                                            <label class="form-label">الخيار الأول</label>
                                            <input name="choices[]" class="form-control" placeholder="الخيار الأول ">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-4 text-start">
                                <button type="submit"
                                    class="btn btn-primary btn-sm waves-effect waves-light form-btn px-5">إضافة</button>
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
