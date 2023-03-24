@extends('master.front')

@section('title')
    {{ __('Order Success') }}
@endsection

@section('content')
    <!-- Page Title-->
    <div class="bg-container py-4 py-lg-5">
      <div class="container">
          <div class="row align-items-center justify-content-center">
              <div class="col-md-12 col-lg-4">
                  <div class="bg-white p-4 rounded-4">
                      <div class="text-center mb-5">
                          <img src="{{ asset('assets/front/build/img/logo.svg') }}" alt="">
                      </div>
                      <div class="mb-4 text-center">
                          <img src="{{ asset('assets/front/build/img/done-2.svg') }}" alt="">
                      </div>
                      <div class="mb-5 text-center">
                          <h4 class="mb-3">تهانينا،، تم اشتراكك بنجاح</h4>
                          <p>سيتم التوصيل في موعد أقصاه 3 أيام <br> {{ $order->transaction_number }}</p>
                      </div>
                      <div class="mb-4 text-end">
                          <a href="{{route('user.order.index')}}" class="btn btn-of fw-bold w-100 border-0">عرض تاريخ الطلبات</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
 
@endsection
