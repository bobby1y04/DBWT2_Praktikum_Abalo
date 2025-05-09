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

    public function get_cart_api($shoppingcartid)
    {
        $items = DB::table('ab_shoppingcart_item')
            ->join('ab_article', 'ab_article.id', '=', 'ab_shoppingcart_item.ab_article_id')
            ->where('ab_shoppingcart_id', $shoppingcartid)
            ->select('ab_article.id as id', 'ab_article.ab_name as name', 'ab_article.ab_price as price')
            ->get();

        return response()->json($items);
    }

}
