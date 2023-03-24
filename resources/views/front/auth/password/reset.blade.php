@php $titlePage = __('translation.password_reset'); @endphp

@extends('front.auth.master')

@section('title', $titlePage)

@section('content')
    <form action="">
        <div class="mb-4">
            <label for="inputpassword" class="form-label">ادخل كلمة المرور الجديدة</label>
            <input type="tel" class="form-control text-start shadow-none" id="inputpassword" placeholder="ادخل كلمة المرور الجديدة">
        </div>
        <div class="mb-4">
            <label for="inputpassword2" class="form-label">أعد كتابة  كلمة المرور</label>
            <input type="password" class="form-control shadow-none" id="inputpassword2" placeholder="أعد كتابة  كلمة المرور">
        </div>
        <div class="mb-4 text-end">
{{--            <input type="submit" value="تأكيــد كلمة المرور" class="btn btn-of fw-bold w-100 border-0">--}}
            <a href="{{ route('front.password.done') }}" class="btn btn-of fw-bold w-100 border-0">تأكيــد كلمة المرور</a>
        </div>
    </form>
@endsection
