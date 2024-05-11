<?php

use App\Http\Controllers\ActualizarSeguimientoController;
use App\Http\Controllers\CursosClienteController;
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
use App\Http\Controllers\Seccion7bController;
use App\Http\Controllers\Seccion7cController;
use App\Http\Controllers\Seccion7dController;
use App\Http\Controllers\Seccion8Controller;
use App\Http\Controllers\Seccion8bController;
use App\Http\Controllers\Seccion8cController;
use App\Http\Controllers\Seccion8dController;
use App\Http\Controllers\Seccion8eController;
use App\Http\Controllers\Seccion8fController;
use App\Http\Controllers\Seccion9Controller;
use App\Http\Controllers\Seccion9bController;
use App\Http\Controllers\Seccion9cController;
use App\Http\Controllers\Seccion9dController;
use App\Http\Controllers\Seccion9eController;
use App\Http\Controllers\Seccion9fController;
use App\Http\Controllers\Seccion9gController;
use App\Http\Controllers\Seccion9hController;
use App\Http\Controllers\Seccion9iController;
use App\Http\Controllers\Seccion9jController;
use App\Http\Controllers\Seccion9kController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\SeguimientoEtapasController;
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
//Route::get('/seccion1', [App\Http\Controllers\Seccion1Controller::class, 'index'])->name('seccion1');
Route::resource('seccion1', App\Http\Controllers\Seccion1Controller::class);
Route::resource('seccion2', App\Http\Controllers\Seccion2Controller::class);
//Route::get('/seccion2', [App\Http\Controllers\Seccion2Controller::class, 'index'])->name('seccion2');



//Codigo seccion 3
Route::get('/seccion3', [Seccion3Controller::class, 'index'])->name('seccion3');
Route::get('/seccion3/create', [Seccion3Controller::class, 'create'])->name('seccion3-create');
Route::post('/seccion3/store', [Seccion3Controller::class, 'store'])->name('seccion3-store');
Route::get('/seccion3/{seccion3}', [Seccion3Controller::class, 'show'])->name('seccion3-show');
Route::get('/seccion3/{seccion3}/edit', [Seccion3Controller::class, 'edit'])->name('seccion3-edit');
Route::patch('/seccion3/{seccion3}', [Seccion3Controller::class, 'update'])->name('seccion3-update');
// Fin codigo seccion 3

//Codigo seccion 3b
Route::get('/seccion3b', [Seccion3bController::class, 'index'])->name('seccion3b-index');
Route::get('/seccion3b/create', [Seccion3bController::class, 'create'])->name('seccion3b-create');
Route::post('/seccion3b/store', [Seccion3bController::class, 'store'])->name('seccion3b-store');
Route::get('/seccion3b/{seccion3b}', [Seccion3bController::class, 'show'])->name('seccion3b-show');
Route::get('/seccion3b/{seccion3b}/edit', [Seccion3bController::class, 'edit'])->name('seccion3b-edit');
Route::patch('/seccion3b/{seccion3b}', [Seccion3bController::class, 'update'])->name('seccion3b-update');
Route::get('/seccion3b-getDataObj/{idCurso}', [Seccion3bController::class, 'getDataObj'])->name('seccion3b-getDataObj');
Route::get('/seccion3b/validacion/{nombreVista}/{CursoId}', [Seccion3bController::class, 'seguimiento3b'])->name('seguimiento3b');
// Fin codigo seccion 3b

//Codigo seccion 3c
Route::get('/seccion3c', [Seccion3cController::class, 'index'])->name('seccion3c-index');
Route::get('/seccion3c/create', [Seccion3cController::class, 'create'])->name('seccion3c-create');
Route::post('/seccion3c/store', [Seccion3cController::class, 'store'])->name('seccion3c-store');
Route::get('/seccion3c/{seccion3c}', [Seccion3cController::class, 'show'])->name('seccion3c-show');
Route::get('/seccion3c/getTemas/{IdObjetivo}/{CursoId}', [Seccion3cController::class, 'getTemas'])->name('seccion3c-getTemas');
Route::get('/seccion3c/{seccion3c}/edit', [Seccion3cController::class, 'edit'])->name('seccion3c-edit');
Route::patch('/seccion3c/{seccion3c}', [Seccion3cController::class, 'update'])->name('seccion3c-update');
Route::get('/seccion3c/validacion/{nombreVista}/{CursoId}', [Seccion3cController::class, 'seguimiento3c'])->name('seguimiento3c');
// Fin codigo seccion 3c

