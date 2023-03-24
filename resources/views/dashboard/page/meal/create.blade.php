@extends('dashboard.layouts.master')
@section('sidebar')
    @include('dashboard.incudes.back.operation_sidebar')
@endsection


@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'OPERATION'])
    @include('dashboard.incudes.alert')


    <div class="page-content" id="add-meal">

        <div class="page-card container p-4">
            <h1 class="page-main-title mb-4"> إضافة وجبة </h1>
            <form action="{{ route('meal.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12  p-0 py-3 row">
                        <div class="col-9">
                            <!-- Tabs Buttons -->
                            <ul class="nav steps-navs nav-pills nav-justified p-0 d-flex align-items-center" role="tablist">
                                <li class="nav-item waves-effect waves-light mb-2 mb-lg-0">
                                    <a class="nav-link p-2 text-center active" data-bs-toggle="tab" href="#step1"
                                        role="tab" aria-selected="true">
                                        <span class="stepNumber">1</span><span class="stepTitle">بيانات الوجبة</span>
                                    </a>
                                </li>
                                <li class="stepTabsLine"></li>
                                <li class="nav-item waves-effect waves-light mb-2 mb-lg-0">
                                    <a class="nav-link p-2 text-center" data-bs-toggle="tab" href="#step2" role="tab"
                                        aria-selected="true">
                                        <span class="stepNumber">2</span><span class="stepTitle">خطة الدايت</span>
                                    </a>
                                </li>
                                <li class="stepTabsLine"></li>
                                <li class="nav-item waves-effect waves-light mb-2 mb-lg-0">
                                    <a class="nav-link p-2 text-center" data-bs-toggle="tab" href="#step3" role="tab"
                                        aria-selected="true">
                                        <span class="stepNumber">3</span><span class="stepTitle">المكونات المطلوبة</span>
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
                                        <h6 class="form-main-title"> بيانات الوجبة </h6>
                                        <div class="form-header-line"></div>
                                    </div>
                                    <div class="form-content container">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 mb-3">
                                                <div>
                                                    <label class="form-label">اسم الوجبة ( باللغة العربية )</label>
                                                    <input name="name[ar]"  class="form-control" type="text"
                                                        placeholder="اسم الوجبة ( باللغة العربية )">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <div>
                                                    <label class="form-label">اسم الوجبة ( باللغة الإنجليزية )</label>
                                                    <input class="form-control" type="text" name="name[en]" 
                                                        placeholder="اسم الوجبة ( باللغة الإنجليزية )">
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mb-3">
                                                <div>
                                                    <label class="form-label">اضف وصف الوجبة ( باللغة العربية )</label>
                                                    <textarea name="description[ar]"  rows="7" class="form-control" type="text"
                                                        placeholder="اضف وصف الوجبة ( باللغة العربية )"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mb-3">
                                                <div>
                                                    <label class="form-label">اضف وصف الوجبة ( باللغة العربية )</label>
                                                    <textarea name="description[en]" rows="7" class="form-control" type="text"
                                                        placeholder="اضف وصف الوجبة ( باللغة العربية )"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <div>
                                                    <label class="form-label">كود</label>
                                                    <input name="code"  class="form-control" type="text"
                                                        placeholder="اضف كود الوجبة "/>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
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

                                            <div class="col-lg-6 mb-3">
                                                <div>
                                                    <label class="form-label">تصنيف الوجبة</label>
                                                    <select name="meal_category_id[]"  multiple
                                                        class="form-control">
                                                        @foreach ($mealCategories as $category)
                                                            <option value="{{ $category->id }}"> {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <div>
                                                    <label class="form-label">نوع الوجبة</label>
                                                    <select name="meal_plan_id[]"  multiple class="form-control">
                                                        @foreach ($mealPlans as $plan)
                                                            <option value="{{ $plan->id }}"> {{ $plan->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">الوجبة متاحة</label>
                                                <div>
                                                    <div class="form-check form-radio-primary mb-3 ml-4 form-check-right">
                                                        <input name="active" value="1" class="form-check-input"
                                                            type="radio" name="formRadioColor3" id="formRadioColor1"
                                                            checked="">
                                                        <label class="form-check-label" for="formRadioColor1">
                                                            نعم
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-radio-primary mb-3 mx-4 form-check-right">
                                                        <input name="active" value="0" class="form-check-input"
                                                            type="radio" name="formRadioColor3" id="formRadioColor1">
                                                        <label class="form-check-label" for="formRadioColor1">
                                                            لا
                                                        </label>
                                                    </div>
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
                                        <h6 class="form-main-title"> خطـة الدايـت </h6>
                                        <div class="form-header-line"></div>
                                    </div>
                                    <div class="form-content container">
                                        <div class="row align-items-end">
                                            <div class="col-lg-3 mb-3">
                                                <div>
                                                    <label class="form-label">كمية البروتين</label>
                                                    <input name="variations[protien]"  class="form-control"
                                                        type="number" placeholder="كمية البروتين ">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 mb-3">
                                                <div>
                                                    <label class="form-label">كمية الدهون</label>
                                                    <input class="form-control" name="variations[fat]" 
                                                        type="number" placeholder="كمية الدهون">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 mb-3">
                                                <div>
                                                    <label class="form-label">كمية السعرات الحرارية </label>
                                                    <input class="form-control" name="variations[calories]" 
                                                        type="number" placeholder="كمية السعرات الحرارية">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 mb-3">
                                                <div>
                                                    <label class="form-label">كمية الكربوهيدرات </label>
                                                    <input class="form-control" name="variations[carb]" 
                                                        type="number" placeholder="كمية الكربوهيدرات">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <div>
                                                    <label class="form-label">حدد الأيــام المتاحة</label>
                                                    <div class="d-flex justify-content-between flex-wrap">
                                                        <div class="form-check form-check-right">
                                                            <input name="settings[saturday]" value="saturday"
                                                                class="form-check-input" type="checkbox"
                                                                id="formCheckRight2" checked="">
                                                            <label class="form-check-label" for="formCheckRight2">
                                                                السبت
                                                            </label>
                                                        </div>

                                                        <div class="form-check form-check-right">
                                                            <input name="settings[sunday]" value="sunday"
                                                                class="form-check-input" type="checkbox"
                                                                id="formCheckRight2" checked="">
                                                            <label class="form-check-label" for="formCheckRight2">
                                                                الأحد
                                                            </label>
                                                        </div>

                                                        <div class="form-check form-check-right">
                                                            <input name="settings[monday]" value="monday"
                                                                class="form-check-input" type="checkbox"
                                                                id="formCheckRight2" checked="">
                                                            <label class="form-check-label" for="formCheckRight2">
                                                                الإثنين
                                                            </label>
                                                        </div>

                                                        <div class="form-check form-check-right">
                                                            <input name="settings[tuesday]" value="tuesday"
                                                                class="form-check-input" type="checkbox"
                                                                id="formCheckRight2" checked="">
                                                            <label class="form-check-label" for="formCheckRight2">
                                                                الثلاثاء
                                                            </label>
                                                        </div>

                                                        <div class="form-check form-check-right">
                                                            <input name="settings[wednesday]" value="wednesday"
                                                                class="form-check-input" type="checkbox"
                                                                id="formCheckRight2" checked="">
                                                            <label class="form-check-label" for="formCheckRight2">
                                                                الأربعاء
                                                            </label>
                                                        </div>

                                                        <div class="form-check form-check-right">
                                                            <input name="settings[thursday]" value="thursday"
                                                                class="form-check-input" type="checkbox"
                                                                id="formCheckRight2" checked="">
                                                            <label class="form-check-label" for="formCheckRight2">
                                                                الخميس
                                                            </label>
                                                        </div>

                                                        <div class="form-check form-check-right">
                                                            <input name="settings[friday]" value="friday"
                                                                class="form-check-input" type="checkbox"
                                                                id="formCheckRight2" checked="">
                                                            <label class="form-check-label" for="formCheckRight2">
                                                                الجمعة
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3 d-flex">
                                                <div class="form-check form-switch form-switch-md" dir="ltr">
                                                    <label class="form-check-label" for="SwitchCheckSizemd">تفعيل مكونات
                                                        الوجبة بالتطبيق</label>
                                                    <input name="in_app" value="1" class="form-check-input"
                                                        type="checkbox" id="SwitchCheckSizemd">
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
                                        <img class="img-fluid" src="assets/images/ofCourse-images/shape-1.png"
                                            width="10px" height="10px">
                                        <h6 class="form-main-title"> المكونات المطلوبة </h6>
                                        <div class="form-header-line"></div>
                                    </div>
                                    <div class="form-content container">
                                        <div class="row row-group align-items-end foods-group">
                                            <div class="row row-group align-items-end">
                                                <div class="col-3 mb-3">
                                                <div>
                                                    <label class="form-label">رقم ID للمكون</label>
                                                    <select required name="food_id[]" 
                                                        class="form-control food-selected">
                                                        <option value="">اختيار مكون </option>

                                                        @foreach ($foods as $food)
                                                            <option value="{{ $food->id }}"
                                                                data-stock="{{ $food->inStocks ? $food->inStocks->sum('stock') : 0 }}">
                                                                {{ $food->name }}
                                                                ({{ $food->code }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                </div>

                                                <div class="col-3 mb-3">
                                                    <label class="form-label">مرغوب</label>
                                                    <div>
                                                        <div class="form-check form-radio-primary mb-3 ml-4 form-check-right">
                                                            <input class="form-check-input food_is_like" type="radio"
                                                                name="is_like" value="1" id="formRadioColor1" checked="">
                                                            <label class="form-check-label" for="formRadioColor1">
                                                                نعم
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-radio-primary mb-3 mx-4 form-check-right">
                                                            <input class="form-check-input" type="radio"
                                                            name="is_like" value="0" id="formRadioColor1">
                                                            <label class="form-check-label" for="formRadioColor1">
                                                                لا
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 mb-3">
                                                    <div>
                                                        <label class="form-label">الكمية قبل التحضير</label>
                                                        <input required class="form-control qty_before" placeholder="الكمية قبل التحضير">
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 mb-3">
                                                    <div>
                                                        <label class="form-label">الكمية بعد التحضير</label>
                                                        <input required class="form-control qty_after" placeholder="الكمية بعد التحضير">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-start mt-3">

                                                    <button type="button"
                                                        class="btn bg-white text-dark waves-effect waves-light form-btn px-5 backStepBtn">
                                                        رجوع </button>
                                                    <button type="button" 
                                                        class="btn btn-light add-row waves-effect waves-light form-btn px-5 add-food">
                                                        
                                                        إضاقة مكون جديد </button>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" 
                                        class="btn btn-light mt-20 add-row waves-effect waves-light form-btn px-5 " style="margin-top: 20px">
                                        حفظ
                                          </button>
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
       
            $(".add-food").click(function() {
                $(".foods-group").append(
                    `
                    <div class="row row-group align-items-end " style="margin-top:20px">
                                                <div class="col-3 mb-3">
                                                <div>
                                                    <label class="form-label">رقم ID للمكون</label>
                                                    <select name="food_id[]" required
                                                        class="form-control food-selected">
                                                        @foreach ($foods as $food)
                                                            <option value="{{ $food->id }}"
                                                                data-stock="{{ $food->inStocks ? $food->inStocks->sum('stock') : 0 }}">
                                                                {{ $food->name }}
                                                                ({{ $food->code }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                </div>

                                                <div class="col-3 mb-3">
                                                    <label class="form-label">مرغوب</label>
                                                    <div>
                                                        <div class="form-check form-radio-primary mb-3 ml-4 form-check-right">
                                                            <input class="form-check-input food_is_like" value="1" type="radio"
                                                                 checked="">
                                                            <label class=" form-check-label" for="formRadioColor1">
                                                                نعم
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-radio-primary mb-3 mx-4 form-check-right">
                                                            <input class="form-check-input food_is_like" value="0" type="radio"
                                                                >
                                                            <label class="form-check-label" for="formRadioColor1">
                                                                لا
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 mb-3">
                                                    <div>
                                                        <label class="form-label">الكمية قبل التحضير</label>
                                                        <input required class="form-control qty_before" placeholder="الكمية قبل التحضير">
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 mb-3">
                                                    <div>
                                                        <label class="form-label">الكمية بعد التحضير</label>
                                                        <input required class="form-control qty_after" placeholder="الكمية بعد التحضير">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12  mt-3">

                                                    <button type="button" 
                                                        class="btn btn-danger    px-5 remCF">
                                                        
                                                         حذف المنتج </button>
                                                
                                                </div>
                                            </div>
                                                 `
                );
                
            });

            $(".foods-group").on('click','.remCF',function(){
                $(this).parent().parent().remove();
            });
          
            $('.food-selected').on('change', function() {
                
                $name = "food_id["+$(this).val()+"]";
                $(this).attr('name', $name);
                $(this).parent().parent().parent().find( '.qty_after' ).attr('name', $name+"[qty_after]");
                $(this).parent().parent().parent().find( '.qty_before' ).attr('name', $name+"[qty_before]");
                $(this).parent().parent().parent().find( '.food_is_like' ).attr('name', $name+"[is_like]");
               
                // $('.adjust-old-stock').val($(this).find(":selected").data('stock'));
            });
        });
    </script>
@endpush
