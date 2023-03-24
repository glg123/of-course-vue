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
                    <div class="col-12 col-lg-3">
                        <h1 class="page-main-title">{{__('views.offers')}}</h1>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="page-card-btn-groub">
                            @if (auth()->user()->can('offer-add'))
                                <button type="button"
                                    class="btn btn-light waves-effect waves-light d-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target=".add-new-offer"> <i
                                        class="bx bx-plus-circle mx-1"></i> <span>{{__('views.add_new')}}</span> </button>
                            @endif

                            <a href="#" type="button"
                                class="btn btn-light waves-effect waves-light d-flex align-items-center"> <i
                                    class="bx bx-file-blank mx-1"></i> <span>{{__('views.audit_log')}}</span> </a>
                        </div>
                    </div>

                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="table-title-container">
                            <h3 class="table-title">{{__('views.offers')}}</h3>
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
                            {!! $dataTable->table(['class' => 'table table-striped mb-0']) !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- End Page-content -->

    <!-- add-new-modal modal -->
    <div class="modal fade add-new-offer" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">إضـافة عرض</h3>
                </div>
                <div class="modal-body">
                    <form id="kt_form_1" action="{{ route('offers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row align-items-end justify-content-start">

                            <div class="col-lg-6">
                                <div>
                                    <label class="form-label">{{__('views.copoun')}}</label>
                                    <select title="{{__('views.required')}}" name="copoun_id" required class="form-control">
                                        <option  value=""> -- {{__('views.select')}} --</option>
                                        @foreach ($copouns as $copoun)
                                            <option value="{{ $copoun->id }}"> {{ $copoun->name . '-' . $copoun->code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="col-lg-6">
                                <div>
                                    <label class="form-label">{{__('views.image')}}</label>
                                    <div class="position-relative">
                                        <div class="uploadFileLayout p-2">
                                            <button class="btn btn-sm btn-secondary">{{__('views.file')}}</button>
                                            <h6 class="m-0 mx-3">{{__('views.not_selected')}}</h6>
                                        </div>
                                        <input name="image" class="form-control k-form-input" type="file"
                                            data-validation="req">
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 mt-4">
                                <div class="form-check form-check-right">
                                    <input name="status" value="1" class="form-check-input" type="checkbox"
                                        id="formCheckRight2" checked="">
                                    <label class="form-check-label" for="formCheckRight2">
                                        {{__('views.status')}}
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-4">
                                <div>
                                    <label class="form-label"> {{__('views.start_at')}}</label>
                                    <div class="position-relative">
                                        <div class="pickDateLayout p-2">
                                            <h5 class="m-0 mt-1 mx-3"> {{__('views.day - month - year')}}</h5>
                                            <h5 class="m-0 mt-1 mx-3"> <i class="dripicons-calendar"></i></h5>
                                        </div>
                                        <input title="{{__('views.required')}}" name="start_at" required class="form-control" type="date">
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-6 mt-4">
                                <div>
                                    <label class="form-label"> {{__('views.end_at')}}</label>
                                    <div class="position-relative">
                                        <div class="pickDateLayout p-2">
                                            <h5 class="m-0 mt-1 mx-3"> {{__('views.day - month - year')}}</h5>
                                            <h5 class="m-0 mt-1 mx-3"> <i class="dripicons-calendar"></i></h5>
                                        </div>
                                        <input title="{{__('views.required')}}" name="end_at" required class="form-control" type="date">
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-12 mt-4 text-start">
                                <button type="submit"
                                    class="btn btn-primary waves-effect waves-light form-btn px-5">{{__('views.add_new')}}</button>
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
