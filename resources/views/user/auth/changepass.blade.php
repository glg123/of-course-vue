@extends('master.front-auth')

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
                    

                    <form action="{{ route('user.change.reset.password') }}" method="POST">

                        @csrf
                             <input type="hidden" name="phone" value="{{ $phone }}">
                            <div class="mb-4">
                                <label for="inputpassword" class="form-label">ادخل كلمة المرور الجديدة</label>
                                <input type="password" required name="password" class="form-control text-start shadow-none" id="inputpassword" placeholder="ادخل كلمة المرور الجديدة">
                            </div>
                            <div class="mb-4">
                                <label for="inputpassword2" class="form-label">أعد كتابة  كلمة المرور</label>
                                <input type="password" required name="password_confirmation" class="form-control shadow-none" id="inputpassword2" placeholder="أعد كتابة  كلمة المرور">
                            </div>
                            <div class="mb-4 text-end">
                                <input type="submit" value="تأكيــد كلمة المرور" class="btn btn-of fw-bold w-100 border-0">
                            </div>



                    </form>

                </div>
                <p class="mt-4 text-center">جميع الحقوق محفوظة © 2022</p>
            </div>
        </div>
    </div>
</div>

@endsection
