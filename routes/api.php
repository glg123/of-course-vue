<?php

use App\Apidocs\Endpoints\Address\DeleteAddressEndpoint;
use App\Apidocs\Endpoints\Address\ListAddressEndpoint;
use App\Apidocs\Endpoints\Address\RequestDefaultAddressEndpoint;
use App\Apidocs\Endpoints\Address\SetAddressEndpoint;
use App\Apidocs\Endpoints\Address\UpdateAddressEndpoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Johnylemon\Apidocs\Facades\Apidocs;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\MealController;
use App\Http\Controllers\Api\UnitController;
use App\Http\Controllers\Api\UserController;
use App\Apidocs\Endpoints\Auth\LoginEndpoint;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\OrderController;
use App\Apidocs\Endpoints\Auth\LogoutEndpoint;
use App\Apidocs\Endpoints\Tag\ListTagEndpoint;
use App\Http\Controllers\Api\ClinicController;
use App\Http\Controllers\Api\CopounController;
use App\Http\Controllers\Api\OrderlController;
use App\Http\Controllers\Api\ReviewController;
use App\Apidocs\Endpoints\Auth\ProfileEndpoint;
use App\Apidocs\Endpoints\Faq\ListFaqsEndpoint;
use App\Http\Controllers\Api\PackageController;
use App\Apidocs\Endpoints\Auth\RegisterEndpoint;
use App\Apidocs\Endpoints\Food\ListFoodEndpoint;
use App\Apidocs\Endpoints\Meal\ListMealEndpoint;
use App\Apidocs\Endpoints\Unit\ListUnitEndpoint;
use App\Apidocs\Endpoints\User\ListUserEndpoint;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\MealPlanController;
use App\Http\Controllers\Api\ReferralController;
use App\Apidocs\Endpoints\Brand\ListBrandEndpoint;
use App\Apidocs\Endpoints\Offer\ListOffersEndpoint;
use App\Apidocs\Endpoints\Offer\CheckCopounEndpoint;
use App\Apidocs\Endpoints\Offer\ListCopounsEndpoint;
use App\Http\Controllers\Api\MealCategoryController;
use App\Apidocs\Endpoints\Auth\UpdateProfileEndpoint;
use App\Apidocs\Endpoints\Location\ListZonesEndpoint;
use App\Apidocs\Endpoints\Auth\SendVerifyCodeEndpoint;
use App\Apidocs\Endpoints\Auth\UpdatePasswordEndpoint;
use App\Apidocs\Endpoints\Package\ListPackageEndpoint;
use App\Http\Controllers\Api\ContactMethodsController;
use App\Apidocs\Endpoints\Contact\ListContactsEndpoint;
use App\Apidocs\Endpoints\MealPlan\ListMealPlanEndpoint;
use App\Apidocs\Endpoints\Referral\ListReferralEndpoint;
use App\Http\Controllers\Api\UserSubscriptionController;
use App\Apidocs\Endpoints\Auth\SendResetPasswordEndpoint;
use App\Apidocs\Endpoints\Location\ListLocationsEndpoint;
use App\Http\Controllers\Api\UserForbiddenFoodController;
use App\Apidocs\Endpoints\ClinicQuestion\SetAnswerEndpoint;
use App\Apidocs\Endpoints\Package\ListPackageMealsEndpoint;
use App\Apidocs\Endpoints\Referral\SetReferralUserEndpoint;
use App\Apidocs\Endpoints\User\SetCelebrityPackageEndpoint;
use App\Apidocs\Endpoints\Auth\ConfirmResetPasswordEndpoint;
use App\Apidocs\Endpoints\Auth\ConfirmVerifyAccountEndpoint;
use App\Apidocs\Endpoints\Referral\ListReferralUserEndpoint;
use App\Http\Controllers\Api\DietitianAppointmentController;
use App\Apidocs\Endpoints\Package\ListPackageVarientsEndpoint;
use App\Apidocs\Endpoints\ClinicQuestion\ListQuestionsEndpoint;
use App\Apidocs\Endpoints\User\GetPackagesForCelebrityEndpoint;
use App\Apidocs\Endpoints\MealCategory\ListMealCategoryEndpoint;
use App\Apidocs\Endpoints\ClinicQuestion\ListQuestionShowEndpoint;
use App\Apidocs\Endpoints\Referral\ListReferralTransactionsEndpoint;
use App\Apidocs\Endpoints\ForbiddenFood\SetUserForbiddenFoodEndpoint;
use App\Apidocs\Endpoints\ClinicQuestion\ListQuestionsAnswersEndpoint;
use App\Apidocs\Endpoints\DietitianAppointment\SetAppointmentEndpoint;
use App\Apidocs\Endpoints\ForbiddenFood\ListUserForbiddenFoodEndpoint;
use App\Apidocs\Endpoints\UserSubscription\SetUserSubscriptionEndpoint;
use App\Apidocs\Endpoints\UserSubscription\ListUserSubscriptionEndpoint;
use App\Apidocs\Endpoints\DietitianAppointment\UpdateAppointmentEndpoint;
use App\Apidocs\Endpoints\DietitianAppointment\ListDietitanAppointmentEndpoint;
use App\Apidocs\Endpoints\Notification\ListNotificationEndpoint;
use App\Apidocs\Endpoints\Notification\MarkAllNotificationEndpoint;
use App\Apidocs\Endpoints\Notification\MarkNotificationEndpoint;
use App\Apidocs\Endpoints\Order\ListOrderEndpoint;
use App\Apidocs\Endpoints\Order\SetOrderEndpoint;
use App\Apidocs\Endpoints\Order\ShowOrderEndpoint;
use App\Apidocs\Endpoints\Order\UpdateOrderEndpoint;
use App\Apidocs\Endpoints\Order\UpdateOrderStatusEndpoint;
use App\Apidocs\Endpoints\Review\DelReviewEndpoint;
use App\Apidocs\Endpoints\Review\ListReviewEndpoint;
use App\Apidocs\Endpoints\Review\SetReviewEndpoint;
use App\Apidocs\Endpoints\Review\ShowReviewEndpoint;
use App\Apidocs\Endpoints\Review\UpdateReviewEndpoint;
use App\Apidocs\Endpoints\Setting\ListSettingEndpoint;
use App\Http\Controllers\Api\NotificationsController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\UserAddressesController;

