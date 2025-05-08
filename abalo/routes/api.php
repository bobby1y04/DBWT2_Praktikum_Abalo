<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/articles', [ArticleController::class, 'search_api'])->name('searchArticleWithAPI');

Route::post('/articles', [ArticleController::class, 'store_api'])->name('storeArticleWithAPI');
