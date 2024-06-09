<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Fe\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

//Login
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login', [HomeController::class, 'postLogin']);
// Register
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/register', [HomeController::class, 'postRegister']);
// Logot
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
//  forgotPassword
Route::get('/forgotPassword', [HomeController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/forgotPassword', [HomeController::class, 'postForgotPassword']);
//ResetPassword
Route::get('/resetPassword', [HomeController::class, 'resetPassword'])->name('resetPassword');
Route::post('/resetPassword', [HomeController::class, 'postResetPassword']);
// Admin
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::resources([
        'profile' => ProfileController::class,
        'category' => ProfileController::class,
        'subCategory' => ProfileController::class,
        'product' => ProfileController::class,
        'productVariant' => ProfileController::class,
        'blog' => ProfileController::class,
        'shop' => ProfileController::class,
    ]);;
});
