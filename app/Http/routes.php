<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/* ================== Homepage + Admin Routes ================== */

/*les differentes routes de la partie api*/

Route::group(['prefix' => 'api'], function () {
    Route::resource('user','UserController');
    Route::resource('kiosque','KiosqueController');
    Route::resource('person','PersonController');
    Route::resource('service','ServiceController');
    Route::resource('kiosque_service','KiosqueServiceCtrl');
    Route::get('testmap','GoogleMapsCtrl@test');
    Route::post('retourne_service','GoogleMapsCtrl@retourne_service');
    Route::post('register','CompteCtrl@register');
    Route::post('update_services_kiosque','KiosqueServiceCtrl@update_services_kiosque');
});

Route::group(['prefix' => 'api'], function()
{
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
});

/*fin des routes de la partie api*/
require __DIR__.'/admin_routes.php';
