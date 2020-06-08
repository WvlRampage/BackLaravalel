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

Route::get('/', 'PagesController@welcome')->name('welcome');

Route::get('posts', 'PagesController@posts')->name('posts');

Route::get('comments', 'PagesController@comments')->name('comments');

Route::get('users', 'PagesController@users')->name('users');

Route::get('users/{id}', 'PagesController@detail')->name('users.detail');

Route::post('create', 'PagesController@create')->name('users.create');

Route::get('/edit/{id}', 'PagesController@edit')->name('users.edit');

Route::put('/edit/{id}', 'PagesController@update')->name('users.update');

Route::delete('/delete/{id}', 'PagesController@delete')->name('users.delete');