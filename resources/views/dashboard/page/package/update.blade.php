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
            <h1 class="page-main-title mb-4"> تعديل حزمة / خطة </h1>

            <form action="{{route('package.update',$package->id)}}" method="POST" enctype="multipart/form-data">
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
                                        <img class="img-fluid" src="{{asset('back/assets/images/ofCourse-images/shape-1.png')}}"
                                        width="10px" height="10px">
                                        <h6 class="form-main-title"> المعلومات الأساسية </h6>
                                        <div class="form-header-line"></div>
                                    </div>
                                    <div class="form-content container">
                                        <div class="row align-items-end">
                                            <div class="col-lg-6 mb-5">
                                                <div>
                                                    <label class="form-label">اسم الحزمة ( باللغة العربية )</label>
                                                    <input value="{{$package->getTranslation('name','ar')}}" name="name[ar]" required class="form-control" type="text"
                                                        placeholder="اسم الحزمة ( باللغة العربية )">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb-5">
                                                <div>
                                                    <label class="form-label">اسم الحزمة ( باللغة الإنجليزية )</label>
                                                    <input value="{{$package->getTranslation('name','en')}}" name="name[en]" required class="form-control" type="text"
                                                        placeholder="اسم الحزمة ( باللغة الإنجليزية )">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb-5">
                                                <div>
                                                    <label class="form-label">رقم الطلب </label>
                                                    <input value="{{$package->show_order}}" name="show_order" required class="form-control" type="number"
                                                        placeholder="رقم الطلب ">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb-5">
                                                <div class="form-check form-check-right">
                                                    <input {{$package->is_celebrity ? 'checked' : ''}} name="is_celebrity" value="1" class="form-check-input"
                                                        type="checkbox" id="formCheckRight2" >
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
                                                        placeholder="اضف وصف الحزمة ( باللغة العربية )">{{$package->getTranslation('description','ar')}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mb-5">
                                                <div>
                                                    <label class="form-label">اضف وصف الحزمة ( باللغة الإنجليزية )</label>
                                                    <textarea rows="7" class="form-control" name="description[en]" required type="text"
                                                        placeholder="اضف وصف الحزمة ( باللغة الإنجليزية )">{{$package->getTranslation('description','en')}}</textarea>
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
                                        <img class="img-fluid" src="{{asset('back/assets/images/ofCourse-images/shape-1.png')}}"
                                        width="10px" height="10px">
                                        <h6 class="form-main-title"> معلومات عن الحزمة </h6>
                                        <div class="form-header-line"></div>
                                    </div>
                                    <div class="form-content container">
                                        <div class="row align-items-end">
                                            <div class="col-lg-6 mb-5">
                                                <div>
                                                    <label class="form-label">كمية البروتين</label>
                                                    <input name="variations[protien]" value="{{$package->variations['protien'] ?? ''}}" required class="form-control"
                                                        type="number" placeholder="كمية البروتين ">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-5">
                                                <div>
                                                    <label class="form-label">كمية الكربوهيدرات </label>
                                                    <input name="variations[carbs]" required class="form-control" value="{{$package->variations['carbs'] ?? ''}}"
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
                                                        <input name="start_at" value="{{$package->start_at }}" required class="form-control"
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
  
                                    <div class="form-content container">
                                        <div class="row align-items-end">
                                        

                                            <div class="form-header">
                                                <img class="img-fluid" src="{{asset('back/assets/images/ofCourse-images/shape-1.png')}}"
                                                    width="10px" height="10px">
                                                <h6 class="form-main-title"> تعديل الوجبات </h6>
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
                                                                                @php
                                                                                    $selectedMeals=[];
                                                                                    foreach ($package->meals->where('meal_category_id',$mealCat->id) as $key => $value) {
                                                                                        if (isset($value->days[$day])) {
                                                                                           $selectedMeals = array_keys($value->days[$day]);
                                                                                        }
                                                                                    }
                                                                                @endphp
                                                                            <select class="form-control" 
                                                                                placeholder="" multiple
                                                                                name="package_meals[{{ $mealCat->id }}][{{$day}}][]">
                                                                                @foreach ($mealCat->meals as $meal)
                                                                                    <option {{in_array($meal->id,$selectedMeals) ? 'selected' : '' }} value="{{$meal->id}}">{{$meal->name}}</option>
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
                                                    تحديث الحزمة </button>
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
     
    </script>
@endpush
