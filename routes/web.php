<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Fe\ApiController;
use App\Http\Controllers\Fe\BlogController;
use App\Http\Controllers\Fe\CartController;
use App\Http\Controllers\Fe\HomeController;
use App\Http\Controllers\Fe\ShopController;
use App\Http\Controllers\Fe\AccountController;
use App\Http\Controllers\Fe\CommentController;
use App\Http\Controllers\Fe\ContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogControllers;
use App\Http\Controllers\Fe\CheckoutController;
use App\Http\Controllers\Fe\FavoriteController;
use App\Http\Controllers\Fe\WishListController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\VariantController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Fe\LoginGoogleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\CommentAdminController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Fe\Payment\vnPayPayMentController;

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
    Route::get('/', [DashboardController::class, 'index'])->name('admin.index');
    Route::get('/dash_board', [DashboardController::class, 'getStatistics'])->name('admin.getStatistics');
    Route::resources([
        'profile' => ProfileController::class,
        'category' => CategoryController::class,
        'subCategory' => SubCategoryController::class,
        'product' => ProductController::class,
        'variants' => ProductVariantController::class,
        'blog' => BlogControllers::class,
        'coupon' => CouponController::class,
        'comments'=> CommentAdminController::class,
        // 'shop' => ProfileController::class,
    ]);;
    Route::get('/creat/{product}', [ProductVariantController::class, 'add'])->name('variants.add');
    Route::get('/comment/{product}', [CommentAdminController::class, 'show'])->name('showComments');
    Route::post('/creat/{product}', [ProductVariantController::class, 'postAdd']);
    Route::get('/orders',[OrderAdminController::class,'index'])->name('admin.order');
    Route::get('/orders/{id}',[OrderAdminController::class,'show'])->name('admin.order.show');
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
Route::get('/products/{id}', [HomeController::class, 'modalProduct'])->name('modalProduct');

// Route::get('/mail', [HomeController::class, 'mail']);

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
    Route::get('/{category}/{slug}', [HomeController::class, 'detail'])->name('detail');

    Route::post('/addToCartJs/{product}', [CartController::class, 'addToCartJs'])->name('addToCartJs');

    //contact
    Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
    Route::post('/contact', [ContactController::class, 'postContact'])->name('postContact');

    Route::get('/profile', [AccountController::class, 'index'])->name('profile');

    Route::get('trackOrder', [CheckOutController::class, 'trackOrder'])->name('trackOrder');
    Route::post('trackOrder', [CheckOutController::class, 'checkOrder']);
});
Route::prefix('checkout')->group(function () {
    Route::get('/', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/checkCoupon', [CheckoutController::class, 'checkCoupon'])->name('checkCoupon');
    Route::post('/vnpay_payment', [vnPayPayMentController::class, 'vnpay_payment'])->name('vnPay_Payment');
    Route::post('/momo_payment', [vnPayPayMentController::class, 'momo_payment'])->name('momo_Payment');
    Route::post('/cash', [CheckoutController::class, 'cash'])->name('cash');
});

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart');
    Route::post('/updateCar', [CartController::class, 'updateCart'])->name('updateCart');
    Route::get('/addToCart/{product}', [CartController::class, 'addToCart'])->name('addToCart');
    Route::post('/addToCartJs/{product}', [CartController::class, 'addToCartJs'])->name('addToCartJs');
    Route::get('/deleteCart/{id}', [CartController::class, 'deleteCart'])->name('deleteCart');
});

Route::prefix('wishList')->group(function () {
    Route::get('/', [FavoriteController::class, 'index'])->name('wishList');
    Route::get('/addWishList/{product}', [FavoriteController::class, 'addFavorite'])->name('addFavorite');
    Route::delete('/deleteWishList/{id}', [FavoriteController::class, 'deleteWishList'])->name('deleteWishList');
});


