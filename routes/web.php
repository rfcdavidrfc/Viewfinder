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

Route::middleware(['auth'])->group(function() {


});
Route::resource('feeds', 'FeedController');

Route::get('feed/{slug}', ['as' => 'post.single', 'uses' => 'PostController@getSingle']) -> where('slug', '[\w\d\-\_]+');

Route::get('category/{id}', ['as' => 'categories.single', 'uses' => 'CategoryController@getSingle']) -> where('id', '[\w\d\-\_]+');

Route::get('user/{id}', ['as' => 'pages.userProfile', 'uses' => 'PagesController@getUserProfile']) -> where('id', '[\w\d\-\_]+');

Route::get('post', ['uses' => 'PostController@getIndex', 'as' => 'post.index']);


//Authentication Routes
//Route::get('auth/login', ['as' => 'login', 'uses' =>'Auth\LoginController@showLoginForm']);
//Route::post('auth/login', 'Auth\LoginController@login');
//Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);


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

//Comments
Route::post('comments/{feed_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);

Route::get('/register', 'PagesController@getRegister');


Route::get('/contact', 'PagesController@getContact');
Route::post('/contact', 'PagesController@postContact');

Route::get('/gallery', 'PagesController@getGallery');

Route::get('/myProfile', 'PagesController@getMyProfile');

Route::get('/feed', 'PagesController@getFeed');

Route::get('/', 'PagesController@getIndex');

Route::get('search', ['as' => 'search', 'uses' => 'SearchController@index']);
Route::post('search', ['as' => 'search', 'uses' => 'SearchController@index']);

Auth::routes();