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

use App\Link;
use Illuminate\Support\Facades\Route;

Route::get('/{link}', 'RedirectController@redirect')->name('redirect');

Route::get('/{link}/{token}', 'AdminController@view')->name('view');

Route::get('/', 'IndexController@index');
Route::post('/', 'IndexController@create');

