@extends('dashboard.layouts.master')
@section('sidebar')
    @include('dashboard.incudes.back.sales_sidebar')
@endsection


@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'SAlES'])
    @include('dashboard.incudes.alert')

    <div class="page-content">

        <div class="page-card container p-4">
            <h1 class="page-main-title mb-4"> إضافة عميل جديد </h1>
            <form id="kt_form_1" action="{{route('customer.store')}}" method="POST">
                @csrf
                <div class="form-header">
                    <img class="img-fluid" src="assets/images/ofCourse-images/shape-1.png" width="10px" height="10px">
                    <h6 class="form-main-title">بيانات العميل </h6>
                    <div class="form-header-line"></div>
                </div>
                <div class="form-content container">
                    <div class="row">

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">الإسم الأول ( باللغة العربية )</label>
                                <input  id="first_name" name="first_name['ar']" required class="form-control" type="text"
                                       placeholder="الإســم الأول باللغة العربية">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">الإسم الأخــير ( باللغة العربية )</label>
                                <input name="first_name[en]" required class="form-control" type="text"
                                       placeholder="الإسم الأخــير ( باللغة العربية )">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">الإسم الأول ( باللغة العربيه )</label>
                                <input name="last_name[ar]" required class="form-control" type="text"
                                       placeholder="الإسم الأول باللغة الإنجليزية">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">الإسم الأخــير ( باللغة الإنجليزية )</label>
                                <input name="last_name[en]" required class="form-control" type="text"
                                       placeholder="الإسم الأخــير ( باللغة الإنجليزية )">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">رقم الهاتف</label>
                                <input name="phone" required class="form-control" type="number"
                                    placeholder="رقم الهاتف">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">كلمة المرور</label>
                                <input name="password" required min="8" class="form-control" type="password"
                                       placeholder="***********">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">الجنــس</label>

                                <select required name="gender" class="form-control">
                                    <option value=""> -- اختر الجنس -- </option>
                                    <option value="male"> -- ذكر -- </option>
                                    <option value="female"> --انثي -- </option>

                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">تاريخ الميــلاد</label>
                                <div class="position-relative">
                                    <div class="pickDateLayout p-2">
                                        <h5 class="m-0 mt-1 mx-3">يوم - شهر - سنة</h5>
                                        <h5 class="m-0 mt-1 mx-3"><i class="dripicons-calendar"></i></h5>
                                    </div>
                                    <div class="position-relative">
                                        <div class="pickDateLayout p-2">
                                            <h5 class="m-0 mt-1 mx-3">يوم - شهر - سنة</h5>
                                            <h5 class="m-0 mt-1 mx-3"><i class="dripicons-calendar"></i></h5>
                                        </div>
                                        <input required name="birthday" class="form-control" type="date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">كيف عرفت التطبيق</label>
                                <select name="how_find_us" class="form-control">
                                    <option value=""> -- اختر كيف عرفت التطبيق --</option>
                                    <option value="social"> تواصل اجتماعي</option>
                                    <option value="adv"> اعلانات</option>
                                    <option value="else"> أخري</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">طريقة التواصل مع العميل</label>
                                <select name="contact_method_id" required class="form-control">
                                    <option value=""> -- اختر طريقة التواصل --</option>
                                    @foreach ($contacts as $contact)
                                        <option value="{{ $contact->id }}"> {{ $contact->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label"> الاشاره tags</label>
                                <select name="tag_id" required class="form-control">
                                    <option value=""> -- اختر طريقة التواصل --</option>
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}"> {{ $tag->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">هدف العميل</label>
                                <select name="goal" required class="form-control">
                                    <option value=""> -- حدد هدف العميل --</option>
                                    <option value="0">خساره وزن</option>
                                    <option value="1">زياده وزن</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">اسم الموظف الذي قام بتسجيل بيانات العميل</label>
                                <input class="form-control" type="text"
                                       placeholder="اسم الموظف الذي قام بتسجيل بيانات العميل">
                            </div>
                        </div>

                        <div class="col-lg-12 mb-5">
                            <div>
                                <label class="form-label">اضف تعليق او ما تود ذكره</label>
                                <textarea name="comment" rows="7" class="form-control" type="text"
                                          placeholder="اضف تعليق او ما تود ذكره"></textarea>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="form-header">
                    <img class="img-fluid" src="assets/images/ofCourse-images/shape-1.png" width="10px"
                         height="10px">
                    <h6 class="form-main-title">بيانات العنوان </h6>
                    <div class="form-header-line"></div>
                </div>
                <div class="form-content container">
                    <div class="row">

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">اسم المنطقة</label>
                                <select name="area_id" required class="form-control">
                                    <option value=""> -- اختر اسم المنطقة --</option>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}"> {{ $area->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label"> الحاجز</label>
                                <select name="block_id" required class="form-control">
                                    <option value=""> -- اختر اسم المنطقة --</option>
                                    @foreach ($blocks as $block)
                                        <option value="{{ $block->id }}"> {{ $block->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <label class="form-label">حدد الفترة</label>
                            <select name="time" class="form-control">
                                <option value=""> -- اختر الفترة --</option>
                                <option value="morning">صباحي</option>
                                <option value="evening"> مسائي</option>
                            </select>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">اسم الشارع كاملاً</label>
                                <input name="address[0][street_name]" class="form-control" type="text"
                                       placeholder="اسم الشارع كاملاً">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">اسم الجادة</label>
                                <input name="address[0][gadah]" class="form-control" type="text"
                                       placeholder="اسم الجادة">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">رقم المنزل</label>
                                <input name="address[0][building_no]" class="form-control" type="text"
                                       placeholder="رقم المنزل">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">رقم الشقة</label>
                                <input name="address[0][house_no]" class="form-control" type="text"
                                       placeholder="رقم الشقة">
                            </div>
                        </div>
                        {{-- <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">نوع الطابق</label>
                                <select class="form-control">
                                    <option value=""> -- اختر نوع الطابق --</option>
                                </select>
                            </div>
                        </div> --}}

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">نوع العنوان</label>
                                <select class="form-control" name="address[0][type]">
                                    <option value=""> -- اختر نوع العنوان --</option>
                                    <option value="عمل"> عمل</option>
                                    <option value="سكن"> سكن</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-lg-12 mb-5">
                            <div>
                                <label class="form-label">اضف تعليق او ما تود ذكره</label>
                                <textarea rows="7" class="form-control" type="text" name="address[0][comment]"
                                          placeholder="اضف تعليق او ما تود ذكره"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 text-start">
                            <button type="submit" class="btn btn-light waves-effect waves-light form-btn px-5">تأكيد
                                إضافة العميل
                            </button>
                        </div>
                    </div>
                </div>

            </form>


        </div>

    </div>
@endsection
@push('scripts')
    <script>
        $().ready(function () {

            $("#kt_form_1").validate(
                {
                    // define validation rules
                    rules: {
                        'first_name[ar]':  {
                            required: "Please enter first name",
                            title: "ssss",
                        },
                        email: {
                            required: true,
                            email: true,
                            minlength: 10
                        },
                        url: {
                            required: true
                        },
                        digits: {
                            required: true,
                            digits: true
                        },
                        creditcard: {
                            required: true,
                            creditcard: true
                        },
                        phone: {
                            required: true,
                            phoneUS: true
                        },
                        option: {
                            required: true
                        },
                        options: {
                            required: true,
                            minlength: 2,
                            maxlength: 4
                        },
                        memo: {
                            required: true,
                            minlength: 10,
                            maxlength: 100
                        },

                        checkbox: {
                            required: true
                        },
                        checkboxes: {
                            required: true,
                            minlength: 1,
                            maxlength: 2
                        },
                        radio: {
                            required: true
                        }
                    },
                    messages: {
                        'first_name[ar]': {
                            required: "Please enter first name",
                            title: "ssss",
                        },
                        lastname: "Enter your Last Name",
                        email: {
                            required: "Enter your Email",
                            email: "Please enter a valid email address.",
                        }
                    },
                    //display error alert on form submit
                    invalidHandler: function (event, validator) {
                        var alert = $('#kt_form_1_msg');
                        alert.removeClass('kt--hide').show();
                        KTUtil.scrollTop();
                    },

                    submitHandler: function (form) {
                        //form[0].submit(); // submit the form
                    }
                }
            );
        });
    </script>

@endpush
