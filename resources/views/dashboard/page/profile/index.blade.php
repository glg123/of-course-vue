@extends('dashboard.layouts.master')
@section('sidebar')
    @include('dashboard.incudes.back.setting_sidebar')
@endsection

@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'SETTING'])

    <div class="page-content">
        <div class="container">
            <div class="row">
                @include('dashboard.incudes.alert')
            </div>
        </div>

        <div class="page-card container p-4">
            <h1 class="page-main-title mb-4"> الملف الشخصي </h1>
            <form id="form-1" method="POST" action="{{ route('profile.update') }}">
                @csrf
                <div class="form-header">
                    <img class="img-fluid" src="{{ asset('back/assets/images/ofCourse-images/shape-1.png') }}" width="10px"
                        height="10px">
                    <h6 class="form-main-title"> بيانات الملف الشخصي </h6>
                    <div class="form-header-line"></div>
                </div>
                <div class="form-content container">
                    <div class="row">
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">الإســـم الأول</label>
                                <input value="{{ auth()->user()->first_name }}" class="form-control k-form-input"
                                    name="first_name" type="text" placeholder="الإســـم الأول" data-validation="req">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">الإســـم الأخير</label>
                                <input value="{{ auth()->user()->last_name }}" class="form-control k-form-input"
                                    name="last_name" type="text" placeholder="الإســـم الأخير" data-validation="req">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">البريد الإلكتـــروني</label>
                                <input value="{{ auth()->user()->email }}" class="form-control k-form-input" name="email"
                                    type="text" placeholder="البريد الإلكتـــروني" data-validation="req">
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">رقــم الهـــاتف</label>
                                <input value="{{ auth()->user()->phone }}" class="form-control k-form-input" name="phone"
                                    type="text" placeholder="رقــم الهـــاتف" data-validation="req">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-content container mt-4">
                    <div class="row">
                        <div class="col-lg-12 text-end">
                            <button type="submit" class="btn btn-light waves-effect waves-light form-btn px-5">@lang('translation.update_personal_data')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="page-card container p-4">
            <form id="form-2" method="POST" action="{{ route('password.update') }}">
                @csrf

                <div class="form-header">
                    <img class="img-fluid" src="{{ asset('back/assets/images/ofCourse-images/shape-1.png') }}"
                        height="10px">
                    <h6 class="form-main-title"> تغيير كلمة المرور </h6>
                    <div class="form-header-line"></div>
                </div>

                <div class="form-content container">
                    <div class="row">
                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">كلمة المرور</label>
                                <div class="input-group auth-pass-inputgroup">
                                    <input type="password" name="password" class="form-control k-form-input" name="password"
                                        placeholder="كلمة المرور" aria-label="Password" aria-describedby="password-addon"
                                        data-validation="req min-4">
                                    <button class="btn btn-light " type="button" id="password-addon"><i
                                            class="mdi mdi-eye-outline"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <div>
                                <label class="form-label">تأكيد كلمة المرور </label>
                                <div class="input-group auth-pass-inputgroup">
                                    <input type="password" name="password_confirmation" class="form-control k-form-input"
                                        name="password2" placeholder="تأكيد كلمة المرور " aria-label="Password"
                                        aria-describedby="password-addon" data-validation="req min-4">
                                    <button class="btn btn-light" type="button" id="password-addon"><i
                                            class="mdi mdi-eye-outline"></i></button>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-lg-6 mb-5">
                                <div>
                                    <label class="form-label">حدد الفترة</label>
                                    <select class="form-control k-form-input" data-validation="req">
                                        <option value=""> -- حدد الفترة -- </option>
                                    </select>
                                </div>
                            </div> --}}
                    </div>
                </div>


                <div class="form-content container mt-4">
                    <div class="row">
                        <div class="col-lg-12 text-end">
                            <button type="submit" class="btn btn-light waves-effect waves-light form-btn px-5">@lang('translation.password_update')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Page-content -->
@endsection
