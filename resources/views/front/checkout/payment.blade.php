@extends('master.front')
@section('title')
    {{ __('Payment') }}
@endsection
@section('content')
    <!-- Page Title-->
    <div class="page-head mb-5">
        <div class="container">
            <div class="row">
                <div class="col py-5">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">الرئيسيـة</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Review your order and pay') }} </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-1  checkut-page">
        <div class="row">
            <div class="col-lg-4">
                <div class="bg-white rounded-4 p-2 p-lg-4">

                    <ul class="d-flex flex-column gap-3 profile-menu list-unstyled p-0 m-0">
                        <li>
                            <a href="{{ route('front.checkout.billing', $item->slug) }}"
                                class="bg-white-blue d-flex justify-content-between align-items-center fw-bolder px-3 py-3 rounded-3">
                                <div>
                                    {{ __('Billing Address') }}
                                </div>
                                <i class="fa-solid fa-arrow-left"></i>
                            </a>
                        </li>



                        <li class="active-profile-menu">
                            <a href="{{ route('front.checkout.payment', $item->slug) }}"
                                class="bg-white-blue d-flex justify-content-between align-items-center fw-bolder px-3 py-3 rounded-3">
                                <div>
                                    {{ __('Review and pay') }} </div>
                                <i class="fa-solid fa-arrow-left"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            <!-- Payment Methode-->
            <div class="col-lg-8">
                <div class="bg-white rounded-4 p-2 p-lg-4">
                    <div
                        class="bg-white-blue px-3 py-3 rounded-2 border-right-box mb-4 d-flex align-items-center justify-content-between flex-column flex-lg-row gap-3">
                        <h6 class="fw-bolder mb-0">{{ __('Review and pay') }}</h6>
                    </div>

                    <hr>

                    <div class="row padding-top-1x  mb-4">
                        <div class="col-sm-6">
                            <h6>{{ __('Invoice address') }} :</h6>
                            @php
                                
                                $ship = Session::get('shipping_address');
                                $bill = Session::get('billing_address');
                            @endphp
                            <ul class="list-unstyled">
                                <li><span class="text-muted">{{ __('Name') }}:
                                    </span>{{ $ship['ship_first_name'] }} {{ $ship['ship_last_name'] }}</li>
                                @if (PriceHelper::CheckDigital())
                                    <li><span class="text-muted">{{ __('Address') }}:
                                        </span>{{ $ship['ship_address1'] }} {{ $ship['ship_address2'] }}</li>
                                @endif
                                <li><span class="text-muted">{{ __('Phone') }}: </span>{{ $ship['ship_phone'] }}
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <h6>{{ __('Shipping address') }} :</h6>
                            <ul class="list-unstyled">
                                <li><span class="text-muted">{{ __('Name') }}:
                                    </span>{{ $bill['bill_first_name'] }} {{ $bill['bill_last_name'] }}</li>
                                @if (PriceHelper::CheckDigital())
                                    <li><span class="text-muted">{{ __('Address') }}:
                                        </span>{{ $ship['ship_address1'] }} {{ $ship['ship_address2'] }}</li>
                                @endif
                                <li><span class="text-muted">{{ __('Phone') }}: </span>{{ $bill['bill_phone'] }}
                                </li>
                            </ul>

                            @if (DB::table('states')->whereStatus(1)->count() > 0)
                                <select name="state_id" class="form-control" id="state_id_select" required>
                                    <option value="" selected disabled>{{ __('Select Shipping State') }}</option>
                                    @foreach (DB::table('states')->whereStatus(1)->get() as $state)
                                        <option value="{{ $state->id }}"
                                            data-href="{{ route('front.state.setup', $state->id) }}"
                                            {{ Auth::check() && Auth::user()->state_id == $state->id ? 'selected' : '' }}>
                                            {{ $state->name }}
                                            @if ($state->type == 'fixed')
                                                ({{ PriceHelper::setCurrencyPrice($state->price) }})
                                            @else
                                                ({{ $state->price }}%)
                                            @endif

                                        </option>
                                    @endforeach
                                </select>
                                <small class="text-primary">{{ __('please select shipping state') }}</small>
                                @error('state_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            @endif


                        </div>


                    </div>

                    <h6>{{ __('Pay with') }} :</h6>
                    <div class="row mt-4">
                        <div class="col-12">
                            <ul class="d-flex flex-column gap-3 profile-menu list-unstyled p-0 m-0">
                                @php
                                    $gateways = DB::table('payment_settings')
                                        ->whereStatus(1)
                                        ->get();
                                @endphp
                                @foreach ($gateways as $gateway)
                                    @if (PriceHelper::CheckDigitalPaymentGateway())
                                        @if ($gateway->unique_keyword != 'cod')
                                            <li>
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#{{ $gateway->unique_keyword }}"
                                                    class="bg-white-blue d-flex justify-content-between align-items-center fw-bolder px-3 py-3 rounded-3">
                                                    <div >
                                                        <img class="img-thumbnail" style="    width: 112px;
                                                        "
                                                            src="{{ asset('assets/images/' . $gateway->photo) }}"
                                                            alt="{{ $gateway->name }}" title="{{ $gateway->name }}">
                                                        {{ $gateway->name }}
                                                    </div>
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </li>
                                        @endif
                                    @else
                                        <li>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#{{ $gateway->unique_keyword }}"
                                                class="bg-white-blue d-flex justify-content-between align-items-center fw-bolder px-3 py-3 rounded-3">
                                                <div>
                                                    <img class="img-thumbnail" style="    width: 112px;
                                                    "
                                                        src="{{ asset('assets/images/' . $gateway->photo) }}"
                                                        alt="{{ $gateway->name }}" title="{{ $gateway->name }}">
                                                    {{ $gateway->name }}
                                                </div>
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>


                        </div>
                    </div>
                </div>
            </div>


            @include('includes.checkout_modal')

        </div>
    </div>
    </div>
@endsection
