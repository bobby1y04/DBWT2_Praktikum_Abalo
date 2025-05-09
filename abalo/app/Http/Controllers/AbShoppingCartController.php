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

    public function get_cart_api(Request $request)
    {
        return response()->json([]);
    }

}
