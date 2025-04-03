<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbArticle extends Model
{
    protected $primaryKey = 'id';
    protected $keyType = 'integer';

    protected $table = 'ab_article';

    protected $attributes = ['ab_name', 'ab_price', 'ab_description', 'ab_creator_id', 'ab_createdate'];

    public static function getArticles($searchWord)
    {
        if ($searchWord == 0 || empty($searchWord))
        {
            return self::all();
        }
        return self::where('ab_name', 'ILIKE', "%{$searchWord}%")->get(); // ILIKE = Insensitive Like
    }
}
