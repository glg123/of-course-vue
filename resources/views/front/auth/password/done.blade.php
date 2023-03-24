@php $titlePage = __('translation.password_reset_successfully'); @endphp

@extends('front.auth.master')

@section('title', $titlePage)

@section('content')
    <div class="mb-4 text-center">
        <img src="{{ asset('front/build/img/done-2.svg') }}">
    </div>

    <div class="mb-5 text-center">
        <h4 class="mb-3">تم إعادة تعيين كلمة المرور بنجاح</h4>
        <p>يمكنك الآن التمتع بجميع مميزات الموقع وفي حالة واجهتك أي مشكلة يمكنك <a href="{{ route('front.contact') }}">التواصل معنا</a></p>
    </div>

    <div class="mb-4 text-end">
        <a href="{{ route('front.login') }}" class="btn btn-of fw-bold w-100 border-0">تسجيل الدخول</a>
    </div>
@endsection
