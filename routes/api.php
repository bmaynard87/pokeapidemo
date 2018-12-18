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
Route::prefix('v1')->group(function () {
    Route::get('/pokemon/{id?}', 'Api\PokemonController@index');
    Route::get('/type/{id?}/pokemon', 'Api\PokemonController@pokemonByType');
    Route::get('/type/{id?}', 'Api\PokemonController@type');
    Route::get('/version/{id?}', 'Api\PokemonController@version');
});
