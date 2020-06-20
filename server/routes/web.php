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

Route::group(['middleware' => 'auth'],function() {
	Route::get('/', 'RequestController@index');
	Route::get('/book/{request}/{id}', 'BookController@getBook')->name('book');
	Route::get('/article/{request}/{id}', 'ArticleController@getArticle')->name('article');
	Route::get('/email/{email}', 'RequestController@mail')->name('email');
	Route::post('/send-email', 'RequestController@sendEmail')->name('send-email');
	Route::get('/video/{request}/{id}', 'VideoController@getVideo')->name('video');
});

Auth::routes(['register' => false]);