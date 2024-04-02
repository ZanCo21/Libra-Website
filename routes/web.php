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


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/forgotPassword',  function () {return view('auth.forgotPassword');})->name('forgotPassword');
Route::post('/login/post', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('/manageBooks', function () {
    return view('admin.manageBooks');
});

Route::get('/cart', function () {
    return view('home.cart');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard')->middleware('role:admin')->group(function () {
        Route::get('/',  function () {return view('admin.dashboard');})->name('dashboard');
    });
    
    Route::prefix('home')->middleware('role:peminjam')->group(function () {
        Route::get('/', function () {
            return view('home');
        });
        Route::get('/detail', function () {
            return view('home.detail');
        });
        
    });
});
