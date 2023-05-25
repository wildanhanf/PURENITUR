<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CatalogComponent;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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
Route::get('/productDetail', [HomeController::class, 'productDetail'])->name('productDetail');
Route::get('/shipment', [HomeController::class, 'shipment'])->name('shipment');

Route::get('/cart', [HomeController::class, 'shoppingCart'])->name('cart');
Route::get('/payment', [HomeController::class, 'payment'])->name('payment');

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
