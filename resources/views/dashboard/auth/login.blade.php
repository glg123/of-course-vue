@extends('dashboard.layouts.auth')
@section('content')
    <div class="form-box py-3 py-lg-5">
        <div class="container">
            <div class="row min-vh-100 align-items-center justify-content-center">
                <div class="col-md-12 col-lg-4">
                    @include('dashboard.incudes.alert')
                    <div class="bg-white p-4 rounded-4">
                        <div class="text-center mb-5">
                            <img src="{{ asset('back/build/logo.svg') }}" alt="">
                        </div>

                        <div class="mb-4">
                            <h4 class="mb-2">تسجيل الدخول</h4>
                        </div>

                        <form action="{{route('login.submit')}}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="inputmobile" class="form-label">رقم الهـــاتف</label>
                                <input type="tel" required name="phone" class="form-control text-start shadow-none" id="inputmobile"
                                    placeholder="رقم الهــاتف">
                            </div>
                            <div class="mb-4">
                                <label for="inputpassword" class="form-label">كلمـة الســـر</label>
                                <input type="password" required name="password" class="form-control shadow-none" id="inputpassword"
                                    placeholder="كلمـة الســـر">
                            </div>
                           
                            <div class="mb-4 text-end">
                                <input type="submit" value="دخــول" class="btn btn-of fw-bold w-100 border-0">
                            </div>
                       
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
