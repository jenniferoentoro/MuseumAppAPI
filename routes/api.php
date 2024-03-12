<?php

use App\Models\Museum;
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

Route::group([
    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'
], function($router){
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::get('profile', 'AuthController@profile');
    Route::post('refresh', 'AuthController@refresh');
    
});

Route::group([
    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers'
], function($router) {
    Route::get('museums', 'MuseumController@getAllMuseum');
    Route::get('comments/{museum_id}', 'CommentController@getComments');
    Route::post('comment', 'CommentController@store');

    Route::get('favorites', 'FavoriteController@getFavorites');
    Route::post('favorite', 'FavoriteController@storeFavorite');
    Route::post('delete-favorite', 'FavoriteController@deleteFavorite');

});