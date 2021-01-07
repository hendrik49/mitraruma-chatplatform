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

Route::get('blog', function () {
    return view('blog');
})->name('blog');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/first', 'HomeController@first')->name('first');
Route::get('/chat', 'HomeController@index')->name('chat');
Route::get('/consultation', 'ConsultationController@index')->name('consultation');
Route::post('/consultation', 'ConsultationController@store');

// routing untuk message
Route::group(['prefix' => 'message'], function () {
    Route::get('user/{query}', 'MessageController@user');
    Route::get('user-message/{id}', 'MessageController@message');
    Route::get('user-message/{id}/read', 'MessageController@read');
    Route::post('user-message', 'MessageController@send');
});
