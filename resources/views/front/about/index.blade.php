@php $titlePage = __('translation.about_us'); @endphp

@extends('front.layouts.master')

@section('title', $titlePage)

@section('content')
    @component('front.components.breadcrumb')
        @slot('title', $titlePage)
    @endcomponent

    <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9 text-center fw-bolder">
            <div class="py-2 lh-lg">
                {!! $about->value !!}
            </div>
        </div>
    </div>
</div>
@endsection
