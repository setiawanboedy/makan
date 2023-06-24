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
    Route::get('/kuliner/confirm', 'BookingConfirmController@index')->name('book-confirm');
});

Route::prefix('admin')
    ->namespace('App\Http\Controllers\Admin')
    ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::resource('kuliner-place', KulinerPlaceController::class);
        Route::resource('booking-number', BookingNumberController::class);
    });

Auth::routes();

