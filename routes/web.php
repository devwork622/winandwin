<?php

use Illuminate\Support\Facades\Route;
/************Lottery Done by Ashish Sharma*************/
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

Auth::routes();


Route::get('/', 'App\Http\Controllers\FrontEnd\HomeController@index');
Route::get('past-draw-results', 'App\Http\Controllers\FrontEnd\HomeController@pastDrawResults');
Route::get('weekly-live-stream', 'App\Http\Controllers\FrontEnd\HomeController@weeklyLiveStream');
Route::get('faq', 'App\Http\Controllers\FrontEnd\HomeController@faq');
Route::get('lotteries', 'App\Http\Controllers\FrontEnd\HomeController@lotteries');
Route::get('winners', 'App\Http\Controllers\FrontEnd\HomeController@winners');
Route::get('login', 'App\Http\Controllers\FrontEnd\HomeController@login')->name('login');
Route::get('register-user', 'App\Http\Controllers\FrontEnd\HomeController@register')->name('register-user');
Route::get('check-email', 'App\Http\Controllers\Auth\RegisterController@check_email');
Route::get('check-mobile', 'App\Http\Controllers\Auth\RegisterController@check_mobile');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@postRegister');
Route::post('submit-login', 'App\Http\Controllers\Auth\LoginController@submitLogin')->name('submit-login');
Route::post('/password/reset_password', 'App\Http\Controllers\Auth\ResetPasswordController@reset_password')->name('user_reset_password');
Route::get('verify-email-request', 'App\Http\Controllers\Auth\RegisterController@verify_email_request')->name('verify-email-request');
Route::get('verify-email', 'App\Http\Controllers\Auth\RegisterController@verify_email')->name('verify-email');


Route::any('legal', 'App\Http\Controllers\FrontEnd\HomeController@legal');
Route::any('privacy-policy', 'App\Http\Controllers\FrontEnd\HomeController@privacyPolicy');
Route::any('terms-and-conditions', 'App\Http\Controllers\FrontEnd\HomeController@termsAndConditions');
Route::any('participate-responsibly', 'App\Http\Controllers\FrontEnd\HomeController@participateResponsibly');
Route::any('game-rules', 'App\Http\Controllers\FrontEnd\HomeController@gamerules');


Route::group(['middleware' => ['auth']], function () {        
  Route::get('my-profile', 'App\Http\Controllers\FrontEnd\UserController@my_profile')->name('my-profie');
  Route::post('update-profile', 'App\Http\Controllers\FrontEnd\UserController@update_profile')->name('update-profie');
  Route::get('check-email-update', 'App\Http\Controllers\FrontEnd\UserController@check_email_update');
  Route::get('check-mobile-update', 'App\Http\Controllers\FrontEnd\UserController@check_mobile_update');
  Route::post('change-password', 'App\Http\Controllers\FrontEnd\UserController@change_password')->name('change-password');

  Route::get('add-credit', 'App\Http\Controllers\FrontEnd\UserController@add_credit')->name('add-credit');
  Route::post('update-credit', 'App\Http\Controllers\FrontEnd\UserController@update_credit')->name('update-credit');

  Route::get('withdraw-credit', 'App\Http\Controllers\FrontEnd\UserController@withdraw_credit')->name('withdraw-credit');
  Route::post('withdraw-user-credit', 'App\Http\Controllers\FrontEnd\UserController@withdraw_user_credit')->name('withdraw-user-credit');

  Route::any('buy-now', 'App\Http\Controllers\FrontEnd\HomeController@buyNow');
  Route::any('checkout', 'App\Http\Controllers\FrontEnd\HomeController@checkout');
  Route::post('place-order', 'App\Http\Controllers\FrontEnd\OrderController@place_order')->name('place-order');

});
