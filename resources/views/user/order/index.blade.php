@extends('master.front')
@section('title')
    {{ __('Orders') }}
@endsection

@section('content')
    <!-- Page Title-->

    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-1">
        <div class="row">
            @include('includes.user_sitebar')
            <div class="col-lg-8">
                <div class="bg-white rounded-4 p-2 p-lg-4">
                    <div
                        class="bg-white-blue px-3 py-3 rounded-2 border-right-box mb-4 d-flex align-items-center justify-content-between flex-column flex-lg-row gap-3">
                        <h6 class="fw-bolder mb-0">قائمة الطلبـــات</h6>
                    </div>
                    <div class="d-flex flex-column gap-3">
                        @foreach ($orders as $order)
                            {{-- {{dd()}} --}}
                            <div class="bg-white-blue p-4 rounded-2 box-list box-list-2">
                                <div
                                    class="d-flex flex-column flex-lg-row align-items-start align-items-lg-center justify-content-between gap-3">
                                    <h6 class="d-flex align-items-center fw-bolder mb-0">{{head(json_decode($order->cart,true))['name'] ?? ''}}</h6>
                                    <h5 class="fw-bolder h4 text-purple mb-0">{{head(json_decode($order->cart,true))['price'] ?? ''}}<span
                                            class="h6 text-black fw-bold mb-0">دينـــار كويـــتي</span></h5>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 gap-lg-5">
                                    <div class="d-flex flex-wrap gap-3 gap-lg-5">
                                        <div class="d-flex flex-column">
                                            <h6 class="f14 text-muted">رقم الطلب</h6>
                                            <h6 class="f14 fw-bolder mb-0">#{{ $order->transaction_number }}</h6>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="f14 text-muted">تاريخ الطلب</h6>
                                            <h6 class="f14 fw-bolder mb-0">{{ $order->created_at->format('D/M/Y') }}</h6>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="f14 text-muted">الحالة</h6>
                                            <h6 class="f12 fw-bold mb-0"><span
                                                    class="bg-success text-white px-3 py-1 d-inline-block rounded-pill">
                                                    {{ $order->payment_status }} | {{ $order->order_status }}</span></h6>
                                        </div>
                                    </div>
                               
                                </div>
                            </div>
                        @endforeach
                        {{-- <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>{{ __('Order') }} #</th>
                                    <th>{{ __('Total') }}</th>
                                    <th>{{ __('Order Status') }}</th>
                                    <th>{{ __('Payment Status') }}</th>
                                    <th>{{ __('Date Purchased') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td><a class="navi-link" href="#" data-toggle="modal"
                                                data-target="#orderDetails">{{ $order->transaction_number }}</a></td>
                                        <td>
                                            @if ($setting->currency_direction == 1)
                                                {{ $order->currency_sign }}{{ PriceHelper::OrderTotal($order) }}
                                            @else
                                                {{ PriceHelper::OrderTotal($order) }}{{ $order->currency_sign }}
                                            @endif

                                        </td>
                                        <td>
                                            @if ($order->order_status == 'Pending')
                                                <span class="text-info">{{ $order->order_status }}</span>
                                            @elseif($order->order_status == 'In Progress')
                                                <span class="text-warning">{{ $order->order_status }}</span>
                                            @elseif($order->order_status == 'Delivered')
                                                <span class="text-success"> {{ $order->order_status }}</span>
                                            @else
                                                <span class="text-danger">{{ __('Canceled') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($order->payment_status == 'Paid')
                                                <span class="text-success">{{ $order->payment_status }}</span>
                                            @else
                                                <span class="text-danger">{{ $order->payment_status }}</span>
                                            @endif
                                        </td>

                                        <td>{{ $order->created_at->format('D/M/Y') }}</td>
                                        <td>
                                            <a href="{{ route('user.order.invoice', $order->id) }}"
                                                class="btn btn-info btn-sm">{{ __('Invoice') }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> --}}

                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
