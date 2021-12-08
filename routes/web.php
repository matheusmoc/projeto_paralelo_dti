<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{RegistroController, LoginController, ListaUsuarioController};
//use App\Http\Middleware\AutenticacaoMiddleware;  //no kernel para ser global

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


Route::prefix('/admin')->group(function () {

       //login
   Route::get('/login/{erro?}', [LoginController::class, 'login'])->name('registros.login');
   Route::post('/login', [LoginController::class, 'autenticar'])->name('registros.login');
   Route::get('/logout', [LoginController::class, 'exit'])->name('registros.logout');


   Route::resource('/registros', RegistroController::class)->middleware('log.acesso');//->middleware(AutenticacaoMiddleware::class);
   Route::resource('/usuarios', ListaUsuarioController::class)->except(['create'])->middleware('log.acesso');//->middleware(AutenticacaoMiddleware::class);
   
});



