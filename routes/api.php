<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RegistrationController;
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
Route::post('signup', [RegistrationController::class, 'signUp'])
    ->name('signup');

Route::post('login', [LoginController::class, 'login'])
    ->name('login');

Route::post('verify', [LoginController::class, 'verify'])
    ->name('verify');

Route::group(['middleware' => 'auth:api'], function() {
    Route::post('invitation', [RegistrationController::class, 'signUpInvitation'])
    ->name('invitation');
    Route::post('profile', [ProfileController::class, 'update'])
    ->name('update');
});
