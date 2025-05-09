<?php

namespace App\Http\Controllers;

use App\Models\AbShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbShoppingCartController extends Controller
{
    public function add_to_cart_api(Request $request) {
        $articleID = $request->input('articleID');

        return AbShoppingCart::saveToShoppingCartDB($articleID, 1);
    }

    public function remove_from_cart_api($shoppingcartId, $articleId)
    {
        return AbShoppingCart::removeFromShoppingCartDB($shoppingcartId, $articleId);
    }

}