//Codigo seccion 3d
Route::get('/seccion3d', [Seccion3dController::class, 'index'])->name('seccion3d-index');
Route::get('/seccion3d/create', [Seccion3dController::class, 'create'])->name('seccion3d-create');
Route::post('/seccion3d/store', [Seccion3dController::class, 'store'])->name('seccion3d-store');
Route::get('/seccion3d/{seccion3d}', [Seccion3dController::class, 'show'])->name('seccion3d-show');
Route::get('/seccion3d/{seccion3d}/edit', [Seccion3dController::class, 'edit'])->name('seccion3d-edit');
Route::patch('/seccion3d/{seccion3d}', [Seccion3dController::class, 'update'])->name('seccion3d-update');
Route::get('/seccion3d/validacion/{nombreVista}/{CursoId}', [Seccion3dController::class, 'seguimiento3d'])->name('seguimiento3d');
// Fin codigo seccion 3d

//Codigo seccion 4
Route::get('/seccion4', [Seccion4Controller::class, 'index'])->name('seccion4-index');
Route::get('/seccion4/create', [Seccion4Controller::class, 'create'])->name('seccion4-create');
Route::post('/seccion4/store', [Seccion4Controller::class, 'store'])->name('seccion4-store');
Route::get('/seccion4/{seccion4}', [Seccion4Controller::class, 'show'])->name('seccion4-show');
Route::get('/seccion4/{seccion4}/edit', [Seccion4Controller::class, 'edit'])->name('seccion4-edit');
Route::patch('/seccion4/{seccion4}', [Seccion4Controller::class, 'update'])->name('seccion4-update');
Route::get('/seccion4/validacion/{nombreVista}/{CursoId}', [Seccion4Controller::class, 'seguimiento4'])->name('seguimiento4');
// Fin codigo seccion 4

//Codigo seccion 5
Route::get('/seccion5', [Seccion5Controller::class, 'index'])->name('seccion5-index');
Route::get('/seccion5/create', [Seccion5Controller::class, 'create'])->name('seccion5-create');
Route::post('/seccion5/store', [Seccion5Controller::class, 'store'])->name('seccion5-store');
Route::get('/seccion5/{seccion5}', [Seccion5Controller::class, 'show'])->name('seccion5-show');
Route::get('/seccion5/{seccion5}/edit', [Seccion5Controller::class, 'edit'])->name('seccion5-edit');
Route::patch('/seccion5/{seccion5}', [Seccion5Controller::class, 'update'])->name('seccion5-update');
Route::get('/seccion5/validacion/{nombreVista}/{CursoId}', [Seccion5Controller::class, 'seguimiento5'])->name('seguimiento5');
// Fin codigo seccion 5

//Codigo seccion 6
Route::get('/seccion6', [Seccion6Controller::class, 'index'])->name('seccion6-index');
Route::get('/seccion6/create', [Seccion6Controller::class, 'create'])->name('seccion6-create');
Route::post('/seccion6/store', [Seccion6Controller::class, 'store'])->name('seccion6-store');
Route::get('/seccion6/{seccion6}', [Seccion6Controller::class, 'show'])->name('seccion6-show');
Route::get('/seccion6/{seccion6}/edit', [Seccion6Controller::class, 'edit'])->name('seccion6-edit');
Route::patch('/seccion6/{seccion6}', [Seccion6Controller::class, 'update'])->name('seccion6-update');
Route::get('/seccion6actividad/{seccion6}/edit', [Seccion6Controller::class, 'editactividad'])->name('seccion6-editactividad');
Route::patch('/seccion6actividad/{seccion6}', [Seccion6Controller::class, 'updateactividad'])->name('seccion6-updateactividad');
Route::get('/seccion6/validacion/{nombreVista}/{CursoId}', [Seccion6Controller::class, 'seguimiento6'])->name('seguimiento6');
// Fin codigo seccion 6

//Codigo seccion 7a
Route::get('/seccion7a', [Seccion7Controller::class, 'index'])->name('seccion7a-index');
Route::get('/seccion7a/create', [Seccion7Controller::class, 'create'])->name('seccion7a-create');
Route::post('/seccion7a/store', [Seccion7Controller::class, 'store'])->name('seccion7a-store');
Route::get('/seccion7a/{seccion7a}', [Seccion7Controller::class, 'show'])->name('seccion7a-show');
Route::get('/seccion7a/{seccion7a}/edit', [Seccion7Controller::class, 'edit'])->name('seccion7a-edit');
Route::patch('/seccion7a/{seccion7a}', [Seccion7Controller::class, 'update'])->name('seccion7a-update');
Route::get('/seccion7actividad/{seccion7a}/edit', [Seccion7Controller::class, 'editactividad'])->name('seccion7a-editactividad');
Route::patch('/seccion7actividad/{seccion7a}', [Seccion7Controller::class, 'updateactividad'])->name('seccion7a-updateactividad');
// Fin codigo seccion 7a

