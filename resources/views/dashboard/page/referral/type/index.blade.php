@extends('dashboard.layouts.master')
@section('sidebar')
    @include('dashboard.incudes.back.sales_sidebar')
@endsection
@section('css')

@endsection
@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'SAlES'])

    @include('dashboard.incudes.alert')

    <div class="page-content">

        <div class="page-card container p-4">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-3">
                        <h1 class="page-main-title">{{__('views.referral_setting')}}</h1>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="page-card-btn-groub">
                            <button type="button"
                                    class="btn btn-light waves-effect waves-light d-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target=".add-new-one"><i
                                    class="bx bx-plus-circle mx-1"></i>
                                <span>{{__('views.add_new')}}</span></button>
                        </div>
                    </div>

                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="table-title-container">
                            <h3 class="table-title">{{__('views.referral_table')}}</h3>
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
    <div class="modal fade add-new-one" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">{{__('views.referral_setting')}}</h3>
                </div>
                <div class="modal-body">
                    <form id="kt_form_1" method="POST" action="{{ route('referrals.type.store') }}">
                        @csrf
                        <div class="row align-items-end justify-content-start">
                            <div class="col-lg-6 mt-2">
                                <div>
                                    <label class="form-label">{{__('views.name_ar')}}</label>
                                    <input id="last_name_ar" title="{{__('views.required')}}" name="name[en]" required
                                           class="form-control" type="text"
                                           placeholder="{{__('views.name_ar')}}">
                                </div>
                            </div>
                            <div class="col-lg-6 mt-2">
                                <div>
                                    <label class="form-label">{{__('views.name_en')}}</label>
                                    <input title="{{__('views.required')}}" name="name[ar]" required
                                           class="form-control" type="text"
                                           placeholder="{{__('views.name_en')}}">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-2">
                                <div>
                                    <label class="form-label">{{__('views.reference_id')}}</label>
                                    <input title="{{__('views.required')}}"
                                        onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/[^0-9.]/g,'')"
                                        type="text" name="reference_id"
                                        class="form-control" placeholder="{{__('views.reference_id')}}">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-2">
                                <div>
                                    <label class="form-label">{{__('views.maximum_redeem_percent')}}</label>
                                    <input title="{{__('views.required')}}"
                                        onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/[^0-9.]/g,'')"
                                        type="text" name="maximum_redeem_percent"
                                        class="form-control" placeholder="{{__('views.maximum_redeem_percent')}}">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-2">
                                <div>
                                    <label class="form-label">{{__('views.maximum_redeem_amount')}}</label>
                                    <input title="{{__('views.required')}}"
                                        onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/[^0-9.]/g,'')"
                                        type="text" name="maximum_redeem_amount"
                                        class="form-control" placeholder="{{__('views.maximum_redeem_amount')}}">
                                </div>
                            </div>
                            <div class="col-lg-6 mt-2">
                                <div>
                                    <label class="form-label">{{__('views.additional_days')}}</label>
                                    <input title="{{__('views.required')}}"
                                        onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/[^0-9.]/g,'')"
                                        type="text" name="additional_days"
                                        class="form-control" placeholder="{{__('views.additional_days')}}">
                                </div>
                            </div>
                            <div class="col-lg-6 mt-2">
                                <div>
                                    <label class="form-label">{{__('views.bonus')}}</label>
                                    <input title="{{__('views.required')}}"
                                        onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/[^0-9.]/g,'')"
                                        type="text" name="bonus"
                                        class="form-control" placeholder="{{__('views.bonus')}}">
                                </div>
                            </div>
                            <div class="col-lg-6 mt-2">
                                <div>
                                    <label class="form-label">{{__('views.status')}}</label>
                                    <select  title="{{__('views.status')}}" required name="status" class="form-control">
                                        <option value=""> -- {{__('views.select')}} --</option>
                                        <option value="1"> -- {{__('views.active')}} --</option>
                                        <option value="0"> --{{__('views.not_active')}} --</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-2">
                                <div>
                                    <label class="form-label">{{__('views.packages')}}</label>
                                    <select title="{{__('views.required')}}" multiple title="{{__('views.packages')}}" required name="packages[]"
                                            class="form-select select2">
                                        <option value=""> -- {{__('views.select')}} --</option>
                                        @foreach($packages as $packagesItem)
                                            <option value="{{$packagesItem->id}}"> {{$packagesItem->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-2">
                                <div>
                                    <label class="form-label">{{__('views.packages_varient')}}</label>
                                    <select title="{{__('views.required')}}" name="package_varients[]" class="form-select select2"
                                            id="multiple-select-field" data-placeholder="{{__('views.select')}}"
                                            multiple>
                                        <option value=""> -- {{__('views.select')}} --</option>
                                        @foreach($package_varient as $package_varientItem)
                                            <option
                                                value="{{$package_varientItem->id}}"> {{$package_varientItem->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-12 mt-4 text-start">
                                <button type="submit"
                                        class="btn btn-primary btn-sm waves-effect waves-light form-btn px-5">{{__('views.add_new')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{ $dataTable->scripts() }}
    <script>
        $('.select2').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
        $('#package_varient').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });

    </script>
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
