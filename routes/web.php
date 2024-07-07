<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogControllers;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Fe\CommentController;
use App\Http\Controllers\Fe\HomeController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\VariantController;
use App\Http\Controllers\Fe\AccountController;
use App\Http\Controllers\Fe\BlogController;
use App\Http\Controllers\Fe\CartController;
use App\Http\Controllers\Fe\LoginGoogleController;
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
        'blog' => BlogControllers::class,
        // 'shop' => ProfileController::class,
    ]);;
    Route::get('/creat/{product}', [ProductVariantController::class, 'add'])->name('variants.add');
    Route::post('/creat/{product}', [ProductVariantController::class, 'postAdd']);
    // Route::get('/variant/show/{id}', [VariantController::class, 'show'])->name('variants.show');
    // Route::get('edit/{$id}',[VariantController::class,'edit'])->name('variants.edit');
});
Route::prefix('/admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'postLogin', 'postLogin']);

    // Route::get('login/google',[AdminController::class,'google'])->name('google');
    // Route::get('login/google/callback',[AdminController::class,'googleCallback'])->name('googleCallback');

    // Route::get('auth/google', [AdminController::class, 'redirectToGoogle'])->name('auth.google');
    // Route::get('auth/google/callback', [AdminController::class, 'handleGoogleCallback']);

    Route::get('login/facebook', [AdminController::class, 'facebook'])->name('facebook');
    Route::get('login/facebook/callback', [AdminController::class, 'facebookCallback'])->name('facebookCallback');

    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/register', [AdminController::class, 'register'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'postregister']);
});


// Group for public routes
Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Route để nhận query string từ form
    Route::get('/search', [HomeController::class, 'getSearch'])->name('getSearch');

    // Route để xử lý URL thân thiện
    Route::get('/tim-kiem/{search}', [HomeController::class, 'search'])->name('search');

    //Login
    Route::get('/login', [HomeController::class, 'login'])->name('login');
    Route::post('/login', [HomeController::class, 'postLogin']);

    //Login Google
    Route::get('/auth/google', [LoginGoogleController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [LoginGoogleController::class, 'handleGoogleCallback']);

    // Register
    Route::get('/register', [HomeController::class, 'register'])->name('register');
    Route::post('/register', [HomeController::class, 'postRegister']);

    // Logout
    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

    // Forgot Password
    Route::get('/forgotPassword', [HomeController::class, 'forgotPassword'])->name('forgotPassword');
    Route::post('/forgotPassword', [HomeController::class, 'postForgotPassword']);

    // Reset Password
    Route::get('/verifyOtp', [HomeController::class, 'showVerifyOTP'])->name('verifyOTP');
    Route::post('/verifyOtp', [HomeController::class, 'postVerifyOTP']);
    Route::get('/reset_password/{token}', [HomeController::class, 'resetPassword'])->name('resetPassword');
    Route::post('/reset_password/{token}', [HomeController::class, 'postResetPassword']);

    // Shop
    Route::get('/shop', [ShopController::class, 'index'])->name('shop');
    Route::post('/filterByCategory/{id}', [ShopController::class, 'filterByCategory'])->name('filterByCategory');
    Route::get('/filter', [ShopController::class, 'filter'])->name('filter');
    Route::get('/filter_name', [ShopController::class, 'filter_name'])->name('filter_name');

    // Blog routes
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
    Route::get('/blogs/{slug}', [BlogController::class, 'blogDetail'])->name('blogDetail');
    Route::get('/blog/search', [BlogController::class, 'getSearch'])->name('getSearchBlog');
    Route::get('/blog/{search}', [BlogController::class, 'blogSearch'])->name('blogSearch');

    // Comment route
    Route::post('/comment/{id}', [CommentController::class, 'index'])->name('comment');

    // Product detail route
    Route::get('/{product}/{slug}', [HomeController::class, 'detail'])->name('detail');
});

// Group for admin routes
Route::group(['prefix' => 'account', 'middleware' => 'admin'], function () {
    Route::resource('profile', AccountController::class);
});

Route::resource('profile', AccountController::class);
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart');
    Route::post('/updateCar', [CartController::class, 'updateCart'])->name('updateCart');
    Route::get('/addToCart/{product}', [CartController::class, 'addToCart'])->name('addToCart');
});
