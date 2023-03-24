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
                    <div class="col-12 col-lg-3 offset-9">
                        <h1 class="page-main-title"> {{__('views.store')}} </h1>
                    </div>
                    <div class="col-12 col-lg-7 page-card-btn-groub-2">
                        @if (auth()->user()->can('stocks-inward-view'))
                            <a href="{{ route('food.stock.index', ['type' => 'inward']) }}" type="button"
                                class="btn btn-light waves-effect waves-light {{ request()->get('type') == 'inward' ? 'active' : '' }}">
                                {{__('views.internal_store')}} </a>
                        @endif
                        @if (auth()->user()->can('stocks-outward-view'))
                            <a href="{{ route('food.stock.index', ['type' => 'outward']) }}" type="button"
                                class="btn btn-light waves-effect waves-light {{ request()->get('type') == 'outward' ? 'active' : '' }}">
                                {{__('views.external_store')}}
                            </a>
                        @endif
                        @if (auth()->user()->can('stocks-current-view'))
                            <a href="{{ route('food.stock.index') }}" type="button"
                                class="btn btn-light waves-effect waves-light {{ !request()->get('type') ? 'active' : '' }}">
                                {{__('views.current_store')}}
                                 </a>
                        @endif

                    </div>

                    <div class="col-12 mt-3">
                        <form action="{{ route('food.stock.index') }}">
                            <input name="type" type="hidden" value="{{ request()->get('type') }}">

                            <div class="form-content container py-3 filter-box">
                                <div class="row align-items-end">

                                    <div class="col-lg-4 mt-3 mt-lg-0">
                                        <div>
                                            <label class="form-label">{{__('views.start_at')}}</label>
                                            <div class="position-relative">
                                                <div class="pickDateLayout p-2">
                                                    <h5 class="m-0 mt-1 mx-3">{{__('views.day - month - year')}}</h5>
                                                    <h5 class="m-0 mt-1 mx-3"> <i class="dripicons-calendar"></i></h5>
                                                </div>
                                                <input name="start_at" class="form-control" type="date">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 offset-1 mt-3 mt-lg-0">
                                        <div>
                                            <label class="form-label">{{__('views.end_at')}}</label>
                                            <div class="position-relative">
                                                <div class="pickDateLayout p-2">
                                                    <h5 class="m-0 mt-1 mx-3">{{__('views.day - month - year')}}</h5>
                                                    <h5 class="m-0 mt-1 mx-3"> <i class="dripicons-calendar"></i></h5>
                                                </div>
                                                <input name="end_at" class="form-control" type="date">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 text-start mt-3 mt-3 mt-lg-0">
                                        <button type="submit"
                                            class="btn btn-light waves-effect waves-light form-btn px-5"><i
                                                class="bx bx-search-alt-2 font-size-16 mx-2 mt-1"></i>{{__('views.search')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="table-title-container">
                            <h3 class="table-title"> {{__('views.store')}} </h3>
                        </div>
                        <div class="btn-group" role="group">
                            <button id="btnAction" type="button"
                                class="btn btn-primary waves-effect waves-light form-btn px-5 dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bx bxs-file-plus font-size-16 mx-2"></i> @lang('crud.export')
                            </button>
                            <ul class="dropdown-menu btn-dt-actions" aria-labelledby="btnAction">
                            </ul>
                        </div>
                    </div>

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
    <!-- End Page-content -->

    <!-- get informations modal -->
    <div class="modal fade get-info-modal" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">@lang('crud.export')</h3>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row align-items-end justify-content-center">

                            <div class="col-lg-6">
                                <div>
                                    <label class="form-label">{{__('views.start')}}</label>
                                    <div class="position-relative">
                                        <div class="pickDateLayout p-2">
                                            <h5 class="m-0 mt-1 mx-3">{{__('views.day - month - year')}}</h5>
                                            <h5 class="m-0 mt-1 mx-3"> <i class="dripicons-calendar"></i></h5>
                                        </div>
                                        <input class="form-control" type="date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div>
                                    <label class="form-label">{{__('views.end_at')}}</label>
                                    <div class="position-relative">
                                        <div class="pickDateLayout p-2">
                                            <h5 class="m-0 mt-1 mx-3">{{__('views.day - month - year')}}</h5>
                                            <h5 class="m-0 mt-1 mx-3"> <i class="dripicons-calendar"></i></h5>
                                        </div>
                                        <input class="form-control" type="date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 text-start mt-3">
                                <button type="button" class="btn btn-primary waves-effect waves-light form-btn px-5">
                                    @lang('crud.export')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
