<?php


use App\Http\Controllers\ConfiguracioneController;

use App\Http\Controllers\EntradaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CuadreController;
use App\Http\Controllers\CierreController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\ConstruccionController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\LogoutController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puede registrar rutas web para su aplicación. Estas
| rutas son cargadas por RouteServiceProvider y todas ellas
| ser asignado al grupo de middleware "web". ¡Haz algo genial!
|
*/

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    Route::resource('configuracion', ConfiguracioneController::class)->only([
        'index', 'edit', 'update'
    ]);

    Route::resource('entradas', EntradaController::class);

    Route::resource('empleados', EmpleadoController::class);

    Route::resource('proveedores', ProveedorController::class);

    Route::resource('cuadres', CuadreController::class);

    Route::resource('cierres', CierreController::class);

    Route::resource('menus', MenuController::class);

    Route::resource('pedidos', PedidoController::class);

    Route::resource('gastos', GastoController::class);

    Route::resource('construccion', ConstruccionController::class);



    Route::resource('users', UserController::class);

    Route::resource('roles', RolController::class);
    
    Route::resource('permissions', PermissionController::class);

    Route::get('/logout', [LogoutController::class, 'logout'])->name('auth.logout');

}); 
