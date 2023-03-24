@extends('master.front-auth')
@section('title')
    {{__('register')}}
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
                            <h4 class="mb-2">مستخدم جديد</h4>
                            <!-- <p>سجل معنا عن طريق رقم هاتفك واستمتع بجميع مميزات الموقع</p> -->
                        </div>

                        <form action="{{route('user.register.submit')}}" method="post">
                            @csrf
                            <div class="mb-4">
                                <label  class="form-label">ألاسم ألاول</label>
                                <input type="text" name="first_name" required class="form-control text-start shadow-none" >
                            </div>
                            <div class="mb-4">
                                <label  class="form-label">اللقب</label>
                                <input type="text" name="last_name" required class="form-control text-start shadow-none" >
                            </div>
                            <div class="mb-4">
                                <label for="inputmobile" class="form-label">رقم الهـــاتف</label>
                                <input type="tel" name="phone" required class="form-control text-start shadow-none" id="inputmobile" placeholder="رقم الهــاتف">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">الايميل </label>
                                <input type="email" name="email" required class="form-control text-start shadow-none" id="email" placeholder=" email">
                            </div>
                            <div class="mb-4">
                                <label for="inputpassword" class="form-label">كلمـة الســـر</label>
                                <input type="password" required name="password" class="form-control shadow-none" id="inputpassword" placeholder="كلمـة الســـر">
                            </div>

                            <div class="mb-4">
                                <input type="password" required name="password_confirmation" class="form-control shadow-none" id="inputpassword" placeholder="تأكيد كلمه الســـر">
                            </div>
                       
                            <div class="mb-4 text-end">
                                <input type="submit" value="تسجيل" class="btn btn-of fw-bold w-100 border-0">
                            </div>
                        
                        </form>
                    </div>
                    <p class="mt-4 text-center">جميع الحقوق محفوظة © 2022</p>
                </div>
            </div>
        </div>
    </div>
    
@endsection
