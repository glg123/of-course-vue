<?php

namespace App\Providers;

use App\Models\Faq;
use App\Models\Tag;
use App\Models\Food;
use App\Models\Unit;
use App\Models\User;
use App\Models\Zone;
use App\Models\Brand;
use App\Models\Offer;
use App\Models\Clinic;
use App\Models\Copoun;
use App\Models\Review;
use App\Models\Invoice;
use App\Models\Package;
use App\Models\Location;
use App\Models\MealPlan;
use App\Models\Referral;
use App\Policies\FaqPolicy;
use App\Policies\TagPolicy;
use App\Models\MealCategory;
use App\Models\Notification;
use App\Models\ReferralUser;
use App\Policies\FoodPolicy;
use App\Policies\MealPolicy;
use App\Policies\RolePolicy;
use App\Policies\UnitPolicy;
use App\Policies\UserPolicy;
use App\Policies\ZonePolicy;
use App\Models\ContactMethod;
use App\Models\PackageSwitch;
use App\Policies\BrandPolicy;
use App\Policies\OfferPolicy;
use App\Policies\ClinicPolicy;
use App\Policies\CopounPolicy;
use App\Policies\ReviewPolicy;
use App\Policies\InvoicePolicy;
use App\Policies\PackagePolicy;
use App\Policies\LocationPolicy;
use App\Policies\MealPlanPolicy;
use App\Policies\ReferralPolicy;
use App\Policies\PermissionPolicy;
use Spatie\Permission\Models\Role;
use App\Models\DietitianAppointment;
use App\Models\Setting;
use App\Policies\DAppointmentPolicy;
use App\Policies\MealCategoryPolicy;
use App\Policies\NotificationPolicy;
use App\Policies\ReferralUserPolicy;
use Illuminate\Support\Facades\Gate;
use App\Policies\ContactMethodPolicy;
use App\Policies\PackageSwitchPolicy;
use App\Policies\SettingPolicy;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    
    protected $policies = [
        User::class                 => UserPolicy::class,
        Role::class                 => RolePolicy::class,
        Permission::class           => PermissionPolicy::class,
        Tag::class                  => TagPolicy::class,
        Location::class             => LocationPolicy::class,
        Zone::class                 => ZonePolicy::class,
        Faq::class                  => FaqPolicy::class,
        ContactMethod::class        => ContactMethodPolicy::class,
        Copoun::class               => CopounPolicy::class,
        Offer::class                => OfferPolicy::class,
        Clinic::class               => ClinicPolicy::class,
        Referral::class             => ReferralPolicy::class,
        ReferralUser::class         => ReferralUserPolicy::class,
        DietitianAppointment::class => DAppointmentPolicy::class,
        Review::class               => ReviewPolicy::class,
        Notification::class         => NotificationPolicy::class,
        Unit::class                 => UnitPolicy::class,
        Brand::class                => BrandPolicy::class,
        MealCategory::class         => MealCategoryPolicy::class,
        MealPlan::class             => MealPlanPolicy::class,
        Meal::class                 => MealPolicy::class,
        Food::class                 => FoodPolicy::class,
        Invoice::class              => InvoicePolicy::class,
        Package::class              => PackagePolicy::class,
        PackageSwitch::class        => PackageSwitchPolicy::class,
        Setting::class              => SettingPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Define All Permiision And Features To Admin

        Gate::before(function ($user, $ability) {
            return $user->hasRole('admin');
        });
    }
}
