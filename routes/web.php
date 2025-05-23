<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//rutas para la configuraciones del sistema
Route::get('/admin/configuracion', [App\Http\Controllers\ConfiguracionController::class, 'index'])->name('admin.configuracion.index')->middleware('auth');
Route::get('/admin/configuracion/create', [App\Http\Controllers\ConfiguracionController::class, 'store'])->name('admin.configuracion.store')->middleware('auth');



//-----------------
// VISUALIZADOR
Route::get('/admin/visualizador', [App\Http\Controllers\VisualizadorController::class, 'index'])->name('admin.visualizador.index')->middleware('auth');



//-----------------
// SALDOS
Route::get('/admin/saldos', [App\Http\Controllers\SaldosController::class, 'index'])->name('admin.saldos.index')->middleware('auth');