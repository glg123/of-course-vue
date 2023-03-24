<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| back Routes
|--------------------------------------------------------------------------
|
| Here is where you can register back routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "back" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'guest:web'], function () {
    Route::get('/login', 'AuthController@showLogin')->name('login');
    Route::post('/login', 'AuthController@login')->name('login.submit');
});
Route::group(['middleware' => ['auth:web']], function () {
    Route::get('', function () {
        return redirect()->route('dashboard.index');
    });
    Route::get('lang/{lang}', 'SettingController@lang')->name('admin.dashboard.lang'); // new

    Route::any('/logout', 'AuthController@logout')->name('logout');
    Route::get('/profile', 'AuthController@profile')->name('profile');
    Route::post('/update-profile', 'AuthController@updateProfile')->name('profile.update');
    Route::post('/update-password', 'AuthController@resetPassword')->name('password.update');

    // Setting
    Route::group(['prefix' => 'setting'], function () {

        Route::get('general', 'SettingController@generalSettings')->name('general');
        Route::post('general', 'SettingController@updateGeneralSettings')->name('general.update');

        // Terms Route
        Route::get('terms', 'SettingController@termsSettings')->name('terms');
        Route::post('terms', 'SettingController@updateTermSettings')->name('terms.update');

        // Privacy Route
        Route::get('privacy', 'SettingController@privacySettings')->name('privacy');
        Route::post('privacy', 'SettingController@updatePrivacySettings')->name('privacy.update');

        // About Route
        Route::get('about', 'SettingController@aboutSettings')->name('about');
        Route::post('about', 'SettingController@updateAboutSettings')->name('about.update');

        Route::get('tutorials', 'SettingController@tutorialSettings')->name('tutorials');
        Route::post('tutorials', 'SettingController@updateTutorialSettings')->name('tutorials.update');

        Route::group(['as' => 'settings.'], function () {
            // Update Shifts Setting Route
            Route::post('shifts', 'SettingController@updateShiftSettings')->name('shifts.update');
            // Update Notifications Setting Route
            Route::post('notifications', 'SettingController@updateNotificationSettings')->name('notifications.update');
            // Update Splash Setting Route
            Route::post('splash', 'SettingController@updateSplashSettings')->name('splash.update');

            // Appearance Routes
            Route::controller('SettingController')->as('appearance.')->group(function () {

                // Slider Setting Route
                Route::prefix('slider')->as('slider')->group(function () {
                    Route::get('/', 'sliderAppearance');
                    Route::post('/', 'updateSliderAppearance');
                });

                // Slider Setting Route
                Route::prefix('features')->as('features.')->group(function () {
                    Route::get('/', 'featuresAppearance')->name('index');
                    Route::post('/', 'updateFeaturesAppearance')->name('index');
                    Route::get('create', 'createFeature')->name('create');
                    Route::post('store', 'storeFeature')->name('store');
                    Route::get('{feature}/show', 'showFeature')->name('show');
                    Route::get('{feature}/edit', 'editFeature')->name('edit');
                    Route::post('{feature}/update', 'updateFeature')->name('update');
                    Route::post('{feature}/delete', 'deleteFeature')->name('destroy');
                });

                // Banner Bottom Setting Route
                Route::prefix('banner-bottom')->as('banner.bottom')->group(function () {
                    Route::get('/', 'bannerBottomAppearance');
                    Route::post('/', 'updateBannerBottomAppearance');
                });

            });
        });
    });

    // users
    Route::group(['prefix' => 'users'], function () {

        Route::get('staff', 'StaffController@index')->name('users.staff');
        Route::post('staff/store', 'StaffController@store')->name('users.staff.store');
        Route::post('staff/destroy/{id}', 'StaffController@destroy')->name('users.staff.destroy');

        Route::get('driver', 'DriverController@index')->name('users.driver');
        Route::post('driver/store', 'DriverController@store')->name('users.driver.store');
        Route::post('driver/destroy/{id}', 'DriverController@destroy')->name('users.driver.destroy');

        Route::get('celebrity', 'CelebrityController@index')->name('users.celebrity');
        Route::post('celebrity/store', 'CelebrityController@store')->name('users.celebrity.store');
        Route::post('celebrity/destroy/{id}', 'CelebrityController@destroy')->name('users.celebrity.destroy');

        Route::get('dietitian', 'DietitianController@index')->name('users.dietitian');
        Route::post('dietitian/store', 'DietitianController@store')->name('users.dietitian.store');
        Route::post('dietitian/destroy/{id}', 'DietitianController@destroy')->name('users.dietitian.destroy');
    });

    // permission
    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', 'RoleController@index')->name('roles.index');
        Route::get('/create', 'RoleController@create')->name('roles.create');
        Route::post('/store', 'RoleController@store')->name('roles.store');
        Route::get('/edit/{id}', 'RoleController@edit')->name('roles.edit');
        Route::post('/update/{id}', 'RoleController@update')->name('roles.update');
        Route::post('destroy/{id}', 'RoleController@destroy')->name('roles.destroy');
    });

    // Locations
    Route::group(['prefix' => 'locations'], function () {

        Route::get('area', 'LocationController@getArea')->name('locations.area');
        Route::post('area/store', 'LocationController@storeArea')->name('locations.area.store');
        Route::get('block', 'LocationController@getBlock')->name('locations.block');
        Route::post('block/store', 'LocationController@storeBlock')->name('locations.block.store');
        Route::post('destroy/{id}', 'LocationController@destroy')->name('locations.destroy');

        Route::get('zone', 'LocationController@getZone')->name('locations.zone');
        Route::post('zone/store', 'LocationController@storeZone')->name('locations.zone.store');
        Route::post('zone/destroy/{id}', 'LocationController@destroyZone')->name('locations.zone.destroy');

        Route::get('zone-driver', 'LocationController@getZoneDriver')->name('locations.zone.driver');
        Route::post('zone-driver/store', 'LocationController@storeZoneDriver')->name('locations.zone.driver.store');
    });
    // tags
    Route::group(['prefix' => 'tags'], function () {
        Route::get('customer', 'TagController@getCustomer')->name('tags.customer');
        Route::get('meal', 'TagController@getMeal')->name('tags.meal');
        Route::post('store', 'TagController@store')->name('tags.store');
        Route::post('update/{id}', 'TagController@update')->name('tags.update');
        Route::post('destroy/{id}', 'TagController@destroy')->name('tags.destroy');
    });
    // referrals
    Route::group(['prefix' => 'referrals'], function () {
        Route::get('users', 'ReferralController@index')->name('referrals.index');
        Route::post('update-setting', 'ReferralController@updateSetting')->name('referrals.update.settings');
        Route::get('type', 'ReferralController@referralType')->name('referrals.type');
        Route::post('type', 'ReferralController@referralTypeStore')->name('referrals.type.store');
        Route::post('destroy/{id}', 'ReferralController@destroy')->name('referrals.destroy');
    });

    // FAQ Route
    Route::controller('FaqController')->prefix('faqs')->as('faqs.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('show/{faq}', 'show')->name('show');
        Route::get('edit/{faq}', 'edit')->name('edit');
        Route::post('update/{faq}', 'update')->name('update');
        Route::post('delete/{faq}', 'destroy')->name('destroy');
    });

    // Contact Methods Route
    Route::controller('ContactMethodController')->prefix('contacts')->as('contacts.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('show/{contact}', 'show')->name('show');
        Route::get('edit/{contact}', 'edit')->name('edit');
        Route::post('update/{contact}', 'update')->name('update');
        Route::post('delete/{contact}', 'destroy')->name('destroy');
    });

    // copouns
    Route::group(['prefix' => 'copouns'], function () {
        Route::get('/', 'CopounController@index')->name('copouns.index');
        Route::post('store', 'CopounController@store')->name('copouns.store');
        Route::post('destroy/{id}', 'CopounController@destroy')->name('copouns.destroy');
    });

    // offers
    Route::group(['prefix' => 'offers'], function () {
        Route::get('/', 'OfferController@index')->name('offers.index');
        Route::post('store', 'OfferController@store')->name('offers.store');
        Route::post('destroy/{id}', 'OfferController@destroy')->name('offers.destroy');
    });

    // clinic
    Route::group(['prefix' => 'clinic'], function () {
        Route::get('/', 'EClinicController@index')->name('clinic.index');
        Route::post('store', 'EClinicController@store')->name('clinic.store');
        Route::post('destroy/{id}', 'EClinicController@destroy')->name('clinic.destroy');
    });

    // mealCaregory
    Route::group(['prefix' => 'meal-category'], function () {
        Route::get('/', 'MealCategoryController@index')->name('meal.category.index');
        Route::post('store', 'MealCategoryController@store')->name('meal.category.store');
        Route::post('destroy/{id}', 'MealCategoryController@destroy')->name('meal.category.destroy');
    });

    // mealPlan
    Route::group(['prefix' => 'meal-plan'], function () {
        Route::get('/', 'MealPlanController@index')->name('meal.plan.index');
        Route::post('store', 'MealPlanController@store')->name('meal.plan.store');
        Route::post('destroy/{id}', 'MealPlanController@destroy')->name('meal.plan.destroy');
    });

    //Meal
    Route::group(['prefix' => 'meal'], function () {
        Route::get('/', 'MealController@index')->name('meal.index');
        Route::get('/create', 'MealController@create')->name('meal.create');
        Route::post('store', 'MealController@store')->name('meal.store');
        Route::get('/edit/{id}', 'MealController@edit')->name('meal.edit');
        Route::post('update/{id}', 'MealController@update')->name('meal.update');
        Route::post('delete/{id}', 'MealController@destroy')->name('meal.destroy');
    });
    //Package
    Route::group(['prefix' => 'package'], function () {
        Route::get('/', 'PackageController@index')->name('package.index');
        Route::get('/create', 'PackageController@create')->name('package.create');
        Route::post('store', 'PackageController@store')->name('package.store');
        Route::get('/edit/{id}', 'PackageController@edit')->name('package.edit');
        Route::post('update/{id}', 'PackageController@update')->name('package.update');
        Route::post('delete/{id}', 'PackageController@destroy')->name('package.destroy');

        //varients
        Route::get('varients', 'PackageController@showVarients')->name('package.showVarients');
        Route::get('varients/create/{id}', 'PackageController@createVarients')->name('package.createVarients');
        Route::post('varients/store', 'PackageController@storeVarients')->name('package.storeVarients');
        Route::get('varients/edit/{id}', 'PackageController@editVarients')->name('package.editVarients');
        Route::post('varients/update/{id}', 'PackageController@updateVarients')->name('package.updateVarients');
        Route::post('varients/delete/{id}', 'PackageController@destroyVarients')->name('package.destroyVarients');
    });
    //PackageSwitch
    Route::group(['prefix' => 'package-switch'], function () {
        Route::get('/', 'PackageSwitchController@index')->name('switch.index');
        Route::get('get-varients/{id}', 'PackageSwitchController@getVarients')->name('switch.getVarients');
        Route::post('store', 'PackageSwitchController@store')->name('switch.store');
        Route::any('swap', 'PackageSwitchController@update')->name('switch.swap');
        Route::post('delete/{id}', 'PackageSwitchController@destroy')->name('switch.destroy');
    });
    // foods
    Route::group(['prefix' => 'food'], function () {

        Route::get('stock', 'FoodController@getStock')->name('food.stock.index');

        Route::get('purchase', 'FoodController@getFoodPurchase')->name('food.purchase.index');

        Route::get('purchase/items', 'FoodController@getFoodPurchaseItems')->name('food.purchase.items');
        Route::post('purchase/store', 'FoodController@storeFoodPurchase')->name('food.purchase.store');

        Route::get('adjust', 'FoodController@getFoodAdjust')->name('food.adjust.index');
        Route::post('adjust/store', 'FoodController@storeFoodAdjust')->name('food.adjust.store');

        Route::get('', 'FoodController@index')->name('food.index');
        Route::post('store', 'FoodController@store')->name('food.store');
        Route::post('destroy/{id}', 'FoodController@destroy')->name('food.destroy');
    });


    // operation
    Route::get('index', 'DashboardController@index')->name('dashboard.index');

    Route::group(['prefix' => 'users'], function () {
        Route::get('customer', 'UserController@index')->name('customer.index');
        Route::get('customer/otp', 'UserController@customerOtp')->name('customer.otp');
        Route::get('customer/create', 'UserController@create')->name('customer.create');
        Route::post('customer/store', 'UserController@store')->name('customer.store');
        Route::get('customer/edit/{id}', 'UserController@edit')->name('customer.edit');
        Route::post('customer/update/{id}', 'UserController@update')->name('customer.update');
        Route::get('customer/addresses', 'UserController@getAddresses')->name('customer.addresses');
        Route::get('customer/addresses/change-default', 'UserController@addressDefaultChange')->name('customer.address.default');
        Route::any('customer/addresses/change-default-approval/{id}', 'UserController@addressDefaultApproval')->name('customer.address.status');
        Route::post('customer/destroy/{id}', 'UserController@destroy')->name('customer.destroy');
    });

    // Sales
    Route::controller('SalesRequestController')->prefix('sales')->as('sales.')->group(function () {
        Route::get('request', 'getSalesRequest')->name('request');
        Route::get('today', 'getSalesToday')->name('today');
        Route::get('discount', 'getSalesDiscount')->name('discount');
        Route::get('reminder', 'getSalesReminder')->name('reminder');
    });

    Route::controller('UserCartController')->prefix('cart')->as('cart.')->group(function () {
        Route::get('abandoned', 'index')->name('abandoned');
        Route::get('abandoned/user/{id}', 'abandoned_user')->name('abandoned.user');
        Route::post('store/', 'store')->name('abandoned.store');
    });

    Route::group(['prefix' => 'review'], function () {
        Route::get('meal', 'ReviewController@getMeal')->name('review.meal');
        Route::post('destroy/{id}', 'ReviewController@destroy')->name('review.destroy');
    });

    Route::group(['prefix' => 'payment'], function () {
        Route::get('invoice', 'PaymentController@getInvoice')->name('payment.invoice');
        Route::get('print/invoice/{id}', 'InvoiceController@pdfInvoice')->name('print.invoice');
    });
    Route::group(['prefix' => 'notifications'], function () {
        Route::get('', 'NotificationController@index')->name('notifications.index');
        Route::post('store', 'NotificationController@store')->name('notifications.store');
    });
    Route::group(['prefix' => 'dietitian'], function () {
        Route::get('appointment', 'DietitianAppointmentController@index')->name('dietitian.appointment');
    });
    Route::controller('SettingController')->prefix('select2')->as('select2.')->group(function () {

        Route::get('customers', 'select2_customers')->name('customers');
        Route::get('tags', 'select2_tags')->name('tags');
        Route::get('foods', 'select2_foods')->name('foods');
    });

    //

    // Report Module
    // Sales
    Route::namespace('Report')->group(function () {

        Route::controller('OrderController')->prefix('orders-report')->as('orders.')->group(function () {
            Route::get('', 'getOrders')->name('report');
            Route::get('foods', 'getFoods')->name('report.foods');
        });

        Route::controller('DeliveryController')->prefix('delivery-report')->as('delivery.')->group(function () {
            Route::get('', 'index')->name('report');
        });

        Route::controller('CopounController')->prefix('copoun-report')->as('copoun.')->group(function () {
            Route::get('', 'index')->name('report');
        });

        Route::controller('DriversController')->prefix('drivers-report')->as('drivers.')->group(function () {
            Route::get('', 'index')->name('report');
        });

        Route::controller('PlansController')->prefix('plans-report')->as('plans.')->group(function () {
            Route::get('', 'index')->name('report');
        });

        Route::controller('SalesController')->prefix('sales-report')->as('sales.')->group(function () {
            Route::get('', 'index')->name('report');
            Route::get('monthly', 'getMonthly')->name('report.monthly');
        });

        Route::controller('OrderMealsController')->prefix('order-meals-report')->as('order-meals.')->group(function () {
            Route::get('', 'index')->name('report');
        });

        Route::controller('MarketingCampaignsController')->prefix('marketing-report')->as('marketing.')->group(function () {
            Route::get('', 'index')->name('report');
        });
    });
});
