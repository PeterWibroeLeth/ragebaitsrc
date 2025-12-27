<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::post('/create', function (Request $request) {

    $validated = $request->validate([
        'title' => 'required',
        'tier' => 'required',
        'description' => 'required',
    ]);

    return redirect('/')
        ->with('success', 'Entity added successfully')
        ->with('ragebait', $validated);
});