//Codigo seccion 7b
Route::get('/seccion7b', [Seccion7bController::class, 'index'])->name('seccion7b-index');
Route::get('/seccion7b/create', [Seccion7bController::class, 'create'])->name('seccion7b-create');
Route::post('/seccion7b/store', [Seccion7bController::class, 'store'])->name('seccion7b-store');
Route::get('/seccion7b/{seccion7b}', [Seccion7bController::class, 'show'])->name('seccion7b-show');
Route::get('/seccion7b/{seccion7b}/edit', [Seccion7bController::class, 'edit'])->name('seccion7b-edit');
Route::patch('/seccion7b/{seccion7b}', [Seccion7bController::class, 'update'])->name('seccion7b-update');
Route::get('/seccion7bactividad/{seccion7b}/edit', [Seccion7bController::class, 'editactividad'])->name('seccion7b-editactividad');
Route::patch('/seccion7bactividad/{seccion7b}', [Seccion7bController::class, 'updateactividad'])->name('seccion7b-updateactividad');
Route::get('/seccion7b/getParticulares/{CursoId}', [Seccion7bController::class, 'getParticulares'])->name('seccion7b-getParticulares');
Route::get('/seccion7b/getGeneral/{CursoId}', [Seccion7bController::class, 'getGeneral'])->name('seccion7b-getGeneral');
Route::get('/seccion7b/getTemario/{CursoId}', [Seccion7bController::class, 'getTemario'])->name('seccion7b-getTemario');
Route::get('/seccion7b/getBeneficios/{CursoId}', [Seccion7bController::class, 'getBeneficios'])->name('seccion7b-getBeneficios');
Route::get('/seccion7b/getEvaluaciones/{CursoId}', [Seccion7bController::class, 'getEvaluaciones'])->name('seccion7b-getEvaluaciones');
Route::get('/seccion7b/getDescripcionCurso/{CursoId}', [Seccion7bController::class, 'getDescripcionCurso'])->name('seccion7b-getDescripcionCurso');
Route::get('/seccion7b/validacion/{nombreVista}/{CursoId}', [Seccion7bController::class, 'seguimiento7b'])->name('seguimiento7b');
// Fin codigo seccion 7b

//Codigo seccion 7c
Route::get('/seccion7c', [Seccion7cController::class, 'index'])->name('seccion7c-index');
Route::get('/seccion7c/create', [Seccion7cController::class, 'create'])->name('seccion7c-create');
Route::post('/seccion7c/store', [Seccion7cController::class, 'store'])->name('seccion7c-store');
Route::get('/seccion7c/{seccion7c}', [Seccion7cController::class, 'show'])->name('seccion7c-show');
Route::get('/seccion7c/{seccion7c}/edit', [Seccion7cController::class, 'edit'])->name('seccion7c-edit');
Route::patch('/seccion7c/{seccion7c}', [Seccion7cController::class, 'update'])->name('seccion7c-update');
Route::get('/seccion7cactividad/{seccion7c}/edit', [Seccion7cController::class, 'editactividad'])->name('seccion7c-editactividad');
Route::patch('/seccion7cactividad/{seccion7c}', [Seccion7cController::class, 'updateactividad'])->name('seccion7c-updateactividad');
Route::get('/seccion7c/validacion/{nombreVista}/{CursoId}', [Seccion7cController::class, 'seguimiento7c'])->name('seguimiento7c');
// Fin codigo seccion 7c

//Codigo seccion 7d
Route::get('/seccion7d', [Seccion7dController::class, 'index'])->name('seccion7d-index');
Route::get('/seccion7d/create', [Seccion7dController::class, 'create'])->name('seccion7d-create');
Route::post('/seccion7d/store', [Seccion7dController::class, 'store'])->name('seccion7d-store');
Route::get('/seccion7d/{seccion7d}', [Seccion7dController::class, 'show'])->name('seccion7d-show');
Route::get('/seccion7d/{seccion7d}/edit', [Seccion7dController::class, 'edit'])->name('seccion7d-edit');
Route::patch('/seccion7d/{seccion7d}', [Seccion7dController::class, 'update'])->name('seccion7d-update');
Route::get('/seccion7dactividad/{seccion7d}/edit', [Seccion7dController::class, 'editactividad'])->name('seccion7d-editactividad');
Route::patch('/seccion7dactividad/{seccion7d}', [Seccion7dController::class, 'updateactividad'])->name('seccion7d-updateactividad');
// Fin codigo seccion 7d

