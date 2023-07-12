<?php

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

Route::namespace('App\Http\Controllers')
->group(function(){

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/auth', 'AuthController@index')->name('auth');
    Route::get('/kuliner/detail/{id}', 'KulinerDetailController@index')->name('kuliner-detail');
    Route::get('/kuliner', 'KulinerController@index')->name('kuliner');
    Route::get('/kuliner/food', 'KulinerFoodController@index')->name('food-kuliner.index');

});

Route::namespace('App\Http\Controllers')
    ->middleware(['auth','web'])
    ->controller(TransactionUserController::class)
    ->group(function(){
        Route::get('/kuliner/transactions', 'index')->name('transaction-user');
    });

// Route::namespace('App\Http\Controllers')
//     ->middleware(['auth','web'])
//     ->controller(BookingConfirmController::class)
//     ->group(function(){
//         Route::post('/kuliner/confirm/submit/{id}', 'submit')->name('confirm-submit');
//     });

Route::namespace('App\Http\Controllers')
    ->middleware(['auth','web'])
    ->controller(ProfileController::class)
    ->group(function(){
        Route::get('/profile', 'index')->name('profile');
    });

Route::namespace('App\Http\Controllers')
    ->middleware(['auth','web'])
    ->controller(KulinerFoodController::class)
    ->group(function(){
        Route::post('/kuliner/food', 'addToCart')->name('food.add');
    });

Route::namespace('App\Http\Controllers')
->middleware(['auth','web'])
->controller(CartController::class)
->group(function(){
    Route::get('cart', 'cartList')->name('cart.list');
    Route::post('cart', 'addToCart')->name('cart.store');
    Route::post('update-cart','updateCart')->name('cart.update');
    Route::delete('remove/{id}','removeCart')->name('cart.remove');
    Route::post('checkout', 'checkout')->name('cart.checkout');
});

Route::prefix('admin')
    ->namespace('App\Http\Controllers\Admin')
    ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::resource('kuliner-place', KulinerPlaceController::class);
        Route::resource('booking-number', BookingNumberController::class);
        Route::resource('transaction', TransactionController::class);
        Route::resource('food', FoodController::class);
    });

Auth::routes();

