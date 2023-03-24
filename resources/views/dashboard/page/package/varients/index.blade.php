@extends('dashboard.layouts.master')
@section('sidebar')
    @include('dashboard.incudes.back.operation_sidebar')
@endsection


@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'OPERATION'])
    @include('dashboard.incudes.alert')

    <div class="page-content">

        <div class="page-card container p-4">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-3">
                        <h1 class="page-main-title"> خطط الحزم </h1>
                    </div>
                    @if (auth()->user()->can('plan-add'))
                        <div class="col-12 col-lg-3">
                            <div class="page-card-btn-groub">
                                <a href="{{ route('package.createVarients', request('package_id')) }}"
                                    class="btn btn-light waves-effect waves-light d-flex align-items-center"> <i
                                        class="bx bx-plus-circle mx-1"></i> <span>إضافة خطه</span> </a>
                            </div>
                        </div>
                    @endif

                    <div class="col-12 table-container">
                        <div class="table-content mt-3">
                            <div class="table-responsive">
                                {!! $dataTable->table(['class' => 'table table-striped mb-0']) !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    {{ $dataTable->scripts() }}
    <script>
        $(function() {
            setTimeout(function() {
                $('.table-striped').removeClass('dataTable');
            }, 100);
        });
    </script>
@endpush
