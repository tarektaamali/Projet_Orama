<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/reserver', function () {
    return view('user.reserver');
});
Route::get('/blog', function () {
    return view('user.blog');
});

Route::group(['namespace'=>'User'],function () {
    Route::get('/','HomeController@index')->name('home');
    Route::get('/article/{article?}','ArticleController@post')->name('article');
    Route::get('/feedback','FeedBackController@create')->name('feedback.create');
    Route::post('/feedback','FeedBackController@store')->name('feedback.store');
    Route::get('/reserver','ReservationController@create')->name('reserver.create');
    Route::post('/reserver','ReservationController@store')->name('reserver.store');


});
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
/*Route::get('adm/post', function () {
    return view('admin/Blog/post');

});*/

//        $this->post('login', 'Auth\LoginController@login');
  Route::get('admin-login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('admin-login', 'Admin\Auth\LoginController@login');
Route::post('admin-logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');


    Route::group(['namespace'=>'Admin'],function () {
        Route::resource('admin/articles', 'ArticleController');
    Route::resource('admin/materiels', 'MaterielController');
    Route::resource('admin/service', 'ServiceController');
    Route::resource('admin/users', 'UserController');
    Route::resource('admin/clients', 'ClientController');
    Route::resource('admin/projet', 'ProjetController');
    Route::resource('admin/employes', 'EmployeController');
    Route::resource('admin/feedback', 'FeedbackController');
    Route::resource('admin/reservation', 'ReservationController');
    Route::resource('admin/rapport', 'RapportController');
    Route::get('admin/projet1', 'ProjetController@index1')->name('projet.index1');
    Route::get('admin/projet2', 'ProjetController@index2')->name('projet.index2');
    Route::get('admin/projet3', 'ProjetController@index3')->name('projet.index3');
    Route::get('admin/planning', 'ProjetController@planning')->name('projet.planning');
    Route::get('admin/home', 'HomeController@index')->name('admin.home');
    Route::get('admin/changePassword','HomeController@showChangePasswordForm');
    Route::post('admin/changePassword','HomeController@changePassword')->name('changePassword');

    });