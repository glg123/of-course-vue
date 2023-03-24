@php $titlePage = __('translation.login'); @endphp

@extends('front.auth.master')

@section('title', $titlePage)

@section('content')
    <div class="mb-4">
        <h4 class="mb-2">تسجيل الدخول</h4>
        <p>سجل الدخول الى حسابك وتمتع بجميع مميزات الموقع</p>
    </div>

    <form action="">
        <div class="mb-4">
            <label for="inputmobile" class="form-label">رقم الهـــاتف</label>
            <input type="tel" class="form-control text-start shadow-none" id="inputmobile" placeholder="رقم الهــاتف">
        </div>
        <div class="mb-4">
            <label for="inputpassword" class="form-label">كلمـة الســـر</label>
            <input type="password" class="form-control shadow-none" id="inputpassword" placeholder="كلمـة الســـر">
        </div>
        <div class="mb-4 text-end">
            <a href="{{ route('front.password.forgot') }}" class="text-decoration-underline">نسيت كلمة المرور؟</a>
        </div>
        <div class="mb-4 text-end">
{{--            <input type="submit" value="دخــول" class="btn btn-of fw-bold w-100 border-0">--}}
            <a href="{{ route('front.home') }}" class="btn btn-of fw-bold w-100 border-0">دخــول</a>
        </div>
        <div class="text-center">
            انا مستخدم جديد.. <a href="{{ route('front.register') }}" class="text-purple">انشــاء حساب جديد</a>
        </div>
    </form>
@endsection
