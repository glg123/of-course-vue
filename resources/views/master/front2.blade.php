
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('back/build/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('back/build/css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('back/build/style.css') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">

    <title>OF Course</title>
  </head>
<!-- Body-->
<body>

<!-- Header -->
<header class="container py-4 header">
        <div class="row">
            <div class="col d-flex align-items-center justify-content-between">
                <div class="lang">
                    {{-- <button class="btn rounded-pill border-0 d-flex align-items-center flex-row-reverse" type="button">
                        <img src="{{ asset('back/build/img/en.svg') }}" alt=""> <span class="fw-bold me-2 d-none d-lg-flex">EN</span>
                    </button> --}}
                </div>
                <div class="d-none d-lg-flex">
                    <ul class="d-flex align-items-center list-unstyled center-menu">
                        {{-- <li><a href="{{url('/')}}">الرئيسية</a></li> --}}
                        {{-- <li><a href="#">قائـمة الطعــام</a></li> --}}
                        <li><a href="{{url('/')}}"><img src="{{ asset('back/build/img/logo.svg') }}" alt=""></a></li>
                        {{-- <li><a href="#">أخصــائي التغذيـة</a></li> --}}
                        {{-- <li><a href="#">المشاهـير</a></li> --}}
                    </ul>
                </div>
                <div class="d-flex d-lg-none">
                    <img src="{{ asset('back/build/img/logo.svg') }}" alt=""></a>
                </div>

                <div class="d-none d-lg-block order-lg-3">
                    @if(!auth()->check())
                    <h6 class="ml-3"> انضـــم إلينـــا الآن </h6>
                    <div class="d-flex align-items-center">
                        <a href="{{route('user.login')}}"> دخـول   </a>
                        <span class="mx-1">/</span>
                        <a href="{{route('user.register')}}"> انشاء حساب </a>
                    </div>
                    @else
                    <h6 class="ml-3"> اهلا </h6>
                    <div class="d-flex align-items-center">
                        <a href="{{route('user.dashboard')}}"> {{auth()->user()->displayName()}}   </a>
                    </div>
                    @endif

                </div>
                <div class="d-flex d-lg-none user">
                    <button class="btn rounded-pill border-0 d-flex align-items-center flex-row-reverse" type="button">
                        <img src="{{ asset('back/build/img/en.svg') }}" alt=""> <span class="fw-bold me-2 d-none d-lg-flex">EN</span>
                    </button>
                </div>
            </div>
        </div>
</header>

@include('dashboard.incudes.alert')

@yield('content')


<footer class="text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="d-flex align-items-center flex-column flex-lg-row">
                        <img src="{{ asset('back/build/img/logo-footer.svg') }}" alt="">
                        <div class="border-right ps-4 ms-4 mt-4 mt-lg-0">
                            <p class="mb-0 fw-normal lh-base">نهتم بتقديم أنظمة غذائية صحية تحت إشراف نخبة من الأخصائيين الصحيين المختصين في مجال الأنظمة الغذائية</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center ">
                    {{-- <div class="d-flex align-items-center justify-content-between w-100 dw-app rounded-3 px-4 py-4 mt-4 mt-lg-0 flex-column flex-lg-row">
                        <h6 class="fw-bold mb-4 mb-lg-0">يمكنك تحميل التطبيق الخاص بنا</h6>
                        <div class="d-flex align-items-center">
                            <a href="#" class="me-2">
                                <img src="{{ asset('back/build/img/google-play.png') }}" alt="">
                            </a>
                            <a href="#">
                                <img src="{{ asset('back/build/img/app-store.png') }}" alt="">
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="row py-3">
                <div class="col-lg-6 col-md-12">
                    <ul class="m-0 p-0 list-unstyled d-flex footer-links justify-content-center justify-content-lg-start mb-3 mb-lg-0 flex-column flex-lg-row">
                        <li><a href="{{url('/')}}">الرئيسية</a></li>
                        {{-- @foreach($pages as $page)
                        <li><a href="{{route('front.page',$page->slug)}}">{{$page->title}}</a></li>
                        @endforeach --}}
                    </ul>
                </div>



                <div class="col-lg-6 col-md-12">
                    <ul class="m-0 p-0 list-unstyled d-flex footer-contact justify-content-center justify-content-lg-start flex-column text-center text-lg-start flex-lg-row">
                        {{-- <li>
                            <a href="mailto:{{$general_settings->footer_email ?? ''}}" class="d-flex align-items-center">
                                <img src="{{ asset('back/build/img/email.svg') }}" alt="">
                                <span class="text-white ms-2 ps-2">{{$general_settings->footer_email ?? ''}}</span>
                            </a>
                        </li>
                        <li>
                            <a  class="d-flex align-items-center">
                                <img src="{{ asset('back/build/img/call.svg') }}" alt="">
                                <span class="ltr text-white ms-2 ps-2">{{$general_settings->footer_phone}}</span>
                            </a>
                        </li>
                        <li>
                            <a  class="d-flex align-items-center">
                                <img src="{{ asset('back/build/img/whats.svg') }}" alt="">
                                <span class="ltr text-white ms-2 ps-2">{{$general_settings->footer_address}}</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-5 order-1 order-lg-0">
                    {{-- <p class="mb-0 text-center text-lg-start mt-4 mt-lg-0">{{ $general_settings->copy_right }}</p> --}}
                </div>
                <div class="col-lg-7 d-flex align-items-center justify-content-between order-0 order-lg-1 flex-column flex-lg-row">
                    <ul class="m-0 p-0 list-unstyled d-flex footer-links mb-4 mb-lg-0">
                        <li>
                            {{-- <a href="{{route('front.page','terms')}}">الشروط والأحكــام</a> --}}
                        </li>
                        <li>
                            {{-- <a href="{{route('front.page','privacy-policy')}}">سياسـة الخصوصيـة</a> --}}
                        </li>
                    </ul>

                    <ul class="m-0 p-0 list-unstyled d-flex align-items-center footer-social">
                        {{-- @php
                        $links = json_decode($general_settings->social_link, true)['links'];
                        $icons = json_decode($general_settings->social_link, true)['icons'];
                    @endphp
                    @foreach ($links as $link_key => $link)
                        <li>
                            <a href="{{ $link }}" data-icon="{{ $icons[$link_key] }}"  class="d-flex align-items-center justify-content-center rounded-pill">
                                <i class="{{$icons[$link_key]}}"></i>
                            </a>
                        </li>
                    @endforeach --}}

                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- JS -->
    <script src="{{ asset('back/build/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper(".swiper", {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-b-next',
                prevEl: '.swiper-b-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1600: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            }
        });
    </script>
</body>
</html>
