<?php

use App\Http\Controllers\IncomeConfigurationController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {

    Route::post('register', [UserController::class, 'register'])->name('register');
    Route::post('login', [UserController::class, 'login'])->name('login');

    Route::middleware('auth:api')->group(function () {
        Route::post('logout', [UserController::class, 'logout'])->name('logout');
        Route::get('profile', [UserController::class, 'profile'])->name('profile');
    });
});



Route::group(['middleware' => 'auth:api'], function () {

    Route::group(['prefix' => 'income-configuration', 'as' => 'income-configuration.'], function () {
        Route::get('/', [IncomeConfigurationController::class, 'show'])->name('show');
        Route::post('/', [IncomeConfigurationController::class, 'store'])->name('store');
        Route::delete('/', [IncomeConfigurationController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'income', 'as' => 'income.'], function () {
        Route::post('/', [IncomeController::class, 'store'])->name('store');
        Route::get('/', [IncomeController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'wish', 'as' => 'wish.'], function () {
        Route::post('/', [WishController::class, 'store'])->name('store');
        Route::get('/', [WishController::class, 'index'])->name('index');
        Route::get('/possible-wishs', [WishController::class, 'getPossibleWishs'])->name('possible-wishs');
    });
});
