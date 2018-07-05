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

Route::group(['middleware' => ['api','cors']], function () {
    //register new user
    Route::post('auth/register','Auth\ApiRegisterController@register');
    //authenticate logging user
    Route::post('auth/login','Auth\ApiLoginController@login');
});

//get all gym locations
Route::get('/gyms','GymLocationController@index');

//get all gym instructors
Route::get('/instructors','GymInstructorController@index');

//get all past workouts for specified user
Route::get('/workouts/{id}','WorkoutController@show');

//read and serve images from storage
Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('public/images/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

