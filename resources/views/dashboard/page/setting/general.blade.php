@extends('dashboard.layouts.master')
@section('sidebar')
    @include('dashboard.incudes.back.setting_sidebar')
@endsection


@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'SETTING'])

    <div class="page-content">
        <!-- Flash Message -->
        <div class="container">
            <div class="row">
                @include('dashboard.incudes.alert')
            </div>
        </div>

        <!-- Page Content -->
        <div class="page-card container p-4">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-4">
                        <h1 class="page-main-title m-0"> الإعدادت والضبط </h1>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="page-card-btn-groub">
                            <button type="button" class="btn btn-light waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#shiftsSettings">@lang('translation.shift_settings')</button>
                            <button type="button" class="btn btn-light waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#splashSettings">@lang('translation.splash_settings')</button>
                            <button type="button" class="btn btn-light waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#notificationsSettings">@lang('translation.notifications_settings')</button>
                        </div>
                    </div>
                </div>
            </div>

            <form id="form-1" action="{{route('general.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-header">
                    <img class="img-fluid" src="{{asset('back/assets/images/ofCourse-images/shape-1.png')}}" width="10px" height="10px">
                    <h6 class="form-main-title"> إعدادات الموقع </h6>
                    <div class="form-header-line"></div>
                </div>

                <div class="form-content container">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div>
                                <label class="form-label me-0">اسم الموقع</label>
                                <input name="general_site_name[value]" value="{{$generalSettings['general_site_name']->first()->value ?? ''}}" class="form-control k-form-input" type="text" placeholder="اسم الموقع" data-validation="req">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="general_short_description_ar" class="form-label me-0">@lang('translation.short_description_ar')</label>
                                <textarea
                                    rows="5"
                                    id="general_short_description_ar"
                                    name="general_short_description_ar[value]"
                                    class="form-control k-form-input"
                                    placeholder="@lang('translation.short_description_ar')"
                                    data-validation="req"
                                >{{ optional($generalSettings['general_short_description_ar'] ?? '')->first()->value ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="general_short_description_en" class="form-label me-0">@lang('translation.short_description_en')</label>
                                <textarea
                                    rows="5"
                                    id="general_short_description_en"
                                    name="general_short_description_en[value]"
                                    class="form-control k-form-input"
                                    placeholder="@lang('translation.short_description_en')"
                                    data-validation="req"
                                >{{ optional($generalSettings['general_short_description_en'] ?? '')->first()->value ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label me-0">كلمات الوصف (SEO Description)</label>
                                <textarea
                                    rows="5"
                                    name="general_seo_description[value]"
                                    class="form-control k-form-input"
                                    type="text"
                                    placeholder="كلمات الوصف (SEO Description)"
                                    data-validation="req"
                                >{{$generalSettings['general_seo_description']->first()->value ?? ''}}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label me-0">الكلمات المفتاحية (SEO Keywords)</label>
                                <textarea
                                    rows="5"
                                    name="general_seo_keyword[value]"
                                    class="form-control k-form-input"
                                    type="text"
                                    placeholder="الكلمات المفتاحية (SEO Keywords)"
                                    data-validation="req"
                                >{{$generalSettings['general_seo_keyword']->first()->value ?? ''}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-header">
                    <img class="img-fluid" src="{{asset('back/assets/images/ofCourse-images/shape-1.png')}}" width="10px" height="10px">
                    <h6 class="form-main-title"> إعدادات التواصل </h6>
                    <div class="form-header-line"></div>
                </div>
                <div class="form-content container">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div>
                                <label class="form-label">البريد الإلكتروني لإدارة الموقع</label>
                                <input name="general_email[value]" value="{{$generalSettings['general_email']->first()->value ?? ''}}" class="form-control k-form-input" type="text" placeholder="البريد الإلكتروني لإدارة الموقع" data-validation="req">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="general_phone" class="form-label">@lang('translation.general_phone')</label>
                                <input
                                    id="general_phone"
                                    name="general_phone[value]"
                                    value="{{ old('general_phone.value', $generalSettings['general_phone']->first()->value ?? '') }}"
                                    class="form-control k-form-input ltr-direction @error('general_phone.value') is-invalid @enderror"
                                    type="text"
                                    placeholder="@lang('crud.enter') @lang('translation.general_phone')"
                                    data-validation="req"
                                >
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label class="form-label">رقم الواتساب</label>
                                <div class="position-relative">
                                    <input name="general_whatsapp_phone[value]" value="{{$generalSettings['general_whatsapp_phone']->first()->value ?? ''}}" class="form-control k-form-input ltr-direction input-icon" type="text" placeholder="رقم الواتساب" data-validation="req">
                                    <i class="bx bxl-whatsapp form-input-icon text-success"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-5">
                            <div>
                                <label class="form-label">نص الرسالة الإفتراضية على الواتساب</label>
                                <textarea name="general_whatsapp_text[value]" rows="7" class="form-control k-form-input" type="text" placeholder="نص الرسالة الإفتراضية على الواتساب" data-validation="req">{{$generalSettings['general_whatsapp_text']->first()->value ?? ''}}</textarea>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-header">
                    <img class="img-fluid" src="{{asset('back/assets/images/ofCourse-images/shape-1.png')}}" width="10px" height="10px">
                    <h6 class="form-main-title"> الشبكات الإجتماعية </h6>
                    <div class="form-header-line"></div>
                </div>
                <div class="form-content container">
                    <div class="row">
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">الفيسبوك</label>
                                <div class="position-relative">
                                    <input name="general_facebook[value]" value="{{$generalSettings['general_facebook']->first()->value ?? ''}}" class="form-control k-form-input input-icon" type="text" placeholder="رابط الفيسبوك" data-validation="req">
                                    <i class="bx bx bxl-facebook form-input-icon text-primary"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">تويتر</label>
                                <div class="position-relative">
                                    <input name="general_twitter[value]" value="{{$generalSettings['general_twitter']->first()->value ?? ''}}" class="form-control k-form-input input-icon" type="text" placeholder="رابط تويتر" data-validation="req">
                                    <i class="bx bx bxl-twitter form-input-icon text-info"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">اليوتيوب</label>
                                <div class="position-relative">
                                    <input name="general_youtube[value]" value="{{$generalSettings['general_youtube']->first()->value ?? ''}}" class="form-control k-form-input input-icon" type="text" placeholder="رايط اليوتيوب" data-validation="req">
                                    <i class="bx bx bxl-youtube form-input-icon text-danger"></i>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">انستجرام</label>
                                <div class="position-relative">
                                    <input name="general_instagram[value]" value="{{$generalSettings['general_instagram']->first()->value ?? ''}}" class="form-control k-form-input input-icon" type="text" placeholder="رايط انستجرام" data-validation="req">
                                    <i class="bx bx bxl-instagram form-input-icon text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-header">
                    <img class="img-fluid" src="{{asset('back/assets/images/ofCourse-images/shape-1.png')}}" width="10px" height="10px" data-validation="req">
                    <h6 class="form-main-title"> إعدادت المظهـر </h6>
                    <div class="form-header-line"></div>
                </div>
                <div class="form-content container">
                    <div class="row">
                        <div class="col-lg-4 mb-5">
                            <div>
                                <label class="form-label">شعار الموقع</label>
                                @isset($generalSettings['general_logo'])
                                    <p><img width="70" src="{{ generalSetting('general_logo', 'value') }}"></p>
                                @endisset
                                <div class="position-relative">
                                    <div class="uploadFileLayout p-2">
                                        <button class="btn btn-sm btn-secondary">اختر ملف</button>
                                        <h6 class="m-0 mx-3">لم يتم اختيار صورة</h6>
                                    </div>
                                    <input name="general_logo[value]"  class="form-control k-form-input" type="file" data-validation="req">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-5">
                            <div>
                                <label class="form-label">@lang('translation.logo_white')</label>
                                @isset($generalSettings['general_logo_white'])
                                    <p><img width="70" src="{{ generalSetting('general_logo_white', 'value') }}"></p>
                                @endisset
                                <div class="position-relative">
                                    <div class="uploadFileLayout p-2">
                                        <button class="btn btn-sm btn-secondary">@lang('crud.choose') @lang('translation.file')</button>
                                        <h6 class="m-0 mx-3">@lang('translation.no_image_selected')</h6>
                                    </div>
                                    <input name="general_logo_white[value]"  class="form-control k-form-input" type="file" data-validation="req">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-5">
                            <div>
                                <label class="form-label">Favicon</label>
                                @isset($generalSettings['general_favicon'])
                                    <p><img width="70" src="{{ generalSetting('general_favicon', 'value') }}"></p>
                                @endisset
                                <div class="position-relative">
                                    <div class="uploadFileLayout p-2">
                                        <button class="btn btn-sm btn-secondary">اختر ملف</button>
                                        <h6 class="m-0 mx-3">لم يتم اختيار صورة</h6>
                                    </div>
                                    <input name="general_favicon[value]"  class="form-control k-form-input" type="file" data-validation="req">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-header">
                    <img class="img-fluid" src="{{asset('back/assets/images/ofCourse-images/shape-1.png')}}" width="10px" height="10px">
                    <h6 class="form-main-title"> إعدادات بوابة الدفع</h6>
                    <div class="form-header-line"></div>
                </div>
                <div class="form-content container">
                    <div class="row">
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">بوابة الدفع</label>
                                <input name="general_payment_name[value]" value="{{$generalSettings['general_payment_name']->first()->value ?? ''}}" class="form-control k-form-input" type="text" placeholder="اسم الموقع" data-validation="req">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">مفتاح العميل</label>
                                <input name="general_payment_key[value]" value="{{$generalSettings['general_payment_key']->first()->value ?? ''}}" class="form-control k-form-input" type="text" placeholder="مفتاح العميل" data-validation="req">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-5">
                            <div>
                                <label class="form-label d-block">خدمــات الدفع المتاحة</label>
                                <div class="form-check form-check-right">
                                    <input class="form-check-input" value="true" name="general_payment_credit[value]" {{$generalSettings['general_payment_credit']->first()->value ? 'checked' : ''}} type="checkbox" id="formCheckRight2">
                                    <label class="form-check-label" for="formCheckRight2">
                                        Credit Card
                                    </label>
                                </div>
                                <div class="form-check form-check-right">
                                    <input class="form-check-input" value="true" name="general_payment_transfer[value]" {{$generalSettings['general_payment_transfer']->first()->value ? 'checked' : ''}} type="checkbox" id="formCheckRight1">
                                    <label class="form-check-label" for="formCheckRight1">
                                        حوالة بنكية
                                    </label>
                                </div>
                                <div class="form-check form-check-right">
                                    <input class="form-check-input" name="general_payment_paypal[value]" {{$generalSettings['general_payment_paypal']->first()->value ? 'checked' : ''}} type="checkbox" id="formCheckRight3">
                                    <label class="form-check-label" for="formCheckRight3">
                                        Paypal
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-header">
                    <img class="img-fluid" src="{{asset('back/assets/images/ofCourse-images/shape-1.png')}}" width="10px" height="10px">
                    <h6 class="form-main-title"> إعدادات البريد الإلكتروني SMTP</h6>
                    <div class="form-header-line"></div>
                </div>
                <div class="form-content container">
                    <div class="row">
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">SMTP Username</label>
                                <input name="general_smtp_username[value]" value="{{$generalSettings['general_smtp_username']->first()->value ?? ''}}" class="form-control k-form-input" type="text" placeholder="SMTP Username" data-validation="req">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">SMTP Password</label>
                                <input name="general_smtp_password[value]" value="{{$generalSettings['general_smtp_password']->first()->value ?? ''}}" class="form-control k-form-input" type="text" placeholder="SMTP Password" data-validation="req">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">SMTP Host</label>
                                <input name="general_smtp_host[value]" value="{{$generalSettings['general_smtp_host']->first()->value ?? ''}}" class="form-control k-form-input" type="text" placeholder="SMTP Host" data-validation="req">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label"> SMTP Port</label>
                                <input name="general_smtp_port[value]" value="{{$generalSettings['general_smtp_port']->first()->value ?? ''}}" class="form-control k-form-input" type="text" placeholder=" SMTP Port" data-validation="req">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-header">
                    <img class="img-fluid" src="{{asset('back/assets/images/ofCourse-images/shape-1.png')}}" width="10px" height="10px">
                    <h6 class="form-main-title"> إعدادات بوابة رسائل الجوال SMS</h6>
                    <div class="form-header-line"></div>
                </div>
                <div class="form-content container">
                    <div class="row">
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">اسم الخدمة المربوط بها</label>
                                <input name="general_sms_name[value]" value="{{$generalSettings['general_sms_name']->first()->value ?? ''}}" class="form-control k-form-input" type="text" placeholder="اسم الخدمة المربوط بها" data-validation="req">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">مفتاح API Key</label>
                                <input name="general_sms_key[value]" value="{{$generalSettings['general_sms_key']->first()->value ?? ''}}" class="form-control k-form-input" type="text" placeholder="مفتاح API Key" data-validation="req">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-header">
                    <img class="img-fluid" src="{{asset('back/assets/images/ofCourse-images/shape-1.png')}}" width="10px" height="10px">
                    <h6 class="form-main-title"> إعدادات تحميل التطبيق</h6>
                    <div class="form-header-line"></div>
                </div>
                <div class="form-content container">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="general_app_store_link" class="form-label me-0">@lang('translation.general_app_store_link')</label>
                                <input
                                    id="general_app_store_link"
                                    name="general_app_store_link[value]"
                                    value="{{ old('general_app_store_link.value', optional($generalSettings['general_app_store_link'] ?? '')->first()->value ?? '') }}"
                                    class="form-control k-form-input @error('general_app_store_link.value') is-invalid @enderror"
                                    type="url"
                                    placeholder="@lang('translation.general_app_store_link')"
                                    data-validation="req"
                                >
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="general_play_store_link" class="form-label me-0">@lang('translation.general_play_store_link')</label>
                                <input
                                    id="general_play_store_link"
                                    name="general_play_store_link[value]"
                                    value="{{ old('general_play_store_link.value', optional($generalSettings['general_play_store_link'] ?? '')->first()->value ?? '') }}"
                                    class="form-control k-form-input @error('general_play_store_link.value') is-invalid @enderror"
                                    type="url"
                                    placeholder="@lang('translation.general_play_store_link')"
                                    data-validation="req"
                                >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-header">
                    <img class="img-fluid" src="{{asset('back/assets/images/ofCourse-images/shape-1.png')}}" width="10px" height="10px">
                    <h6 class="form-main-title">أخرى</h6>
                    <div class="form-header-line"></div>
                </div>
                <div class="form-content container">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div>
                                <label class="form-label">Google Tag Manager ID</label>
                                <input name="general_google_tag_id[value]" value="{{$generalSettings['general_google_tag_id']->first()->value ?? ''}}" class="form-control k-form-input" type="text" placeholder="Google Tag Manager ID" data-validation="req">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div>
                                <label class="form-label">رسالة تنبيه تظهر بأعلى الموقع</label>
                                <input name="general_notification_message_header[value]" value="{{$generalSettings['general_notification_message_header']->first()->value ?? ''}}" class="form-control k-form-input" type="text" placeholder="رسالة تنبيه تظهر بأعلى الموقع" data-validation="req">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="general_snap_pixel" class="form-label me-0">Snap Pixel</label>
                                <textarea
                                    rows="6"
                                    id="general_snap_pixel"
                                    name="general_snap_pixel[value]"
                                    class="form-control k-form-input"
                                    placeholder="Snap Pixel"
                                    data-validation="req"
                                >{{ $generalSettings['general_snap_pixel']->first()->value ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div>
                                <label for="general_tiktok_pixel" class="form-label me-0">Tiktok Pixel</label>
                                <textarea
                                    rows="6"
                                    id="general_tiktok_pixel"
                                    name="general_tiktok_pixel[value]"
                                    class="form-control k-form-input"
                                    placeholder="Tiktok Pixel"
                                    data-validation="req"
                                >{{ $generalSettings['general_tiktok_pixel']->first()->value ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-5">
                            <div>
                                <label class="form-label">نوع reCaptcha</label>
                                <div>
                                    <div class="form-check form-radio-primary mb-3">
                                        <input class="form-check-input" type="radio" name="general_recaptcha[value]" value="google" {{$generalSettings['general_recaptcha']->first()->value == 'google' ? 'checked' : ''}} id="formRadioColor1" >
                                        <label   class="form-check-label" for="formRadioColor1">
                                            Google reCaptcha App Key
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-primary mb-3">
                                        <input class="form-check-input" type="radio" name="general_recaptcha[value]" value="invisibile" {{$generalSettings['general_recaptcha']->first()->value == 'invisibile' ? 'checked' : ''}} id="formRadioColor2">
                                        <label class="form-check-label" for="formRadioColor2">
                                            Invisibile reCaptcha
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-primary mb-3">
                                        <input class="form-check-input" type="radio" name="general_recaptcha[value]" value="android" {{$generalSettings['general_recaptcha']->first()->value == 'android' ? 'checked' : ''}} id="formRadioColor3">
                                        <label class="form-check-label" for="formRadioColor3">
                                            reCaptcha android
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-end">
                            <button type="submit" class="btn btn-light waves-effect waves-light form-btn px-5">تحديث البيانات </button>
                        </div>
                    </div>
                </div>

            </form>

            <!-- Shifts Modal -->
            @include('dashboard.page.setting.components.modals.shifts', ['settings' => $shiftSettings])

            <!-- Notifications Modal -->
            @include('dashboard.page.setting.components.modals.notifications', ['settings' => $notificationSettings])

            <!-- Splash Modal -->
            @include('dashboard.page.setting.components.modals.splash', ['settings' => $splashSettings])

        </div>
    </div>
    <!-- End Page-content -->
@endsection


@section('js')
    <script>
        var Fragment = window.location.hash.substring(1);
        if(Fragment) {
            var myModal = new bootstrap.Modal(document.getElementById(Fragment), {});
            document.onreadystatechange = function () {
                myModal.show();
            };

            history.replaceState(null, null, ' ');
        }

    </script>
@endsection
