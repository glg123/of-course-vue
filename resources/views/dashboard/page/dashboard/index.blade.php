@extends('dashboard.layouts.master')
@section('sidebar')
    @include('dashboard.incudes.back.sales_sidebar')
@endsection


@section('content')
    @include('dashboard.layouts.header', ['HEADER_TYPE' => 'SAlES'])
    @include('dashboard.incudes.alert')

    <div class="page-content" id="dashboard">

        <div class="page-card container p-4">
            <h1 class="page-main-title mb-4"> {{__('views.dashboard')}} </h1>
        </div>

        <div class="page-card container p-4">
            <div class="row">
                <div class="col-lg-3 col-12 my-3 my-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="mx-2">
                            <img src="{{ asset('back') }}/assets/images/ofCourse-images/dashboard-icon-1.png" width="50px">
                        </div>
                        <div>
                            <h5 class="fw-bold m-0">3.930K</h4>
                                <h5 class="fw-bold m-0 mt-1">{{__('views.active_customers')}}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12 my-3 my-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="mx-2">
                            <img src="{{ asset('back') }}/assets/images/ofCourse-images/dashboard-icon-2.png"
                                 width="50px">
                        </div>
                        <div>
                            <h5 class="fw-bold m-0">280</h4>
                                <h5 class="fw-bold m-0 mt-1">{{__('views.sales_request_today')}}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12 my-3 my-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="mx-2">
                            <img src="{{ asset('back') }}/assets/images/ofCourse-images/dashboard-icon-3.png"
                                 width="50px">
                        </div>
                        <div>
                            <h5 class="fw-bold m-0">275</h4>
                                <h5 class="fw-bold m-0 mt-1">{{__('views.sales_request_delivery_today')}}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12 my-3 my-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="mx-2">
                            <img src="{{ asset('back') }}/assets/images/ofCourse-images/dashboard-icon-4.png"
                                 width="50px">
                        </div>
                        <div>
                            <h5 class="fw-bold m-0">$90745</h4>
                                <h5 class="fw-bold m-0 mt-1">{{__('views.total_sales')}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-evenly mx-2">
            <!-- Chart 1 -->
            <div class="col-12 col-lg-5 bg-white my-3 my-lg-0 rounded">
                <h4 class="py-3 border-bottom border-dark mb-2 fw-bold"> {{__('views.customers_dashboard')}} </h3>
                    <div id="chart"></div>
            </div>
            <!-- Chart 2 -->
            <div
                class="col-12 col-lg-5 rounded bg-white d-flex align-items-start justify-content-center flex-wrap my-3 my-lg-0">
                <div class="w-100">
                    <h4 class="py-3 border-bottom border-dark mb-2 fw-bold">{{__('views.order_report')}} </h3>
                </div>
                <div id="chart2"></div>
                <div class="row align-items-start secondChart">
                    <div class="col-3 dountCharLabel" id="salesLabel1">
                        <h6> <span class="dountCharLabelColor"> </span> {{__('views.total_sales_request')}} </h6>
                        <h6>1000</h6>
                    </div>
                    <div class="col-3 dountCharLabel" id="salesLabel2">
                        <h6> <span class="dountCharLabelColor"> </span> {{__('views.sales_request')}} </h6>
                        <h6>1500</h6>
                    </div>
                    <div class="col-3 dountCharLabel" id="salesLabel3">
                        <h6> <span class="dountCharLabelColor"> </span> {{__('views.sales_request_today')}}  </h6>
                        <h6>500</h6>
                    </div>
                    <div class="col-3 dountCharLabel" id="salesLabel4">
                        <h6> <span class="dountCharLabelColor"></span> {{__('views.sales_request_discount')}}  </h6>
                        <h6>1500</h6>
                    </div>
                </div>
            </div>
            <!-- Chart 3 -->
            <div class="col-12 col-lg-3 bg-white my-3 rounded">
                <h5 class="py-3 border-bottom border-dark  fw-bold"> {{__('views.plans')}} </h5>
                <div id="chart3"></div>
            </div>
            <!-- Chart 4 -->
            <div class="col-12 col-lg-3 bg-white my-3 rounded">
                <h5 class="py-3 border-bottom border-dark  fw-bold"> {{__('views.sales_request_delivery')}} ( {{__('views.delivered')}}) </h5>
                <div id="chart4"></div>
            </div>
            <!-- Chart 5 -->
            <div class="col-12 col-lg-3 bg-white my-3 rounded">
                <h5 class="py-3 border-bottom border-dark  fw-bold"> {{__('views.common_meals')}} ({{__('views.meal')}})</h5>
                <div id="chart5"></div>
            </div>
            <!-- Birth Days Card -->
            <div class="col-12 col-lg-5 bg-white my-3 rounded">
                <h4 class="py-3 border-bottom border-dark mb-2 fw-bold"> {{__('views.customer_Birthdays')}}</h3>
                    <div class="row">
                        <!-- Item -->
                        <div class="col-12 row justify-content-evenly align-items-center birthday-item py-2">
                            <div class="col-2">
                                <img class="img-fluid rounded-circle"
                                     src="{{ asset('back') }}/assets/images/ofCourse-images/client-profile.png">
                            </div>
                            <div class="col-5">
                                <h6> عبد الرحمن احمد عبدالله </h6>
                                <small> 02 اكتوبر 2022 </small>
                            </div>
                            <div class="col-4">
                                <span class="bg-success p-2 rounded text-white"> {{__('views.today')}} </span>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-12 row justify-content-evenly align-items-center birthday-item py-2">
                            <div class="col-2">
                                <img class="img-fluid rounded-circle"
                                     src="{{ asset('back') }}/assets/images/ofCourse-images/client-profile.png">
                            </div>
                            <div class="col-5">
                                <h6> عبد الرحمن احمد عبدالله </h6>
                                <small> 02 اكتوبر 2022 </small>
                            </div>
                            <div class="col-4">
                                <span class="bg-danger p-2 rounded text-white"> {{__('views.tomorrow')}} </span>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-12 row justify-content-evenly align-items-center birthday-item py-2">
                            <div class="col-2">
                                <img class="img-fluid rounded-circle"
                                     src="{{ asset('back') }}/assets/images/ofCourse-images/client-profile.png">
                            </div>
                            <div class="col-5">
                                <h6> عبد الرحمن احمد عبدالله </h6>
                                <small> 02 اكتوبر 2022 </small>
                            </div>
                            <div class="col-4">
                                <span class="bg-primary p-2 rounded text-white"> {{__('views.after_tow_days')}} </span>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- specialists Card -->
            <div class="col-12 col-lg-5 bg-white my-3 rounded">
                <h4 class="py-3 border-bottom border-dark mb-2 fw-bold"> {{__('views.Nutritionist')}} </h3>
                    <div class="row">
                        <!-- Item -->
                        <div class="col-12 row justify-content-start align-items-center special-item py-2">
                            <div class="col-2 mx-2">
                                <img class="img-fluid rounded-circle"
                                     src="{{ asset('back') }}/assets/images/ofCourse-images/client-profile.png">
                            </div>
                            <div class="col-6">
                                <h6> عبد الرحمن احمد عبدالله </h6>
                                <small> مدرب شخصي</small>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-12 row justify-content-start align-items-center special-item py-2">
                            <div class="col-2 mx-2">
                                <img class="img-fluid rounded-circle"
                                     src="{{ asset('back') }}/assets/images/ofCourse-images/client-profile.png">
                            </div>
                            <div class="col-6">
                                <h6> عبد الرحمن احمد عبدالله </h6>
                                <small> مدرب شخصي</small>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-12 row justify-content-start align-items-center special-item py-2">
                            <div class="col-2 mx-2">
                                <img class="img-fluid rounded-circle"
                                     src="{{ asset('back') }}/assets/images/ofCourse-images/client-profile.png">
                            </div>
                            <div class="col-6">
                                <h6> عبد الرحمن احمد عبدالله </h6>
                                <small> مدرب شخصي</small>
                            </div>
                        </div>

                    </div>
            </div>
            <!-- meals rates Card -->
            <div class="col-12 col-lg-4 bg-white my-3 rounded">
                <h4 class="py-3 border-bottom border-dark mb-2 fw-bold"> {{__('views.Meal_evaluation')}} </h3>
                    <div class="row">
                        <!-- Item -->
                        <div class="col-12 row justify-content-start align-items-center meal-rate-item py-2">
                            <div class="col-2">
                                <img class="img-fluid rounded-circle"
                                     src="{{ asset('back') }}/assets/images/ofCourse-images/client-profile.png">
                            </div>
                            <div class="col-7">
                                <h6> عبد الرحمن احمد عبدالله </h6>
                                <small> وجبة دايت بلان </small>
                            </div>
                            <div class="col-3">
                                <span class="bg-warning p-2 rounded text-white"> <i class="bx bx-star mx-1"></i> 4 </span>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-12 row justify-content-start align-items-center meal-rate-item py-2">
                            <div class="col-2">
                                <img class="img-fluid rounded-circle"
                                     src="{{ asset('back') }}/assets/images/ofCourse-images/client-profile.png">
                            </div>
                            <div class="col-7">
                                <h6> عبد الرحمن احمد عبدالله </h6>
                                <small> وجبة دايت بلان </small>
                            </div>
                            <div class="col-3">
                                <span class="bg-warning p-2 rounded text-white"> <i class="bx bx-star mx-1"></i> 4 </span>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-12 row justify-content-start align-items-center meal-rate-item py-2">
                            <div class="col-2">
                                <img class="img-fluid rounded-circle"
                                     src="{{ asset('back') }}/assets/images/ofCourse-images/client-profile.png">
                            </div>
                            <div class="col-7">
                                <h6> عبد الرحمن احمد عبدالله </h6>
                                <small> وجبة دايت بلان </small>
                            </div>
                            <div class="col-3">
                                <span class="bg-warning p-2 rounded text-white"> <i class="bx bx-star mx-1"></i> 4 </span>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- stock warning Card -->
            <div class="col-12 col-lg-7 bg-white my-3 rounded">
                <h4 class="py-3 border-bottom border-dark mb-2 fw-bold">{{__('views.Meal_evaluation')}} </h3>
                    <div class="row">
                        <!-- Item -->
                        <div class="col-12 row justify-content-start align-items-center special-item py-2">
                            <div class="col-2">
                                <img class="img-fluid rounded-circle"
                                     src="{{ asset('back') }}/assets/images/ofCourse-images/dashboard-icon-3.png">
                            </div>
                            <div class="col-6">
                                <h4 class="m-0"> {{__('views.Teleological_article')}} </h3>
                            </div>
                            <div class="col-4">
                                <h5 class="m-0"> {{__('views.The proportion of the food item')}} : 30 %</h5>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-12 row justify-content-start align-items-center special-item py-2">
                            <div class="col-2">
                                <img class="img-fluid rounded-circle"
                                     src="{{ asset('back') }}/assets/images/ofCourse-images/dashboard-icon-3.png">
                            </div>
                            <div class="col-6">
                                <h4 class="m-0"> {{__('views.Teleological_article')}} </h3>
                            </div>
                            <div class="col-4">
                                <h5 class="m-0"> {{__('views.The proportion of the food item')}} : 30 %</h5>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-12 row justify-content-start align-items-center special-item py-2">
                            <div class="col-2">
                                <img class="img-fluid rounded-circle"
                                     src="{{ asset('back') }}/assets/images/ofCourse-images/dashboard-icon-3.png">
                            </div>
                            <div class="col-6">
                                <h4 class="m-0"> {{__('views.Teleological_article')}} </h3>
                            </div>
                            <div class="col-4">
                                <h5 class="m-0"> {{__('views.The proportion of the food item')}} : 30 %</h5>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        // Chart 1 Options
        var options = {
            series: [{
                name: 'series',
                data: [75, 100, 150, 80, 90, 20, 75, 100, 150, 80, 90, 20]
            }],
            colors: ['#FF9F43'],
            chart: {
                toolbar: {
                    show: false
                },
                height: 350,
                type: 'area',
                foreColor: '#ff0000'
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: 'smooth',
                colors: ['#FF9F43']
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        // Chart 2 Options
        var options2 = {
            series: [1000, 1500, 400, 1500],
            colors: ['#5388D8', '#F4BE37', '#FF6E40', '#0D2535'],
            chart: {
                type: 'donut',
            },
            legend: {
                show: false,
            },
            dataLabels: {
                enabled: false,
            },
        };

        var chart2 = new ApexCharts(document.querySelector("#chart2"), options2);
        chart2.render();

        // Chart 3 Options
        var options3 = {
            series: [2360, 7140],
            colors: ['#00b953b3', '#00b95366'],
            chart: {
                type: 'donut',
            },
            legend: {
                show: false,
            },
            dataLabels: {
                enabled: false,
            },
            title: {
                text: '2360',
                align: 'center',
                margin: 10,
                offsetX: 0,
                offsetY: 100,
                floating: false,
                style: {
                    fontSize: '20px',
                    fontWeight: 'bold',
                    color: '#263238'
                }
            }
        };

        var chart3 = new ApexCharts(document.querySelector("#chart3"), options3);
        chart3.render();

        // Chart 4 Options
        var options4 = {
            series: [2360, 7140],
            colors: ['#3a52eeb3', '#3a52ee66'],
            chart: {
                type: 'donut',
            },
            legend: {
                show: false,
            },
            dataLabels: {
                enabled: false,
            },
            title: {
                text: '2360',
                align: 'center',
                margin: 10,
                offsetX: 0,
                offsetY: 100,
                floating: false,
                style: {
                    fontSize: '20px',
                    fontWeight: 'bold',
                    color: '#263238'
                }
            }
        };

        var chart4 = new ApexCharts(document.querySelector("#chart4"), options4);
        chart4.render();

        // Chart 5 Options
        var options5 = {
            series: [2360, 7140],
            colors: ['#ff6e40b3', '#ff6e4066'],
            chart: {
                type: 'donut',
            },
            legend: {
                show: false,
            },
            dataLabels: {
                enabled: false,
            },
            title: {
                text: '2360',
                align: 'center',
                margin: 10,
                offsetX: 0,
                offsetY: 100,
                floating: false,
                style: {
                    fontSize: '20px',
                    fontWeight: 'bold',
                    color: '#263238'
                }
            }
        };

        var chart5 = new ApexCharts(document.querySelector("#chart5"), options5);
        chart5.render();
    </script>
@endpush

