<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ReferralController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
Route::put('user/referral_count',[UserController::class,'updateReferralCount']);
Route::post('user/find',[UserController::class,'findUser']);

Route::post('referral',[ReferralController::class,'create']);
Route::put('referral',[ReferralController::class,'updateReferralStatus']);
Route::post('referral/find',[ReferralController::class,'findReferral']);

//Email Route
Route::post('send/email', [MailController::class, 'mail'])->name('email');

//Route::post('create/referral', [MailController::class, 'mail'])->name('email');
