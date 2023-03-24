@extends('master.front-auth')
@section('title')
    {{__('Password Reset')}}
@endsection
@section('content')
<!-- Page Title-->
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
                            <h4 class="mb-2">نسيت كلمة المرور !!</h4>
                            <p>ادخل رقم الهاتف المسجل على الموقع لإعادة تعيين كلمة المرور</p>
                        </div>

                        <form action="{{route('user.forgot.submit')}}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="inputmobile-1" class="form-label">رقم الهـــاتف</label>
                                <input type="tel" name="phone" class="form-control text-start shadow-none" required id="inputmobile-1" placeholder="رقم الهــاتف">
                            </div>
                            <div class="mb-4 text-end">
                                <input type="submit" value="تأكيد" class="btn btn-of fw-bold w-100 border-0">
                            </div>
                         
                        </form>
                    </div>
                    <p class="mt-4 text-center">جميع الحقوق محفوظة © 2022</p>
                </div>
            </div>
        </div>
    </div>
@endsection
