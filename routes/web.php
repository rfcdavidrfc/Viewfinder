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
Route::resource('feeds', 'FeedController');

Route::get('feed/{slug}', ['as' => 'post.single', 'uses' => 'PostController@getSingle']) -> where('slug', '[\w\d\-\_]+');

Route::get('post', ['uses' => 'PostController@getIndex', 'as' => 'post.index']);


//Authentication Routes
Route::get('auth/login', ['as' => 'login', 'uses' =>'Auth\LoginController@showLoginForm']);
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

//Route::get('/login', 'PagesController@getLogin');


//Registration Routes
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');

//Password Reset Routes
Route::get('password/reset', ['as' => 'password/reset', 'uses' =>'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Categories
Route::resource('categories', 'CategoryController', ['except' => ['create']]);

//Tags
Route::resource('tags', 'TagController', ['except' => ['create']]);

Route::get('/register', 'PagesController@getRegister');


Route::get('/contact', 'PagesController@getContact');

Route::get('/explore', 'PagesController@getExplore');

Route::get('/feed', 'PagesController@getFeed');

Route::get('/', 'PagesController@getIndex');


Auth::routes();