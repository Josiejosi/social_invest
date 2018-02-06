<?php

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

Route::get('/', "FrontController@index");

Route::get('join', "FrontController@join");
Route::post('register', "FrontController@register");

Route::get('calculator', "FrontController@calculator");

Route::get('login', "FrontController@login");
Route::post('login', "FrontController@login_post");

Route::get('faq', "FrontController@faq");
Route::get('logout', "FrontController@logout");
Route::get('forgot_password', "FrontController@forgot_password");

Route::get('verification', "FrontController@verification");
Route::post('verification', "FrontController@post_verification");
Route::get('resend_verification_code', "FrontController@resend_verification_code");

Route::get('home', "HomeController@index");
Route::get('profile', "ProfileController@index");
Route::get('messages', "MessageController@index");
Route::get('transactions', "TransactionController@index");
