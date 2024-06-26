<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Fe\HomeController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\VariantController;
use App\Http\Controllers\Fe\CartController;
use App\Http\Controllers\Fe\ShopController;
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
        // 'shop' => ProfileController::class,
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


Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Route để nhận query string từ form
    Route::get('/search', [HomeController::class, 'getSearch'])->name('getSearch');

    // Route để xử lý URL thân thiện
    Route::get('/tim-kiem/{search}', [HomeController::class, 'search'])->name('search');
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
    Route::get('/reset_password/{token}', [HomeController::class, 'resetPassword'])->name('resetPassword');
    Route::post('/reset_password/{token}', [HomeController::class, 'postResetPassword']);
    //Product detail
    Route::get('/{product}/{slug}', [HomeController::class, 'detail'])->name('detail');
    //Add to cart
    //Shop
    //filter
    Route::get('/shop', [ShopController::class, 'index'])->name('shop');
    Route::post('/filterByCategory/{id}', [ShopController::class, 'filterByCategory'])->name('filterByCategory');
    Route::get('/filter', [ShopController::class, 'filter'])->name('filter');
    Route::get('/filter_name', [ShopController::class, 'filter_name'])->name('filter_name');
    //Blog
    Route::get('/blogs',[HomeController::class,'blogs'])->name('blogs');
});
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart');
    Route::post('/updateCar', [CartController::class, 'updateCart'])->name('updateCart');
    Route::get('/addToCart/{product}', [CartController::class, 'addToCart'])->name('addToCart');
});
