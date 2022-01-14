<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SugerenciasController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/cedula-empleado', [SugerenciasController::class, 'buscaCedula']);
Route::resource('sugerencias', SugerenciasController::class)->names('admin.sugerencias');