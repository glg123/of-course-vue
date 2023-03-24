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

                    <div class="col-12 col-lg-3 offset-9">
                        <h1 class="page-main-title"> {{__('views.referrals')}} </h1>
                    </div>

                    <div class="col-12 col-lg-4 page-card-btn-groub-2">
                        <a href="{{ route('referrals.index') }}" type="button" class="btn btn-light waves-effect waves-light {{ !request()->has('type') ? 'active' : '' }}">{{__('views.all')}} </a>
                        <a href="{{ route('referrals.index', ['type' => 'customer']) }}" type="button" class="btn btn-light waves-effect waves-light {{ request()->get('type') == 'customer' ? 'active' : '' }} ">{{__('views.customers')}} </a>
                        <a href="{{ route('referrals.index', ['type' => 'manager']) }}" type="button" class="btn btn-light waves-effect waves-light {{ request()->get('type') == 'manager' ? 'active' : '' }} ">{{__('views.managers')}} </a>
                    </div>

                    <div
                        class="col-12 my-3 d-flex justify-content-between align-items-center border-bottom border-dark pb-1">
                        <div class="table-title-container">
                            <h3 class="table-title"> {{__('views.referrals')}}</h3>
                        </div>
                        <div class="table-title-buttons">
                            @if (auth()->user()->can('referrals-view'))
                                <a href="{{ route('referrals.type') }}" type="button"
                                    class="btn btn-pink waves-effect waves-light form-btn px-5"> <i
                                        class="bx bx-cog mx-1"></i>
                                    <span> {{__('views.settings')}} </span></a>
                            @endif
                            @if (auth()->user()->can('referral-setting'))
                                <button type="button" type="button"
                                    class="btn btn-light waves-effect waves-light d-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target=".add-new-one"> <i
                                        class="bx bx-rotate-right mx-1"></i> {{__('views.referral_setting')}}</button>
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
    <!-- add-new-modal modal -->
    <div class="modal fade add-new-one" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">{{__('views.referral_setting')}}</h3>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('referrals.update.settings') }}">
                        @csrf
                        <div class="row align-items-end justify-content-start">

                            <div class="col-lg-6 mt-2">
                                <div>
                                    <label class="form-label">{{__('views.maximum_redeem_percent')}}</label>
                                    <input onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/[^0-9.]/g,'')" type="text" name="maximum_redeem_percent[value]"
                                        value="{{ $referralSettings->where('unique_key', 'maximum_redeem_percent')->first()->value ?? '' }}"
                                        class="form-control" placeholder="{{__('views.maximum_redeem_percent')}}">
                                </div>
                            </div>

                            <div class="col-lg-6 mt-2">
                                <div>
                                    <label class="form-label">{{__('views.maximum_redeem_amount')}}</label>
                                    <input onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/[^0-9.]/g,'')" type="text" name="maximum_redeem_amount[value]"
                                        value="{{ $referralSettings->where('unique_key', 'maximum_redeem_amount')->first()->value ?? '' }}"
                                        class="form-control" placeholder="{{__('views.maximum_redeem_amount')}}">
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
    {{ $dataTable->scripts() }}
@endpush
