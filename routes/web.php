<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth','admin'], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });


    Route::get('/subuser', 'Admin\SubuserController@index');

    Route::post('/save-designation', 'Admin\SubuserController@saveDesignation');
    Route::get('/edit-designation/{id}','Admin\SubuserController@editDesignation');
    Route::put('update-designation/{id}','Admin\SubuserController@updateDesignation');
    Route::delete('delete-designation/{id}','Admin\SubuserController@deleteDesignation');

    Route::post('/save-subuser', 'Admin\SubuserController@saveSubuser');
    Route::get('/edit-subuser/{id}','Admin\SubuserController@editSubuser');
    Route::put('update-subuser/{id}','Admin\SubuserController@updateSubuser');
    Route::delete('delete-subuser/{id}','Admin\SubuserController@deleteSubuser');


    Route::get('/activities','Admin\ActivitiesController@index');
    Route::post('/save-activities','Admin\ActivitiesController@saveActivities');
    Route::get('/edit-activities/{id}','Admin\ActivitiesController@editActivities');
    Route::put('update-activities/{id}','Admin\ActivitiesController@updateActivities');
    Route::delete('delete-activities/{id}','Admin\ActivitiesController@deleteActivities');
});
