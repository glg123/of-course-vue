@php $titlePage = __('translation.privacy_policy'); @endphp

@extends('front.layouts.master')

@section('title', $titlePage)

@section('content')
    @component('front.components.breadcrumb')
        @slot('title', $titlePage)
    @endcomponent

    <div class="container py-5 min-vh-100">
        <div class="row justify-content-center">
            <div class="col-lg-9 text-center fw-bolder">
                <div class="py-2 lh-lg">
                    {!! $privacy->value !!}
                </div>
            </div>
        </div>
    </div>
@endsection
