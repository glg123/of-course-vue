<li class="{{ activeRoute('dashboard.index') }}">
    <a href="{{ route('dashboard.index') }}" class="waves-effect active">
        <i class="bx bx-grid-alt"></i>
        <span key="t-index"> {{__('views.dashboard')}} </span>
    </a>
</li>

<li>
    <a href="javascript: void(0);" class=" waves-effect" aria-expanded="false">
        <i class="dripicons-user-group"></i>
        <span key="t-clients">{{__('views.customers')}}</span>
    </a>
    <ul class="sub-menu mm-collapse pb-3" aria-expanded="false">
        <li><a href="{{ route('customer.index') }}"
                class="bg-white text-dark rounded {{ activeSubRoute('customer.index') }}">{{__('views.all_customers')}}</a></li>
        <li><a href="{{ route('customer.index', ['type' => 'not_verified']) }}"
                class="bg-white text-dark rounded">{{__('views.not_active_customers')}}</a></li>
                <li><a href="{{ route('customer.address.default') }}"
                    class="bg-white text-dark rounded {{ activeSubRoute('customer.address.default') }}">{{__('views.all_customers_addresses')}}</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class=" waves-effect" aria-expanded="false">
        <i class="bx bx-list-ul"></i>
        <span key="t-sales-order"> {{__('views.sales')}}</span>
    </a>
    <ul class="sub-menu mm-collapse pb-3" aria-expanded="false">
        <li><a href="{{ route('sales.request') }}"
                class="bg-white text-dark rounded {{ activeSubRoute('sales.request') }}">{{__('views.sales_request')}}</a></li>
        <li><a href="{{ route('sales.today') }}"
                class="bg-white text-dark rounded {{ activeSubRoute('sales.today') }}"> {{__('views.sales_request_today')}}</a></li>
        <li><a href="{{ route('sales.discount') }}"
                class="bg-white text-dark rounded {{ activeSubRoute('sales.discount') }}">{{__('views.sales_request_discount')}}</a></li>
        <li><a href="{{ route('sales.reminder') }}"
                class="bg-white text-dark rounded {{ activeSubRoute('sales.reminder') }}">{{__('views.sales_reminder')}}</a></li>
    </ul>
</li>

<li class="{{ activeRoute('review.meal') }}">
    <a href="{{ route('review.meal') }}" class="waves-effect">
        <i class="bx bx-star"></i>
        <span key="t-meals-rating">{{__('views.meals_review')}}</span>
    </a>
</li>

<li class="{{ activeRoute('payment.invoice') }}">
    <a href="{{ route('payment.invoice') }}" class="waves-effect">
        <i class="bx bx-credit-card"></i>
        <span key="t-payment-invoice"> {{__('views.payment_invoice')}} </span>
    </a>
</li>
@if (auth()->user()->can('referrals-view'))
    <li class="{{ activeRoute('referrals.index') }}">
        <a href="{{ route('referrals.index') }}" class="waves-effect">
            <i class="bx bx-receipt"></i>
            <span key="t-referrals">{{__('views.referrals')}}</span>
        </a>
    </li>
@endif
@if (auth()->user()->can('promo-code-view'))
    <li class="{{ activeRoute('copouns.index') }}">
        <a href="{{ route('copouns.index') }}" class="waves-effect">
            <i class="bx bx-barcode"></i>
            <span key="t-promo">{{__('views.copouns')}}</span>
        </a>
    </li>
@endif
@if (auth()->user()->can('offer-view'))
    <li class="{{ activeRoute('offers.index') }}">
        <a href="{{ route('offers.index') }}" class="waves-effect">
            <i class="bx bxs-offer"></i>
            <span key="t-offers">{{__('views.offers')}}</span>
        </a>
    </li>
@endif
@if (auth()->user()->can('offer-view'))
<li class="{{ activeRoute('cart.abandoned') }}">
    <a href="{{ route('cart.abandoned') }}" class="waves-effect">
        <i class="bx bxs-cart-alt"></i>
        <span key="t-abandoned">{{__('views.abandoned')}}</span>
    </a>
</li>
@endif

<li class="{{ activeRoute('notifications.index') }}">
    <a href="{{ route('notifications.index') }}" class="waves-effect">
        <i class="bx bx-bell"></i>
        <span key="t-push-notifications"> {{__('views.notifications')}}</span>
    </a>
</li>

<li class="{{ activeRoute('dietitian.appointment') }}">
    <a href="{{ route('dietitian.appointment') }}" class="waves-effect">
        <i class="bx bx-plus-circle"></i>
        <span key="t-customer-dietitian-appointment"> {{__('views.dietitian_appointment')}} </span>
    </a>
</li>