//Codigo seccion 8a
Route::get('/seccion8a', [Seccion8Controller::class, 'index'])->name('seccion8a-index');
Route::get('/seccion8a/create', [Seccion8Controller::class, 'create'])->name('seccion8a-create');
Route::post('/seccion8a/store', [Seccion8Controller::class, 'store'])->name('seccion8a-store');
Route::get('/seccion8a/{seccion8a}', [Seccion8Controller::class, 'show'])->name('seccion8a-show');
Route::get('/seccion8a/{seccion8a}/edit', [Seccion8Controller::class, 'edit'])->name('seccion8a-edit');
Route::patch('/seccion8a/{seccion8a}', [Seccion8Controller::class, 'update'])->name('seccion8a-update');
Route::get('/seccion8aactividad/{seccion8a}/edit', [Seccion8Controller::class, 'editactividad'])->name('seccion8a-editactividad');
Route::patch('/seccion8aactividad/{seccion8a}', [Seccion8Controller::class, 'updateactividad'])->name('seccion8a-updateactividad');
Route::get('/seccion8a/getSubtemas/{CursoId}', [Seccion8Controller::class, 'getSubtemas'])->name('seccion8a-getSubtemas');
Route::get('/seccion8a/validacion/{nombreVista}/{CursoId}', [Seccion8Controller::class, 'seguimiento8a'])->name('seguimiento8a');
// Fin codigo seccion 8a

//Codigo seccion 8b
Route::get('/seccion8b', [Seccion8bController::class, 'index'])->name('seccion8b-index');
Route::get('/seccion8b/create', [Seccion8bController::class, 'create'])->name('seccion8b-create');
Route::post('/seccion8b/store', [Seccion8bController::class, 'store'])->name('seccion8b-store');
Route::get('/seccion8b/{seccion8b}', [Seccion8bController::class, 'show'])->name('seccion8b-show');
Route::get('/seccion8b/{seccion8b}/edit', [Seccion8bController::class, 'edit'])->name('seccion8b-edit');
Route::patch('/seccion8b/{seccion8b}', [Seccion8bController::class, 'update'])->name('seccion8b-update');
Route::get('/seccion8bactividad/{seccion8b}/edit', [Seccion8bController::class, 'editactividad'])->name('seccion8b-editactividad');
Route::patch('/seccion8bactividad/{seccion8b}', [Seccion8bController::class, 'updateactividad'])->name('seccion8b-updateactividad');
Route::get('/seccion8b/getSubtemas/{CursoId}', [Seccion8bController::class, 'getSubtemas'])->name('seccion8b-getSubtemas');
Route::get('/seccion8b/validacion/{nombreVista}/{CursoId}', [Seccion8bController::class, 'seguimiento8b'])->name('seguimiento8b');
// Fin codigo seccion 8b

//Codigo seccion 8c
Route::get('/seccion8c', [Seccion8cController::class, 'index'])->name('seccion8c-index');
Route::get('/seccion8c/create', [Seccion8cController::class, 'create'])->name('seccion8c-create');
Route::post('/seccion8c/store', [Seccion8cController::class, 'store'])->name('seccion8c-store');
Route::get('/seccion8c/{seccion8c}', [Seccion8cController::class, 'show'])->name('seccion8c-show');
Route::get('/seccion8c/{seccion8c}/edit', [Seccion8cController::class, 'edit'])->name('seccion8c-edit');
Route::patch('/seccion8c/{seccion8c}', [Seccion8cController::class, 'update'])->name('seccion8c-update');
Route::get('/seccion8cactividad/{seccion8c}/edit', [Seccion8cController::class, 'editactividad'])->name('seccion8c-editactividad');
Route::patch('/seccion8cactividad/{seccion8c}', [Seccion8cController::class, 'updateactividad'])->name('seccion8c-updateactividad');
Route::get('/seccion8c/getSubtemas/{CursoId}', [Seccion8cController::class, 'getSubtemas'])->name('seccion8c-getSubtemas');
Route::get('/seccion8c/validacion/{nombreVista}/{CursoId}', [Seccion8cController::class, 'seguimiento8c'])->name('seguimiento8c');
// Fin codigo seccion 8c

