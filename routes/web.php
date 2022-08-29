<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\ProyectController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProjectUserController;

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
    return view('layouts/panelusuario');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/inicio', function () {
//     return view('layouts/inicio');
// });

// Route::get('login', [CustomAuthController::class, 'login'])->name('login');
Route::get('signout', [CustomAuthController::class, 'signout'])->name('signout');

// Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/panelusuario', function () {
    return view('layouts/panelusuario');
});
// Route::get('/reportar', function () {
//     return view('registroIncidencias.report');
// });
Route::get('/reportar', [HomeController::class, 'getReport']);
Route::post('/reportar', [HomeController::class, 'postReport']);

Route::get('/listadoIncidencias', [HomeController::class, 'listadoIncidencias']);
Route::get('/seleccionar/proyecto/{id}', [HomeController::class, 'selectedProject']);
// creamos un grupos de rutas para la autenticación
Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function () {
    // Rutas de usuarios
    Route::get('/usuarios', [UserController::class, 'index']);
    Route::post('/usuarios', [UserController::class, 'store']);

    Route::get('/usuarios/{id}', [UserController::class, 'edit']);
    Route::post('/usuarios/{id}', [UserController::class, 'update']);

    Route::get('/usuarios/{id}/eliminar', [UserController::class, 'delete']);

    // Rutas de proyectos
    Route::get('/proyectos', [ProyectController::class, 'index']);
    Route::post('/proyectos', [ProyectController::class, 'store']);

    Route::get('/proyectos/{id}', [ProyectController::class, 'edit']);
    Route::post('/proyectos/{id}', [ProyectController::class, 'update']);

    Route::get('/proyectos/{id}/eliminar', [ProyectController::class, 'delete']);
    Route::get('/proyectos/{id}/restaurar', [ProyectController::class, 'restore']);

    // Rutas de categorias
    Route::post('/categorias', [CategoryController::class, 'store']);
    Route::post('/categoria/editar', [CategoryController::class, 'update']);
    Route::get('/categoria/{id}/eliminar', [CategoryController::class, 'delete']);

    // Rutas de niveles
    Route::post('/niveles', [LevelController::class, 'store']);
    Route::post('/nivel/editar', [LevelController::class, 'update']);
    Route::get('/nivel/{id}/eliminar', [LevelController::class, 'delete']);

    // Rutas de configuracion
    Route::get('/configuracion', [ConfigController::class, 'store']);

    //Rutas de Project-User
    Route::post('/proyecto-usuario',[ProjectUserController::class, 'store']);
    Route::get('/proyecto-usuario/{id}/eliminar', [ProjectUserController::class, 'delete']);
});

Route::get('/file',[PdfController::class, 'comprobarYCrearFichero']);

Route::get('/descargar',[PdfController::class, 'descargarFichero']);

Route::get('/prueba',function (){
    return storage_path();
});
