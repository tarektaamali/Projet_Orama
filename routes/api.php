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
Route::group(['prefix' => 'v1','namespace'=>'Api'], function() {
Route::resource('rapport', 'RapportController', [
    'except' => ['create', 'edit']
]);
    Route::post('/user/signin', [
        'uses' => 'AuthController@signin'
    ]);
    Route::get('/user/logout', [
        'uses' => 'AuthController@logout'
    ]);
    Route::get('/user/verify', [
        'uses' => 'AuthController@verifyToken'
    ]);
    Route::post('/user/register', [
        'uses' => 'AuthController@store'
    ]);
    Route::resource('projet', 'ProjetController', [
        'except' => ['destroy']
    ]);
    Route::resource('employe/registration', 'ProjetEmployesController', [
        'only' => ['index','show','store', 'destroy']
    ]);
    Route::resource('materiel/registration', 'ProjetMaterielController', [
        'only' => ['index','show','store', 'destroy']
    ]);
    Route::resource('materiel', 'MaterielController', [
        'only' => ['index']
    ]);
    Route::resource('employe', 'EmployeController', [
        'only' => ['index']
    ]);
    Route::resource('planning', 'PlanningController', [
        'only' => ['index']
    ]);
    Route::get('send', [
        'uses' => 'PlanningController@send'
    ]);
});


/*
 * Route::middleware('auth:api')->get('/admin', function (Request $request) {
    return $request->user();
});
 */