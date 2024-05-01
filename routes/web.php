<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\ExportExcelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageAccountController;
use App\Http\Controllers\ManageBooksController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PeminjamanController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/nyoba', [PeminjamanController::class, 'RejectBatasPeminjaman']);

Route::post('/books/import', [ManageBooksController::class, 'import'])->name('books.import');

Route::get('/transactionBooks/invoice/{id}', [PaymentController::class, 'invoice'])->name('invoice');
Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard')->middleware('role:admin,petugas')->group(function () {
        Route::get('/analytics',  [ManageBooksController::class, 'dashboard'])->name('dashboard');
        Route::get('/manageBooks', [ManageBooksController::class, 'index'])->name('manageBooks');
        Route::post('/storeBooks', [ManageBooksController::class, 'store'])->name('storeBooks');
        Route::get('/manageBooks/editBook/{id}', [ManageBooksController::class, 'getEditBook'])->name('getEditBook');
        Route::put('/manageBooks/editBook/update/{id}', [ManageBooksController::class, 'getUpdateBook'])->name('getUpdateBook');

        Route::get('/transactionBooks', [ManageBooksController::class, 'showtransactionBooks'])->name('transactionBooks');
        Route::get('/transactionBooks/scanQr/{id}', [ManageBooksController::class, 'showScanQr'])->name('showScanQr');
        Route::get('/transactionBooks/changePageScan/{id}', [ManageBooksController::class, 'showScanPage'])->name('showScanQr');
        Route::post('/transactionBooks/changePageScan/UpdateStatus', [ManageBooksController::class, 'updateStatus'])->name('updateStatus');

        Route::get('/transactionBooks/sendEmail/{id}', [PaymentController::class, 'sendEmailAfterPay'])->name('sendEmailAfterPay');

        Route::get('/manageAccount', [ManageAccountController::class, 'index'])->name('manageAccount');
        Route::post('/manageAccount/changeStatus', [ManageAccountController::class, 'changeStatus'])->name('changeStatus');
        Route::get('/manageRequestAccount', [ManageAccountController::class, 'requestAccount'])->name('manageRequestAccount');
        Route::post('/manageRequestAccount/approve', [ManageAccountController::class, 'approveAccount'])->name('approveAccount');

        Route::get('/exportyearly/export/{year}', [ExportExcelController::class, 'exportYearlyReport'])->name('exportYearlyReport');

        Route::post('/storePeminjamanManual', [PeminjamanController::class, 'storePeminjamanManual'])->name('storePeminjamanManual');
    });
    
    Route::prefix('home')->middleware('role:peminjam')->group(function () {
        Route::get('/detail/{id}', [HomeController::class, 'show'])->name('detailBook');
        Route::post('/storeWishList', [HomeController::class, 'storeWishList'])->name('storeWishList');
        Route::post('/deleteWishList', [HomeController::class, 'deleteWishList'])->name('deleteWishList');
        Route::post('/storeUlasan', [HomeController::class, 'storeUlasan'])->name('storeUlasan');
        Route::post('/storeUlasanMultiple', [HomeController::class, 'storeUlasanMultiple'])->name('storeUlasanMultiple');

        
        Route::post('/storePeminjaman', [PeminjamanController::class, 'storePeminjaman'])->name('storePeminjaman');
        Route::post('/cancelPeminjaman/{id}', [PeminjamanController::class, 'canclePeminjaman'])->name('cancelPeminjaman');
        
        Route::get('/detail/peminjaman/{id}', [PeminjamanController::class, 'detailPeminjaman'])->name('detailPeminjaman');
        Route::get('/cart', [PeminjamanController::class, 'showcart'])->name('cart');

        
    });
});
