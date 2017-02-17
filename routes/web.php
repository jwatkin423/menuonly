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

// Business
Route::group(['prefix' => '/business'], function() {
  Route::get('/view', ['uses' => 'BusinessController@view', 'as' => 'view.business']);
  Route::get('/create', ['uses' => 'BusinessController@create', 'as' => 'create.business']);
  Route::get('/edit/{business_id}', ['uses' => 'BusinessController@edit', 'as' => 'edit.business'] );
  Route::post('/store', ['uses' => 'BusinessController@store', 'as' => 'add.business']);
  Route::post('/update', ['uses' => 'BusinessController@update', 'as' => 'post.edit.business']);
});

// Address
Route::group(['prefix' => '/address'], function() {
  Route::get('/state/{state?}', ['uses' => 'AddressController@viewByState', 'as' => 'view.address.by.state']);
  Route::get('/create/{ext_id?}/{extType?}', ['uses' => 'AddressController@create', 'as' => 'create.address']);
  Route::get('/view/{address_id}', ['uses' => 'AddressController@view', 'as' => 'view.address']);
  Route::get('/edit/{address_id}/{extType}', ['uses' => 'AddressController@edit', 'as' => 'edit.address']);
  Route::post('/update', ['uses' => 'AddressController@update', 'as' => 'update.address']);
  Route::post('/store', ['uses' => 'AddressController@store', 'as' => 'add.address']);
  Route::get('/delete/{address_id}', ['uses' => 'AddressController@delete', 'as' => 'delete.address']);
});

// User
Route::group(['prefix' => '/user'], function() {
  Route::get('/create', ['uses' => 'UserController@create', 'as' => 'create.user']);
  Route::post('/store', ['uses' => 'UserController@store', 'as' => 'add.user']);
  Route::get('/view', ['uses' => 'UserController@view', 'as' => 'view.user']);
  Route::get('/edit/{user_id}', ['uses' => 'UserController@edit', 'as' => 'edit.user']);
  Route::post('/update', ['uses' => 'UserController@update', 'as' => 'update.user']);
  Route::get('/delete/{user_id}', ['uses' => 'UserController@delete', 'as' => 'delete.user']);
});

// Menu
Route::group(['prefix' => '/menu'], function() {
  Route::get('/create', ['uses' => 'MenuController@create', 'as' => 'create.menu']);
  Route::post('/store', ['uses' => 'MenuController@store', 'as' => 'add.menu']);
  Route::get('/view', ['uses' => 'MenuController@view', 'as' => 'view.menu']);
  Route::get('/edit/', ['uses' => 'MenuController@edit', 'as' => 'edit.menu']);
  Route::post('/update', ['uses' => 'MenuController@update', 'as' => 'update.menu']);
  Route::get('/delete/{menu_id}', ['uses' => 'MenuController@delete', 'as' => 'delete.menu']);
});

// Menu Items
Route::group(['prefix' => 'menuItem'], function() {
  Route::get('/list/{menu_id}', ['uses' => 'MenuItemController@list', 'as' => 'list.menuItem']);
  Route::post('/create', ['uses' => 'MenuItemController@create', 'as' => 'create.menuItem']);
  Route::get('/edit/{menu_item_id}', ['uses' => 'MenuItemController@edit', 'as' => 'edit.menuItem']);
  Route::post('/update', ['uses' => 'MenuItemController@create', 'as' => 'update.menuItem']);
});