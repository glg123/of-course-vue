    @extends('dashboard.layouts.master')
    @section('css')
    @endsection
    @section('sidebar')
        @include('dashboard.incudes.back.operation_sidebar')
    @endsection


    @section('content')
        @include('dashboard.layouts.header', ['HEADER_TYPE' => 'OPERATION'])
        @include('dashboard.incudes.alert')


        <div class="page-content" id="op-plans-add-pack">

            <div class="page-card container p-4">
                <h1 class="page-main-title mb-4"> إضافة حزمة / خطة </h1>

                <form action="{{route('package.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12  p-0 py-3 row">
                            <div class="col-9">
                                <!-- Tabs Buttons -->
                                <ul class="nav steps-navs nav-pills nav-justified p-0 d-flex align-items-center" role="tablist">
                                    <li class="nav-item waves-effect waves-light mb-2 mb-lg-0">
                                        <a class="nav-link p-2 text-center active" data-bs-toggle="tab" href="#step1"
                                            role="tab" aria-selected="true">
                                            <span class="stepNumber">1</span><span class="stepTitle">المعلومات الأساسية</span>
                                        </a>
                                    </li>
                                    <li class="stepTabsLine"></li>
                                    <li class="nav-item waves-effect waves-light mb-2 mb-lg-0">
                                        <a class="nav-link p-2 text-center" data-bs-toggle="tab" href="#step2" role="tab"
                                            aria-selected="true">
                                            <span class="stepNumber">2</span><span class="stepTitle">معلومات الحزمة</span>
                                        </a>
                                    </li>
                                    <li class="stepTabsLine"></li>
                                    <li class="nav-item waves-effect waves-light mb-2 mb-lg-0">
                                        <a class="nav-link p-2 text-center" data-bs-toggle="tab" href="#step3" role="tab"
                                            aria-selected="true">
                                            <span class="stepNumber">3</span><span class="stepTitle">إضافة أيـام التقويم</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12">
                                <!-- Tabs Content -->
                                <div class="tab-content steps-navs-tabs p-3 text-muted">
                                    <!-- First Tab -->
                                    <div class="tab-pane active" id="step1" role="tabpanel">
                                        <div class="form-header">
                                            <img class="img-fluid" src="assets/images/ofCourse-images/shape-1.png"
                                                width="10px" height="10px">
                                            <h6 class="form-main-title"> المعلومات الأساسية </h6>
                                            <div class="form-header-line"></div>
                                        </div>
                                        <div class="form-content container">
                                            <div class="row align-items-end">
                                                <div class="col-lg-6 mb-5">
                                                    <div>
                                                        <label class="form-label">اسم الحزمة ( باللغة العربية )</label>
                                                        <input name="name[ar]" required class="form-control" type="text"
                                                            placeholder="اسم الحزمة ( باللغة العربية )">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-5">
                                                    <div>
                                                        <label class="form-label">اسم الحزمة ( باللغة الإنجليزية )</label>
                                                        <input name="name[en]" required class="form-control" type="text"
                                                            placeholder="اسم الحزمة ( باللغة الإنجليزية )">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-5">
                                                    <div>
                                                        <label class="form-label">رقم الطلب </label>
                                                        <input name="show_order" required class="form-control" type="number"
                                                            placeholder="رقم الطلب ">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-5">
                                                    <div class="form-check form-check-right">
                                                        <input name="is_celebrity" value="1" class="form-check-input"
                                                            type="checkbox" id="formCheckRight2" checked="">
                                                        <label class="form-check-label" for="formCheckRight2">
                                                            حزمة المشاهير
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-5">
                                                    <div>
                                                        <label class="form-label">ارفاق صورة</label>
                                                        <div class="position-relative">
                                                            <div class="uploadFileLayout p-2">
                                                                <button class="btn btn-sm btn-secondary">اختر ملف</button>
                                                                <h6 class="m-0 mx-3">لم يتم اختيار صورة</h6>
                                                            </div>
                                                            <input name="image" class="form-control k-form-input"
                                                                type="file" data-validation="req">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mb-5">
                                                    <div>
                                                        <label class="form-label">اضف وصف الحزمة ( باللغة العربية )</label>
                                                        <textarea name="description[ar]" required rows="7" class="form-control" type="text"
                                                            placeholder="اضف وصف الحزمة ( باللغة العربية )"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mb-5">
                                                    <div>
                                                        <label class="form-label">اضف وصف الحزمة ( باللغة الإنجليزية )</label>
                                                        <textarea rows="7" class="form-control" name="description[en]" required type="text"
                                                            placeholder="اضف وصف الحزمة ( باللغة الإنجليزية )"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-start mt-3">
                                                    <button type="button"
                                                        class="btn btn-light waves-effect waves-light form-btn px-5 nextStepBtn">
                                                        إستكمل </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- second Tab -->
                                    <div class="tab-pane" id="step2" role="tabpane2">
                                        <div class="form-header">
                                            <img class="img-fluid" src="assets/images/ofCourse-images/shape-1.png"
                                                width="10px" height="10px">
                                            <h6 class="form-main-title"> معلومات عن الحزمة </h6>
                                            <div class="form-header-line"></div>
                                        </div>
                                        <div class="form-content container">
                                            <div class="row align-items-end">
                                                <div class="col-lg-6 mb-5">
                                                    <div>
                                                        <label class="form-label">كمية البروتين</label>
                                                        <input name="variations[protien]" required class="form-control"
                                                            type="number" placeholder="كمية البروتين ">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-5">
                                                    <div>
                                                        <label class="form-label">كمية الكربوهيدرات </label>
                                                        <input name="variations[carbs]" required class="form-control"
                                                            type="number" placeholder="كمية الكربوهيدرات">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-5">
                                                    <div>
                                                        <label class="form-label">حدد بداية الخطة </label>
                                                        <div class="position-relative">
                                                            <div class="pickDateLayout p-2">
                                                                <h5 class="m-0 mt-1 mx-3">يوم - شهر - سنة</h5>
                                                                <h5 class="m-0 mt-1 mx-3"> <i class="dripicons-calendar"></i>
                                                                </h5>
                                                            </div>
                                                            <input name="start_at" required class="form-control"
                                                                type="date">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-start mt-3">

                                                    <button type="button"
                                                        class="btn bg-white text-dark waves-effect waves-light form-btn px-5 backStepBtn">
                                                        رجوع </button>
                                                    <button type="button"
                                                        class="btn btn-light waves-effect waves-light form-btn px-5 nextStepBtn">
                                                        إستكمل </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- third Tab -->
                                    <div class="tab-pane" id="step3" role="tabpane3">
                                        <div class="form-header">
                                            <img class="img-fluid" src="{{asset('back/assets/images/ofCourse-images/shape-1.png')}}"
                                            width="10px" height="10px">
                                            <h6 class="form-main-title"> إضافة أيــام التقويــم </h6>
                                            <div class="form-header-line"></div>
                                        </div>
                                        <div class="form-content container">
                                            <div class="row align-items-end">
                                                <div class="col-lg-6 mb-5">
                                                    <div>
                                                        <label class="form-label">اسم الخطة ( باللغة العربية )</label>
                                                        <input name="package_varients[name][ar]" required
                                                            class="form-control" type="text"
                                                            placeholder="اسم الخطة ( باللغة العربية ) ">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-5">
                                                    <div>
                                                        <label class="form-label">اسم الخطة ( باللغة الإنجليزية ) </label>
                                                        <input class="form-control" type="text"
                                                            name="package_varients[name][en]" required
                                                            placeholder="اسم الخطة ( باللغة الإنجليزية )">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-5">
                                                    <div>
                                                        <label class="form-label">عدد الأيام المتاحة</label>
                                                        <input class="form-control" max="30"
                                                            placeholder="عدد الأيام المتاحة"
                                                            name="package_varients[days_available]" required
                                                            type="number">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-5">
                                                    <div>
                                                        <label class="form-label"> السعر</label>
                                                        <input class="form-control" placeholder=" السعر"
                                                            name="package_varients[price]" required type="number">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-5">
                                                    <div>
                                                        <label class="form-label">حدد الأيــام المتاحة</label>
                                                        <div class="d-flex justify-content-between flex-wrap">


                                                            <div class="form-check form-check-right">
                                                                <input class="form-check-input category-checked"
                                                                    type="checkbox" id="formCheckRight2" value="saturday" checked>
                                                                <label class="form-check-label" for="formCheckRight2">
                                                                    السبت
                                                                </label>
                                                            </div>

                                                            <div class="form-check form-check-right">
                                                                <input class="form-check-input category-checked"
                                                                    type="checkbox" id="formCheckRight2" value="sunday">
                                                                <label class="form-check-label" for="formCheckRight2">
                                                                    الأحد
                                                                </label>
                                                            </div>

                                                            <div class="form-check form-check-right">
                                                                <input class="form-check-input category-checked"
                                                                    type="checkbox" id="formCheckRight2" value="monday">
                                                                <label class="form-check-label" for="formCheckRight2">
                                                                    الإثنين
                                                                </label>
                                                            </div>

                                                            <div class="form-check form-check-right">
                                                                <input class="form-check-input category-checked"
                                                                    value="tuesday" type="checkbox" id="formCheckRight2">
                                                                <label class="form-check-label" for="formCheckRight2">
                                                                    الثلاثاء
                                                                </label>
                                                            </div>

                                                            <div class="form-check form-check-right">
                                                                <input class="form-check-input category-checked"
                                                                    type="checkbox" id="formCheckRight2" value="wednesday">
                                                                <label class="form-check-label" for="formCheckRight2">
                                                                    الأربعاء
                                                                </label>
                                                            </div>

                                                            <div class="form-check form-check-right">
                                                                <input class="form-check-input category-checked"
                                                                    type="checkbox" id="formCheckRight2" value="thursday"
                                                                    >
                                                                <label class="form-check-label" for="formCheckRight2">
                                                                    الخميس
                                                                </label>
                                                            </div>

                                                            <div class="form-check form-check-right">
                                                                <input class="form-check-input category-checked" value="friday"
                                                                    type="checkbox" id="formCheckRight2">
                                                                <label class="form-check-label" for="formCheckRight2">
                                                                    الجمعة
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="col-12 days-choises-add">
                                                    <ul class="nav nav-tabs ul-days-choises" id="myTab" role="tablist">
                                                        <li class="nav-item saturday-choise-content" role="presentation">
                                                            <button class="nav-link active" id="saturday-tab"
                                                                data-bs-toggle="tab" data-bs-target="#saturday" type="button"
                                                                role="tab" aria-controls="saturday"
                                                                aria-selected="true">saturday</button>
                                                        </li>

                                                    </ul>
                                                    <div class="tab-content tab-days-choises " id="myTabContent" style="padding: 20px 0">
                                                        <div class="tab-pane fade show active saturday-choise-content" id="saturday" role="tabpanel"
                                                            aria-labelledby="saturday-tab">
                                                            <div class="row">
                                                                @foreach (['first','second','third','fourth'] as $indexDay)                                                                   
                                                                    <div class="form-header">
                                                                        <img class="img-fluid" src="{{asset('back/assets/images/ofCourse-images/shape-1.png')}}"
                                                                            width="10px" height="10px">
                                                                        <h6 class="form-main-title"> {{$indexDay}} saturday </h6>
                                                                        <div class="form-header-line"></div>
                                                                    </div>
                                                                    @foreach ($mealCategories as $mealCat)
                                                                        <div class="col-5">
                                                                            <div>
                                                                                <label class="form-label">
                                                                                    {{ $mealCat->name }}</label>
                                                                                <input class="form-control"
                                                                                    placeholder="عدد المرات"
                                                                                    name="package_varients[days][saturday][{{$indexDay}}][{{ $mealCat->id }}]"
                                                                                    value="0" type="number">
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                @endforeach
                                                         

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="form-header">
                                                    <img class="img-fluid" src="{{asset('back/assets/images/ofCourse-images/shape-1.png')}}"
                                                        width="10px" height="10px">
                                                    <h6 class="form-main-title"> إضافة الوجبات </h6>
                                                    <div class="form-header-line"></div>
                                                </div>
                                                @php
                                                    $days = ['saturday','sunday','monday','tuesday','wednesday','thursday','friday']
                                                @endphp
                                                <div class="col-12 ">
                                                    <ul class="nav nav-tabs " id="myTab1" role="tablist">
                                                        @foreach ($days as $day)
                                                            <li class="nav-item " role="presentation">
                                                                <button class="nav-link " id="meals-{{$day}}-tab"
                                                                    data-bs-toggle="tab" data-bs-target="#meals-{{$day}}" type="button"
                                                                    role="tab" aria-controls="meals-{{$day}}"
                                                                    aria-selected="true">وجبات {{$day}}</button>
                                                            </li>
                                                        @endforeach
                                                    

                                                    </ul>
                                                    <div class="tab-content " id="myTab1Content" style="padding: 20px 0">
                                                        @foreach ($days as $day)

                                                            <div class="tab-pane fade show  " id="meals-{{$day}}" role="tabpanel"
                                                                aria-labelledby="meals-{{$day}}-tab">
                                                                <div class="row">
                                                                    @foreach ($mealCategories as $mealCat)
                                                                        <div class="col-6" style="margin: 10px 0">
                                                                            <div>
                                                                                <label class="form-label">
                                                                                    الوجبات ل{{$mealCat->name}}</label>
                                                                                <select class="form-control" 
                                                                                    placeholder="" multiple
                                                                                    name="package_meals[{{ $mealCat->id }}][{{$day}}][]">
                                                                                    @foreach ($mealCat->meals as $meal)
                                                                                        <option value="{{$meal->id}}">{{$meal->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach

                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                </div>

                                                <div class="col-lg-12 text-start mt-3">

                                                    <button type="button"
                                                        class="btn bg-white text-dark waves-effect waves-light form-btn px-5 backStepBtn">
                                                        رجوع </button>
                                                    <button type="submit"
                                                        class="btn btn-light waves-effect waves-light form-btn px-5"> تأكيد
                                                        إنشاء الحزمة </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <!-- End Page-content -->
    @endsection
    @push('scripts')
    <script>
            $(document).ready(function() {
                $('.category-checked').on('click', function() {
                    $value = $(this).val();
                    if ($(this).is(':checked')) {
                        $(".ul-days-choises").append(
                            "<li class='nav-item " + $value +"-choise-content' role='presentation'><button class='nav-link' id='" + $value +
                            "-tab' data-bs-toggle='tab' data-bs-target='#" + $value +
                            "' type='button' role='tab' aria-controls='" + $value +
                            "' aria-selected='true'> " + $value + " </button> </li>"
                        );
                        $(".tab-days-choises").append(
                            "<div class='tab-pane fade "+$value+"-choise-content' id='"+$value+"' role='tabpanel' aria-labelledby='home-tab' ><div class='row'> @foreach (['first','second','third','fourth'] as $indexDay) <div class='form-header'> <img class='img-fluid' src='{{asset('back/assets/images/ofCourse-images/shape-1.png')}}' width='10px' height='10px'> <h6 class='form-main-title'> {{$indexDay}} "+$value+" </h6><div class='form-header-line'></div> </div> @foreach ($mealCategories as $mealCat)<div class='col-5'> <div> <label class='form-label'> {{ $mealCat->name }} </label> <input class='form-control' placeholder='عدد المرات' name='package_varients[days]["+$value+"][{{$indexDay}}][{{ $mealCat->id }}]'value='0' type='number'> </div> </div> @endforeach @endforeach </div> </div>"
                        );
                    } else {
                        $("." + $value + "-choise-content").remove();
                    }
                
                });
            });
        </script>
    @endpush