//Codigo seccion 8d
Route::get('/seccion8d', [Seccion8dController::class, 'index'])->name('seccion8d-index');
Route::get('/seccion8d/create', [Seccion8dController::class, 'create'])->name('seccion8d-create');
Route::post('/seccion8d/store', [Seccion8dController::class, 'store'])->name('seccion8d-store');
Route::get('/seccion8d/{seccion8d}', [Seccion8dController::class, 'show'])->name('seccion8d-show');
Route::get('/seccion8d/{seccion8d}/edit', [Seccion8dController::class, 'edit'])->name('seccion8d-edit');
Route::patch('/seccion8d/{seccion8d}', [Seccion8dController::class, 'update'])->name('seccion8d-update');
Route::get('/seccion8dactividad/{seccion8d}/edit', [Seccion8dController::class, 'editactividad'])->name('seccion8d-editactividad');
Route::patch('/seccion8dactividad/{seccion8d}', [Seccion8dController::class, 'updateactividad'])->name('seccion8d-updateactividad');
Route::get('/seccion8d/validacion/{nombreVista}/{CursoId}', [Seccion8dController::class, 'seguimiento8d'])->name('seguimiento8d');
// Fin codigo seccion 8d

//Codigo seccion 8e
Route::get('/seccion8e', [Seccion8eController::class, 'index'])->name('seccion8e-index');
Route::get('/seccion8e/create', [Seccion8eController::class, 'create'])->name('seccion8e-create');
Route::post('/seccion8e/store', [Seccion8eController::class, 'store'])->name('seccion8e-store');
Route::get('/seccion8e/{seccion8e}', [Seccion8eController::class, 'show'])->name('seccion8e-show');
Route::get('/seccion8e/{seccion8e}/edit', [Seccion8eController::class, 'edit'])->name('seccion8e-edit');
Route::patch('/seccion8e/{seccion8e}', [Seccion8eController::class, 'update'])->name('seccion8e-update');
Route::get('/seccion8eactividad/{seccion8e}/edit', [Seccion8eController::class, 'editactividad'])->name('seccion8e-editactividad');
Route::patch('/seccion8eactividad/{seccion8e}', [Seccion8eController::class, 'updateactividad'])->name('seccion8e-updateactividad');
Route::get('/seccion8e/getSubtemas/{CursoId}', [Seccion8eController::class, 'getSubtemas'])->name('seccion8e-getSubtemas');
Route::get('/seccion8e/validacion/{nombreVista}/{CursoId}', [Seccion8eController::class, 'seguimiento8e'])->name('seguimiento8e');
// Fin codigo seccion 8e

//Codigo seccion 8f
Route::get('/seccion8f', [Seccion8fController::class, 'index'])->name('seccion8f-index');
Route::get('/seccion8f/create', [Seccion8fController::class, 'create'])->name('seccion8f-create');
Route::post('/seccion8f/store', [Seccion8fController::class, 'store'])->name('seccion8f-store');
Route::get('/seccion8f/{seccion8f}', [Seccion8fController::class, 'show'])->name('seccion8f-show');
Route::get('/seccion8f/{seccion8f}/edit', [Seccion8fController::class, 'edit'])->name('seccion8f-edit');
Route::patch('/seccion8f/{seccion8f}', [Seccion8fController::class, 'update'])->name('seccion8f-update');
Route::get('/seccion8factividad/{seccion8f}/edit', [Seccion8fController::class, 'editactividad'])->name('seccion8f-editactividad');
Route::patch('/seccion8factividad/{seccion8f}', [Seccion8fController::class, 'updateactividad'])->name('seccion8f-updateactividad');
Route::get('/seccion8f/getSubtemas/{CursoId}', [Seccion8fController::class, 'getSubtemas'])->name('seccion8f-getSubtemas');
Route::get('/seccion8f/validacion/{nombreVista}/{CursoId}', [Seccion8fController::class, 'seguimiento8f'])->name('seguimiento8f');
// Fin codigo seccion 8f

//Codigo seccion 9a
Route::get('/seccion9a', [Seccion9Controller::class, 'index'])->name('seccion9a-index');
Route::get('/seccion9a/create', [Seccion9Controller::class, 'create'])->name('seccion9a-create');
Route::post('/seccion9a/store', [Seccion9Controller::class, 'store'])->name('seccion9a-store');
Route::get('/seccion9a/{seccion9a}', [Seccion9Controller::class, 'show'])->name('seccion9a-show');
Route::get('/seccion9a/{seccion9a}/edit', [Seccion9Controller::class, 'edit'])->name('seccion9a-edit');
Route::patch('/seccion9a/{seccion9a}', [Seccion9Controller::class, 'update'])->name('seccion9a-update');
Route::get('/seccion9aactividad/{seccion9a}/edit', [Seccion9Controller::class, 'editactividad'])->name('seccion9a-editactividad');
Route::patch('/seccion9aactividad/{seccion9a}', [Seccion9Controller::class, 'updateactividad'])->name('seccion9a-updateactividad');
Route::get('/seccion9a/getSubtemas/{CursoId}', [Seccion9Controller::class, 'getSubtemas'])->name('seccion9a-getSubtemas');
Route::get('/seccion9a/validacion/{nombreVista}/{CursoId}', [Seccion9Controller::class, 'seguimiento9a'])->name('seguimiento9a');
// Fin codigo seccion 9a

