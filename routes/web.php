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
    return redirect('/login');
});

//Auth::routes();
Route::auth();
Route::get('/home', 'HomeController@index')->name('home');
// sale
Route::get('/sale', "SaleController@index");
// pos
Route::get('/pos', "POSController@index");
// purchase
Route::get("/purchase", "PurchaseController@index");
// inventory
Route::get("/inventory", "InventoryController@index");
// settings
Route::get('/setting', "SettingController@index");
// Accounting
Route::get('/accounting', "AccountingController@index");
