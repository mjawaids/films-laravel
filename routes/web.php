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

Auth::routes();

Route::get('/', function () {
    return redirect('/films');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/films', function() {
    return view('films.index');
});
Route::get('/getfilms', 'FilmController@index');
Route::get('/films/create', 'FilmController@create');
Route::get('/films/{film}', 'FilmController@show');
Route::post('/films', 'FilmController@store');

Route::post('/comments', 'CommentController@store');
