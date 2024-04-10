<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Seccion3Controller;
use App\Http\Controllers\Seccion3bController;
use App\Http\Controllers\Seccion3cController;
use App\Http\Controllers\Seccion3dController;
use App\Http\Controllers\Seccion4Controller;
use App\Http\Controllers\Seccion5Controller;
use App\Http\Controllers\Seccion6Controller;
use App\Http\Controllers\Seccion7Controller;
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
Route::get('/seccion3b', [Seccion3bController::class, 'index'])->name('seccion3b-index');
Route::get('/seccion3b/create', [Seccion3bController::class, 'create'])->name('seccion3b-create');
Route::post('/seccion3b/store', [Seccion3bController::class, 'store'])->name('seccion3b-store');
Route::get('/seccion3b/{seccion3b}/edit', [Seccion3bController::class, 'edit'])->name('seccion3b-edit');
Route::patch('/seccion3b/{seccion3b}', [Seccion3bController::class, 'update'])->name('seccion3b-update');
// Fin codigo seccion 3b

//Codigo seccion 3c
Route::get('/seccion3c', [Seccion3cController::class, 'index'])->name('seccion3c-index');
Route::get('/seccion3c/create', [Seccion3cController::class, 'create'])->name('seccion3c-create');
Route::post('/seccion3c/store', [Seccion3cController::class, 'store'])->name('seccion3c-store');
Route::get('/seccion3c/getTemas/{IdObjetivo}/{CursoId}', [Seccion3cController::class, 'getTemas'])->name('seccion3c-getTemas');
Route::get('/seccion3c/{seccion3c}/edit', [Seccion3cController::class, 'edit'])->name('seccion3c-edit');
Route::patch('/seccion3c/{seccion3c}', [Seccion3cController::class, 'update'])->name('seccion3c-update');
// Fin codigo seccion 3c

//Codigo seccion 3d
Route::get('/seccion3d', [Seccion3dController::class, 'index'])->name('seccion3d-index');
Route::get('/seccion3d/create', [Seccion3dController::class, 'create'])->name('seccion3d-create');
Route::post('/seccion3d/store', [Seccion3dController::class, 'store'])->name('seccion3d-store');
Route::get('/seccion3d/{seccion3d}/edit', [Seccion3dController::class, 'edit'])->name('seccion3d-edit');
Route::patch('/seccion3d/{seccion3d}', [Seccion3dController::class, 'update'])->name('seccion3d-update');
// Fin codigo seccion 3d

//Codigo seccion 4
Route::get('/seccion4', [Seccion4Controller::class, 'index'])->name('seccion4-index');
Route::get('/seccion4/create', [Seccion4Controller::class, 'create'])->name('seccion4-create');
Route::post('/seccion4/store', [Seccion4Controller::class, 'store'])->name('seccion4-store');
Route::get('/seccion4/{seccion4}/edit', [Seccion4Controller::class, 'edit'])->name('seccion4-edit');
Route::patch('/seccion4/{seccion4}', [Seccion4Controller::class, 'update'])->name('seccion4-update');
// Fin codigo seccion 4

//Codigo seccion 5
Route::get('/seccion5', [Seccion5Controller::class, 'index'])->name('seccion5-index');
Route::get('/seccion5/create', [Seccion5Controller::class, 'create'])->name('seccion5-create');
Route::post('/seccion5/store', [Seccion5Controller::class, 'store'])->name('seccion5-store');
Route::get('/seccion5/{seccion5}/edit', [Seccion5Controller::class, 'edit'])->name('seccion5-edit');
Route::patch('/seccion5/{seccion5}', [Seccion5Controller::class, 'update'])->name('seccion5-update');
// Fin codigo seccion 5

//Codigo seccion 6
Route::get('/seccion6', [Seccion6Controller::class, 'index'])->name('seccion6-index');
Route::get('/seccion6/create', [Seccion6Controller::class, 'create'])->name('seccion6-create');
Route::post('/seccion6/store', [Seccion6Controller::class, 'store'])->name('seccion6-store');
Route::get('/seccion6/{seccion6}/edit', [Seccion6Controller::class, 'edit'])->name('seccion6-edit');
Route::patch('/seccion6/{seccion6}', [Seccion6Controller::class, 'update'])->name('seccion6-update');
Route::get('/seccion6actividad/{seccion6}/edit', [Seccion6Controller::class, 'editactividad'])->name('seccion6-editactividad');
Route::patch('/seccion6actividad/{seccion6}', [Seccion6Controller::class, 'updateactividad'])->name('seccion6-updateactividad');
// Fin codigo seccion 6

//Codigo seccion 7
Route::get('/seccion7a', [Seccion7Controller::class, 'index'])->name('seccion7a-index');
Route::get('/seccion7a/create', [Seccion7Controller::class, 'create'])->name('seccion7a-create');
Route::post('/seccion7a/store', [Seccion7Controller::class, 'store'])->name('seccion7a-store');
Route::get('/seccion7a/{seccion7a}/edit', [Seccion7Controller::class, 'edit'])->name('seccion7a-edit');
Route::patch('/seccion7a/{seccion7a}', [Seccion7Controller::class, 'update'])->name('seccion7a-update');
Route::get('/seccion7actividad/{seccion7a}/edit', [Seccion7Controller::class, 'editactividad'])->name('seccion7a-editactividad');
Route::patch('/seccion7actividad/{seccion7a}', [Seccion7Controller::class, 'updateactividad'])->name('seccion7a-updateactividad');
// Fin codigo seccion 7


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