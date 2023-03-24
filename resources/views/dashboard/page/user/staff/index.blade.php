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
                        <h1 class="page-main-title">الموظفين </h1>
                    </div>

                    <div class="col-12 col-lg-7">
                        <div class="page-card-btn-groub">
                            @if (auth()->user()->can('manager-add'))
                                <button type="button"
                                    class="btn btn-light waves-effect waves-light d-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target=".add-new-user"> <i
                                        class="bx bx-plus-circle mx-1"></i> <span>إضــافة موظف</span> </button>
                            @endif
                            <a type="button"
                                class="btn btn-light waves-effect waves-light disabled d-flex align-items-center"> <i
                                    class="bx bx-file-blank mx-1"></i> <span>سجل تدقيق</span> </a>
                            @if (auth()->user()->can('manager-view-permission'))
                                <a href="{{ route('roles.index') }}" type="button"
                                    class="btn btn-light waves-effect waves-light d-flex align-items-center"> <i
                                        class="bx bx-check-shield mx-1"></i> <span>الصلاحيات</span> </a>
                            @endif

                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <form action="{{ route('users.staff') }}" method="GET">
                            <div class="form-content container py-3 filter-box">
                                <div class="row align-items-end">

                                    <div class="col-lg-9">
                                        <div>
                                            <label class="form-label">ابحث </label>
                                            <input class="form-control" name="q" placeholder="الاســـم او رقم الهاتف">
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
                            <h3 class="table-title"> جدول الموظفين</h3>
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

    <!-- add-new-modal modal -->
    <div class="modal fade add-new-user" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">إضـافة موظف جديد</h3>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.staff.store') }}" method="POST">
                        @csrf
                        <div class="row align-items-end justify-content-start">

                            <div class="col-lg-6">
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

                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div>
                                    <label class="form-label">رقم الجوال</label>
                                    <input name="phone" required class="form-control" placeholder="رقم الجوال">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div>
                                    <label class="form-label">كلمة المرور</label>
                                    <input name="password" required class="form-control" placeholder="كلمة المرور">
                                </div>
                            </div>

                            <div class="col-lg-12 mt-3 mt-lg-0">
                                <div class="form-check form-check-right">
                                    <input name="active" value="1" class="form-check-input" type="checkbox"
                                        id="formCheckRight2" checked="">
                                    <label class="form-check-label" for="formCheckRight2">
                                        نشط
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div>
                                    <label class="form-label">نسبة الإحالة</label>
                                    <input name="referral_percent" required class="form-control" placeholder="نسبة الإحالة">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div>
                                    <label class="form-label">الحد الأعلى لنسبة المكافأة</label>
                                    <input name="max_referral_amount" required class="form-control"
                                        placeholder="الحد الأعلى لنسبة المكافأة">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div>
                                    <label class="form-label">الدور الوظيفي</label>
                                    <select name="role" required class="form-control">
                                        <option value=""> -- الدور الوظيفي-- </option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}"> {{ $role->name }}</option>
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
