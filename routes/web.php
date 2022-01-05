<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', [GuestController::class, 'index']);

Route::get('/login', [LoginController::class, 'formLogin']);
Route::post('/login-user', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register-customer', [RegisterController::class, 'store']);
Route::get('/session-timeout', function () {
    return view('session-timeout');
})->name('session-timeout');

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
Route::get('/menu-list', [CashierController::class, 'menu'])->name('cashier-menu')->middleware('role:kasir');
Route::post('/menu-save', [CashierController::class, 'menuSave'])->name('save-menu')->middleware('role:kasir');
Route::delete('/menu-list/{menu}', [CashierController::class, 'menuDestroy'])->name('menu-destroy')->middleware('role:kasir');
Route::get('/menu-list/{menu}/edit', [CashierController::class, 'menuEdit'])->name('edit-menu')->middleware('role:kasir');
Route::put('/menu-list/{menu}', [CashierController::class, 'menuEditUpdate'])->name('update-menu')->middleware('role:kasir');
Route::get('/cashier-profile', [CashierController::class, 'profile'])->name('cashier-profile')->middleware('role:kasir');
Route::put('/cashier-update', [CashierController::class, 'profileEdit'])->name('cashier-update')->middleware('role:kasir');
Route::get('/cashier-profile-pass', [CashierController::class, 'changePassword'])->name('cashier-profile-pass')->middleware('role:kasir');
Route::put('/cashier-profile-update', [CashierController::class, 'editPassword'])->name('cashier-pass-update')->middleware('role:kasir');
Route::get('/cashier-logout', function () {
    session()->flush();
    return redirect('/');
})->name('cashier-logout')->middleware('role:kasir');

Route::resource('customer', CustomerController::class)->middleware('role:pelanggan');
Route::get('/add-to-cart/{menu}', [CustomerController::class, 'addToCart'])->name('add-cart')->middleware('role:pelanggan');
Route::get('/customer-profile', [CustomerController::class, 'profile'])->name('customer-profile')->middleware('role:pelanggan');
Route::put('/customer-update', [CustomerController::class, 'profileEdit'])->name('customer-update')->middleware('role:pelanggan');
Route::get('/customer-profile-pass', [CustomerController::class, 'changePassword'])->name('customer-profile-pass')->middleware('role:pelanggan');
Route::put('/customer-profile-update', [CustomerController::class, 'editPassword'])->name('customer-pass-update')->middleware('role:pelanggan');
Route::get('/customer-logout', function () {
    session()->flush();
    return redirect('/');
})->name('customer-logout')->middleware('role:pelanggan');