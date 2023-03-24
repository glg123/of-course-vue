@php $titlePage = __('translation.account_confirmed'); @endphp

@extends('front.auth.master')

@section('title', $titlePage)

@section('content')
    <div class="mb-4 text-center">
        <img src="{{ asset('front/build/img/done.svg') }}" alt="">
    </div>
    <div class="mb-5 text-center">
        <h4 class="mb-3">تم التأكد من حسابك بنجاح</h4>
        <p>يمكنك الآن إعادة تعيين كلمة المرور الخاصة بك من جديد والتسجيل في الموقع</p>
    </div>
    <div class="mb-4 text-end">
        <a href="{{ route('front.password.reset') }}" class="btn btn-of fw-bold w-100 border-0">إعادة تعيين كلمة المرور</a>
    </div>
@endsection
