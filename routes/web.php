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

Route::get('/', function() {
    return redirect()->route('products.index');
});
Route::group(['prefix' => 'ajax', 'namespace' => 'Ajax'], function() {
    Route::get('products/chart', 'ProductChartController');
    Route::patch('products/{product}', 'ProductController@update');
    Route::post('products', 'ProductController@index');
});

Route::get('products/chart', 'ProductChartController')->name('products.chart');
Route::resource('products', 'ProductController');

