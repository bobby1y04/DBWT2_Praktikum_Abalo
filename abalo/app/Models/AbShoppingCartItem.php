<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbShoppingCartItem extends Model
{
    protected $primaryKey = 'id';

    public $incrementing = true; // Autoinkrement

    protected $keyType = 'integer';

    protected $table = 'ab_shoppingcart_item';


    protected $fillable = [
        'ab_shoppingcart_id',
        'ab_article_id',
        'ab_createdate'
        ];
}
