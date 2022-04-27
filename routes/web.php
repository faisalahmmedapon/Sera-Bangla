<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\BackendUserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\MaterialController;
use App\Http\Controllers\Backend\BackendOrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Cart\CartOrderController;
use App\Http\Controllers\Frontend\AuthUserProfileController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\FrontendOrderController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;


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



Route::namespace('Admin')->prefix('/auth/admin/')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::get('login',[AdminController::class,'index'])->name('auth.admin.login.page')->middleware('auth.admin.login.url.check');
    Route::get('register',[AdminController::class,'create'])->name('auth.admin.register.page')->middleware('auth.admin.login.url.check');
    Route::post('register',[AdminController::class,'register'])->name('auth.admin.register');
    Route::post('login',[AdminController::class,'login'])->name('auth.admin.login');

    Route::get('logout', [AdminController::class,'logout'])->name('auth.admin.logout');

});


Route::namespace('Backend')->prefix('/')->middleware('auth.admin.login.check')->group(function () {

    // after admin login
    Route::get('auth/admin/dashboard',[BackendController::class,'dashboard'])->name('auth.admin.dashboard');


    Route::get('brands',[BrandController::class,'index'])->name('brand.index');
    Route::get('brand/create',[BrandController::class,'create'])->name('brand.create');
    Route::post('brand/store',[BrandController::class,'store'])->name('brand.store');
    Route::get('brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
    Route::post('brand/update/{id}',[BrandController::class,'update'])->name('brand.update');
    Route::get('brand/status/{id}',[BrandController::class,'status'])->name('brand.status');
    Route::get('brand/delete/{id}',[BrandController::class,'delete'])->name('brand.delete');

    Route::get('categories',[CategoryController::class,'index'])->name('category.index');
    Route::get('category/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('category/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('category/status/{id}',[CategoryController::class,'status'])->name('category.status');
    Route::get('category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');


    Route::get('colors',[ColorController::class,'index'])->name('color.index');
    Route::get('color/create',[ColorController::class,'create'])->name('color.create');
    Route::post('color/store',[ColorController::class,'store'])->name('color.store');
    Route::get('color/edit/{id}',[ColorController::class,'edit'])->name('color.edit');
    Route::post('color/update/{id}',[ColorController::class,'update'])->name('color.update');
    Route::get('color/status/{id}',[ColorController::class,'status'])->name('color.status');
    Route::get('color/delete/{id}',[ColorController::class,'delete'])->name('color.delete');

    Route::get('sizes',[SizeController::class,'index'])->name('size.index');
    Route::get('size/create',[SizeController::class,'create'])->name('size.create');
    Route::post('size/store',[SizeController::class,'store'])->name('size.store');
    Route::get('size/edit/{id}',[SizeController::class,'edit'])->name('size.edit');
    Route::post('size/update/{id}',[SizeController::class,'update'])->name('size.update');
    Route::get('size/status/{id}',[SizeController::class,'status'])->name('size.status');
    Route::get('size/delete/{id}',[SizeController::class,'delete'])->name('size.delete');

    Route::get('coupons',[CouponController::class,'index'])->name('coupon.index');
    Route::get('coupon/create',[CouponController::class,'create'])->name('coupon.create');
    Route::post('coupon/store',[CouponController::class,'store'])->name('coupon.store');
    Route::get('coupon/edit/{id}',[CouponController::class,'edit'])->name('coupon.edit');
    Route::post('coupon/update/{id}',[CouponController::class,'update'])->name('coupon.update');
    Route::get('coupon/status/{id}',[CouponController::class,'status'])->name('coupon.status');
    Route::get('coupon/delete/{id}',[CouponController::class,'delete'])->name('coupon.delete');

    Route::get('materials',[MaterialController::class,'index'])->name('material.index');
    Route::get('material/create',[MaterialController::class,'create'])->name('material.create');
    Route::post('material/store',[MaterialController::class,'store'])->name('material.store');
    Route::get('material/edit/{id}',[MaterialController::class,'edit'])->name('material.edit');
    Route::post('material/update/{id}',[MaterialController::class,'update'])->name('material.update');
    Route::get('material/status/{id}',[MaterialController::class,'status'])->name('material.status');
    Route::get('material/delete/{id}',[MaterialController::class,'delete'])->name('material.delete');


    Route::get('products',[ProductController::class,'index'])->name('product.index');
    Route::get('product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('product/store',[ProductController::class,'store'])->name('product.store');
    Route::get('product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('product/update/{id}',[ProductController::class,'update'])->name('product.update');
    Route::get('product/status/{id}',[ProductController::class,'status'])->name('product.status');
    Route::get('product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
    Route::get('product/details/{id}',[ProductController::class,'details'])->name('product.details');


    Route::get('orders',[BackendOrderController::class,'index'])->name('order.index');
    Route::get('pending/orders',[BackendOrderController::class,'pendingOrder'])->name('pending.order');
    Route::get('review/orders',[BackendOrderController::class,'reviewOrder'])->name('review.order');
    Route::get('accept/orders',[BackendOrderController::class,'acceptOrder'])->name('accept.order');
    Route::get('confirm/orders',[BackendOrderController::class,'confirmOrder'])->name('confirm.order');
    Route::get('canceled/orders',[BackendOrderController::class,'canceledOrder'])->name('canceled.order');
    Route::get('processing/orders',[BackendOrderController::class,'processingOrder'])->name('processing.order');
    Route::get('completed/orders',[BackendOrderController::class,'completedOrder'])->name('completed.order');

    Route::get('order/details/{id}',[BackendOrderController::class,'details'])->name('order.details');
    Route::post('order/status/change',[BackendOrderController::class,'orderStatusChange'])->name('order.status.change');





    Route::prefix('/user')->group(function () {
        Route::get('/index',[BackendUserController::class,'index'])->name('user.index');
        Route::get('/create',[BackendUserController::class,'create'])->name('user.create');
        Route::post('/store',[BackendUserController::class,'store'])->name('user.store');
        Route::get('/edit/{id}',[BackendUserController::class,'edit'])->name('user.edit');
        Route::post('/update/{id}',[BackendUserController::class,'update'])->name('user.update');
        Route::get('/delete/{id}',[BackendUserController::class,'delete'])->name('user.delete');
        Route::get('/status/{id}',[BackendUserController::class,'status'])->name('user.status');
        Route::get('/show/{id}',[BackendUserController::class,'show'])->name('user.show');

    });


});



Route::namespace('Admin')->prefix('/auth/admin/')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::get('login',[AdminController::class,'index'])->name('auth.admin.login.page')->middleware('auth.admin.login.url.check');
    Route::get('register',[AdminController::class,'create'])->name('auth.admin.register.page')->middleware('auth.admin.login.url.check');
    Route::post('register',[AdminController::class,'register'])->name('auth.admin.register');
    Route::post('login',[AdminController::class,'login'])->name('auth.admin.login');

    Route::get('logout', [AdminController::class,'logout'])->name('auth.admin.logout');

});




Route::namespace('User')->prefix('/auth/user/')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::get('login',[UserController::class,'index'])->name('auth.user.login.page')->middleware('auth.user.login.url.check');
    Route::get('register',[UserController::class,'create'])->name('auth.user.register.page')->middleware('auth.user.login.url.check');
    Route::post('register',[UserController::class,'register'])->name('auth.user.register');
    Route::post('login',[UserController::class,'login'])->name('auth.user.login');
    Route::get('email-verify',[UserController::class,'authUserEmailVerify'])->name('auth.user.email.verify');
    Route::post('email-verification-send',[UserController::class,'authUserEmailVerificationSend'])->name('email.verification.send');
    Route::post('verifyed',[UserController::class,'verifyed'])->name('email.verification.verifyed');
    Route::get('logout', [UserController::class,'logout'])->name('auth.user.logout');
    // after admin login
    Route::get('dashboard',[UserController::class,'dashboard'])->name('auth.user.dashboard');

});





Route::namespace('Frontend')->group(function () {

    Route::get('/',[FrontendController::class,'index'])->name('frontend.index');
    Route::get('/product-details/{slug}',[FrontendController::class,'details'])->name('frontend.product.details');
    Route::get('/product-category/{slug}',[FrontendController::class,'categoryProduct'])->name('frontend.product.category');

    Route::get('/auth/user/orders',[FrontendOrderController::class,'authUserOrders'])->name('auth.user.orders');
    Route::get('/auth/user/profile',[AuthUserProfileController::class,'authUserProfile'])->name('auth.user.profile');
    Route::get('/auth/user/profile/edit',[AuthUserProfileController::class,'authUserProfileEdit'])->name('auth.user.profile.edit');
    Route::post('/auth/user/profile/update/{id}',[AuthUserProfileController::class,'authUserProfileUpdate'])->name('auth.user.profile.update');


});




Route::namespace('Cart')->group(function () {

    Route::get('/cart', [CartController::class,'cartList'])->name('cart.list');
    Route::post('/cart', [CartController::class,'addToCart'])->name('cart.store');
    Route::post('/update-cart',[CartController::class,'updateCart'])->name('cart.update');
    Route::post('/remove', [CartController::class,'removeCart'])->name('cart.remove');
    Route::post('/clear', [CartController::class,'clearAllCart'])->name('cart.clear');


    Route::get('/continue-shopping', [CartController::class,'continueShopping'])->name('continue.shopping');
    Route::get('/checkout', [CartOrderController::class,'checkout'])->name('order.checkout');
    Route::post('/order', [CartOrderController::class,'order'])->name('order.store');
    Route::post('/payment-by-stripe', [CartOrderController::class,'userPaymentMethodStripe'])->name('user.payment.method.stripe');
    Route::post('/payment-by-cash-on-delivery', [CartOrderController::class,'userPaymentMethodCashOnDelivery'])->name('user.payment.method.cash_on_delivery');


});

