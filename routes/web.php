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
//首页、帮助页、关于页路由
Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');;
Route::get('/about', 'StaticPagesController@about')->name('about');
//注册页面路由
Route::get('/signup','UserController@create')->name('signup');
//User资源路由
Route::resource('user','UserController');
//登录登出路由
Route::get('login','SessionContrpller@create')->name('login');
Route::post('login','SessionContrpller@store')->name('login');
Route::delete('logout','SessionContrpller@destroy')->name('logout');
//邮箱激活路由
Route::get('signup/confirm/{token}','UserController@confirmEmail')->name('confirm_email');
//找回密码
Route::get('password/reset','PasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email','PasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}','PasswordController@showResetFrom')->name('password.reset');
Route::post('password/reset','PasswordController@reset')->name('password.update');
