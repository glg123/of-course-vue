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
                        <h1 class="page-main-title"> {{__('views.notifications')}} </h1>
                    </div>

                    <div class="col-12 col-lg-4 page-card-btn-groub-2">
                        <button type="button" class="btn btn-primary text-white waves-effect waves-light"
                            data-bs-toggle="modal" data-bs-target=".create-notification-modal"> <i
                                class="dripicons-bell mt-2 mx-2"></i> <span>{{__('views.add_new')}} </span> </button>
                    </div>

                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="table-title-container">
                            <h3 class="table-title"> {{__('views.notifications')}} </h3>
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
                            {{-- <div class="table-responsive"> --}}

                            {!! $dataTable->table(['class' => 'table table-striped mb-0']) !!}
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Page-content -->

    <!-- get informations modal -->
    <div class="modal fade create-notification-modal" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">{{__('views.add_new')}}</h3>
                </div>
                <div class="modal-body">
                    <form action="{{ route('notifications.store') }}" method="POST">
                        @csrf
                        <div class="row align-items-end justify-content-start">

                            <div class="col-lg-12">
                                <div>
                                    <label class="form-label">{{__('views.title')}}</label>
                                    <input name="title" required class="form-control" type="text"
                                        placeholder="{{__('views.title')}}">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-4">
                                <div>
                                    <label class="form-label">{{__('views.customers')}}</label>
                                    <select id="customer_id" name="user_ids[]" class="form-control select2 select2-dropdown select2-selection--multiple" multiple>


                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-4">
                                <div>
                                    <label class="form-label">{{__('views.tags')}}</label>
                                    <select id="tag_id" name="tag_id" class="form-control select2 select2-dropdown select2-selection--multiple" multiple>

                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-9 mt-4">
                                <div>
                                    <div class="form-check form-radio-primary mb-3 ml-4 form-check-right">
                                        <input name="gender" value="male" class="form-check-input" type="radio" name="formRadioColor2"
                                            id="formRadioColor1" >
                                        <label class="form-check-label" for="formRadioColor1">
                                            {{__('views.male')}}
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-primary mb-3 mx-4 form-check-right">
                                        <input name="gender" value="femail" class="form-check-input" type="radio" name="formRadioColor2"
                                            id="formRadioColor1">
                                        <label class="form-check-label" for="formRadioColor1">
                                            {{__('views.female')}}
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-primary mb-3 mx-4 form-check-right">
                                        <input name="gender" value=""  class="form-check-input" type="radio" name="formRadioColor2"
                                            id="formRadioColor1" >
                                        <label class="form-check-label" for="formRadioColor1">
                                            {{__('views.all')}}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-check form-check-right">
                                    <input name="contain_name" value="1" class="form-check-input" type="checkbox" id="formCheckRight2" checked>
                                    <label class="form-check-label" for="formCheckRight2">
{{__('views.Include the customers name in the alert')}}
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-12 text-start mt-3">
                                <button type="submit"
                                    class="btn btn-primary waves-effect waves-light form-btn px-5">{{__('views.send')}}</button>
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
        $(document).ready(function () {

            $('#tag_id').select2({
                theme: "bootstrap-5",
                placeholder: "{{__('views.select')}}",
                allowClear: true,
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                closeOnSelect: false,
                language: "{{app()->getLocale()}}",
                dir: "rtl",
                ajax: {
                    url: "{{$select2_tag_url}}",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },

                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;

                        return {
                            results: $.map(data.data, function (item) {
                                console.log(item);
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            }),
                            pagination: {
                                more: (params.page * 30) < data.total
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) {
                    return markup;
                }, // let our custom formatter work
            });
            $('#customer_id').select2({
                theme: "bootstrap-5",
                placeholder: "{{__('views.select')}}",
                allowClear: true,
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                closeOnSelect: false,
                language: "{{app()->getLocale()}}",
                dir: "rtl",
                ajax: {
                    url: "{{$select2_customer_url}}",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },

                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;

                        return {
                            results: $.map(data.data, function (item) {
                                console.log(item);
                                return {
                                    text: item.email,
                                    id: item.id
                                }
                            }),
                            pagination: {
                                more: (params.page * 30) < data.total
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) {
                    return markup;
                }, // let our custom formatter work
            });


        });
    </script>
@endpush
