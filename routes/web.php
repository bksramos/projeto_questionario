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

    $user = \App\User::first();
    $roles = \App\role::all();

    $user ->roles()->sync($roles);
    dd($roles);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/questionarios/create', 'QuestionarioController@create');
Route::post('/questionarios', 'QuestionarioController@store');
Route::get('/questionarios', 'QuestionarioController@select_doc');




