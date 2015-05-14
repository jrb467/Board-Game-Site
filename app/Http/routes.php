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
Route::post('add_event', 'HomeController@add_event');
Route::get('create', function (){
    return view('create');
});
Route::get('/games', function(){ return view('games');});
Route::get('/players', function(){ return view('players');});
Route::get('/cal', function (){
    return view('calendar');
});
Route::get('events/{id}', 'HomeController@event');
Route::post('events/{id}/signup', ['middleware' => 'auth', 'uses' => 'HomeController@event_signup']);

Route::get('games/{name}', 'HomeController@game');
Route::get('delete/{id}', 'HomeController@delete_event');
Route::get('cal/events', 'HomeController@get_events');
Route::get('/logout', 'HomeController@logout');
Route::get('/home', function(){
    return redirect('/');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
