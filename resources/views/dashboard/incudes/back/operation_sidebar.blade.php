<li>
    <a href="javascript: void(0);" class=" waves-effect" aria-expanded="false">
        <i class="bx bx-box"></i>
        <span key="t-stocks">{{__('views.stores')}}</span>
    </a>

    <ul class="sub-menu mm-collapse pb-3" aria-expanded="false">
        @if (auth()->user()->can('stocks-view'))
            <li><a href="{{ route('food.stock.index') }}"
                    class="bg-white text-dark rounded {{ activeSubRoute('food.stock.index') }}">{{__('views.stores')}}</a></li>
        @endif
        @if (auth()->user()->can('purchase-view'))
            <li><a href="{{ route('food.purchase.index') }}"
                    class="bg-white text-dark rounded {{ activeSubRoute('food.purchase.index') }}">{{__('views.food_purchase')}}</a></li>
        @endif
        @if (auth()->user()->can('adjust-stock-view'))
            <li><a href="{{ route('food.adjust.index') }}"
                    class="bg-white text-dark rounded {{ activeSubRoute('food.adjust.index') }}">{{__('views.store_setting')}}</a></li>
        @endif
        @if (auth()->user()->can('master-data-view'))
            <li><a href="{{ route('food.index') }}"
                    class="bg-white text-dark rounded {{ activeSubRoute('food.index') }}">{{__('views.food')}}</a></li>
        @endif
    </ul>
</li>
@if (auth()->user()->can('plan-view'))
    <li class="{{ activeRoute('package.index') }}">
        <a href="{{ route('package.index') }}" class="waves-effect disabled">
            <i class="bx bx-task"></i>
            <span key="t-operations-plans">{{__('views.plans')}}</span>
        </a>
    </li>
@endif
@if (auth()->user()->can('meal-view'))
    <li class="{{ activeRoute('meal.index') }}">
        <a href="{{ route('meal.index') }}" class="waves-effect disabled">
            <i class="bx bx-food-menu"></i>
            <span key="t-meals"> {{__('views.meals')}}</span>
        </a>
    </li>
@endif
@if (auth()->user()->can('meals-category-view'))
    <li class="{{ activeRoute('meal.category.index') }}">
        <a href="{{ route('meal.category.index') }}" class="waves-effect">
            <i class="bx bx-grid-alt"></i>
            <span key="t-meals">{{__('views.meals_category')}}</span>
        </a>
    </li>
@endif
@if (auth()->user()->can('diet-plan-view'))
    <li class="{{ activeRoute('meal.plan.index') }}">
        <a href="{{ route('meal.plan.index') }}" class="waves-effect">
            <i class="bx bx-task"></i>
            <span key="t-diet">{{__('views.meals_plan')}}</span>
        </a>
    </li>
@endif
@if (auth()->user()->can('plan-switch-view'))
    <li class="{{ activeRoute('switch.index') }}">
        <a href="{{ route('switch.index') }}" class="waves-effect disabled">
            <i class="bx bx-move-horizontal"></i>
            <span key="t-meals">{{__('views.switch_plan')}}</span>
        </a>
    </li>
@endif

<li>
    <a href="javascript: void(0);" class=" waves-effect" aria-expanded="false">
        <i class="bx bx-user"></i>
        <span key="t-users">{{__('views.users')}}</span>
    </a>
    <ul class="sub-menu mm-collapse pb-3" aria-expanded="false">
        @if (auth()->user()->can('manager-view'))
            <li><a href="{{ route('users.staff') }}"
                    class="bg-white text-dark rounded {{ activeSubRoute('users.staff') }}">{{__('views.employee')}}</a></li>
        @endif
        @if (auth()->user()->can('manager-driver-view'))
            <li><a href="{{ route('users.driver') }}"
                    class="bg-white text-dark rounded {{ activeSubRoute('users.driver') }}">{{__('views.delivers')}}</a>
            </li>
        @endif
        @if (auth()->user()->can('manager-dietitian-view'))
            <li><a href="{{ route('users.dietitian') }}"
                    class="bg-white text-dark rounded {{ activeSubRoute('users.dietitian') }}">{{__('views.dietitian')}}</a>
            </li>
        @endif
        @if (auth()->user()->can('manager-celebrity-view'))
            <li><a href="{{ route('users.celebrity') }}"
                    class="bg-white text-dark rounded {{ activeSubRoute('users.celebrity') }}">{{__('views.celebrity')}}</a></li>
        @endif
    </ul>
</li>
@if (auth()->user()->can('location-view'))
    <li>
        <a href="javascript: void(0);" class=" waves-effect" aria-expanded="false">
            <i class="bx bx-map-pin"></i>
            <span key="t-location">{{__('views.Location')}}</span>
        </a>
        <ul class="sub-menu mm-collapse pb-3" aria-expanded="false">
            <li><a href="{{ route('locations.zone.driver') }}"
                    class="bg-white text-dark rounded {{ activeSubRoute('locations.zone.driver') }}">{{__('views.area_zone')}}</a>
            </li>
            <li><a href="{{ route('locations.area') }}"
                    class="bg-white text-dark rounded {{ activeSubRoute('locations.area') }}">{{__('views.area')}}</a></li>
            <li><a href="{{ route('locations.block') }}"
                    class="bg-white text-dark rounded {{ activeSubRoute('locations.block') }}">{{__('views.block')}}</a></li>
            <li><a href="{{ route('locations.zone') }}"
                    class="bg-white text-dark rounded  {{ activeSubRoute('locations.zone') }}">{{__('views.zone')}}</a></li>
        </ul>
    </li>
@endif

<li>
    <a href="javascript: void(0);" class=" waves-effect" aria-expanded="false">
        <i class="bx bx-purchase-tag-alt"></i>
        <span key="t-tags">{{__('views.tags')}}</span>
    </a>
    <ul class="sub-menu mm-collapse pb-3" aria-expanded="false">
        @if (auth()->user()->can('customer-tag-view'))
            <li><a href="{{ route('tags.customer') }}"
                    class="bg-white text-dark rounded {{ activeSubRoute('tags.customer') }}">{{__('views.customer_tags')}}</a>
            </li>
        @endif
        @if (auth()->user()->can('meal-tag-view'))
            <li><a href="{{ route('tags.meal') }}"
                    class="bg-white text-dark rounded {{ activeSubRoute('tags.meal') }}">{{__('views.meals_tags')}}</a></li>
        @endif
    </ul>
</li>




@if (auth()->user()->can('e-clinic-view'))
    <li class="{{ activeRoute('clinic.index') }}">
        <a href="{{ route('clinic.index') }}" class="waves-effect">
            <i class="bx bx-building"></i>
            <span key="t-clinic">{{__('views.clinic')}}</span>
        </a>
    </li>
@endif
