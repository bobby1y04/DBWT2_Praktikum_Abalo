<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbTestDataController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
   return redirect('/welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});

// Meilenstein 1, Aufgabe 5
Route::get('/testdata', [AbTestDataController::class, 'printAll'])->name('testdata');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/isloggedin', [AuthController::class, 'isloggedin'])->name('haslogin');

// Meilenstein 1, Aufgabe 10
Route::get('/articles', [ArticleController::class, 'search'])->name('showArticles');

// Meilenstein 2, Aufgabe 9
Route::get('/newarticle', [ArticleController::class, 'create'])->name('createArticle');

Route::post('/articles', [ArticleController::class, 'store'])->name('storeArticle');

// +++ MEILENSTEIN 4, AUFGABE 8 +++
Route::get('/4-8-1', function () {
    return view('M4.Aufgabe8.4-vue1-helloworld');
});

Route::get('/4-8-2', function () {
    return view('M4.Aufgabe8.4-vue2-array');
});




