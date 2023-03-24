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
                        <h1 class="page-main-title"> طلب مبيعـات اليـوم </h1>
                    </div>


                    <div class="col-12 mt-3">
                        <form>
                            <div class="form-content container py-3 filter-box">
                                <div class="row align-items-end justify-content-start">

                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <div>
                                            <label class="form-label">تصنيف طلب المبيعات</label>
                                            <select class="form-control">
                                                <option value=""> -- اختر التصنيف -- </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 offset-1 mb-3 mb-lg-0">
                                        <div>
                                            <label class="form-label">تحديد التاريخ</label>
                                            <div class="position-relative">
                                                <div class="pickDateLayout p-2">
                                                    <h5 class="m-0 mt-1 mx-3">يوم - شهر - سنة</h5>
                                                    <h5 class="m-0 mt-1 mx-3"> <i class="dripicons-calendar"></i></h5>
                                                </div>
                                                <input class="form-control" type="date">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 text-start mt-0 mt-lg-3">
                                        <button type="button"
                                            class="btn btn-light waves-effect waves-light form-btn px-5"><i
                                                class="bx bxs-file-plus font-size-16 mx-2"></i>
                                            <span>استخــراج</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="table-title-container">
                            <h3 class="table-title"> قائمة طلبــات مبيعات اليوم </h3>
                        </div>

                    </div>

                    <div class="col-12 table-container">
                        <div class="table-tools">
                            <div class="show-item-select">
                                <span> عرض </span>
                                <select class="form-control">
                                    <option value=""> 10 </option>
                                </select>
                                <span> مدخلات </span>
                            </div>
                            <div class="table-search">
                                <label class="form-label"> بحث </label>
                                <input class="form-control" type="text" placeholder="بحث">
                            </div>
                        </div>
                        <div class="table-content mt-3">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>تــاريخ الطاــب</th>
                                            <th>اســم العميـل</th>
                                            <th>رقم الجوال</th>
                                            <th>المستخدم المشار اليه</th>
                                            <th>دور المستخدم المشار اليه</th>
                                            <th>تاريخ البدء</th>
                                            <th>تاريخ الإنتهاء</th>
                                            <th>اسم الخطة</th>
                                            <th>عدد الأيام</th>
                                            <th>حالة الدفع</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#96388</th>
                                            <td>25 مايو 2022</td>
                                            <td>Omar Yousef</td>
                                            <td>+201234567890</td>
                                            <td>Ahmed Ali</td>
                                            <td>مستخدم</td>
                                            <td>25 مايو 2022</td>
                                            <td>25 مايو 2022</td>
                                            <td>نمط حيـاة</td>
                                            <td>23 يوم</td>
                                            <td> <span class="status-active">تم الدفع</span> </td>
                                        </tr>
                                        <tr>
                                            <td>#84821</th>
                                            <td>25 مايو 2022</td>
                                            <td>Ahmed Ali</td>
                                            <td>+201234567890</td>
                                            <td>Mohammed Ahmed</td>
                                            <td>مستخدم</td>
                                            <td>25 مايو 2022</td>
                                            <td>25 مايو 2022</td>
                                            <td>دايــت بــلان</td>
                                            <td>23 يوم</td>
                                            <td> <span class="status-deactive">مرفوض</span> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="table-pagination-bar mt-4">
                            <div class="table-item-details">
                                <h6>
                                    إظهار <span class="startItemNumber"> 1 </span> من <span class="endItemNumber"> 10
                                    </span> من أصل <span class="totalItems"> 100 </span> مدخلات
                                </h6>
                            </div>
                            <div class="table-pagination">
                                <button class="btn" disabled> السابق </button>
                                <span class="table-page-number active-page"> 1 </span>
                                <span class="table-page-number"> 2 </span>
                                <span class="table-page-number"> 3 </span>
                                <span class="table-page-number"> 4 </span>
                                <button class="btn"> التالي </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- End Page-content -->
@endsection
@push('scripts')
@endpush
