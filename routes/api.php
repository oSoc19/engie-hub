<?php

use Illuminate\Http\Request;
use \App\Http\Controllers\EventsController;
use \App\Events\ParticleData;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//PARTICIPANT ROUTES
Route::get('participants', 'ParticipantsController@index');
Route::post('insertparticipant', 'ParticipantsController@store');
Route::get('participant/{id}', 'ParticipantsController@show');

//EVENT ROUTES
Route::get('events', 'EventsController@index');
Route::post('insertevent', 'EventsController@store');
Route::get('event/{id}', 'EventsController@show');

//GOALS ROUTES
Route:get()

// Route::post('webhook', 'ParticleController@store');

//indeplaats van request naar text te veranderen, direct de request doorgeven naar uw particledata event?..
Route::post('webhook', function() {
    $data = request()->text;
    event(new ParticleData($data));
});
