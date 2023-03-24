@php $titlePage = __('translation.confirm_account'); @endphp

@extends('front.auth.master')

@section('title', $titlePage)

@section('content')
    <div class="mb-4">
        <h4 class="mb-2">أدخل 4 أرقام المرسلة على هاتفك</h4>
        <p>تم إرسال رسالة على رقمك المسجل مكونة من 4 أرقــام يمكنك استخدامها لإستعادة كلمة المرور</p>
    </div>

    <form action="">
        <div class="mb-4">
            <div class="otp-form d-flex gap-3 gap-sm-4 flex-row-reverse">
                <input class="otp-field form-control shadow-none" type="text" name="opt-field[]" maxlength=1>
                <input class="otp-field form-control shadow-none" type="text" name="opt-field[]" maxlength=1>
                <input class="otp-field form-control shadow-none" type="text" name="opt-field[]" maxlength=1>
                <input class="otp-field form-control shadow-none" type="text" name="opt-field[]" maxlength=1>

                <input class="otp-value" type="hidden" name="opt-value">
            </div>
        </div>
        <div class="text-end">
{{--            <input type="submit" value="تأكيد" class="btn btn-of fw-bold w-100 border-0">--}}
            <a href="{{ route('front.confirmed') }}" class="btn btn-of fw-bold w-100 border-0">تأكيد</a>
        </div>
    </form>
@endsection
