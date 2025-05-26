<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AbArticle extends Model
{
    protected $primaryKey = 'id';

    public $incrementing = true; // Autoinkrement

    protected $keyType = 'integer';

    protected $table = 'ab_article';
    protected $fillable = [
        'ab_name',
        'ab_price',
        'ab_description',
        'ab_creator_id',
        'ab_createdate',
    ];

    public static function getArticles($searchWord, $limit)
    {
        if ($searchWord == 0 || empty($searchWord))
        {
            return self::all();
        }
        if (isset($limit) && $limit > 0) {
            return self::where('ab_name', 'ILIKE', "%{$searchWord}%")->limit($limit)->get(); //
        } else {
            return self::where('ab_name', 'ILIKE', "%{$searchWord}%")->get(); // ILIKE = Insensitive Like
        }
    }

    public static function saveArticle(string $name, float $priceInEuro, string $description): void
    {
        if (empty($name)) {
            throw new \InvalidArgumentException('Artikelname darf nicht leer sein.');
        }
        if ($priceInEuro <= 0) {
            throw new \InvalidArgumentException('Artikelpreis muss positiv sein.');
        }

        DB::select("SELECT setval('ab_article_id_seq', (SELECT MAX(id) FROM ab_article))"); // Autoinkrement

        $article = new AbArticle();
        $article->ab_name        = $name;
        $article->ab_price       = $priceInEuro * 100;  // Preis als Cent-Betrag speichern
        $article->ab_description = $description;
        $article->ab_creator_id  = 1; // Admin-ID
        $article->ab_createdate  = now();
        $article->created_at = now();
        $article->updated_at = now();
        $article->ab_image = 'images/articleImages/0-no-image.jpg';

        $article->save();
    }
}
