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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Vista de usuarios no autentificados
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');

//Vista de clientes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/seccion1', [App\Http\Controllers\Seccion1Controller::class, 'index'])->name('seccion1');
Route::get('/seccion2', [App\Http\Controllers\Seccion2Controller::class, 'index'])->name('seccion2');
Route::get('/seccion3', [App\Http\Controllers\Seccion3Controller::class, 'index'])->name('seccion3');
Route::get('/seccion4', [App\Http\Controllers\Seccion4Controller::class, 'index'])->name('seccion4');
Route::get('/seccion5', [App\Http\Controllers\Seccion5Controller::class, 'index'])->name('seccion5');
Route::get('/seccion6', [App\Http\Controllers\Seccion6Controller::class, 'index'])->name('seccion6');
Route::get('/seccion7', [App\Http\Controllers\Seccion7Controller::class, 'index'])->name('seccion7');
Route::get('/seccion8', [App\Http\Controllers\Seccion8Controller::class, 'index'])->name('seccion8');
Route::get('/seccion9', [App\Http\Controllers\Seccion9Controller::class, 'index'])->name('seccion9');

//Vista de administradores
Route::get('/paneladministrador', [App\Http\Controllers\PanelAdministradorController::class, 'index'])->name('paneladministrador');

//Vista de super administradores
Route::get('/superadministrador', [App\Http\Controllers\PanelSuperAdministradorController::class, 'index'])->name('superadmin');