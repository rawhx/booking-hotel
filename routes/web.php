<?php

use App\Http\Controllers\admin\AccountController;
use App\Http\Controllers\admin\GuestController;
use App\Http\Controllers\admin\IncomeController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\ViewController;
use App\Http\Controllers\AuthContoroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthContoroller::class, 'index'])->name('home');
    Route::post('/', [AuthContoroller::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/booking-logout', [AuthContoroller::class, 'logout'])->name('logout');

    Route::get('/navbar', function (){ return view('admin/nav'); });
    
    // dashboard
    Route::get('/booking-hotel-admin', [ViewController::class, 'index'])->name('dashboardadmin');
    Route::get('/dashboard', [ViewController::class, 'dashboard'])->name('viewdashboard');

    // guest
    Route::get('/rooms', [ViewController::class, 'guest'])->name('viewguest');
    Route::get('/data/guest', [GuestController::class, 'index'])->name('viewdata');
    Route::get('/form/guest', [GuestController::class, 'create'])->name('viewform');
    Route::get('/store/guest', [GuestController::class, 'store'])->name('storeguest');
    Route::get('/destroy/guest/{id}', [GuestController::class, 'destroy'])->name('softdeleteguest');
    
    // history
    Route::get('/history-booking', [ViewController::class, 'history'])->name('viewhistory');
    
    // income
    Route::get('/income-rooms', [ViewController::class, 'income_rooms'])->name('viewincomerooms');
    Route::get('/excel-income-rooms', [IncomeController::class, 'excelrooms'])->name('viewincomerooms');
    
    // profile
    Route::get('/profile', [ViewController::class, 'profile'])->name('viewprofile');
    Route::post('/profile/img/{id}', [ProfileController::class, 'image']);
    Route::post('/profile/password/{id}', [ProfileController::class, 'password']);
    Route::get('/profile/{id}', [ProfileController::class, 'update'])->name('update_profile');

    // accounts
    Route::get('/accounts', [ViewController::class, 'accounts'])->name('viewaccounts');
    Route::get('/data/accounts', [AccountController::class, 'index'])->name('dataaccount');
    Route::post('/store/accounts', [AccountController::class, 'store'])->name('storeaccounts');
    Route::get('/edit/accounts/{id}', [AccountController::class, 'edit'])->name('editaccount');
    Route::post('/edit/accounts/{id}', [AccountController::class, 'update'])->name('editaccount');
    Route::post('/destroy/accounts/{id}', [AccountController::class, 'destroy'])->name('deleteaccounts');
});