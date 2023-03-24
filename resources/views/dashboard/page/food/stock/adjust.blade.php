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
                        <h1 class="page-main-title"> {{__('views.store_settings')}} </h1>
                    </div>
                    @if (auth()->user()->can('adjust-stock-adjust'))
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
                                    <form id="kt_form_1" action="{{ route('food.adjust.store') }}" method="POST">
                                        @csrf
                                        <div class="form-content container py-3">
                                            <div class="row align-items-end">



                                                <div class="col-lg-6 mb-3">
                                                    <div>
                                                        <label class="form-label">{{__('views.date')}}</label>
                                                        <div class="position-relative">
                                                            <div class="pickDateLayout p-2">
                                                                <h5 class="m-0 mt-1 mx-3">{{__('views.day - month - year')}}</h5>
                                                                <h5 class="m-0 mt-1 mx-3"> <i
                                                                        class="dripicons-calendar"></i>
                                                                </h5>
                                                            </div>
                                                            <input title="{{__('views.required')}}" name="settings[created_at]" required class="form-control"
                                                                type="date">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-3">
                                                    <div>
                                                        <label class="form-label">{{__('views.item_name')}}</label>
                                                        <select title="{{__('views.required')}}" name="food_id" required
                                                            class="form-control food-adjust-select">
                                                            @foreach ($foods as $food)
                                                                <option value="{{ $food->id }}"
                                                                    data-stock="{{ $food->inStocks ? $food->inStocks->sum('stock') : 0 }}">
                                                                    {{ $food->name }}
                                                                    ({{ $food->code }})
                                                                </option>
                                                            @endforeach
                                                        </select>


                                                    </div>
                                                </div>

                                                <div class="col-lg-4 mb-3">
                                                    <div>
                                                        <input type="hidden" class="adjust-old-stock"
                                                            name="settings[old_stock]">
                                                        <label class="form-label">{{__('views.quantity')}}</label>
                                                        <input  name="settings[old_stock]" required disabled
                                                            class="form-control adjust-old-stock"
                                                            placeholder="{{__('views.quantity')}}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 mb-3">
                                                    <div>
                                                        <label class="form-label">{{__('views.new_quantity')}}</label>
                                                        <input title="{{__('views.required')}}" name="stock" type="number" required class="form-control"
                                                            placeholder="{{__('views.new_quantity')}}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mb-3">
                                                    <div>
                                                        <label class="form-label">{{__('views.comment')}}</label>
                                                        <textarea name="settings[comment]" required rows="7" class="form-control" type="text" placeholder="{{__('views.comment')}}"></textarea>
                                                    </div>
                                                </div>


                                                <div class="col-lg-12 text-start mt-3">
                                                    <button type="submit" class="btn btn-light waves-effect waves-light form-btn px-5">{{__('views.add_new')}}</button>
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
                            <h3 class="table-title"> {{__('views.store_settings')}} </h3>
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
    {{ $dataTable->scripts() }}
    <script>
        $(function() {
            $('.food-adjust-select').on('change', function() {
                $('.adjust-old-stock').val($(this).find(":selected").data('stock'));
            });
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
