<?php

use App\Admin;
use App\Speciality;
use App\State;
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


Route::namespace('Api')->group(function () {
    Route::post('user/register', 'ApiAuthController@register');
    Route::post('user/login', 'ApiAuthController@login');
});

Route::namespace('Api')->middleware('auth:user')->group(function () {
    Route::get('user/logout', 'ApiAuthController@logout');
    Route::get('doctors', 'DataController@doctor');
    Route::get('patients', 'DataController@patient');
    Route::get('cities', 'DataController@city');
    Route::get('states', 'DataController@state');
    Route::get('specialities', 'DataController@speciality');
    Route::get('users', 'DataController@user');
});

// Route::get('test', function() {
//     return response()->json(['status' => true]);
// });

//Route::get('welcome', function () {
//    $data = State::where('city_id', 2)->take(1)->get();
//    return response()->json([
//        'status' => $data
//    ]);
//});
