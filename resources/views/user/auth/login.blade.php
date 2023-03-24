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
                            <h4 class="mb-2">تسجيل الدخول</h4>
                            <p>سجل الدخول الى حسابك وتمتع بجميع مميزات الموقع</p>
                        </div>

                        <form action="{{route('user.login.submit')}}" method="post">
                            @csrf
                            <div class="mb-4">
                                <label for="inputmobile" class="form-label">رقم الهـــاتف</label>
                                <input type="tel" name="phone" class="form-control text-start shadow-none" id="inputmobile" placeholder="رقم الهــاتف">
                            </div>
                            <div class="mb-4">
                                <label for="inputpassword" class="form-label">كلمـة الســـر</label>
                                <input type="password" name="login_password" class="form-control shadow-none" id="inputpassword" placeholder="كلمـة الســـر">
                            </div>
                            <div class="mb-4 text-end">
                                <a href="{{route('user.forgot')}}" class="text-decoration-underline">نسيت كلمة المرور؟</a>
                            </div>
                            <div class="mb-4 text-end">
                                <input type="submit" value="دخــول" class="btn btn-of fw-bold w-100 border-0">
                            </div>
                            <div class="text-center">
                                انا مستخدم جديد.. <a href="{{route('user.register')}}" class="text-purple">انشــاء حساب جديد</a>
                            </div>
                        </form>
                    </div>
                    <p class="mt-4 text-center">جميع الحقوق محفوظة © 2022</p>
                </div>
            </div>
        </div>
    </div>
    
@endsection
