@extends('master.front')

@section('title')
    {{ __('Billing') }}
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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Billing address') }} </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-1 checkut-page">
        <div class="row">

            <div class="col-lg-4">
                <div class="bg-white rounded-4 p-2 p-lg-4">

                    <ul class="d-flex flex-column gap-3 profile-menu list-unstyled p-0 m-0">
                        <li class="active-profile-menu">
                            <a href="{{ route('front.checkout.billing', $item->slug) }}"
                                class="bg-white-blue d-flex justify-content-between align-items-center fw-bolder px-3 py-3 rounded-3">
                                <div>
                                    {{ __('Billing Address') }}
                                </div>
                                <i class="fa-solid fa-arrow-left"></i>
                            </a>
                        </li>

        

                        <li>
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


            <!-- Billing Adress-->
            <div class="col-lg-8">
                <div class="bg-white rounded-4 p-2 p-lg-4">
                    <div
                        class="bg-white-blue px-3 py-3 rounded-2 border-right-box mb-4 d-flex align-items-center justify-content-between flex-column flex-lg-row gap-3">
                        <h6 class="fw-bolder mb-0">{{ __('Billing Address') }}</h6>
                    </div>

                    <form id="checkoutBilling" action="{{ route('front.checkout.store', $item->slug) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="checkout-fn">{{ __('First Name') }}</label>
                                    <input class="form-control" name="bill_first_name" type="text" required
                                        id="checkout-fn" value="{{ isset($user) ? $user->first_name : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="checkout-ln">{{ __('Last Name') }}</label>
                                    <input class="form-control" name="bill_last_name" type="text" required
                                        id="checkout-ln" value="{{ isset($user) ? $user->last_name : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="checkout_email_billing">{{ __('E-mail Address') }}</label>
                                    <input class="form-control" name="bill_email" type="email" required
                                        id="checkout_email_billing" value="{{ isset($user) ? $user->email : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="checkout-phone">{{ __('Phone Number') }}</label>
                                    <input class="form-control" name="bill_phone" type="text" id="checkout-phone"
                                        required value="{{ isset($user) ? $user->phone : '' }}">
                                </div>
                            </div>
                        </div>
                        @if (PriceHelper::CheckDigital())
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="checkout-company">{{ __('Company') }}</label>
                                        <input class="form-control" name="bill_company" type="text" id="checkout-company"
                                            value="{{ isset($user) ? $user->bill_company : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-address1">{{ __('Address') }} 1</label>
                                        <input class="form-control" name="bill_address1" required type="text"
                                            id="checkout-address1" value="{{ isset($user) ? $user->bill_address1 : '' }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-address2">{{ __('Address') }} 2</label>
                                        <input class="form-control" name="bill_address2" type="text"
                                            id="checkout-address2" value="{{ isset($user) ? $user->bill_address2 : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-zip">{{ __('Zip Code') }}</label>
                                        <input class="form-control" name="bill_zip" type="text" id="checkout-zip"
                                            value="{{ isset($user) ? $user->bill_zip : '' }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="checkout-city">{{ __('City') }}</label>
                                        <input class="form-control" name="bill_city" type="text" required
                                            id="checkout-city" value="{{ isset($user) ? $user->bill_city : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="checkout-country">{{ __('Country') }}</label>
                                        <select class="form-control" required name="bill_country" id="billing-country">
                                            <option selected>{{ __('Choose Country') }}</option>
                                            @foreach (DB::table('countries')->get() as $country)
                                                <option value="{{ $country->name }}"
                                                    {{ isset($user) && $user->bill_country == $country->name ? 'selected' : '' }}>
                                                    {{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="same_address"
                                    name="same_ship_address" {{ Session::has('shipping_address') ? 'checked' : '' }}>
                                <label class="custom-control-label"
                                    for="same_address">{{ __('Same as billing address') }}</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between paddin-top-1x mt-4">
                            {{-- <a class="btn btn-primary btn-sm" href="{{}}"><span class="hidden-xs-down"><i class="icon-arrow-left"></i>{{__('Back')}}</span></a> --}}
                            @if ($setting->is_privacy_trams == 1)
                                <button class="btn btn-primary btn-sm" type="submit"><span
                                        class="hidden-xs-down">{{ __('Continue') }}</span><i
                                        class="icon-arrow-right"></i></button>
                            @else
                                <button class="btn btn-primary btn-sm" type="submit"><span
                                        class="hidden-xs-down">{{ __('Continue') }}</span><i
                                        class="icon-arrow-right"></i></button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
