@extends('dashboard.layouts.master')
@section('sidebar')
    @include('dashboard.incudes.back.sales_sidebar')
@endsection


@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'SAlES'])
    @include('dashboard.incudes.alert')

    <div class="page-content">

        <div class="page-card container p-4">
            <h1 class="page-main-title mb-4"> {{__('views.add_new')}}  </h1>
            <form id="kt_form_1" action="{{route('customer.update',$user->id)}}" method="POST">
                @csrf
                <div class="form-header">
                    <img class="img-fluid" src="assets/images/ofCourse-images/shape-1.png" width="10px" height="10px">
                    <h6 class="form-main-title">{{__('views.customer_data')}} </h6>
                    <div class="form-header-line"></div>
                </div>
                <div class="form-content container">
                    <div class="row">

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">{{__('views.first_name_ar')}}</label>
                                <input title="{{__('views.required')}}" value="{{$user->getTranslation('first_name','ar') ?? ''}}" name="first_name[ar]" required class="form-control" type="text"
                                    placeholder="{{__('views.first_name_ar')}}">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">{{__('views.last_name_ar')}}</label>
                                <input title="{{__('views.required')}}" value="{{$user->getTranslation('first_name','en') ?? ''}}" name="first_name[en]" required class="form-control" type="text"
                                    placeholder="{{__('views.last_name_ar')}}">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">{{__('views.first_name_en')}}</label>
                                <input title="{{__('views.required')}}" value="{{$user->getTranslation('last_name','ar') ?? ''}}" name="last_name[ar]" required class="form-control" type="text"
                                    placeholder="{{__('views.first_name_en')}}">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">{{__('views.last_name_en')}}</label>
                                <input title="{{__('views.required')}}" value="{{$user->getTranslation('last_name','en') ?? ''}}" name="last_name[en]" required class="form-control" type="text"
                                    placeholder="{{__('views.last_name_en')}}">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">{{__('views.mobile')}}</label>
                                <input onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/[^0-9.]/g,'')" title="{{__('views.required')}}" value="{{$user->phone}}" name="phone" required class="form-control" type="text"
                                    placeholder="{{__('views.mobile')}}">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">{{__('views.gender')}}</label>
                                <select title="{{__('views.required')}}" required name="gender" class="form-control">

                                    <option value=""> -- {{__('views.select')}} -- </option>
                                    <option {{$user->gender == 'male' ? 'selected' : ''}}  value="male"> -- {{__('views.male')}} -- </option>
                                    <option {{$user->gender == 'female' ? 'selected' : ''}} value="female"> --{{__('views.female')}} -- </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">{{__('views.customer_Birthdays')}}</label>
                                <div class="position-relative">
                                    <div class="pickDateLayout p-2">
                                        <h5 class="m-0 mt-1 mx-3">{{__('views.day - month - year')}}</h5>
                                        <h5 class="m-0 mt-1 mx-3"> <i class="dripicons-calendar"></i></h5>
                                    </div>
                                    <div class="position-relative">
                                        <div class="pickDateLayout p-2">
                                            <h5 class="m-0 mt-1 mx-3">{{__('views.day - month - year')}}</h5>
                                            <h5 class="m-0 mt-1 mx-3"> <i class="dripicons-calendar"></i></h5>
                                        </div>
                                        <input title="{{__('views.required')}}" value="{{$user->birthday}}" required name="birthday" class="form-control" type="date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">{{__('views.How did you find out about the app?')}}</label>
                                <select name="how_find_us" class="form-control">
                                    <option value=""> -- {{__('views.select')}} -- </option>
                                    <option {{$user->how_find_us == 'social' ? 'selected' : ''}} value="social">{{__('views.social')}}</option>
                                    <option {{$user->how_find_us == 'adv' ? 'selected' : ''}} value="adv"> {{__('views.adv')}} </option>
                                    <option {{$user->how_find_us == 'else' ? 'selected' : ''}} value="else"> {{__('views.else')}} </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">{{__('views.How did we contact you?')}}</label>
                                <select title="{{__('views.required')}}" name="contact_method_id" required class="form-control">
                                    <option value=""> -- {{__('views.select')}} -- </option>
                                    @foreach ($contacts as $contact)
                                        <option {{$user->contact_method_id == $contact->id ? 'selected' : ''}} value="{{ $contact->id }}"> {{ $contact->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">{{__('views.tags')}}</label>
                                <select name="tag_id" title="{{__('views.required')}}" required class="form-control">
                                    <option value=""> -- {{__('views.select')}} -- </option>
                                    @foreach ($tags as $tag)
                                        <option {{$user->tag_id == $tag->id ? 'selected' : ''}} value="{{ $tag->id }}"> {{ $tag->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">{{__('views.customer_request_goal')}}</label>
                                <select name="goal" required class="form-control">
                                    <option value=""> -- {{__('views.select')}} -- </option>
                                    <option {{$user->goal == 0 ? 'selected' : ''}} value="0">{{__('views.weight_loss')}} </option>
                                    <option {{$user->goal == 1 ? 'selected' : ''}} value="1">{{__('views.increase_weight')}} </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">{{__('views.employer_name')}}</label>
                                <input value="@if($user->by_employee_data){{$user->by_employee_data->getTranslation('first_name',app()->getLocale()) ?? ''}} {{$user->by_employee_data->getTranslation('last',app()->getLocale()) ?? ''}}@endif" class="form-control" type="text"
                                    placeholder="{{__('views.employer_name')}}">
                            </div>
                        </div>

                        <div class="col-lg-12 mb-5">
                            <div>
                                <label class="form-label">{{__('views.notes')}}</label>
                                <textarea  name="comment" rows="7" class="form-control" type="text" placeholder="اضف تعليق او ما تود ذكره">
                                    {{$user->comment}}
                                </textarea>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="form-header">
                    <img class="img-fluid" src="assets/images/ofCourse-images/shape-1.png" width="10px"
                        height="10px">
                    <h6 class="form-main-title">{{__('views.address_data')}} </h6>
                    <div class="form-header-line"></div>
                </div>
                @php
                    $address = $user->main_address() ?? [];
                @endphp
               
                <div class="form-content container">
                    <div class="row">

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">{{__('views.area')}}</label>
                                <select title="{{__('views.required')}}" name="area_id" required class="form-control">
                                    <option value=""> -- {{__('views.select')}} -- </option>
                                    @foreach ($areas as $area)
                                        <option {{$address->area_id == $area->id ? 'selected' : ''}} value="{{ $area->id }}"> {{ $area->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label"> {{__('views.block')}}</label>
                                <select title="{{__('views.required')}}" name="block_id" required class="form-control">
                                    <option value=""> -- {{__('views.select')}} -- </option>
                                    @foreach ($blocks as $block)
                                        <option {{$address->block_id == $block->id ? 'selected' : ''}} value="{{ $block->id }}"> {{ $block->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <label class="form-label">{{__('views.interval')}}</label>
                            <select name="time" class="form-control">
                                <option value=""> -- {{__('views.select')}} -- </option>
                                <option {{$user->time == 'morning' ? 'selected' : ''}} value="morning">{{__('views.morning')}} </option>
                                <option {{$user->time == 'evening' ? 'selected' : ''}} value="evening"> {{__('views.evening')}} </option>
                            </select>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">{{__('views.streetName')}}ً</label>
                                <input value="{{$address['street_name'] ?? ''}}" name="address[0][street_name]" class="form-control" type="text" placeholder="{{__('views.streetName')}}ً">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">{{__('views.gadah')}}</label>
                                <input value="{{$address['gadah'] ?? ''}}" name="address[0][gadah]" class="form-control" type="text" placeholder="{{__('views.gadah')}}">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">{{__('views.building_no')}}</label>
                                <input value="{{$address['building_no'] ?? ''}}" name="address[0][building_no]" class="form-control" type="text" placeholder="{{__('views.building_no')}}">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">{{__('views.apartment_number')}}</label>
                                <input value="{{$address['house_no'] ?? ''}}" name="address[0][house_no]" class="form-control" type="text" placeholder="{{__('views.apartment_number')}}">
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
                                <label class="form-label">{{__('views.address_type')}}</label>
                                <select class="form-control" name="address[0][type]">
                                    <option value=""> -- {{__('views.select')}} -- </option>
                                    <option {{isset($address['type']) && $address['type'] == 'عمل' ? 'selected' : ''}}  value="عمل"> {{__('views.work')}}</option>
                                    <option {{isset($address['type']) && $address['type'] == 'سكن' ? 'selected' : ''}} value="سكن"> {{__('views.home')}}</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-lg-12 mb-5">
                            <div>
                                <label class="form-label">{{__('views.comment')}}</label>
                                <textarea rows="7" class="form-control" type="text" name="address[0][comment]" placeholder="اضف تعليق او ما تود ذكره">{{$address['comment'] ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 text-start">
                            <button type="submit" class="btn btn-light waves-effect waves-light form-btn px-5">{{__('views.edit_item')}}</button>
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

                    },
                    //display error alert on form submit
                    invalidHandler: function (event, validator) {
                        var alert = $('#kt_form_1_msg');
                        alert.removeClass('kt--hide').show();
                        KTUtil.scrollTop();
                    },

                    submitHandler: function (form) {
                        form[0].submit(); // submit the form
                    }
                }
            );
        });


    </script>

@endpush