Apidocs::defineGroup('auth', 'Auth');
Apidocs::defineGroup('unit', 'Unit');
Apidocs::defineGroup('brand', 'Brand');
Apidocs::defineGroup('food', 'Food');
Apidocs::defineGroup('meaCategory', 'Meal Category');
Apidocs::defineGroup('mealPlan', 'Meal Plans');
Apidocs::defineGroup('tag', 'Tags');
Apidocs::defineGroup('meal', 'Meals');
Apidocs::defineGroup('package', 'Packages');
Apidocs::defineGroup('location', 'Locations & Zones');
Apidocs::defineGroup('referral', 'Referral');
Apidocs::defineGroup('faq', 'Faq');
Apidocs::defineGroup('contact', 'Contact');
Apidocs::defineGroup('copoun', 'Copouns & Offers');
Apidocs::defineGroup('clinic', 'Clinic');
Apidocs::defineGroup('D-Appointment', 'Dietitian Appointments');
Apidocs::defineGroup('user', 'Users');
Apidocs::defineGroup('address', 'User Addresses');
Apidocs::defineGroup('user-s', 'User Subscriptions');
Apidocs::defineGroup('F-food', 'Food Type');
Apidocs::defineGroup('order', 'User Order');
Apidocs::defineGroup('review', 'User Review');
Apidocs::defineGroup('notification', 'User Notifications');
Apidocs::defineGroup('setting', 'Global Settings');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function () {

    Route::post('login', [AuthController::class, 'login'])->apidocs(LoginEndpoint::class);
    Route::post('register', [AuthController::class, 'register'])->apidocs(RegisterEndpoint::class);
    Route::group(['middleware' => 'auth:sanctum'], function(){
   // Route::group(['middleware' => 'auth:api'], function () {
        Route::get('profile', [AuthController::class, 'profile'])->apidocs(ProfileEndpoint::class);
        Route::post('update-profile', [AuthController::class, 'updateProfile'])->apidocs(UpdateProfileEndpoint::class);
        Route::any('logout', [AuthController::class, 'logout'])->apidocs(LogoutEndpoint::class);
        Route::post('reset-password', [AuthController::class, 'resetPassword'])->apidocs(UpdatePasswordEndpoint::class);
        Route::get('resend-verify-code', [AuthController::class, 'resendVerifyCode'])->apidocs(SendVerifyCodeEndpoint::class);
        Route::post('verify-account', [AuthController::class, 'verifyUser'])->apidocs(ConfirmVerifyAccountEndpoint::class);
    });
    Route::post('send-reset-password', [AuthController::class, 'sendResetPasswordCode'])->apidocs(SendResetPasswordEndpoint::class);
    Route::post('confirm-reset-password', [AuthController::class, 'confirmResetCode'])->apidocs(ConfirmResetPasswordEndpoint::class);
});

