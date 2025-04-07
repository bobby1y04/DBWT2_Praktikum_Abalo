<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbTestDataController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});

// Meilenstein 1, Aufgabe 5
Route::get('/testdata', [AbTestDataController::class, 'printAll'])->name('testdata');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/isloggedin', [AuthController::class, 'isloggedin'])->name('haslogin');

// Meilenstein 1, Aufgabe 10
Route::get('/articles', [ArticleController::class, 'search'])->name('showArticles');



