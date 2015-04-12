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

Route::get('/', 'HomeController@index');
Route::post('add_player', 'HomeController@add_player');
Route::post('add_game', 'HomeController@add_game');
Route::post('add_signup', 'HomeController@add_signup');
Route::get('info', 'HomeController@info');
Route::get('cal', function (){
    return view('calendar');
});
Route::get('events/{id}', 'HomeController@event');
Route::get('games/{name}', 'HomeController@game');
Route::get('delete/{id}', 'HomeController@delete_event');
Route::get('cal/events', 'HomeController@get_events');