//Codigo seccion 9b
Route::get('/seccion9b', [Seccion9bController::class, 'index'])->name('seccion9b-index');
Route::get('/seccion9b/create', [Seccion9bController::class, 'create'])->name('seccion9b-create');
Route::post('/seccion9b/store', [Seccion9bController::class, 'store'])->name('seccion9b-store');
Route::get('/seccion9b/{seccion9b}', [Seccion9bController::class, 'show'])->name('seccion9b-show');
Route::get('/seccion9b/{seccion9b}/edit', [Seccion9bController::class, 'edit'])->name('seccion9b-edit');
Route::patch('/seccion9b/{seccion9b}', [Seccion9bController::class, 'update'])->name('seccion9b-update');
Route::get('/seccion9bactividad/{seccion9b}/edit', [Seccion9bController::class, 'editactividad'])->name('seccion9b-editactividad');
Route::patch('/seccion9bactividad/{seccion9b}', [Seccion9bController::class, 'updateactividad'])->name('seccion9b-updateactividad');
Route::get('/seccion9b/getSubtemas/{CursoId}', [Seccion9bController::class, 'getSubtemas'])->name('seccion9b-getSubtemas');
// Fin codigo seccion 9b

//Codigo seccion 9c
Route::get('/seccion9c', [Seccion9cController::class, 'index'])->name('seccion9c-index');
Route::get('/seccion9c/create', [Seccion9cController::class, 'create'])->name('seccion9c-create');
Route::post('/seccion9c/store', [Seccion9cController::class, 'store'])->name('seccion9c-store');
Route::get('/seccion9c/{seccion9c}', [Seccion9cController::class, 'show'])->name('seccion9c-show');
Route::get('/seccion9c/{seccion9c}/edit', [Seccion9cController::class, 'edit'])->name('seccion9c-edit');
Route::patch('/seccion9c/{seccion9c}', [Seccion9cController::class, 'update'])->name('seccion9c-update');
Route::get('/seccion9cactividad/{seccion9c}/edit', [Seccion9cController::class, 'editactividad'])->name('seccion9c-editactividad');
Route::patch('/seccion9cactividad/{seccion9c}', [Seccion9cController::class, 'updateactividad'])->name('seccion9c-updateactividad');
// Fin codigo seccion 9c

//Codigo seccion 9d
Route::get('/seccion9d', [Seccion9dController::class, 'index'])->name('seccion9d-index');
Route::get('/seccion9d/create', [Seccion9dController::class, 'create'])->name('seccion9d-create');
Route::post('/seccion9d/store', [Seccion9dController::class, 'store'])->name('seccion9d-store');
Route::get('/seccion9d/{seccion9d}', [Seccion9dController::class, 'show'])->name('seccion9d-show');
Route::get('/seccion9d/{seccion9d}/edit', [Seccion9dController::class, 'edit'])->name('seccion9d-edit');
Route::patch('/seccion9d/{seccion9d}', [Seccion9dController::class, 'update'])->name('seccion9d-update');
Route::get('/seccion9dactividad/{seccion9d}/edit', [Seccion9dController::class, 'editactividad'])->name('seccion9d-editactividad');
Route::patch('/seccion9dactividad/{seccion9d}', [Seccion9dController::class, 'updateactividad'])->name('seccion9d-updateactividad');
Route::get('/seccion9d/getDescripcionCurso/{CursoId}', [Seccion9dController::class, 'getDescripcionCurso'])->name('seccion9d-getDescripcionCurso');
// Fin codigo seccion 9d

//Codigo seccion 9e
Route::get('/seccion9e', [Seccion9eController::class, 'index'])->name('seccion9e-index');
Route::get('/seccion9e/create', [Seccion9eController::class, 'create'])->name('seccion9e-create');
Route::post('/seccion9e/store', [Seccion9eController::class, 'store'])->name('seccion9e-store');
Route::get('/seccion9e/{seccion9e}', [Seccion9eController::class, 'show'])->name('seccion9e-show');
Route::get('/seccion9e/{seccion9e}/edit', [Seccion9eController::class, 'edit'])->name('seccion9e-edit');
Route::patch('/seccion9e/{seccion9e}', [Seccion9eController::class, 'update'])->name('seccion9e-update');
Route::get('/seccion9eactividad/{seccion9e}/edit', [Seccion9eController::class, 'editactividad'])->name('seccion9e-editactividad');
Route::patch('/seccion9eactividad/{seccion9e}', [Seccion9eController::class, 'updateactividad'])->name('seccion9e-updateactividad');
Route::get('/seccion9e/getDescripcionCurso/{CursoId}', [Seccion9eController::class, 'getDescripcionCurso'])->name('seccion9e-getDescripcionCurso');
// Fin codigo seccion 9e

