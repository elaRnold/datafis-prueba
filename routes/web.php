<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// tareas
Route::get('/tareas', [App\Http\Controllers\HomeController::class, 'addDataView'])->name('tareas.add.view');
// crear
Route::post('tareas/send', [App\Http\Controllers\HomeController::class, 'addDataSend'])->name('tareas.add.send');
// borrar
Route::get('/tareas-borrar/{id}', [App\Http\Controllers\HomeController::class, 'deleteDataItems'])->name('tareas.delete');
// actualizar
Route::get('/tareas/edit/{id}', [App\Http\Controllers\HomeController::class, 'editDataView'])->name('tareas.edit.view');
Route::post('/tareas/edit/send', [App\Http\Controllers\HomeController::class, 'editDataSend'])->name('tareas.edit.send');