<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>الرئيسية</title>
    <meta property="og:type" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content=" " />
    <meta property="og:image" content="" />
    <meta property="og:image:width" content="" />
    <meta property="og:image:height" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content=" " />
    <meta property="og:ttl" content="" />
    <meta name="twitter:card" content="" />
    <meta name="twitter:domain" content="" />
    <meta name="twitter:site" content="" />
    <meta name="twitter:creator" content="" />
    <meta name="twitter:image:src" content="" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:title" content=" " />
    <meta name="twitter:url" content="" />
    <meta name="description" content="  " />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="copyright" content=" " />
    <meta name="csrf-token" content="{{csrf_token()}}">

</head>
<body>
<div id="app">
    <app></app>

</div>

<script src="{{ url('js/bootstrap.js') }}"></script>
<script src="{{ url('js/app.js') }}"></script>
<script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('assets/js/swiper.min.js')}}"></script>
<script src="{{url('assets/js/function.js')}}"></script>


<script>
    let button_toolbar = document.querySelector(".header-mobile__toolbar");
    let button_close = document.querySelector(".btn-close-header-mobile");
    button_toolbar.addEventListener("click", function () {
        document.querySelector(".menu--mobile").classList.add("is-active");
    });
    button_close.addEventListener("click", function () {
        document.querySelector(".menu--mobile").classList.remove("is-active");
    });
</script>


</body>
</html>
