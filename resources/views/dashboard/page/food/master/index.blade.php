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
                        <h1 class="page-main-title"> {{__('views.food')}} </h1>
                    </div>
                    @if (auth()->user()->can('master-data-add'))
                        <div class="col-12 col-lg-3">
                            <div class="page-card-btn-groub">
                                <a type="button" class="btn btn-light waves-effect waves-light d-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target=".add-new-modal"> <i
                                        class="bx bx-plus-circle font-size-22 mx-2"></i> <span>{{__('views.add_new')}}</span> </a>
                            </div>
                        </div>
                    @endif

                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="table-title-container">
                            <h3 class="table-title"> {{__('views.food')}} </h3>
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

    <!-- add-new-modal modal -->
    <div class="modal fade add-new-modal" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">{{__('views.add_new')}}</h3>
                </div>
                <div class="modal-body">
                    <form id="kt_form_1" action="{{ route('food.store') }}" method="POST">
                        @csrf
                        <div class="row align-items-end justify-content-start">

                            <div class="col-lg-6">
                                <div>
                                    <label class="form-label">#</label>
                                    <input title="{{__('views.required')}}" name="code" required class="form-control" placeholder="#">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-3 mt-lg-0">
                                <div>
                                    <label class="form-label">{{__('views.trade_mark')}}</label>
                                    <input title="{{__('views.required')}}" name="category_name" required class="form-control"
                                        placeholder="{{__('views.trade_mark')}}">
                                </div>
                            </div>

                            <div class="col-lg-6  mt-3">
                                <div>
                                    <label class="form-label">{{__('views.item_name')}} English</label>
                                    <input title="{{__('views.required')}}" name="name[en]" required class="form-control"
                                        placeholder="{{__('views.item_name')}} English">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-3">
                                <div>
                                    <label class="form-label">{{__('views.item_name')}} العربية </label>
                                    <input title="{{__('views.required')}}" name="name[ar]" required class="form-control"
                                        placeholder="{{__('views.item_name')}} العربية ">
                                </div>
                            </div>

                            <div class="col-lg-12 mt-3">
                                <label class="form-label">{{__('views.Weight_unit')}}</label>
                                <div>
                                    @foreach ($units as $index => $unit)
                                        <div class="form-check form-radio-primary mb-3 ml-4 form-check-right">
                                            <input class="form-check-input" name="unit_id" value="{{ $unit->id }}"
                                                type="radio" name="formRadioColor" id="formRadioColor{{ $index }}">
                                            <label class="form-check-label" for="formRadioColor{{ $index }}">
                                                {{ $unit->name }}
                                            </label>
                                        </div>
                                    @endforeach


                                </div>
                            </div>

                            <div class="col-lg-6 mt-3">
                                <label class="form-label">{{__('views.Is this element component?')}}</label>
                                <div>
                                    <div class="form-check form-radio-primary mb-3 ml-4 form-check-right">
                                        <input name="is_component" value="1" class="form-check-input" type="radio"
                                            name="formRadioColor2" id="formRadioColor1" checked>
                                        <label class="form-check-label" for="formRadioColor1">
                                            {{__('views.yes')}}
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-primary mb-3 mx-4 form-check-right">
                                        <input name="is_component" value="0" class="form-check-input" type="radio"
                                            name="formRadioColor2" id="formRadioColor1">
                                        <label class="form-check-label" for="formRadioColor1">
                                            {{__('views.no')}}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-3">
                                <label class="form-label">{{__('views.Is the item spam?')}}</label>
                                <div>
                                    <div class="form-check form-radio-primary mb-3 ml-4 form-check-right">
                                        <input name="is_liked" value="1" class="form-check-input" type="radio"
                                            name="formRadioColor3" id="formRadioColor1" checked>
                                        <label class="form-check-label" for="formRadioColor1">
                                            {{__('views.yes')}}
                                        </label>
                                    </div>
                                    <div class="form-check form-radio-primary mb-3 mx-4 form-check-right">
                                        <input name="is_liked" value="0" class="form-check-input" type="radio"
                                            name="formRadioColor3" id="formRadioColor1">
                                        <label class="form-check-label" for="formRadioColor1">
                                            {{__('views.no')}}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="col-12 mt-3 d-flex">
                                <img class="img-fluid" src="assets/images/ofCourse-images/shape-1.png" width="10px"
                                    height="10px">
                                <h5 class="form-main-title m-0 mx-3 fw-bold"> {{__('views.Add per 100g')}} </h5>
                            </div>

                            <div class="col-lg-6 mt-3">
                                <div>
                                    <label class="form-label">{{__('views.Fats')}}</label>
                                    <input title="{{__('views.required')}}" name="variations[fat]" required type="number" class="form-control"
                                        placeholder="{{__('views.Fats')}}">
                                </div>
                            </div>
                            <div class="col-lg-6 mt-3">
                                <div>
                                    <label class="form-label">{{__('views.protein')}}</label>
                                    <input title="{{__('views.required')}}" name="variations[protien]" required type="number" class="form-control"
                                        placeholder="{{__('views.protein')}}">
                                </div>
                            </div>
                            <div class="col-lg-6 mt-3">
                                <div>
                                    <label class="form-label">{{__('views.carbohydrates')}}</label>
                                    <input name="variations[carb]" required type="number" class="form-control"
                                        placeholder="{{__('views.carbohydrates')}}">
                                </div>
                            </div>
                            <div class="col-lg-6 mt-3">
                                <div>
                                    <label class="form-label">{{__('views.Calories')}}</label>
                                    <input name="variations[calory]" required type="number" class="form-control"
                                        placeholder="{{__('views.Calories')}}">
                                </div>
                            </div>

                            <hr class="my-3">

                            <div class="col-12 d-flex">
                                <img class="img-fluid" src="assets/images/ofCourse-images/shape-1.png" width="10px"
                                    height="10px">
                                <h5 class="form-main-title m-0 mx-3 fw-bold"> {{__('views.Warning message from the supervisor')}} </h5>
                            </div>

                            <div class="col-lg-6 mt-3">
                                <div>
                                    <label class="form-label">{{__('views.Less amount')}}</label>
                                    <input title="{{__('views.required')}}" name="stock_reminder" type="number" required class="form-control"
                                        placeholder="{{__('views.Less amount')}}">
                                </div>
                            </div>

                            <div class="col-lg-12 text-start mt-3">
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
