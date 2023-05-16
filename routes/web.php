<?php

use App\Http\Controllers\admin\GuestController;
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

Route::get('/', function (){
    return 'hahah';
});

Route::get('/booking-hotel-admin', [ViewController::class, 'index'])->name('dashboardadmin');

// login
Route::get('/booking-login', [AuthContoroller::class, 'index'])->name('viewlogin');
Route::post('/booking-login', [AuthContoroller::class, 'login'])->name('login');
Route::get('/booking-logout', [AuthContoroller::class, 'logout'])->name('logout');
// guest
Route::get('/rooms', [ViewController::class, 'guest'])->name('viewguest');
Route::get('/data/guest', [GuestController::class, 'index'])->name('viewdata');
Route::get('/form/guest', [GuestController::class, 'create'])->name('viewform');
Route::get('/store/guest', [GuestController::class, 'store'])->name('storeguest');
Route::get('/destroy/guest/{id}', [GuestController::class, 'destroy'])->name('softdeleteguest');

// dashboard
Route::get('/dashboard', [ViewController::class, 'dashboard'])->name('viewdashboard');

// history
Route::get('/history-booking', [ViewController::class, 'history'])->name('viewhistory');
