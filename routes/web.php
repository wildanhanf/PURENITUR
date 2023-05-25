<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CatalogComponent;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\ProductDetailComponent;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/catalog', CatalogComponent::class)->name('catalog');
Route::get('/product-detail', [ProductDetailComponent::class, 'callPage'])->name('product-detail');
Route::get('/productDetails', [HomeController::class, 'productDetail'])->name('productDetails');
Route::get('/shipment', [HomeController::class, 'shipment'])->name('shipment');
Route::get('/order-detail', [HomeController::class, 'order_detail'])->name('order-detail');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/checkouts', [HomeController::class, 'create_order'])->name('checkouts');
Route::get('/customization', [HomeController::class, 'customization'])->name('customization');

Route::get('/cart', CartComponent::class)->name('cart');
Route::get('/dec-qty', [CartComponent::class, 'decreaseQuantity'])->name('dec-qty');
Route::get('/add-qty', [CartComponent::class, 'increaseQuantity'])->name('add-qty');
Route::get('/carts', [ProductDetailComponent::class, 'store'])->name('carts');
Route::get('/payment', [HomeController::class, 'payment'])->name('payment');
Route::get('/payments', [HomeController::class, 'update_order'])->name('payments');

Route::get('/admin', [AdminController::class, 'visit_dashboard'])->name('admin-dashboard');
Route::get('/admin/users', [AdminController::class, 'visit_user'])->name('admin-user');
Route::get('/admin/products', [AdminController::class, 'visit_product'])->name('admin-product');
Route::get('/admin/orders', [AdminController::class, 'visit_order'])->name('admin-order');
Route::get('/admin/customize-products', [AdminController::class, 'visit_customize_product'])->name('admin-customize-product');
Route::get('/admin/shipments', [AdminController::class, 'visit_shipment'])->name('admin-shipment');
Route::get('/admin/discounts', [AdminController::class, 'visit_discount'])->name('admin-discount');

Route::get('/admin-users', [HomeController::class, 'AdminUsers'])->name('admin-users');

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });

    Route::group(['middleware' => ['auth']], function () {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        Route::get('/profile', 'ProfileController@edit')->name('profile.edit');
        Route::patch('/profile', 'ProfileController@update')->name('profile.update');
        Route::patch('/password', 'PasswordController@update')->name('password.update');
    });
});

Route::middleware('auth')->group(function () {

    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
