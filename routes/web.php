<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [
    'uses' => 'App\Http\Controllers\LoginController@index',
    'as' => 'login.index'
]);

Route::get('/cadastrar', [
    'uses' => 'App\Http\Controllers\LoginController@create',
    'as' => 'login.cadastrar'
]);

Route::post('/adicionar', [
    'uses' => 'App\Http\Controllers\LoginController@store',
    'as' => 'login.adicionar'
]);

Route::post('/login', [
    'uses' => 'App\Http\Controllers\LoginController@login',
    'as' => 'login.login'
]);

Route::get('/sair', [
    'uses' => 'App\Http\Controllers\LoginController@logout',
    'as' => 'login.logout'
]);




Route::get('/home', [
    'uses' => 'App\Http\Controllers\HomeController@index',
    'as' => 'home.index'
])->middleware('auth');





Route::get('/usuario', [
    'uses' => 'App\Http\Controllers\UsuarioController@index',
    'as' => 'usuario.index'
])->middleware('auth');

Route::get('/usuario/editar/{id}', [
    'uses' => 'App\Http\Controllers\UsuarioController@edit',
    'as' => 'usuario.editar'
])->middleware('auth');

Route::put('/usuario/atualizar/{id}', [
    'uses' => 'App\Http\Controllers\UsuarioController@update',
    'as' => 'usuario.atualizar'
])->middleware('auth');




Route::get('/animal/cadastrar', [
    'uses' => 'App\Http\Controllers\AnimalController@create',
    'as' => 'animal.cadastrar'
])->middleware('auth');

Route::post('/animal/adicionar', [
    'uses' => 'App\Http\Controllers\AnimalController@store',
    'as' => 'animal.adicionar'
])->middleware('auth');

Route::get('/animal/informacoes', [
    'uses' => 'App\Http\Controllers\AnimalController@listar',
    'as' => 'animal.listar'
])->middleware('auth');

Route::get('/animal/informacoes/{id}', [
    'uses' => 'App\Http\Controllers\AnimalController@informacoes',
    'as' => 'animal.informacoes'
])->where('id', '[0-9]+')->middleware('auth');

Route::get('/animal/editar/{id}', [
    'uses' => 'App\Http\Controllers\AnimalController@edit',
    'as' => 'animal.editar'
])->where('id', '[0-9]+')->middleware('auth');

Route::put('/animal/atualizar/{id}', [
    'uses' => 'App\Http\Controllers\AnimalController@update',
    'as' => 'animal.atualizar'
])->middleware('auth');

Route::get('/animal/excluir/{id}', [
    'uses' => 'App\Http\Controllers\AnimalController@destroy',
    'as' => 'animal.excluir'
])->where('id', '[0-9]+')->middleware('auth');


// Vacinas

Route::get('/animal/{id}/vacinas', [
    'uses' => 'App\Http\Controllers\VacinaController@listar',
    'as' => 'vacinas.listar'
])->where('id', '[0-9]+')->middleware('auth');

Route::get('/animal/{id}/vacinas/cadastrar', [
    'uses' => 'App\Http\Controllers\VacinaController@create',
    'as' => 'vacinas.cadastrar'
])->middleware('auth');

Route::post('/vacina/adicionar', [
    'uses' => 'App\Http\Controllers\VacinaController@store',
    'as' => 'vacinas.adicionar'
])->middleware('auth');

Route::get('/vacina/editar/{id}', [
    'uses' => 'App\Http\Controllers\VacinaController@edit',
    'as' => 'vacinas.editar'
])->where('id', '[0-9]+')->middleware('auth');

Route::put('/vacina/atualizar/{id}', [
    'uses' => 'App\Http\Controllers\VacinaController@update',
    'as' => 'vacina.atualizar'
])->where('id', '[0-9]+')->middleware('auth');

Route::get('/vacina/excluir/{id}', [
    'uses' => 'App\Http\Controllers\VacinaController@destroy',
    'as' => 'vacina.excluir'
])->where('id', '[0-9]+')->middleware('auth');

// Vermifugos

Route::get('/animal/{id}/vermifugos', [
    'uses' => 'App\Http\Controllers\VermifugoController@listar',
    'as' => 'vermifugos.listar'
])->where('id', '[0-9]+')->middleware('auth');

Route::get('/animal/{id}/vermifugos/cadastrar', [
    'uses' => 'App\Http\Controllers\VermifugoController@create',
    'as' => 'vermifugos.cadastrar'
])->where('id', '[0-9]+')->middleware('auth');

Route::post('/vermifugo/adicionar', [
    'uses' => 'App\Http\Controllers\VermifugoController@store',
    'as' => 'vermifugo.adicionar'
])->middleware('auth');

Route::get('/vermifugo/editar/{id}', [
    'uses' => 'App\Http\Controllers\VermifugoController@edit',
    'as' => 'vermifugo.editar'
])->where('id', '[0-9]+')->middleware('auth');

Route::put('/vermifugo/atualizar/{id}', [
    'uses' => 'App\Http\Controllers\VermifugoController@update',
    'as' => 'vermifugo.atualizar'
])->where('id', '[0-9]+')->middleware('auth');

Route::get('/vermifugo/excluir/{id}', [
    'uses' => 'App\Http\Controllers\VermifugoController@destroy',
    'as' => 'vermifugo.excluir'
])->where('id', '[0-9]+')->middleware('auth');

// E-mail

Route::get('/reset-senha', [
    'uses' => 'App\Http\Controllers\PasswordController@index',
    'as' => 'password.index'
]);

Route::post('/enviar-email', [
    'uses' => 'App\Http\Controllers\PasswordController@sendEmail',
    'as' => 'password.sendEmail'
]);

Route::get('/reset-senha/{token}', [
    'uses' => 'App\Http\Controllers\PasswordController@reset',
    'as' => 'password.reset'
]);

Route::post('/reset-senha/{token}', [
    'uses' => 'App\Http\Controllers\PasswordController@update',
    'as' => 'password.update'
])->where('token', '[0-9a-zA-Z]+');
