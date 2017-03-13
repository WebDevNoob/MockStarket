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
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/quotes/{symbol?}','QuotesController@index')->name('quotes');

Route::get('/addFunds','AddFundsController@index')->name('addFunds');
Route::post('/addFunds','AddFundsController@addToFund')->name('addFunds');

Route::get('/sell/{symbol?}','SellStockController@index')->name('sell');
Route::get('/buy/{symbol?}', 'BuyStockController@index')->name('buy');
