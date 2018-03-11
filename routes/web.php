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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('adm/post', function () {
    return view('admin/Blog/post');

});
Route::resource('admin/articles','Admin\ArticleController');
Route::resource('admin/materiels','Admin\MaterielController');
Route::resource('admin/service','Admin\ServiceController');






Route::get('adm', function () {
    return view('admin/home');
});