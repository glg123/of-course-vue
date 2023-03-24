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
                        <h1 class="page-main-title"> {{__('views.meals')}} </h1>
                    </div>
                    @if (auth()->user()->can('meal-add'))
                        <div class="col-12 col-lg-3">
                            <div class="page-card-btn-groub">
                                <a href="{{ route('meal.create') }}"
                                    class="btn btn-light waves-effect waves-light d-flex align-items-center"> <i
                                        class="bx bx-plus-circle mx-1"></i> <span>{{__('views.add_new')}}</span> </a>
                            </div>

                        </div>
                    @endif
                    <div class="col-12 mt-3">
                        <form action="{{ route('meal.index') }}">
                            <div class="form-content container py-3 filter-box">
                                <div class="row align-items-end justify-content-end">

                                    <div class="col-lg-3">
                                        <div>
                                            <label class="form-label">{{__('views.meal_name')}}</label>
                                            <input name="q" class="form-control" placeholder="{{__('views.meal_name')}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 mt-3 mt-lg-0">
                                        <div>
                                            <label class="form-label">{{__('views.Day')}}</label>
                                            <select name="day" class="form-control">
                                                <option value=""> -- {{__('views.select')}} -- </option>
                                                <option value="saturday"> {{__('views.saturday')}} </option>
                                                <option value="sunday">{{__('views.sunday')}} </option>
                                                <option value="monday"> {{__('views.monday')}} </option>
                                                <option value="tuesday">{{__('views.tuesday')}} </option>
                                                <option value="wednesday">{{__('views.wednesday')}} </option>
                                                <option value="thursday"> {{__('views.thursday')}} </option>
                                                <option value="friday">{{__('views.friday')}} friday </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 mt-3 mt-lg-0">
                                        <div>
                                            <label class="form-label">{{__('views.meal_type')}}</label>
                                            <select name="plan_id" class="form-control">
                                                <option value=""> -- {{__('views.select')}} --</option>
                                                @foreach ($mealPlans as $plan)
                                                    <option value="{{ $plan->id }}"> {{ $plan->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 mt-3 mt-lg-0">
                                        <div>
                                            <label class="form-label">{{__('views.meal_status')}}</label>
                                            <select name="active" class="form-control">
                                                <option value="">-- {{__('views.select')}} --</option>
                                                <option value="1">{{__('views.active')}}</option>
                                                <option value="0">{{__('views.not_active')}}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 text-start mt-3">
                                        <button type="submit" class="btn btn-light waves-effect waves-light form-btn px-5">
                                            <i class="bx bx-search mx-1 mt-1"></i> <span>{{__('views.search')}}</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="table-title-container">
                            <h3 class="table-title"> الوجبــات </h3>
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
