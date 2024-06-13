<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Fe\HomeController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\VariantController;
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
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::resources([
        'profile' => ProfileController::class,
        'category' => CategoryController::class,
        'subCategory' => SubCategoryController::class,
        'product' => ProductController::class,
        'variants' => ProductVariantController::class,
        // 'blog' => BlogController::class,
        'shop' => ProfileController::class,
    ]);;
    Route::get('/creat/{product}', [ProductVariantController::class, 'add'])->name('variants.add');
    Route::post('/creat/{product}', [ProductVariantController::class, 'postAdd']);
    // Route::get('/variant/show/{id}', [VariantController::class, 'show'])->name('variants.show');
    // Route::get('edit/{$id}',[VariantController::class,'edit'])->name('variants.edit');
});
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'postLogin', 'postLogin']);
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});
