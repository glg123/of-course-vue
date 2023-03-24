@extends('master.front')
@section('meta')
    <meta name="keywords" content="">
    <meta name="description" content="">
@endsection

@section('content')
    <div class="main-slider position-relative min-vh-100 d-flex align-items-center">
        <div class="container">
            <div class="col-lg-5 position-absolute top-0 start-0 bottom-0 d-flex align-items-center d-none d-lg-flex">
                <img src="{{ asset('back/build/img/main.png') }}" alt="">
            </div>
            <div class="w-100">
                <div class="row justify-content-end">
                    <div class="col-lg-7">
                        {{-- {!! $setting->home_details !!} --}}
                        <h2 class="display-3 fw-bold mb-4 text-center text-md-start">نساعدك على بناء حياة صحية جيدة</h2>
                        <p class="mb-5 text-center text-md-start">نقــدم إستشارات غذائية وأطباق بكميات متوازنة للأنظمة الصحية تساعد مشتركينا للوصول للهدف نهتم بتقديم أنظمة غذائية صحية تحت إشراف نخبة من الأخصائيين الصحيين المختصين</p>
                        <div class="d-flex align-items-center flex-column flex-md-row">
                            {{-- <a href="{{ $setting->home_button_link }}"
                                class="btn-of rounded-pill px-4 py-3 fw-bold d-flex align-items-center justify-content-center mb-3 mb-md-0">{{ $setting->home_button_title }}
                                <img src="build/img/arrow-left.svg" alt="" class="ms-3"></a> --}}
                            <a href="#" class="fw-bold ms-0 ms-md-3"><img src="{{ asset('back/build/img/locate.svg') }}" alt="" class="me-3 w-25"> انظــر مـا يتــم تحضيــره</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="feature mt-3 mb-5">
        <div class="in-feature">
            <div class="container">
                <div class="row mb-5">
                    <div class="col text-center">
                        <h2 class="fw-bold title-line"><span>نساعدك على بناء حياة صحية جيدة</span></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature-icon">
                            <img src="{{ asset('back/build/img/icon-1.svg') }}" alt="">
                        </div>
                        <h3 class="my-3 fw-bold">حزم صحية مناسبة لك</h3>
                        <p>اختــر الحزمــة المناسبة لك من مجموعة مميزة من الحزم الصحية التي نقدمها لك بعناية معتمدة على نظام
                            صحي</p>
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature-icon">
                            <img src="{{ asset('back/build/img/icon-2.svg') }}" alt="">
                        </div>
                        <h3 class="my-3 fw-bold">أخصــائين تغذيـة مميزين</h3>
                        <p>استعن بأخصائيين تغذية مميزين واطلب الإستشارة الصحية الخاصة بك لضمان نظام صحي متكامل</p>
                    </div>
                    <div class="col-lg-4">
                        <div class="feature-icon">
                            <img src="{{ asset('back/build/img/icon-3.svg') }}" alt="">
                        </div>
                        <h3 class="my-3 fw-bold">تحقق من روتين طعام المشاهير</h3>
                        <p>استعرض مجموعة من صور وأسماء المشاهير والمدربين الرياضيين المؤثرين واطلع على روتين الطعام الصحي
                            الخاص بهم</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5 food-menu">
        <div class="row">
            <div class="col text-center">
                <h6 class="text-purple">قائـمة الطعــام</h6>
                <h2 class="fw-bold title-line"><span>نوفر لك مجموعة مميزة من الحزم الصحية</span></h2>
            </div>
        </div>
        <div class="row">
            @foreach ($packages as $package)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="food-box bg-white overflow-hidden">
                        <div class="food-thumbnail">
                            <a href="{{ route('front.product',$package->id) }}"><img
                                    src="{{ $package->image_path ? $package->image_path : asset('assets/images/placeholder.png') }}"
                                    alt=""></a>
                        </div>
                        {{-- {{ route('front.product',$product->slug) }} --}}
                        <div class="py-4 px-4 text-center">
                            <h5 class="fw-bold"><a href="{{ route('front.product',$package->id) }}"> {{ Str::limit($package->name, 40) }}

                                </a>
                            </h5>
                            <p class="mb-4"> {!! Str::limit($package->description, 100) !!}
                            </p>
                            <a href="{{ route('front.product',$package->id) }}">عرض التفاصيل <img
                                    src="{{ asset('back/build/img/arrow-left-black.svg') }}" alt=""
                                    class="ms-2"></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center my-4">
                <a href="{{route('front.product.menu')}}"
                    class="btn-of rounded-pill px-4 py-3 fw-bold d-flex align-items-center justify-content-center">اكتشف
                    قائمة الطعام <img src="build/img/arrow-left.svg" alt="" class="ms-3"></a>
            </div>
        </div>
    </div>

    <div class="bg-white py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="ask-me position-relative pe-5 overflow-hidden">
                        <div class="row py-5 justify-content-between">
                            <div class="col-lg-8 text-center text-md-start">
                                <h3 class="h4 lh-base text-white fw-bold mb-4">طلب استشارة من إختصاصي التغذية الخاص بك</h3>
                                <p class="h6 fw-normal lh-base text-white">استعن بأخصائيين تغذية مميزين واطلب الإستشارة
                                    الصحية الخاصة بك</p>
                            </div>
                            <div
                                class="col-lg-4 d-flex align-items-end justify-content-start justify-content-lg-end mt-4 mt-lg-0 justify-content-center justify-content-md-start">
                                <div>
                                    <a style="    background: #5a5a6e;
                                    color: antiquewhite;
                                    cursor: not-allowed;"
                                        class="  rounded-pill px-4 py-3 fw-bold d-flex align-items-center justify-content-center">اطلب
                                        استشارة <img src="build/img/arrow-left.svg" alt="" class="ms-3"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="py-5">
        <div class="container py-5 food-menu">
            <div class="row">
                <div class="col text-center">
                    <h6 class="text-purple">المشاهير</h6>
                    <h2 class="fw-bold title-line"><span>تحقق من روتين طعام المشاهير لدينا</span></h2>
                </div>
            </div>
        </div>

        <!-- Slider main container -->
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="swiper-img">
                        <a href="#" class="text-center position-relative">
                            <img src="{{ asset('back/build/img/member.png') }}" alt="" class="rounded-4">
                            <div class="member-details position-absolute bg-white rounded-3 px-3 py-3">
                                <h4 class="fw-bold">د/ عبدالله القطــايبي</h4>
                                <h5 class="mb-0">مدرب شخصي</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-img">
                        <a href="#" class="text-center position-relative">
                            <img src="{{ asset('back/build/img/member.png') }}" alt=""
                                class="rounded-4">
                            <div class="member-details position-absolute bg-white rounded-3 px-3 py-3">
                                <h4 class="fw-bold">د/ عبدالله القطــايبي</h4>
                                <h5 class="mb-0">مدرب شخصي</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-img">
                        <a href="#" class="text-center position-relative">
                            <img src="{{ asset('back/build/img/member.png') }}" alt=""
                                class="rounded-4">
                            <div class="member-details position-absolute bg-white rounded-3 px-3 py-3">
                                <h4 class="fw-bold">د/ عبدالله القطــايبي</h4>
                                <h5 class="mb-0">مدرب شخصي</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-img">
                        <a href="#" class="text-center position-relative">
                            <img src="{{ asset('back/build/img/member.png') }}" alt=""
                                class="rounded-4">
                            <div class="member-details position-absolute bg-white rounded-3 px-3 py-3">
                                <h4 class="fw-bold">د/ عبدالله القطــايبي</h4>
                                <h5 class="mb-0">مدرب شخصي</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-img">
                        <a href="#" class="text-center position-relative">
                            <img src="{{ asset('back/build/img/member.png') }}" alt=""
                                class="rounded-4">
                            <div class="member-details position-absolute bg-white rounded-3 px-3 py-3">
                                <h4 class="fw-bold">د/ عبدالله القطــايبي</h4>
                                <h5 class="mb-0">مدرب شخصي</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-img">
                        <a href="#" class="text-center position-relative">
                            <img src="{{ asset('back/build/img/member.png') }}" alt=""
                                class="rounded-4">
                            <div class="member-details position-absolute bg-white rounded-3 px-3 py-3">
                                <h4 class="fw-bold">د/ عبدالله القطــايبي</h4>
                                <h5 class="mb-0">مدرب شخصي</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row py-4">
                <div class="col">
                    <div
                        class="swiper-b d-flex align-items-center flex-row-reverse justify-content-center justify-content-md-end">
                        <div class="d-flex align-items-center">
                            <div class="swiper-b-next ms-0 ms-md-4">
                                <img src="{{ asset('back/build/img/swiper-right.svg') }}" alt="">
                            </div>
                            <div class="swiper-b-prev ms-2">
                                <img src="{{ asset('back/build/img/swiper-left.svg') }}" alt="">
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <a href="#"
                        class="btn-of rounded-pill px-4 py-3 fw-bold d-flex align-items-center justify-content-center">عرض
                        جميع المشاهير <img src="build/img/arrow-left.svg" alt="" class="ms-3"></a>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
