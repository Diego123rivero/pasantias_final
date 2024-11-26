<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PlantillaController;
use App\Http\Controllers\RegistropController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AsignarController;
use Spatie\Permission\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí puedes registrar las rutas web para tu aplicación. Estas rutas
| son cargadas por el RouteServiceProvider y asignadas al grupo "web".
|
*/




/* Rutas protegidas para el rol de Usuario */
Route::group(['middleware' => ['role:Usuario']], function () {
    // Aquí puedes agregar rutas específicas para vendedores
    Route::get('/plantilla', [PlantillaController::class, 'index'])->name('plantilla')->middleware('auth');
    Route::get('/plantilla/{id}/ver', [PlantillaController::class, 'show'])->name('plantilla.show');
    Route::delete('/plantilla/{id}', [PlantillaController::class, 'destroy'])->name('plantilla.destroy');
    Route::get('/plantilla/crear', [PlantillaController::class, 'create'])->name('plantilla.create');
    Route::post('/plantilla/store', [PlantillaController::class, 'store'])->name('plantilla.store');
    Route::get('/plantilla/{id}/editar', [PlantillaController::class, 'edit'])->name('plantilla.edit');
    Route::put('/plantilla/{id}', [PlantillaController::class, 'update'])->name('plantilla.update');

    /* Fecha */
    Route::get('/item', [ItemController::class, 'index'])->name('item')->middleware('auth');
    Route::get('/item/{id}/ver', [ItemController::class, 'show'])->name('item.show');
    Route::delete('/item/{id}', [ItemController::class, 'destroy'])->name('item.destroy');
    Route::get('/item/crear', [ItemController::class, 'create'])->name('item.create');
    Route::post('/item', [ItemController::class, 'store'])->name('item.store');
    Route::get('/item/{id}/editar', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('/item/{id}', [ItemController::class, 'update'])->name('item.update');

});

/* Asignación de roles */

Route::get('/asignar', [AsignarController::class, 'index'])->name('asignar');
Route::get('/asignar_{id}_editar', [AsignarController::class, 'edit'])->name('asignar.edit');
Route::put('/asignar_{id}', [AsignarController::class, 'update'])->name('asignar.update');




    /* Fecha */
    Route::get('/item', [ItemController::class, 'index'])->name('item')->middleware('auth');
    Route::get('/item/{id}/ver', [ItemController::class, 'show'])->name('item.show');
    Route::delete('/item/{id}', [ItemController::class, 'destroy'])->name('item.destroy');
    Route::get('/item/crear', [ItemController::class, 'create'])->name('item.create');
    Route::post('/item', [ItemController::class, 'store'])->name('item.store');
    Route::get('/item/{id}/editar', [ItemController::class, 'edit'])->name('item.edit');
    Route::put('/item/{id}', [ItemController::class, 'update'])->name('item.update');




    Route::get('/plantilla', [PlantillaController::class, 'index'])->name('plantilla')->middleware('auth');
    Route::get('/plantilla/{id}/ver', [PlantillaController::class, 'show'])->name('plantilla.show');
    Route::delete('/plantilla/{id}', [PlantillaController::class, 'destroy'])->name('plantilla.destroy');
    Route::get('/plantilla/crear', [PlantillaController::class, 'create'])->name('plantilla.create');
    Route::post('/plantilla/store', [PlantillaController::class, 'store'])->name('plantilla.store');
    Route::get('/plantilla/{id}/editar', [PlantillaController::class, 'edit'])->name('plantilla.edit');
    Route::put('/plantilla/{id}', [PlantillaController::class, 'update'])->name('plantilla.update');







/* Página principal */
Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

/* Rutas de autenticación */
Auth::routes();

/* Ruta raíz */
Route::get('/', function () {
    return view('welcome');
})->name('inicio.ir');

/* Registro y login */
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [SessionsController::class, 'create'])->name('login');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');

/* Verificación de contraseña */
Route::post('/verificar-contraseña/{id}', [CitaController::class, 'verificarContraseña']);
