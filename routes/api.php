<?php

use Illuminate\Http\Request;

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

Route::get('articles/{id}/subscribers', 'ArticlesController@getArticleSubscribers');
Route::get('articles/categories', 'ArticlesController@getCategories');
Route::get('articles/{id}', 'ArticlesController@getArticle');
Route::get('articles', 'ArticlesController@getArticles');
Route::post('articles', 'ArticlesController@createArticle');
Route::put('articles/{id}', 'ArticlesController@updateArticle');