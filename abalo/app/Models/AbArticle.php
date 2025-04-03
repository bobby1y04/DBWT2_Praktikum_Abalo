<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbArticle extends Model
{
    protected $primaryKey = 'id';
    protected $keyType = 'int';

    protected $table = 'ab_article';

    protected $attributes = [
        'ab_name',
        'ab_price',
        'ab_description',
        'ab_creator_id',
        'ab_createdate'
    ];
}