//Codigo seccion 9f
Route::get('/seccion9f', [Seccion9fController::class, 'index'])->name('seccion9f-index');
Route::get('/seccion9f/create', [Seccion9fController::class, 'create'])->name('seccion9f-create');
Route::post('/seccion9f/store', [Seccion9fController::class, 'store'])->name('seccion9f-store');
Route::get('/seccion9f/{seccion9f}', [Seccion9fController::class, 'show'])->name('seccion9f-show');
Route::get('/seccion9f/{seccion9f}/edit', [Seccion9fController::class, 'edit'])->name('seccion9f-edit');
Route::patch('/seccion9f/{seccion9f}', [Seccion9fController::class, 'update'])->name('seccion9f-update');
Route::get('/seccion9factividad/{seccion9f}/edit', [Seccion9fController::class, 'editactividad'])->name('seccion9f-editactividad');
Route::patch('/seccion9factividad/{seccion9f}', [Seccion9fController::class, 'updateactividad'])->name('seccion9f-updateactividad');
// Fin codigo seccion 9f

//Codigo seccion 9g
Route::get('/seccion9g', [Seccion9gController::class, 'index'])->name('seccion9g-index');
Route::get('/seccion9g/create', [Seccion9gController::class, 'create'])->name('seccion9g-create');
Route::post('/seccion9g/store', [Seccion9gController::class, 'store'])->name('seccion9g-store');
Route::get('/seccion9g/{seccion9g}', [Seccion9gController::class, 'show'])->name('seccion9g-show');
Route::get('/seccion9g/{seccion9g}/edit', [Seccion9gController::class, 'edit'])->name('seccion9g-edit');
Route::patch('/seccion9g/{seccion9g}', [Seccion9gController::class, 'update'])->name('seccion9g-update');
Route::get('/seccion9gactividad/{seccion9g}/edit', [Seccion9gController::class, 'editactividad'])->name('seccion9g-editactividad');
Route::patch('/seccion9gactividad/{seccion9g}', [Seccion9gController::class, 'updateactividad'])->name('seccion9g-updateactividad');
// Fin codigo seccion 9g

//Codigo seccion 9h
Route::get('/seccion9h', [Seccion9hController::class, 'index'])->name('seccion9h-index');
Route::get('/seccion9h/create', [Seccion9hController::class, 'create'])->name('seccion9h-create');
Route::post('/seccion9h/store', [Seccion9hController::class, 'store'])->name('seccion9h-store');
Route::get('/seccion9h/{seccion9h}', [Seccion9hController::class, 'show'])->name('seccion9h-show');
Route::get('/seccion9h/{seccion9h}/edit', [Seccion9hController::class, 'edit'])->name('seccion9h-edit');
Route::patch('/seccion9h/{seccion9h}', [Seccion9hController::class, 'update'])->name('seccion9h-update');
Route::get('/seccion9hactividad/{seccion9h}/edit', [Seccion9hController::class, 'editactividad'])->name('seccion9h-editactividad');
Route::patch('/seccion9hactividad/{seccion9h}', [Seccion9hController::class, 'updateactividad'])->name('seccion9h-updateactividad');
Route::get('/seccion9h/validacion/{nombreVista}/{CursoId}', [Seccion9hController::class, 'seguimiento9h'])->name('seguimiento9h');
// Fin codigo seccion 9h

//Codigo seccion 9i
Route::get('/seccion9i', [Seccion9iController::class, 'index'])->name('seccion9i-index');
Route::get('/seccion9i/create', [Seccion9iController::class, 'create'])->name('seccion9i-create');
Route::post('/seccion9i/store', [Seccion9iController::class, 'store'])->name('seccion9i-store');
Route::get('/seccion9i/{seccion9i}', [Seccion9iController::class, 'show'])->name('seccion9i-show');
Route::get('/seccion9i/{seccion9i}/edit', [Seccion9iController::class, 'edit'])->name('seccion9i-edit');
Route::patch('/seccion9i/{seccion9i}', [Seccion9iController::class, 'update'])->name('seccion9i-update');
Route::get('/seccion9iactividad/{seccion9i}/edit', [Seccion9iController::class, 'editactividad'])->name('seccion9i-editactividad');
Route::patch('/seccion9iactividad/{seccion9i}', [Seccion9iController::class, 'updateactividad'])->name('seccion9i-updateactividad');
// Fin codigo seccion 9i

