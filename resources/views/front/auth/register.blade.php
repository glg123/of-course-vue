@php $titlePage = __('translation.create_account'); @endphp

@extends('front.auth.master')

@section('title', $titlePage)

@section('content')
    <div class="mb-4">
        <h4 class="mb-2">انشاء حساب جديد</h4>
        <p>ادخل رقم الهاتف وسيتم ارسال رمز التحقق لإنشاء الحساب الخاص بك بنجاح</p>
    </div>

    <form action="">
        <div class="mb-4">
            <label for="inputmobile" class="form-label">رقم الهـــاتف</label>
            <input type="tel" class="form-control text-start shadow-none" id="inputmobile" placeholder="رقم الهــاتف">
        </div>
        <div class="mb-4 text-end">
{{--            <input type="submit" value="ارســال كود OTP" class="btn btn-of fw-bold w-100 border-0">--}}
            <a href="{{ route('front.otp') }}" class="btn btn-of fw-bold w-100 border-0">ارســال كود OTP</a>
        </div>
        <div class="text-center">
            لدي حساب بالفعل..
            <a href="{{ route('front.login') }}" class="text-purple">تسجيل الدخول</a>
        </div>
    </form>
@endsection
