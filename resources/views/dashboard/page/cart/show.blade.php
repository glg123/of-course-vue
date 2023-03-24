@extends('dashboard.layouts.master')
@section('sidebar')
    @include('dashboard.incudes.back.sales_sidebar')
@endsection

@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'SAlES'])

    @include('dashboard.incudes.alert')

    <div class="page-content">

        <div class="page-card container p-4">
            <h1 class="page-main-title mb-4">{{__('views.add_new')}}</h1>
            <form id="kt_form_1" action="{{route('cart.abandoned.store')}}" method="POST">
                @csrf
                <div class="row align-items-end justify-content-start">

                    <div class="col-lg-6 ">
                        <div>
                            <label class="form-label">{{__('views.customer')}}</label>
                            <select required title="{{__('views.required')}}" name="user_id" title="{{__('views.required')}}" class="form-control">
                                @foreach ($customers as $customersItem)
                                    <option selected value="{{ $customersItem->id }}"> {{ $customersItem->first_name . ' ' . $customersItem->last_name }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div>
                            <label class="form-label">{{__('views.package_name')}}</label>
                            <select required title="{{__('views.required')}}" name="package_id" title="{{__('views.required')}}" class="form-control">
                                <option value=""> {{__('views.select')}} </option>
                                @foreach ($packges as $packgesItem)
                                    <option value="{{ $packgesItem->id }}"> {{ $packgesItem->name  }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div>
                            <label class="form-label">{{__('views.temporary_discount')}}</label>
                            <select required  name="temporary_discount" title="{{__('views.required')}}" class="form-control">
                                <option value=""> {{__('views.select')}} </option>
                                <option value="1"> {{__('views.active')}} </option>
                                <option value="0"> {{__('views.not_active')}} </option>

                            </select>

                        </div>
                    </div>
                    <div class="col-lg-6 mt-4">
                        <div>
                            <label class="form-label">{{__('views.discount_expiry_date')}}</label>
                            <div class="position-relative">
                                <div class="pickDateLayout p-2">
                                    <h5 class="m-0 mt-1 mx-3">{{__('views.day - month - year')}}</h5>
                                    <h5 class="m-0 mt-1 mx-3"> <i class="dripicons-calendar"></i></h5>
                                </div>
                                <input required  title="{{__('views.required')}}" name="discount_expiry_date" class="form-control" type="date">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4">
                        <div>
                            <label class="form-label">{{__('views.total_discount')}}</label>
                            <input required title="{{__('views.required')}}" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/[^0-9.]/g,'')"  name="price" class="form-control" placeholder="{{__('views.total_discount')}}">
                        </div>
                    </div>

                    <div class="col-lg-12 mt-4">
                        <div>
                            <label class="form-label">{{__('views.note')}}</label>
                            <textarea name="note" title="{{__('views.required')}}" rows="7" class="form-control" placeholder="{{__('views.note')}}"></textarea>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-4 text-start">
                        <button type="submit" class="btn  btn-primary btn-sm waves-effect waves-light form-btn px-5">{{__('views.add_new')}}</button>
                    </div>
                </div>
            </form>
        </div>


        <div class="page-card container p-4 mt-3">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-3">
                        <h1 class="page-main-title">{{__('views.abandoned_cart_item')}}</h1>
                    </div>



                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="table-title-container">
                            <h3 class="table-title">{{__('views.abandoned_cart_item')}}</h3>
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