Route::get('users', [UserController::class, 'index'])->apidocs(ListUserEndpoint::class);
Route::get('users/get-celebrity-package/{id}', [UserController::class, 'getCelebrityPackages'])->apidocs(GetPackagesForCelebrityEndpoint::class);
Route::post('users/set-celebrity-package', [UserController::class, 'setCelebrityPackages'])->apidocs(SetCelebrityPackageEndpoint::class);



Route::get('units', [UnitController::class, 'index'])->apidocs(ListUnitEndpoint::class);
Route::get('brands', [BrandController::class, 'index'])->apidocs(ListBrandEndpoint::class);
Route::get('foods', [FoodController::class, 'index'])->apidocs(ListFoodEndpoint::class);
Route::get('meal-categories', [MealCategoryController::class, 'index'])->apidocs(ListMealCategoryEndpoint::class);
Route::get('meal-plans', [MealPlanController::class, 'index'])->apidocs(ListMealPlanEndpoint::class);
Route::get('tags', [TagController::class, 'index'])->apidocs(ListTagEndpoint::class);
Route::get('meals', [MealController::class, 'index'])->apidocs(ListMealEndpoint::class);
Route::get('packages', [PackageController::class, 'index'])->apidocs(ListPackageEndpoint::class);
Route::get('packages/varients/{id}', [PackageController::class, 'getVarients'])->apidocs(ListPackageVarientsEndpoint::class);
Route::get('packages/meals/{id}', [PackageController::class, 'getMeals'])->apidocs(ListPackageMealsEndpoint::class);

Route::get('locations', [LocationController::class, 'index'])->apidocs(ListLocationsEndpoint::class);
Route::get('zones', [LocationController::class, 'getZones'])->apidocs(ListZonesEndpoint::class);

Route::get('referrals', [ReferralController::class, 'index'])->apidocs(ListReferralEndpoint::class);
Route::get('referrals/users', [ReferralController::class, 'getReferralUsers'])->apidocs(ListReferralUserEndpoint::class);
Route::post('referrals/users/{user}', [ReferralController::class, 'setReferralUser'])->apidocs(SetReferralUserEndpoint::class);
Route::get('referrals/transactions', [ReferralController::class, 'getReferralUserTransactions'])->apidocs(ListReferralTransactionsEndpoint::class);

Route::get('faqs', [FaqController::class, 'index'])->apidocs(ListFaqsEndpoint::class);
Route::get('contact-methods', [ContactMethodsController::class, 'index'])->apidocs(ListContactsEndpoint::class);
Route::get('copouns', [CopounController::class, 'index'])->apidocs(ListCopounsEndpoint::class);
Route::get('copoun/valid/{code}', [CopounController::class, 'checkValidCopoun'])->apidocs(CheckCopounEndpoint::class);
Route::get('offers', [OfferController::class, 'index'])->apidocs(ListOffersEndpoint::class);
Route::get('clinic/questions', [ClinicController::class, 'index'])->apidocs(ListQuestionsEndpoint::class);
Route::get('clinic/question/{id}', [ClinicController::class, 'show'])->apidocs(ListQuestionShowEndpoint::class);
Route::get('clinic/answers', [ClinicController::class, 'answers'])->apidocs(ListQuestionsAnswersEndpoint::class);

//Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('user/forbidden-foods', [UserForbiddenFoodController::class, 'index'])->apidocs(ListUserForbiddenFoodEndpoint::class);
    Route::post('user/forbidden-foods', [UserForbiddenFoodController::class, 'setFood'])->apidocs(SetUserForbiddenFoodEndpoint::class);

    Route::get('my-notifications', [NotificationsController::class, 'index'])->apidocs(ListNotificationEndpoint::class);
    Route::get('my-notifications/update-notification-seen/{id}', [NotificationsController::class, 'markAsRead'])->apidocs(MarkNotificationEndpoint::class);
    Route::get('my-notifications/mark-all-read', [NotificationsController::class, 'markAllRead'])->apidocs(MarkAllNotificationEndpoint::class);


    Route::post('clinic/set-answer', [ClinicController::class, 'setAnswer'])->apidocs(SetAnswerEndpoint::class);

    Route::get('dietitian/appointments', [DietitianAppointmentController::class, 'index'])->apidocs(ListDietitanAppointmentEndpoint::class);
    Route::post('dietitian/set-appointment', [DietitianAppointmentController::class, 'setAppointment'])->apidocs(SetAppointmentEndpoint::class);
    Route::post('dietitian/update-appointment/{id}', [DietitianAppointmentController::class, 'UpdateAppointment'])->apidocs(UpdateAppointmentEndpoint::class);

    Route::get('user/subscriptions', [UserSubscriptionController::class, 'index'])->apidocs(ListUserSubscriptionEndpoint::class);
    Route::post('user/set-subscription', [UserSubscriptionController::class, 'setSubscription'])->apidocs(SetUserSubscriptionEndpoint::class);

    Route::get('user/orders', [OrderController::class, 'index'])->apidocs(ListOrderEndpoint::class);
    Route::get('user/orders/{id}', [OrderController::class, 'show'])->apidocs(ShowOrderEndpoint::class);
    Route::post('user/make-order', [OrderController::class, 'makeOrder'])->apidocs(SetOrderEndpoint::class);
    Route::post('user/update-order/{id}', [OrderController::class, 'updateOrder'])->apidocs(UpdateOrderEndpoint::class);
    Route::post('user/update-order-status/{id}', [OrderController::class, 'updateOrderStatus'])->apidocs(UpdateOrderStatusEndpoint::class);

    // Address
    Route::get('user/addresses', [UserAddressesController::class, 'index'])->apidocs(ListAddressEndpoint::class);
    Route::post('user/addresses/store', [UserAddressesController::class, 'store'])->apidocs(SetAddressEndpoint::class);
    Route::post('user/addresses/update/{id}', [UserAddressesController::class, 'update'])->apidocs(UpdateAddressEndpoint::class);
    Route::post('user/addresses/request-default/{id}', [UserAddressesController::class, 'setDefaultRequest'])->apidocs(RequestDefaultAddressEndpoint::class);
    Route::post('user/addresses/delete/{id}', [UserAddressesController::class, 'delete'])->apidocs(DeleteAddressEndpoint::class);


    Route::get('user/reviews', [ReviewController::class, 'index'])->apidocs(ListReviewEndpoint::class);
    Route::get('user/reviews/{id}', [ReviewController::class, 'show'])->apidocs(ShowReviewEndpoint::class);
    Route::post('user/make-review', [ReviewController::class, 'makeReview'])->apidocs(SetReviewEndpoint::class);
    Route::post('user/update-review/{id}', [ReviewController::class, 'updateReview'])->apidocs(UpdateReviewEndpoint::class);
    Route::post('user/delete-review/{id}', [ReviewController::class, 'delete'])->apidocs(DelReviewEndpoint::class);
});

Route::get('settings', [SettingController::class, 'index'])->apidocs(ListSettingEndpoint::class);
