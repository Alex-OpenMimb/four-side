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
        Route::get('/restart', [LoginController::class, 'restart'])->name('restart');
        Route::post('/forgot-password', [LoginController::class, 'sendCode'])->name('forgot.password');
        Route::get('/form-code', [LoginController::class, 'formCode'])->name('form.code');
        Route::post('/check-code', [LoginController::class, 'checkCode'])->name('check.code');
        Route::get('/edit-password/{user}', [LoginController::class, 'editPassword'])->name('edit.password');
        Route::put('/update-password/{user}', [LoginController::class, 'updatePassword'])->name('update.password');

    });

    /**USUARIO */

    Route::prefix('usuarios')->middleware('acceso')->group(function () {
        Route::get('/catalogo', [UsuarioController::class, 'index'])->name('usuarios.catalogo');
        Route::get('/catalogo/{user}', [UsuarioController::class, 'show'])->name('usuarios.catalogo.show');
        Route::get('/catalogo/foto/{user}', [UsuarioController::class, 'edit'])->name('usuarios.catalogo.edit');
        Route::put('/catalogo/foto/{user}', [UsuarioController::class, 'update'])->name('usuarios.catalogo.update');

    });

});
