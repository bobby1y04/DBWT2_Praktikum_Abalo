<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbTestDataController;

Route::get('/', function () {
    return view('welcome');
});

// Meilenstein 1, Aufgabe 5
Route::get('/testdata', [AbTestDataController::class, 'printAll']);
