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
                        <h1 class="page-main-title"> {{__('views.Purchases')}} </h1>
                    </div>

                    <div class="col-12 col-lg-6 page-card-btn-groub-2">
                        <a href="{{ route('food.purchase.index') }}" type="button"
                            class="btn btn-light waves-effect waves-light active">
                            {{__('views.Purchases')}} </a>
                        <a href="{{ route('food.purchase.items') }}" type="button"
                            class="btn btn-light waves-effect waves-light"> {{__('views.item_Purchases')}}</a>
                    </div>

                    @if (auth()->user()->can('purchase-add'))
                        <div class="col-12 my-4">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button fw-medium collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        <img class="img-fluid" src="assets/images/ofCourse-images/shape-1.png"
                                            width="10px" height="10px">
                                        <h5 class="form-main-title m-0 mx-3 fw-bold"> {{__('views.add_new')}} </h5>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">

                                        <form id="kt_form_1" action="{{ route('food.purchase.store') }}" method="POST">
                                            @csrf
                                        <div class="form-content container py-3">
                                            <div class="row align-items-end">

                                                <div class="col-lg-4 mb-3">
                                                    <div>
                                                        <label class="form-label">{{__('views.invoice_number')}}</label>
                                                        <input title="{{__('views.required')}}" name="invoice_id" required class="form-control"
                                                            placeholder="{{__('views.invoice_number')}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-3">
                                                    <div>
                                                        <label class="form-label">{{__('views.supplier_name')}}</label>
                                                        <input title="{{__('views.required')}}" name="supplier_name" required class="form-control"
                                                            placeholder="{{__('views.supplier_name')}}">
                                                    </div>
                                                </div>


                                                <div class="col-lg-4 mb-3">
                                                    <div>
                                                        <label class="form-label">{{__('views.Purchases_date')}}</label>
                                                        <div class="position-relative">
                                                            <div class="pickDateLayout p-2">
                                                                <h5 class="m-0 mt-1 mx-3">{{__('views.day - month - year')}}</h5>
                                                                <h5 class="m-0 mt-1 mx-3"> <i
                                                                        class="dripicons-calendar"></i>
                                                                </h5>
                                                            </div>
                                                            <input title="{{__('views.required')}}" class="form-control" name="purchase_at" required
                                                                type="date">
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="col-lg-4 mb-3">
                                                    <div>
                                                        <label class="form-label">{{__('views.food_name')}}</label>
                                                        <select id="food_id" title="{{__('views.required')}}" name="modelable_id" required class="form-control select2 select2-dropdown">
                                                            <option value="">{{__('views.select')}}</option>

                                                        </select>
                                                    </div>
                                                </div>



                                                <div class="col-lg-4 mb-3">
                                                    <div>
                                                        <label class="form-label">{{__('views.quantity')}}</label>
                                                        <input title="{{__('views.required')}}" name="qty" required type="number" class="form-control"
                                                            placeholder="{{__('views.quantity')}}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 mb-3">
                                                    <div>
                                                        <label class="form-label">{{__('views.unit_price')}}</label>
                                                        <input title="{{__('views.required')}}" name="price" required type="number" class="form-control"
                                                            placeholder="{{__('views.unit_price')}}">
                                                    </div>
                                                </div>


                                                <div class="col-lg-12 text-start mt-3">
                                                    <button type="submit"
                                                        class="btn btn-light waves-effect waves-light form-btn px-5">
                                                        {{__('views.add_new')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="table-title-container">
                            <h3 class="table-title"> {{__('views.Purchases')}} </h3>
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
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{ $dataTable->scripts() }}
    <script>
        $(document).ready(function () {

            $('#food_id').select2({
                theme: "bootstrap-5",
                placeholder: "{{__('views.select')}}",
                allowClear: true,
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                closeOnSelect: false,
                language: "{{app()->getLocale()}}",
                dir: "rtl",
                ajax: {
                    url: "{{$select2_food_url}}",
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
                                    text: item.select_tow_name,
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
