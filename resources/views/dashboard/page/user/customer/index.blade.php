@extends('dashboard.layouts.master')
@section('sidebar')
    @include('dashboard.incudes.back.sales_sidebar')
@endsection


@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'SAlES'])
    @include('dashboard.incudes.alert')

    <div class="page-content">

        <div class="page-card container p-4">
            <div class="container">
                <div class="row justify-content-between align-items-center">

                    @if (request('type') != 'not_verified')
                        <div class="col-12 col-lg-3">
                            <h1 class="page-main-title"> {{__('views.all_customers')}} </h1>
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="page-card-btn-groub">
                                <a href="{{ route('customer.otp') }}" type="button"
                                    class="btn btn-gray waves-effect waves-light d-flex align-items-center"> <i
                                        class="bx bx-mobile-alt font-size-22 mx-2"></i> <span>{{__('views.all_customers_otp')}}</span>
                                </a>
                                <a href="{{ route('customer.create') }}" type="button"
                                    class="btn btn-gray waves-effect waves-light d-flex align-items-center"> <i
                                        class="bx bx-plus-circle font-size-22 mx-2"></i> <span>{{__('views.add_new')}}</span> </a>

                            </div>
                        </div>
                    @else
                        <div class="col-12 col-lg-3">
                            <h1 class="page-main-title"> {{__('views.not_active')}} </h1>
                        </div>
                    @endif


                    <div class="col-12 mt-3">
                        <form action="{{ route('customer.index') }}">
                            <div class="form-content container py-3 filter-box">
                                <div class="row align-items-end justify-content-end">
                                    <input name="type" type="hidden" value="{{ request('type') }}">

                                    <div class="col-lg-3 mb-3 mb-lg-0">
                                        <div>
                                            <label class="form-label">{{__('views.search')}}</label>
                                            <input name="q" class="form-control" placeholder="{{__('views.search')}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 mb-3 mb-lg-0">
                                        <div>
                                            <label class="form-label">{{__('views.customer_categories')}}</label>
                                            <select name="tag_id" class="form-control">
                                                <option value=""> -- {{__('views.select')}} -- </option>
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}"> {{ $tag->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 mb-3 mb-lg-0">
                                        <div>
                                            <label class="form-label">{{__('views.area')}}</label>
                                            <select name="area_id" class="form-control">
                                                <option value=""> -- {{__('views.select')}} -- </option>
                                                @foreach ($areas as $area)
                                                    <option value="{{ $area->id }}"> {{ $area->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 mb-3 mb-lg-0">
                                        <div>
                                            <label class="form-label">{{__('views.block')}}</label>
                                            <select name="block_id" class="form-control">
                                                <option value=""> -- {{__('views.select')}} -- </option>
                                                @foreach ($blocks as $block)
                                                    <option value="{{ $block->id }}"> {{ $block->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 text-start mt-0 mt-lg-3">
                                        <button type="submit"
                                            class="btn btn-light waves-effect waves-light form-btn px-5 d-flex"> <i
                                                class="dripicons-retweet mx-2  font-size-16"></i>{{__('views.reset')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="table-title-container">
                            <h3 class="table-title"> {{__('views.customers')}} </h3>
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
                                    <label class="form-label">{{__('views.start_at')}}</label>
                                    <div class="position-relative">
                                        <div class="pickDateLayout p-2">
                                            <h5 class="m-0 mt-1 mx-3">{{__('views.day - month - year')}}</h5>
                                            <h5 class="m-0 mt-1 mx-3"> <i class="dripicons-calendar"></i></h5>
                                        </div>
                                        <input class="form-control" type="date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-3">
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
                                <button type="button" class="btn btn-primary waves-effect waves-light form-btn px-5">@lang('crud.export')</button>
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
