<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', function () {
    return view('customer.dashboard');
});

Route::get('/login', [LoginController::class, 'formLogin']);
Route::post('/login', [LoginController::class, 'login']);

Route::resource('admin', AdminController::class)->middleware('role:admin');
Route::get('/admin-profile', [AdminController::class, 'profile'])->name('admin-profile')->middleware('role:admin');
Route::put('/admin-update', [AdminController::class, 'profileEdit'])->name('admin-update')->middleware('role:admin');
Route::get('/admin-profile-pass', [AdminController::class, 'changePassword'])->name('admin-profile-pass')->middleware('role:admin');
Route::put('/admin-pass-update', [AdminController::class, 'editPassword'])->name('admin-pass-update')->middleware('role:admin');
Route::get('/admin-logout', function () {
    session()->flush();    
    return redirect('/');
})->name('admin-logout')->middleware('role:admin');

Route::resource('cashier', CashierController::class)->middleware('role:kasir');
Route::get('/cashier-profile', [CashierController::class, 'profile'])->name('cashier-profile')->middleware('role:kasir');
Route::put('/cashier-update', [CashierController::class, 'profileEdit'])->name('cashier-update')->middleware('role:kasir');
Route::get('/cashier-profile-pass', [CashierController::class, 'changePassword'])->name('cashier-profile-pass')->middleware('role:kasir');
Route::put('/cashier-profile-update', [CashierController::class, 'editPassword'])->name('cashier-pass-update')->middleware('role:kasir');
Route::get('/cashier-logout', function () {
    session()->flush();    
    return redirect('/');
})->name('cashier-logout')->middleware('role:kasir');

Route::resource('customer', CustomerController::class)->middleware('role:pelanggan');