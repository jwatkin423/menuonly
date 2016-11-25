<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => '/dashboard'], function() {
  Route::get('/profile/{user_id}', ['uses' => 'DashboardController@index', 'as' => 'db.home']);

});

Route::group(['prefix' => '/business'], function() {
  Route::get('/view', ['uses' => 'BusinessController@view', 'as' => 'view.business']);
  Route::post('/update', ['uses' => 'BusinessController@update', 'as' => 'post.edit.business']);
});

Route::group(['prefix' => '/address'], function() {
  Route::get('/view/{address_id}', ['uses' => 'AddressController@view', 'as' => 'view.address']);
  Route::get('/create/{ext_id}/{extType}', ['uses' => 'AddressController@create', 'as' => 'create.address']);
  Route::get('/edit/{address_id}/{extType}', ['uses' => 'AddressController@edit', 'as' => 'edit.address']);
  Route::post('/update', ['uses' => 'AddressController@update', 'as' => 'update.address']);
  Route::post('/store', ['uses' => 'AddressController@store', 'as' => 'add.address']);
  Route::get('/delete/{address_id}', ['uses' => 'AddressController@delete', 'as' => 'delete.address']);
});

Route::group(['prefix' => '/user'], function() {
  Route::get('/create/{business_id}', ['uses' => 'UserController@create', 'as' => 'create.user']);
  Route::post('/store', ['uses' => 'UserController@store', 'as' => 'add.user']);
  Route::get('/view/{address_id}', ['uses' => 'UserController@view', 'as' => 'view.user']);
  Route::get('/edit/{user_id}', ['uses' => 'UserController@edit', 'as' => 'edit.user']);
  Route::post('/update', ['uses' => 'UserController@update', 'as' => 'update.user']);
  Route::get('/delete/{user_id}', ['uses' => 'UserController@delete', 'as' => 'delete.user']);
});
