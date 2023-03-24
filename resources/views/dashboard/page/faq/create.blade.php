@extends('dashboard.layouts.master')

@section('sidebar')
    @include('dashboard.incudes.back.setting_sidebar')
@endsection

@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'SETTING'])

    <div class="page-content">

        <!-- Flash Message -->
        <div class="container">
            <div class="row">
                @include('dashboard.incudes.alert')
            </div>
        </div>

        <div class="page-card container p-4">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-3">
                        <h1 class="page-main-title">{{ $titlePage }}</h1>
                    </div>


                    <form action="{{ route('faqs.store') }}" method="POST">
                        @include('dashboard.page.faq.components.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page-content -->

@endsection