//Codigo seccion 9j
Route::get('/seccion9j', [Seccion9jController::class, 'index'])->name('seccion9j-index');
Route::get('/seccion9j/create', [Seccion9jController::class, 'create'])->name('seccion9j-create');
Route::post('/seccion9j/store', [Seccion9jController::class, 'store'])->name('seccion9j-store');
Route::get('/seccion9j/{seccion9j}', [Seccion9jController::class, 'show'])->name('seccion9j-show');
Route::get('/seccion9j/{seccion9j}/edit', [Seccion9jController::class, 'edit'])->name('seccion9j-edit');
Route::patch('/seccion9j/{seccion9j}', [Seccion9jController::class, 'update'])->name('seccion9j-update');
Route::get('/seccion9jactividad/{seccion9j}/edit', [Seccion9jController::class, 'editactividad'])->name('seccion9j-editactividad');
Route::patch('/seccion9jactividad/{seccion9j}', [Seccion9jController::class, 'updateactividad'])->name('seccion9j-updateactividad');
// Fin codigo seccion 9j

//Codigo seccion 9k
Route::get('/seccion9k', [Seccion9kController::class, 'index'])->name('seccion9k-index');
Route::get('/seccion9k/create', [Seccion9kController::class, 'create'])->name('seccion9k-create');
Route::post('/seccion9k/store', [Seccion9kController::class, 'store'])->name('seccion9k-store');
Route::get('/seccion9k/{seccion9k}', [Seccion9kController::class, 'show'])->name('seccion9k-show');
Route::get('/seccion9k/{seccion9k}/edit', [Seccion9kController::class, 'edit'])->name('seccion9k-edit');
Route::patch('/seccion9k/{seccion9k}', [Seccion9kController::class, 'update'])->name('seccion9k-update');
Route::get('/seccion9kactividad/{seccion9k}/edit', [Seccion9kController::class, 'editactividad'])->name('seccion9k-editactividad');
Route::patch('/seccion9kactividad/{seccion9k}', [Seccion9kController::class, 'updateactividad'])->name('seccion9k-updateactividad');
// Fin codigo seccion 9k

//gestioncursos
Route::get('/gestioncursos', [CursosClienteController::class, 'index'])->name('gestioncursos-index');
//gestioncursos

//gestionsecciones
Route::get('/gestionsecciones/{idCurso}', [CursosClienteController::class, 'indexGestionSecciones'])->name('gestionsecciones-index');
//gestionsecciones

//Actualizacion de seguimiento secciones
Route::get('/seguimiento/actualizacion/{nombreVista}/{CursoId}', [ActualizarSeguimientoController::class, 'actualizarSeguimiento'])->name('actualizar-seguimiento');
//Fin Actualizacion de seguimiento secciones


//Pagos cliente
Route::post('/pago/store', [PagosController::class, 'store'])->name('pago-store');
// Fin Pagos cliente



Route::get('/plantilla_cliente/{seccion1}', [App\Http\Controllers\Seccion1Controller::class, 'plantilla_cliente'])->name('seccion9');

//Seguimiento de actividades para clientes
Route::get('/actividades_cliente', [App\Http\Controllers\SeguimientoActividadesClienteController::class, 'index'])->name('seguimiento_actividades');
Route::get('/actividades_cliente/{idCurso}', [App\Http\Controllers\SeguimientoActividadesClienteController::class, 'seguimiento_actividades'])->name('seccion9');
//FinSeguimiento de actividades para clientes

//Seguimiento de etapas para clientes
Route::get('/etapas_cliente', [SeguimientoEtapasController::class, 'index'])->name('seccion3d-index');
//Fin Seguimiento de etapas para clientes


//Vista de administradores
Route::get('/paneladministrador', [App\Http\Controllers\PanelAdministradorController::class, 'index'])->name('paneladministrador');
Route::resource('formusuarioadmin', App\Http\Controllers\UsuariosAdminController::class);
Route::resource('cursosadministrador', App\Http\Controllers\CursosAdministradorController::class);

//Vista de super administradores
Route::get('/superadministrador', [App\Http\Controllers\PanelSuperAdministradorController::class, 'index'])->name('superadmin');
Route::resource('/actividades', App\Http\Controllers\ActividadesAvanceController::class);
Route::resource('/usuariossuperadmin', App\Http\Controllers\UsuariosSuperAdminController::class);

//Perfil de usuario
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile-store');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile');

//Tests
Route::get('/test', [App\Http\Controllers\TestController::class, 'index'])->name('test');