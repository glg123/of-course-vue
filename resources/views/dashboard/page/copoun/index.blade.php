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
                        <h1 class="page-main-title">{{__('views.copouns')}}</h1>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="page-card-btn-groub">
                            @if (auth()->user()->can('promo-code-add'))
                                <button type="button"
                                    class="btn btn-light waves-effect waves-light d-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target=".add-new-code"> <i
                                        class="bx bx-plus-circle mx-1"></i> <span>{{__('views.add_new')}}</span> </button>
                            @endif

                            <div class="btn-group" role="group">
                                <button id="btnAction" type="button"
                                    class="btn btn-primary waves-effect waves-light form-btn px-5 dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bxs-file-plus font-size-16 mx-2"></i> @lang('crud.export')
                                </button>
                                <ul class="dropdown-menu btn-dt-actions" aria-labelledby="btnAction">
                                </ul>
                            </div>

                            <a href="#" type="button"
                                class="btn btn-light waves-effect waves-light d-flex align-items-center"> <i
                                    class="bx bx-file-blank mx-1"></i> <span>{{__('views.audit_log')}}</span> </a>

                        </div>

                    </div>

                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="table-title-container">
                            <h3 class="table-title">{{__('views.copouns')}}</h3>
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

    <!-- add-new-modal modal -->
    <div class="modal fade add-new-code" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">{{__('views.add_new')}}</h3>
                </div>
                <div class="modal-body">
                    <form id="kt_form_1" action="{{ route('copouns.store') }}" method="POST">
                        @csrf
                        <div class="row align-items-end justify-content-start">

                            <div class="col-lg-12 mt-4">
                                <div>
                                    <label class="form-label">{{__('views.copoun')}}</label>
                                    <input title="{{__('views.required')}}" name="code" required class="form-control" placeholder="{{__('views.copoun')}}">
                                </div>
                            </div>
                            <div class="col-lg-6 mt-4">
                                <label class="form-label"> {{__('views.discount_type')}}</label>
                                <div>
                                    <div class="form-check form-radio-primary mb-3 mx-4 form-check-right ">
                                        <input name="discount_type" value="amount" class="form-check-input" type="radio"
                                               name="formRadioColor3" id="formRadioColor1" checked="">
                                        <label class="form-check-label" for="formRadioColor1">
                                            {{__('views.value')}}
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-primary mb-3 mx-4 form-check-right ">
                                        <input name="discount_type" value="percent" class="form-check-input" type="radio"
                                               name="formRadioColor3" id="formRadioColor2">
                                        <label class="form-check-label" for="formRadioColor2">
                                            {{__('views.percent')}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-4">
                                <div class="form-check form-radio-primary mb-3 mx-4 form-check-right">
                                    <input name="status" value="1" class="form-check-input" type="checkbox"
                                        id="formCheckRight2" checked="">
                                    <label class="form-check-label" for="formCheckRight2">
                                        {{__('views.status')}}
                                    </label>
                                </div>
                            </div>



                            <div class="col-lg-6 mt-4">
                                <div>
                                    <label class="form-label">{{__('views.discount')}}</label>
                                    <input onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/[^0-9.]/g,'')" title="{{__('views.required')}}" name="discount" required class="form-control" placeholder="{{__('views.discount')}}">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-4">
                                <div>
                                    <label class="form-label">{{__('views.total_used')}}</label>
                                    <input onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/[^0-9.]/g,'')"  title="{{__('views.required')}}" name="max_use" required type="text" class="form-control"
                                        placeholder="{{__('views.total_used')}}">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-4">
                                <div>
                                    <label class="form-label">{{__('views.start_at')}}</label>
                                    <div class="position-relative">
                                        <div class="pickDateLayout p-2">
                                            <h5 class="m-0 mt-1 mx-3">{{__('views.day - month - year')}}</h5>
                                            <h5 class="m-0 mt-1 mx-3"> <i class="dripicons-calendar"></i></h5>
                                        </div>
                                        <input title="{{__('views.required')}}" name="start_at" required class="form-control" type="date">
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-6 mt-4">
                                <div>
                                    <label class="form-label">{{__('views.end_at')}}</label>
                                    <div class="position-relative">
                                        <div class="pickDateLayout p-2">
                                            <h5 class="m-0 mt-1 mx-3">{{__('views.day - month - year')}}</h5>
                                            <h5 class="m-0 mt-1 mx-3"> <i class="dripicons-calendar"></i></h5>
                                        </div>
                                        <input title="{{__('views.required')}}" name="end_at" required class="form-control" type="date">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-4">
                                <div>
                                    <label class="form-label">{{__('views.address_ar')}}</label>
                                    <input title="{{__('views.required')}}" name="name[ar]" required class="form-control"
                                        placeholder="{{__('views.address_ar')}}">
                                </div>
                            </div>

                            <div class="col-lg-12 mt-4">
                                <div>
                                    <label class="form-label">{{__('views.address_en')}}</label>
                                    <input title="{{__('views.required')}}" name="name[en]" required class="form-control"
                                        placeholder="{{__('views.address_en')}}">
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
    <script>
        $().ready(function () {

            $("#kt_form_1").validate(
                {
                    // define validation rules
                    rules: {

                    },
                    //display error alert on form submit
                    invalidHandler: function (event, validator) {
                        var alert = $('#kt_form_1_msg');
                        alert.removeClass('kt--hide').show();
                        KTUtil.scrollTop();
                    },

                    submitHandler: function (form) {
                        form[0].submit(); // submit the form
                    }
                }
            );
        });


    </script>
@endpush
