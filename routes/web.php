<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\LangController;

//dd(Hash::make('123456789'));
use Illuminate\Support\Facades\Hash;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('{any}', function(){
    return view('master.front');
})->where('any', '.*');
// Switch Language Route
Route::as('lang')->group(function () {
    Route::get('/lang', LangController::class);
});

// Front Routes
Route::as('front.')->group(function () {

    // Home Route
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
    });

    // Terms Route
    Route::controller(TermsController::class)->prefix('terms')->as('terms.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    // Privacy Route
    Route::controller(PrivacyController::class)->prefix('privacy')->as('privacy.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    // About Route
    Route::controller(AboutController::class)->prefix('about')->as('about.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    // Login Page
    Route::view('login', 'front.auth.login')->name('login');

    // Register Page
    Route::view('register', 'front.auth.register')->name('register');

    // Password Forgot Page
    Route::view('password/forgot', 'front.auth.password.forgot')->name('password.forgot');

    // Password Reset Page
    Route::view('password/reset', 'front.auth.password.reset')->name('password.reset');

    // Password Done Page
    Route::view('password/done', 'front.auth.password.done')->name('password.done');

    // OTP Page
    Route::view('otp', 'front.auth.otp')->name('otp');

    // Confirmed Page
    Route::view('confirmed', 'front.auth.confirmed')->name('confirmed');

    // Contact Page
    Route::view('contact', 'front.contact.index')->name('contact');

    // Menu Page
    Route::view('menu', 'front.menu.index')->name('menu');

    // Menu Details Page
    Route::view('menu/details', 'front.menu.details')->name('menu.details');

    // Profile Page
    Route::view('profile', 'front.user.profile.index')->name('profile');

    // Address Page
    Route::view('address', 'front.user.address.index')->name('address');

    // Address Create Page
    Route::view('address/create', 'front.user.address.create')->name('address.create');

    // Profits Page
    Route::view('profits', 'front.user.profits.index')->name('profits');

    // Orders Page
    Route::view('orders', 'front.user.orders.index')->name('orders');

    // Invoices Page
    Route::view('invoices', 'front.user.invoices.index')->name('invoices');

    // Dislike Page
    Route::view('dislike', 'front.user.dislike.index')->name('dislike.index');

    // Allergy Page
    Route::view('allergy', 'front.user.allergy.index')->name('allergy.index');

    // Setting Page
    Route::view('setting', 'front.user.setting.index')->name('setting.index');

});


// Route::prefix('user')->group(function () {

//     //------------ AUTH ------------
//     Route::get('/login', 'Auth\User\LoginController@showForm')->name('user.login');
//     Route::post('/login-submit', 'Auth\User\LoginController@login')->name('user.login.submit');
//     Route::get('/logout', 'Auth\User\LoginController@logout')->name('user.logout');

//     //------------ REGISTER ------------
//     Route::get('/register', 'Auth\User\RegisterController@showForm')->name('user.register');
//     Route::post('/register-submit', 'Auth\User\RegisterController@register')->name('user.register.submit');
//     Route::get('/verify-link', 'Auth\User\RegisterController@verify')->name('user.account.verify');
//     Route::post('/verify-account', 'Auth\User\RegisterController@attempVerify')->name('user.attempVerify');
//     Route::post('/resend-code', 'Auth\User\RegisterController@resendCode')->name('user.resend.code');

//     //------------ FORGOT ------------
//     Route::get('/forgot', 'Auth\User\ForgotController@showForm')->name('user.forgot');
//     Route::post('/forgot-submit', 'Auth\User\ForgotController@forgot')->name('user.forgot.submit');
//     Route::post('/change-password-submit', 'Auth\User\ForgotController@changepass')->name('user.change.password');
//     Route::post('/change-reset-password-submit', 'Auth\User\ForgotController@changeResetpass')->name('user.change.reset.password');

//     //------------ DASHBOARD ------------
//     Route::get('/dashboard', 'User\AccountController@index')->name('user.dashboard');
//     Route::get('/profile', 'User\AccountController@profile')->name('user.profile');


//     //------------ SETTING ------------
//     Route::post('/profile/update', 'User\AccountController@profileUpdate')->name('user.profile.update');
//     Route::get('/addresses', 'User\AccountController@addresses')->name('user.address');
//     Route::post('/billing/addresses', 'User\AccountController@billingSubmit')->name('user.billing.submit');
//     Route::post('/shipping/addresses', 'User\AccountController@shippingSubmit')->name('user.shipping.submit');

//     //------------ ORDER ------------
//     Route::get('/orders', 'User\OrderController@index')->name('user.order.index');
//     Route::get('/order/print/{id}', 'User\OrderController@printOrder')->name('user.order.print');
//     Route::get('/order/invoice/{id}', 'User\OrderController@details')->name('user.order.invoice');

// });


// // ************************************ FRONTEND **********************************************

// Route::get('/', 'Front\FrontendController@index')->name('front.index');
// Route::get('/product/{slug}', 'Front\FrontendController@product')->name('front.product');
// Route::get('/product-menu', 'Front\FrontendController@productMenu')->name('front.product.menu');
// Route::get('/campaign/products', 'Front\FrontendController@compaignProduct')->name('front.campaign');
// Route::get('/blog', 'Front\FrontendController@blog')->name('front.blog');
// Route::get('/brands', 'Front\FrontendController@brands')->name('front.brand');
// Route::get('/blog/{slug}', 'Front\FrontendController@blogDetails')->name('front.blog.details');
// Route::get('/faq', 'Front\FrontendController@faq')->name('front.faq');
// Route::get('/faq/{slug}', 'Front\FrontendController@show')->name('front.faq.details');
// Route::get('/contact', 'Front\FrontendController@contact')->name('front.contact');
// Route::post('/contact/submit', 'Front\FrontendController@contactEmail')->name('front.contact.submit');
// Route::get('/reviews', 'Front\FrontendController@reviews')->name('front.reviews');
// Route::get('/review/page', 'Front\FrontendController@review_submit')->name('front.rev.page');
// Route::get('/review/sub', 'Front\FrontendController@slider_o_update')->name('front.rev.subbmit');
// Route::get('/top-reviews', 'Front\FrontendController@topReviews')->name('front.top.reviews');
// Route::post('/review/submit', 'Front\FrontendController@reviewSubmit')->name('front.review.submit');
// Route::post('/subscriber/submit', 'Front\FrontendController@subscribeSubmit')->name('front.subscriber.submit');
// Route::get('set/currency/{id}', 'Front\FrontendController@currency')->name('front.currency.setup');
// Route::get('set/language/{id}', 'Front\FrontendController@language')->name('front.language.setup');
// Route::post('/promo/submit', 'Front\CartController@promoStore')->name('front.promo.submit');
// //------------ CATALOG ------------
// Route::get('/catalog', 'Front\CatalogController@index')->name('front.catalog');

// //------------ CHECKOUT ------------
// Route::get('/payments/verify/{payment?}',[FrontController::class,'payment_verify'])->name('payment-verify');
