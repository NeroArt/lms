<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Seccion3Controller;
use App\Http\Controllers\Seccion3bController;
use App\Http\Controllers\Seccion3cController;
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
Route::resource('seccion1', App\Http\Controllers\Seccion1Controller::class);
Route::get('/seccion2', [App\Http\Controllers\Seccion2Controller::class, 'index'])->name('seccion2');
Route::resource('seccion2', App\Http\Controllers\Seccion2Controller::class);
//Codigo seccion 3
Route::get('/seccion3', [Seccion3Controller::class, 'index'])->name('seccion3');
Route::post('/seccion3/store', [Seccion3Controller::class, 'store'])->name('seccion3-store');
Route::get('/seccion3/create', [Seccion3Controller::class, 'create'])->name('seccion3-create');
Route::get('/seccion3/{seccion3}/edit', [Seccion3Controller::class, 'edit'])->name('seccion3-edit');
Route::patch('/seccion3/{seccion3}', [Seccion3Controller::class, 'update'])->name('seccion3-update');
// Fin codigo seccion 3

//Codigo seccion 3b
Route::get('/seccion3b/create', [Seccion3bController::class, 'create'])->name('seccion3b-create');
Route::post('/seccion3b/store', [Seccion3bController::class, 'store'])->name('seccion3b-store');
// Fin codigo seccion 3b

//Codigo seccion 3c
Route::get('/seccion3c/create', [Seccion3cController::class, 'create'])->name('seccion3c-create');
Route::post('/seccion3c/store', [Seccion3cController::class, 'store'])->name('seccion3c-store');
Route::get('/seccion3c/getTemas/{IdObjetivo}/{CursoId}', [Seccion3cController::class, 'getTemas'])->name('seccion3c-getTemas');
// Fin codigo seccion 3c


Route::get('/seccion4', [App\Http\Controllers\Seccion4Controller::class, 'index'])->name('seccion4');
Route::get('/seccion5', [App\Http\Controllers\Seccion5Controller::class, 'index'])->name('seccion5');
Route::get('/seccion6', [App\Http\Controllers\Seccion6Controller::class, 'index'])->name('seccion6');
Route::get('/seccion7', [App\Http\Controllers\Seccion7Controller::class, 'index'])->name('seccion7');
Route::get('/seccion8', [App\Http\Controllers\Seccion8Controller::class, 'index'])->name('seccion8');
Route::get('/seccion9', [App\Http\Controllers\Seccion9Controller::class, 'index'])->name('seccion9');
Route::get('/plantilla_cliente/{seccion1}', [App\Http\Controllers\Seccion1Controller::class, 'plantilla_cliente'])->name('seccion9');

//Seguimiento de actividades para clientes
Route::get('/actividades_cliente/{idCurso}', [App\Http\Controllers\SeguimientoActividadesClienteController::class, 'seguimiento_actividades'])->name('seccion9');

//Vista de administradores
Route::get('/paneladministrador', [App\Http\Controllers\PanelAdministradorController::class, 'index'])->name('paneladministrador');
Route::resource('formusuarioadmin', App\Http\Controllers\UsuariosAdminController::class);
Route::resource('cursosadministrador', App\Http\Controllers\CursosAdministradorController::class);

//Vista de super administradores
Route::get('/superadministrador', [App\Http\Controllers\PanelSuperAdministradorController::class, 'index'])->name('superadmin');
Route::resource('/actividades', App\Http\Controllers\ActividadesAvanceController::class);
Route::resource('/usuariossuperadmin', App\Http\Controllers\UsuariosSuperAdminController::class);

//Perfil de usuario
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile-store');

//Tests
Route::get('/test', [App\Http\Controllers\TestController::class, 'index'])->name('test');