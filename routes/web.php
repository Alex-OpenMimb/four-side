<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seguridad\LoginController;
use App\Http\Controllers\Seguridad\UsuarioController;

Route::get('/', function () {
    return redirect('/seguridad/auth/login');
});

/**SEGURIDAD */
Route::prefix('seguridad')->group(function () {

    /**INICIO SESION */
    Route::prefix('auth')->group(function () {
        Route::get('/login', [LoginController::class, 'index'])->name('index');

        Route::post('/acceso', [
            LoginController::class,
            'login'
        ])->name('login');

        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    });

    /**USUARIO */
    Route::prefix('usuarios')->group(function () {
        Route::get('/catalogo', [
            UsuarioController::class,
            'index'
        ])->name('usuarios.catalogo')
            ->middleware('acceso');
    });
});
