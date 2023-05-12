<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminCouponController;
use App\Http\Controllers\AdminInstructorController;
use App\Http\Controllers\AdminProgramController;
use App\Http\Controllers\AdminSalesController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminOrganisationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('lang/{locale}', [LocaleController::class, 'switchLanguage'])->name('switch_language');
    
// Sessions
Route::group([], function () {
    Route::get('login', [SessionController::class, 'create'])->middleware('guest')->name('login');
    Route::post('login', [SessionController::class, 'store'])->middleware('guest')->name('session.store');
    Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth')->name('session.destroy');
});

// Users
Route::get('forgot-password', [UserController::class, 'createForgotPassword'])->middleware('guest')->name('forgot-password.create');
Route::post('reset-password', [UserController::class, 'storeResetPassword'])->middleware('guest')->name('reset-password.store');
Route::get('reset-password/{token}', [UserController::class, 'createResetPassword'])->middleware('guest')->name('password.reset');
Route::post('forgot-password', [UserController::class, 'storeForgotPassword'])->middleware('guest')->name('forgot-password.store');
Route::group(['as' => 'user.'], function () {
    Route::get('register', [UserController::class, 'create'])->middleware('guest')->name('create');
    Route::post('register', [UserController::class, 'store'])->middleware('guest')->name('store');
    Route::get('dashboard', [UserController::class, 'dashboard'])->middleware('auth')->name('dashboard');
    Route::get('my-account', [UserController::class, 'edit'])->middleware('auth')->name('my-account');
    Route::post('user/update', [UserController::class, 'update'])->middleware('auth')->name('update');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('home')->with([
        'flash' => 'success',
        'message' => trans('verify-email.email-verified'),
    ]);
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with([
        'flash' => 'success',
        'message' => trans('verify-email.email-sent'),
    ]);
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Programs
Route::resource('programs', ProgramController::class)->only(['index', 'show']);

// Categories
Route::resource('categories', CategoryController::class)->only(['show']);

// Contact
Route::get('contact-us', function () {
    return view('contact.contact-us');
})->name('contact-us');

// About
Route::get('about-us', function () {
    return view('about-us.about-us');
})->name('about-us');

// Admin
Route::group(['middleware' => 'can:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', function () {
        return view('admin.layout.layout');
    })->name('dashboard');
    Route::resource('programs', AdminProgramController::class);
    Route::resource('instructors', AdminInstructorController::class);
    Route::resource('users', AdminUserController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('sales', AdminSalesController::class);
    Route::resource('organisations', AdminOrganisationController::class);
    Route::resource('users', AdminUserController::class);
    Route::resource('coupons', AdminCouponController::class);
});

// Privacy Policy Page
Route::get('privacy-policy', function () {
    return view('pages.privacy-policy.privacy-policy');
})->name('privacy-policy');

// Terms of Service Page
Route::get('terms-and-conditions', function () {
    return view('pages.terms-and-conditions.terms-and-conditions');
})->name('terms-and-conditions');

// Cart
Route::resource('cart', CartController::class)->only(['store'])->middleware(['auth', 'verified']);

// Sales
Route::resource('sales', SaleController::class)->middleware('verified');
Route::post('sales/return', [SaleController::class, 'returnResponse'])->name('sales.return-resp');

Route::get('test', function () {
});


Route::get('/run-migrations', function () {
    return Artisan::call('migrate', ["--force" => true ]);
});
