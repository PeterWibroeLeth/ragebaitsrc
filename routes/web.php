<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RagebaitController;

Route::get('/', function () {
    return redirect()->route('ragebaits.index');
});

Route::resource('ragebaits', RagebaitController::class);
