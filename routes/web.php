<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RagebaitController;
use App\Http\Controllers\AuthController;

/*
| Auth
*/
Route::get('/login', [AuthController::class, 'showLogin'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

Route::get('/register', [AuthController::class, 'showRegister'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

/*
| Public ragebaits
*/
Route::get('/', [RagebaitController::class, 'index'])
    ->name('ragebaits.index');

Route::get('/ragebaits', [RagebaitController::class, 'index']);

Route::get('/ragebaits/{ragebait}', [RagebaitController::class, 'show'])
    ->name('ragebaits.show');

/*
| Protected ragebaits
*/
Route::middleware('auth')->group(function () {
    Route::get('/ragebaits/create', [RagebaitController::class, 'create'])->name('ragebaits.create');
    Route::post('/ragebaits', [RagebaitController::class, 'store'])->name('ragebaits.store');
    Route::get('/ragebaits/{ragebait}/edit', [RagebaitController::class, 'edit'])->name('ragebaits.edit');
    Route::put('/ragebaits/{ragebait}', [RagebaitController::class, 'update'])->name('ragebaits.update');
    Route::delete('/ragebaits/{ragebait}', [RagebaitController::class, 'destroy'])->name('ragebaits.destroy');
});
