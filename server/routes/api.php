<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/registr','UserController@registr');
Route::post('/login','UserController@login');
Route::get('/logout','UserController@logout');
Route::post('/request','RequestController@performRequest');
Route::get('/token','AccessTokenController@authenticated');
Route::get('/user','UserController@user');
Route::get('/requests','ApiController@requests');
Route::post('/create-article','ApiController@createArticle');
Route::post('/save-article','ApiController@saveArticle');
Route::post('/create-book','ApiController@createBook');
Route::post('/save-book','ApiController@saveBook');
Route::post('/create-video','ApiController@createVideo');
Route::post('/save-video','ApiController@saveVideo');
