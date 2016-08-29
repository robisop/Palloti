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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

//Route::get('/home', 'HomeController@index');

Route::get('/', array('as' => 'index', 'middleware' => 'auth', function()
{
    return view('master');
}));

Route::get('/home', function()
{
    return redirect()->route('index');
});

Route::resource('rodic','RodicController');
Route::resource('dieta','DietaController');
Route::resource('prekladatel', 'PrekladatelController');
Route::resource('projekt', 'ProjektController');
Route::resource('poziadavka', 'PoziadavkaController');
Route::resource('sprava', 'SpravaController');
Route::resource('platba', 'PlatbaController');
Route::resource('ocakavanaplatba', 'OcakavanaPlatbaController');
