@extends('dashboard.layouts.master')
@section('sidebar')
    @include('dashboard.incudes.back.report')
@endsection


@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'REPORT'])
    @include('dashboard.incudes.alert')


    <div class="page-content">

        <div class="page-card container p-4">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-6">
                        <h1 class="page-main-title"> الخطط </h1>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
    <!-- End Page-content -->
@endsection
@push('scripts')
@endpush
