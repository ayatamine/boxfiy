<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Front\UserController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\UserProfile;
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

Route::view('/', 'home')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {

    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');

    Route::get('profile', UserProfile::class)
        ->name('profile');
    
    // Route::get('/admin/notifications/mark-as-read', 'markNotificationsAsRead')->name('notification.mark-as-readAll');
    // Route::get('//notifications/{id}/mark-as-read', 'markSingleNotificationsAsRead')->name('notification.mark-as-read');

    Route::resource('tickets', App\Http\Controllers\Front\TicketController::class);
    Route::post('tickets/{id}/reply', [App\Http\Controllers\Front\TicketController::class,'ticketReply'])->name('ticket.reply');
    Route::controller(UserController::class)->group(function(){
        Route::get('add-funds', 'addFunds')->name('addFunds');
        Route::get('wallet', 'wallet')->name('wallet');
        Route::get('order-history', 'orderHistory')->name('orders.index');
        Route::get('notifications', 'notifications')->name('notifications');
        Route::get('notifications/mark-as-read', 'markNotificationsAsRead')->name('notification.mark-as-readAll');
    });
});
Route::get('about-us', [App\Http\Controllers\Front\HomeController::class,'aboutUs'])->name('about');
Route::get('terms-and-conditions', [App\Http\Controllers\Front\HomeController::class,'Terms'])->name('terms');
Route::get('privacy-policy', [App\Http\Controllers\Front\HomeController::class,'privacy'])->name('privacy');
Route::get('services', [App\Http\Controllers\Front\HomeController::class,'services'])->name('services');
Route::get('spaceremit/notify',[App\Http\Controllers\Front\PaymentController::class,'spaceremitNotify'])->name('spaceremit.notify');
Route::get('api',[App\Http\Controllers\Front\HomeController::class,'apiPage'])->name('api_page');

// Route::resource('service', App\Http\Controllers\Front\ServiceController::class)->only('index');

// Route::resource('order', App\Http\Controllers\Front\OrderController::class)->only('index');

// Route::resource('api', App\Http\Controllers\Front\ApiController::class)->only('index');

