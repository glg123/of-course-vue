@extends('master.front-auth')
@section('title')
    {{__('Login')}}
@endsection
@section('content')

<div class="form-box py-3 py-lg-5">
        <div class="container">
            <div class="row min-vh-100 align-items-center justify-content-center">
                <div class="col-md-12 col-lg-4">

                    @include('dashboard.incudes.alert')

                    <div class="bg-white p-4 rounded-4">

                        <div class="text-center mb-5">
                            <img src="{{ asset('assets/front/build/img/logo.svg') }}" alt="">
                        </div>
                        <div class="mb-4">
                            <h4 class="mb-2">أدخل 4 أرقام المرسلة على هاتفك</h4>
                            <p>تم إرسال رسالة على رقمك المسجل مكونة من 4 أرقــام يمكنك استخدامها لتأكيد حسابك</p>
                        </div>

                        <form action="{{route('user.attempVerify')}}" method="POST" >
                            @csrf
                            <div class="mb-4">
                                
                                <div class="otp-form d-flex gap-3 gap-sm-4 flex-row-reverse">
                                    <input required class="otp-field form-control shadow-none" type="text" name="opt-field[]" maxlength=1>
                                    <input required class="otp-field form-control shadow-none" type="text" name="opt-field[]" maxlength=1>
                                    <input required class="otp-field form-control shadow-none" type="text" name="opt-field[]" maxlength=1>
                                    <input required class="otp-field form-control shadow-none" type="text" name="opt-field[]" maxlength=1>

                                    <input class="otp-value" required type="hidden" name="value">
                                    <input type="hidden" name="phone" value="{{$phone}}">
                                    <input type="hidden" name="type" value="{{$type}}">
                                </div>
                            </div>
                            <div class="text-end">
                                <input type="submit" value="تأكيد" class="btn btn-of fw-bold w-100 border-0">
                            </div>
                        </form>
                        @if(isset($resend_code) && $resend_code)
                            <form action="{{route('user.resend.code')}}" method="POST">
                                @csrf
                                <input type="hidden" name="phone" value="{{$phone}}">
                                <input type="hidden" name="type" value="{{$type}}">
                                <div class="mb-4 text-end">
                                    <button type="submit" class="btn btn-small btn info text-decoration-underline">اعاده ارسال الكود ؟</a>
                                </div>
                            </form>
                        @endif
                    </div>
                    <p class="mt-4 text-center">جميع الحقوق محفوظة © 2022</p>
                </div>
            </div>
        </div>
    </div>
    
@endsection
