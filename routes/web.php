<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tenant\ShopController;
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

Route::domain('localhost')->group(function(){
    Route::get('/', function () {
        return view('welcome');
    });

    Route::controller(ShopController::class)->group(function(){
        Route::group(['prefix' => 'shop', 'as' => 'shops.'], function(){
            Route::get('/register', 'register')->name('register');
            Route::post('/store', 'store')->name('store');
            
        });
    });
    
});


Route::domain('{tenant}.localhost')->middleware('tenant')->group(function(){
    Route::get('/', function ($tenant) {
        return view('welcome');
    });
    Route::controller(ShopController::class)->group(function(){
        Route::group(['prefix' => 'users', 'as' => 'users.'], function(){
            Route::get('/form', 'user_form')->name('form');
            Route::post('/store', 'user_store')->name('store');
        });
    });

    
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
