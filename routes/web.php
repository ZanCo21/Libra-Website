<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;

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


// Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');
Route::get('/forgotPassword',  function () {return view('auth.forgotPassword');})->name('forgotPassword');
Route::post('/login/post', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/get/provinsi', [RegisterController::class, 'getProvinsi'])->name('getProvinsi');
Route::get('/get/kota/{id}', [RegisterController::class, 'getKota'])->name('getKota');
Route::get('/get/kecamatan/{id}', [RegisterController::class, 'getKecamatan'])->name('getKecamatan');
Route::get('/get/kelurahan/{id}', [RegisterController::class, 'getKelurahan'])->name('getKelurahan');




Route::get('/', function () {
    return view('home');
})->name('home');


Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard')->middleware('role:admin')->group(function () {
        Route::get('/',  function () {return view('admin.dashboard');})->name('dashboard');
        Route::get('/manageBooks', function () {
            return view('admin.manageBooks');
        });
    });
    
    Route::prefix('home')->middleware('role:peminjam')->group(function () {
        Route::get('/detail', function () {
            return view('home.detail');
        })->name('detailProduct');
        Route::get('/cart', function () {
            return view('home.cart');
        });
        
    });
});
