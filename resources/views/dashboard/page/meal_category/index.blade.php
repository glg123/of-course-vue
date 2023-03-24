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
                        <h1 class="page-main-title"> تصنيف الوجبــات </h1>
                    </div>

                    @if (auth()->user()->can('meals-category-add'))
                        <div class="col-12 col-lg-4">
                            <div class="page-card-btn-groub">
                                <button type="button"
                                    class="btn btn-light waves-effect waves-light d-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target=".add-meal-category-modal"> <i
                                        class="bx bx-plus-circle mx-1"></i> <span>إضــافة تصنيف</span> </button>
                                <a href="meals-category-log.html" type="button"
                                    class="btn btn-light waves-effect waves-light d-flex align-items-center"> <i
                                        class="bx bx-file-blank mx-1"></i> <span>سجل تدقيق</span> </a>
                            </div>
                        </div>
                    @endif

                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="table-title-container">
                            <h3 class="table-title"> جدول تصنيف الوجبــات </h3>
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
    <div class="modal fade add-meal-category-modal" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">إضـافة تصنيف</h3>
                </div>
                <div class="modal-body">
                    <form action="{{ route('meal.category.store') }}" method="POST">
                        @csrf
                        <div class="row align-items-end justify-content-start">

                            <div class="col-lg-6 mb-3">
                                <div>
                                    <label class="form-label">اسم التصنيف ( باللغة العربية )</label>
                                    <input name="name[ar]" required class="form-control"
                                        placeholder="اسم التصنيف ( باللغة العربية )">
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <div>
                                    <label class="form-label">اسم التصنيف ( باللغة الإنجليزية )</label>
                                    <input name="name[en]" required class="form-control"
                                        placeholder="اسم التصنيف ( باللغة الإنجليزية )">
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">هل تحتوي على كربوهيدرات؟</label>
                                <div>
                                    <div class="form-check form-radio-primary mb-3 ml-4 form-check-right">
                                        <input name="variations[has_carb]" value="1" class="form-check-input"
                                            type="radio" name="formRadioColor3" id="formRadioColor1" checked="">
                                        <label class="form-check-label" for="formRadioColor1">
                                            نعم
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-primary mb-3 mx-4 form-check-right">
                                        <input name="variations[has_carb]" value="0" class="form-check-input"
                                            type="radio" name="formRadioColor3" id="formRadioColor1">
                                        <label class="form-check-label" for="formRadioColor1">
                                            لا
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">هل التصنيف نشط؟</label>
                                <div>
                                    <div class="form-check form-radio-primary mb-3 ml-4 form-check-right">
                                        <input name="status" value="1" class="form-check-input" type="radio"
                                            name="formRadioColor4" id="formRadioColor1" checked="">
                                        <label class="form-check-label" for="formRadioColor1">
                                            نعم
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-primary mb-3 mx-4 form-check-right">
                                        <input name="status" value="0" class="form-check-input" type="radio"
                                            name="formRadioColor4" id="formRadioColor1">
                                        <label class="form-check-label" for="formRadioColor1">
                                            لا
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <div>
                                    <label class="form-label">رقــم الطلــب</label>
                                    <input name="reference" required class="form-control" placeholder="رقــم الطلــب">
                                </div>
                            </div>

                            <div class="col-lg-12 text-start mt-3">
                                <button type="submit"
                                    class="btn btn-primary waves-effect waves-light form-btn px-5">حفظ</button>
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
