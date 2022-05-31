<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SocialAuthController;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', [SessionsController::class, 'create']);
Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [SessionsController::class, 'store']);
Route::get('mainpage', [SessionsController::class, 'index']);
Route::get('dashboard', [SessionsController::class, 'dashboard']);
Route::get('completeRegister', [RegisterController::class, 'store']);
Route::get('login2FA', [SessionsController::class, 'createlogin2FA']);

//twitter endpoints
Route::get('twitter', [SessionsController::class, 'connect_twitter']);
Route::get('media', [SessionsController::class, 'media_cbk']);
Route::get('publishing', [SocialAuthController::class, 'create']);
Route::get('getTweets', [SocialAuthController::class, 'getTweets']);
Route::post('publish', [SocialAuthController::class, 'postToTwitter']);
Route::post('programPost', [SocialAuthController::class, 'SavepostToTwitter']);

//CronJob
Route::get('cronjob', [SocialAuthController::class, 'cronjob']);

Route::post('post', [SocialAuthController::class, 'typePost']);
Route::get('delete/{post:id}', [SocialAuthController::class, 'delete']);
Route::get('edit/{post:id}', [SocialAuthController::class, 'edit']);
Route::post('update/{post:id}', [SocialAuthController::class, 'update']);
//facebook endpoints
Route::get('getFacebook', [SessionsController::class, 'get_facebook']);

Route::post('login-two-factor', [SessionsController::class, 'loginCode2FA']);

Route::post('logout', [SessionsController::class, 'destroy']);
