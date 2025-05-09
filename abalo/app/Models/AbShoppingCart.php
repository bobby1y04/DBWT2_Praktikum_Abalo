<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AbShoppingCart extends Model
{

    protected $primaryKey = 'id';

    public $incrementing = true; // Autoinkrement

    protected $keyType = 'integer';

    protected $table = 'ab_shoppingcart';

    protected $fillable = ['ab_shoppingcart_id', 'ab_article_id', 'ab_createdate'];



    public static function checkIfItemIsInCart($articleID)
    {
        return AbShoppingCartItem::where('ab_article_id', $articleID)->exists();
    }

    public static function saveToShoppingCartDB($articleID, $shoppingCartID): \Illuminate\Http\JsonResponse
    {
        if (self::checkIfItemIsInCart($articleID)) {
            return response()->json(['error' => "Artikel befindet sich bereits im Einkaufswagen."]);
        }

        AbShoppingCartItem::create([
            'ab_shoppingcart_id' => $shoppingCartID,
            'ab_article_id' => $articleID,
            'ab_createdate' => now(),
        ]);

        return response()->json(['success' => "Artikel erfolgreich gespeichert."]);
    }
}


