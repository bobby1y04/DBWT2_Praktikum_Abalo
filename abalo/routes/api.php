<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AbShoppingCartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/articles', [ArticleController::class, 'search_api'])->name('searchArticleWithAPI');

Route::post('/articles', [ArticleController::class, 'store_api'])->name('storeArticleWithAPI');

Route::post('/shoppingcart', [AbShoppingCartController::class, 'add_to_cart_api'])->name('addToCartWithAPI');

Route::delete('/shoppingcart/{shoppingcartid}/articles/{articleId}', [AbShoppingCartController::class,
    'remove_from_cart_api'])->name('removeFromCartWithAPI');

Route::get('/shoppingcart/{shoppingcartid}', [AbShoppingCartController::class, 'get_cart_api']);
