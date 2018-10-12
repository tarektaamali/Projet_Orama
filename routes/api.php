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
    Route::resource('services/registration', 'RegisterserviceController', [
        'only' => ['store', 'destroy']
    ]);
    Route::resource('services', 'ServiceController', [
        'only' => ['index']
    ]);
    Route::resource('regions', 'RegionController', [
        'only' => ['index']
    ]);
    Route::resource('regions/registration', 'RegistreregionController', [
        'only' => ['store', 'destroy']
    ]);
    Route::post('/user/store', [
        'uses' => 'AuthController@store'
    ]);
  

 /*Route::post('/user/sign', [
        'uses' => 'ApiController@userLogin'
    ]);  */ 

/*
    Route::post('/user/sign', [
        'uses' => 'LoginController@userLogin'
    ]);
    Route::post('/user/save', [
        'uses' => 'LoginController@userStore'
    ]);
    Route::post('/demandeur/sign', [
        'uses' => 'DloginController@userLogin'
    ]);
    Route::post('/demandeur/save', [
        'uses' => 'DloginController@userStore'
    ]);*/
    Route::get('/user/logout', [
        'uses' => 'AuthController@logout'
    ]);
    Route::get('/user/show', [
        'uses' => 'AuthController@show'
    ]);
    Route::get('/user/verify', [
        'uses' => 'AuthController@verifyToken'
    ]);
    Route::get('/user/get', [
        'uses' => 'AuthController@getUser'
    ]);
    Route::post('/user/register', [
        'uses' => 'AuthController@store'
    ]);
  /*  Route::resource('demandeur/chantier', 'ChantierController', [
        'only' => ['index','show','update','store', 'destroy']
    ]);
*/
//////////////////////////////////////////////
    Route::resource('projet', 'ProjetController', [
        'except' => ['destroy']
    ]);
    Route::resource('projetf', 'ProjetfController', [
        'only' => ['index']
    ]);
    Route::get('projetcas', [
        'uses' => 'ProjetfController@index1'
    ]);
    Route::resource('ffeedback', 'FFeedbackController', [
        'only' => ['index']
    ]);
    Route::resource('dfeedback', 'DFeedbackController');
    Route::resource('drapport', 'DrapportController');
    Route::resource('propositiond', 'PropositiondController');
    Route::resource('prestataire', 'FournisseurController');

    Route::resource('proposition', 'PropositionController');
    Route::get('propositiondstatus', 'PropositiondController@index1');
    Route::get('propositiondcount', 'PropositiondController@index2');


    /*
        Route::resource('employe/registration', 'ProjetEmployesController', [
            'only' => ['index','show','store', 'destroy']
        ]);
        Route::resource('materiel/registration', 'ProjetMaterielController', [
            'only' => ['index','show','store', 'destroy']
        ]);
       /* Route::resource('materiel', 'MaterielController', [
            'only' => ['index']
        ]);
        Route::resource('employe', 'EmployeController', [
            'only' => ['index']
        ]);*/
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