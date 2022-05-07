<?php
use Illuminate\Support\Facades\App;
App::setLocale("en");

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//agregamos los controladores para las rutas
use App\Http\Controllers\IncioController;

use App\Http\Controllers\PermisosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsuariosController;



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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('Welcome');
/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});*/


Route::middleware(['auth:sanctum',config('jetstream.auth_session'), 'verified'])->resource('/dashboard', IncioController::class)->name('index', 'inicio')->except('create', 'show', 'edit', 'store', 'update', 'destroy');

//creamos las rutas para las url de permisos
Route::resource('permisos', PermisosController::class)->except(['create','show','edit','store','update','destroy']);

//creamos las rutas para las url de roles
Route::resource('roles', RolesController::class)->names('roles')->except(['show']);

Route::get('/buscarnom/{rolusuario}', [RolesController::class, 'buscarNombres'])->name('buscarnom');

//creamos las rutas para las url para usuarios
Route::resource('usuarios', UsuariosController::class)->names('usuarios');

Route::post('usuarios/foto', [UsuariosController::class, 'eliminarFoto'])->name('usuarios.eliminarFoto');

Route::post('usuarios/password', [UsuariosController::class, 'actualizarPassword'])->name('usuarios.password');

Route::get('/buscarnom/{nusuario}', [UsuariosController::class, 'buscarNombres'])->name('buscarnom');

