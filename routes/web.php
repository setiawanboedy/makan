<?php

use App\Http\Controllers\OpenRestoController;
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
    Route::post('/find', 'HomeController@find')->name('kuliner.find');
    Route::get('/auth', 'AuthController@index')->name('auth');
    Route::get('/kuliner/detail/{id}', 'KulinerDetailController@index')->name('kuliner-detail');
    Route::get('/kuliner', 'KulinerController@index')->name('kuliner');
    Route::get('/kuliner/near/{originLatlng}', 'KulinerNearController@index')->name('kuliner-near.index');
    Route::get('/kuliner/food/{id}', 'KulinerFoodController@index')->name('food-kuliner.index');

});

Route::namespace('App\Http\Controllers')
    ->middleware(['auth','web'])
    ->controller(TransactionUserController::class)
    ->group(function(){
        Route::get('/kuliner/transactions', 'index')->name('transaction-user');
    });

Route::namespace('App\Http\Controllers')
    ->middleware(['auth','web'])
    ->controller(ProfileController::class)
    ->group(function(){
        Route::get('/profile', 'index')->name('profile');
    });

Route::middleware(['auth','web'])
    ->group(function(){
        Route::resource('open', OpenRestoController::class);
    });

Route::namespace('App\Http\Controllers')
    ->middleware(['auth','web'])
    ->controller(KulinerFoodController::class)
    ->group(function(){
        Route::post('/kuliner/food', 'addToCart')->name('food.add');

        Route::get('/kuliner/food/link/{id}', 'externalLink')->name('external-link');

    });

Route::namespace('App\Http\Controllers')
->middleware(['auth','web'])
->controller(CartController::class)
->group(function(){
    Route::get('cart', 'cartList')->name('cart.list');
    Route::post('cart', 'addToCart')->name('cart.store');
    Route::post('update-cart','updateCart')->name('cart.update');
    Route::delete('remove/{id}','removeCart')->name('cart.remove');
    Route::delete('removeHeader/{id}','removeCartHeader')->name('cart.removeHeader');
    Route::post('checkout', 'checkout')->name('cart.checkout');
    Route::post('cart/update', 'updateNomerTable')->name('cart.updateTable');
});

Route::namespace('App\Http\Controllers')
    ->middleware(['auth','web'])
    ->controller(PaymentController::class)
    ->group(function(){
        Route::get('checkout/payment/{transactionId}', 'index')->name('payment.index');
        Route::post('checkout/payment', 'upload')->name('payment.store');
    });

Route::prefix('admin')
    ->namespace('App\Http\Controllers\Admin')
    ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::resource('kuliner-place', KulinerPlaceController::class);
        Route::resource('booking-number', BookingNumberController::class);


        Route::get('managemen', 'ManageController@index')->name('manage.index');
        Route::post('managemen', 'ManageController@role')->name('manage.update');
    });

Route::prefix('resto')
    ->namespace('App\Http\Controllers\Resto')
    ->middleware(['auth','resto'])
    ->group(function(){
        Route::get('/', 'DashboardController@index')->name('dashboard-resto');
        Route::post('/', 'DashboardController@pdf')->name('pdf-trans');
		Route::get('/edit/{id}', 'DashboardController@edit')->name('resto.edit');
        Route::put('/update', 'DashboardController@update')->name('resto.update');
        Route::resource('transaction', TransactionController::class);
        Route::resource('food', FoodController::class);

    });

Auth::routes();

