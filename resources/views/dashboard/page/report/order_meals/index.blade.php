@extends('dashboard.layouts.master')
@section('sidebar')
    @include('dashboard.incudes.back.report')
@endsection


@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'REPORT'])
    @include('dashboard.incudes.alert')

    <div class="page-content">

        <div class="page-card container p-4">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-6">
                        <h1 class="page-main-title"> وجبــات متوقف مؤقتــاً </h1>
                    </div>
                    <div class="col-12 mt-3">
                        <form>
                            <div class="form-content container py-3 filter-box">
                                <div class="row align-items-end">
                                    <div class="col-lg-3 mb-3 mb-lg-0">
                                        <div>
                                            <label class="form-label">حدد الشهر</label>
                                            <select class="form-control">
                                                <option value=""> الشهر </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 offset-3 mb-3 mb-lg-0">
                                        <div>
                                            <label class="form-label">السنة</label>
                                            <select class="form-control">
                                                <option value=""> السنة </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 text-start mt-0 mt-lg-3">
                                        <button type="button"
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
                            <h3 class="table-title"> استعراض البيانات </h3>
                        </div>
                        <div class="table-title-buttons">
                            <button type="button" class="btn disabled btn-light waves-effect waves-light form-btn px-5"><i
                                    class="bx bxs-file-plus font-size-16 mx-2"></i> <span>استخــراج</span></button>
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
                                            <th>SI NO</th>
                                            <th>اســم العميـل</th>
                                            <th>الحزم والباكدجات</th>
                                            <th>التاريخ</th>
                                            <th>بداية التاريخ</th>
                                            <th>نهاية التاريخ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#65258</th>
                                            <td>عبدالرحمن عبدالكريم</td>
                                            <td>نمط حياه</td>
                                            <td>20 مايو 2022</td>
                                            <td>20 مايو 2022</td>
                                            <td>20 مايو 2022</td>
                                        </tr>
                                        <tr>
                                            <td>#65258</th>
                                            <td>عبدالرحمن عبدالكريم</td>
                                            <td>نمط حياه</td>
                                            <td>20 مايو 2022</td>
                                            <td>20 مايو 2022</td>
                                            <td>20 مايو 2022</td>
                                        </tr>
                                        <tr>
                                            <td>#65258</th>
                                            <td>عبدالرحمن عبدالكريم</td>
                                            <td>نمط حياه</td>
                                            <td>20 مايو 2022</td>
                                            <td>20 مايو 2022</td>
                                            <td>20 مايو 2022</td>
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
