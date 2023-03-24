@php $titlePage = __('translation.forgot_password'); @endphp

@extends('front.auth.master')

@section('title', $titlePage)

@section('content')
    <div class="mb-4">
        <h4 class="mb-2">نسيت كلمة المرور !!</h4>
        <p>ادخل رقم الهاتف المسجل على الموقع لإعادة تعيين كلمة المرور</p>
    </div>

    <form action="">
        <div class="mb-4">
            <label for="inputmobile-1" class="form-label">رقم الهـــاتف</label>
            <input type="tel" class="form-control text-start shadow-none" id="inputmobile-1" placeholder="رقم الهــاتف">
        </div>
        <div class="mb-4 text-end">
{{--            <input type="submit" value="تأكيد" class="btn btn-of fw-bold w-100 border-0">--}}
            <a href="{{ route('front.otp') }}" class="btn btn-of fw-bold w-100 border-0">تأكيد</a>
        </div>
        <div class="text-center">
            استخدم البريد الإلكتروني لإستعادة كلمة المرور
        </div>
    </form>
@endsection
