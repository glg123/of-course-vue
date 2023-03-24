<li>
    <a href="javascript: void(0);" class=" waves-effect " aria-expanded="false">
        <i class="bx bx-task"></i>
        <span key="t-orders">{{__('views.orders')}}</span>
    </a>
    <ul class="sub-menu mm-collapse pb-3" aria-expanded="false">
        @if (auth()->user()->can('ordered-items-view'))
            <li><a href="{{ route('orders.report') }}"
                    class="bg-white text-dark rounded {{ activeSubRoute('orders.report') }}">{{__('views.orders_report')}}</a></li>
        @endif
        @if (auth()->user()->can('ingredient-view'))
            <li><a href="{{ route('orders.report.foods') }}"
                    class="bg-white text-dark rounded {{ activeSubRoute('orders.report.foods') }}">{{__('views.ingredients')}}</a></li>
        @endif
    </ul>
</li>

@if (auth()->user()->can('delivery-report-view'))
    <li class="{{ activeRoute('delivery.report') }}"> <a href="{{ route('delivery.report') }}" class="waves-effect">
            <i class="mdi mdi-truck-delivery"></i>
            <span key="t-delivery">{{__('views.delivery_report')}}</span>
        </a>
    </li>
@endif

@if (auth()->user()->can('plans-report-view'))
    <li class="{{ activeRoute('plans.report') }}"> <a href="{{ route('plans.report') }}" class="waves-effect">
            <i class="bx bx-calendar-alt"></i>
            <span key="t-plans">{{__('views.plans_report')}}</span>
        </a>
    </li>
@endif

@if (auth()->user()->can('sales-report-view'))
    <li class="{{ activeRoute('sales.report') }}"> <a href="{{ route('sales.report') }}" class="waves-effect">
            <i class="bx bx-money"></i>
            <span key="t-money">{{__('views.sales_report')}}</span>
        </a>
    </li>
@endif

@if (auth()->user()->can('driver-report-view'))
    <li class="{{ activeRoute('drivers.report') }}"> <a href="{{ route('drivers.report') }}" class="waves-effect">
            <i class="bx bx-car"></i>
            <span key="t-drivers">{{__('views.drivers_report')}}</span>
        </a>
    </li>
@endif

@if (auth()->user()->can('promo-code-report-view'))
    <li class="{{ activeRoute('copoun.report') }}"> <a href="{{ route('copoun.report') }}" class="waves-effect">
            <i class="bx bx-barcode"></i>
            <span key="t-promo-code">{{__('views.copoun_report')}}</span>
        </a>
    </li>
@endif

@if (auth()->user()->can('pause-meal-report-view'))
    <li class="{{ activeRoute('order-meals.report') }}"> <a href="{{ route('order-meals.report') }}" class="waves-effect">
            <i class="mdi mdi-food"></i>
            <span key="t-paused-meals-report">{{__('views.order_meals_report')}}</span>
        </a>
    </li>
@endif

@if (auth()->user()->can('monthly-sale-report-view'))
    <li class="{{ activeRoute('sales.report.monthly') }}"> <a href="{{ route('sales.report.monthly') }}" class="waves-effect">
            <i class="bx bx-money"></i>
            <span key="t-monthly-sales">{{__('views.month_sales_report')}}</span>
        </a>
    </li>
@endif

{{-- @if (auth()->user()->can('meal-view')) --}}
<li class="{{ activeRoute('marketing.report') }}"> <a href="{{ route('marketing.report') }}" class="waves-effect">
        <i class="bx bx-tv"></i>
        <span key="t-marketing-campaigns">{{__('views.marketing_report')}}</span>
    </a>
</li>
{{-- @endif --}}
