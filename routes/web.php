<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ProblemaController;
use App\Http\Controllers\CalificacionController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('usuarios',UsuarioController::class);
Route::resource('roles',RolController::class);
Route::resource('problemas',ProblemaController::class);
Route::resource('calificaciones',CalificacionController::class);
Route::get('concursos',[ProblemaController::class,'concurso'])->name('concursos.index');
Route::post('loginconcurso', [ProblemaController::class,'postlogin'])->name('concurso.login');
Route::get('loginconcurso', [ProblemaController::class,'login'])->name('concurso.ver');
Route::get('concursos/{concurso}',[ProblemaController::class,'verproblema'])->name('concursos.show');
