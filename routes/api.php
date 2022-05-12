<?php

use App\Http\Controllers\IncomeConfigurationController;
use App\Http\Controllers\UserController;
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

});
