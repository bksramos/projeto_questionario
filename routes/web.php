<?php

use Illuminate\Support\Facades\Route;
use App\documento;
use App\Questao;
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

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/dashboard', function(){
    return view('layouts.master');
})->middleware(['auth', 'admin']);

Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function(){
    Route::resource('/users', 'UserController', ['except' => ['show', 'create', 'store']]);
});


Route::get('/questionarios/create', 'QuestionarioController@create');
Route::post('/questionarios', 'QuestionarioController@store');
Route::get('/questionarios', 'QuestionarioController@select_doc');

Route::get('/documentos/add', 'DocumentoController@add');
Route::get('/documentos/editar', 'DocumentoController@edit');
Route::get('/documentos/add', 'DocumentoController@addDocuments');
Route::post('/documentos/add', 'DocumentoController@store');
Route::get('/documentos/add/{documento}', 'DocumentoController@show');

Route::get('/documentos/responder', 'ResponderController@responder');
Route::get('/documentos/responder', 'ResponderController@responderDoc');

//Route::get('/perguntas/{documentos}-{slug}', 'PerguntaController@perguntar');
//Route::get('/perguntas/{documentos}-{slug}', 'PerguntaController@create');
Route::get('/perguntas/{documentos}-{slug}', 'PerguntaController@show');
Route::post('/perguntas/{documentos}-{slug}', 'PerguntaController@store');
Route::get('/editar/{documentos}-{slug}', 'PerguntaController@editar');
Route::post('/update/{documentos}-{slug}', 'PerguntaController@update');

Route::get('/perguntas/finish', 'PerguntaController@finish');
Route::get('/perguntas/editado', 'PerguntaController@editado');

Route::get('/indicadores/geral', 'IndicadorController@general');
Route::get('/indicadores/organization', 'IndicadorController@organization');
Route::get('/indicadores/knowledge', 'IndicadorController@knowledge');
