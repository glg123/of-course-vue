@php $titlePage = __('translation.menu'); @endphp

@extends('front.layouts.master')

@section('title', $titlePage)

@section('content')
    @component('front.components.breadcrumb')
        @slot('title', $titlePage)
    @endcomponent

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="banner-box py-5 px-5">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-8 text-center text-md-start">
                            <h3 class="h4 lh-base text-white fw-bold mb-0">تحقق من روتين طعام المشاهير لدينا</h3>
                        </div>
                        <div class="col-lg-4 d-flex align-items-end justify-content-start justify-content-lg-end mt-4 mt-lg-0 justify-content-center justify-content-md-start">
                            <a href="#" class="btn-of rounded-pill px-4 py-3 fw-bold d-flex align-items-center justify-content-center">اطلع على باقات المشاهير <img src="build/img/arrow-left.svg" alt="" class="ms-3"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-4 pt-lg-5">
        <div class="row">
            <div class="col">
                <form class="search-box row justify-content-center py-3 mx-auto gap-3 gap-md-0">
                    <div class="col-sm-12 col-md-8">
                        <input type="text" class="form-control text-start shadow-none" placeholder="ابحث عن حزمة تناسبك">
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <button type="submit" class="btn btn-of fw-bold w-100 border-0 h-100">بحـث</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container food-menu">
        <div class="row my-5">
            <div class="col text-center">
                <h6 class="text-purple">قائـمة الطعــام</h6>
                <h2 class="fw-bold title-line"><span>نوفر لك مجموعة مميزة من الحزم الصحية</span></h2>
            </div>
        </div>
        <div class="row my-5 gy-4">
            @foreach(range(1, 8) as $get)
                <div class="col-lg-3 col-md-6">
                    <div class="food-box bg-white overflow-hidden">
                        <div class="food-thumbnail">
                            <a href="{{ route('front.menu.details') }}"><img src="{{ asset('front') }}/build/img/food-thumbnail.png" alt=""></a>
                        </div>
                        <div class="py-4 px-4 text-center">
                            <h5 class="fw-bold"><a href="{{ route('front.menu.details') }}">دايــت بــلان</a></h5>
                            <p class="mb-4">نظام غذائي صحي يساعدك على خســارة الوزن مع المحافظة على أعلى مستويات الطاقة</p>
                            <a href="{{ route('front.menu.details') }}">عرض التفاصيل <img src="build/img/arrow-left-black.svg" alt="" class="ms-2"></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row my-5">
            <div class="col d-flex justify-content-center">
                <a href="{{ route('front.menu') }}" class="btn-of rounded-pill px-4 py-3 fw-bold d-flex align-items-center justify-content-center">اكتشف قائمة الطعام <img src="build/img/arrow-left.svg" alt="" class="ms-3"></a>
            </div>
        </div>
    </div>
@endsection
