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

    public function getArticles($searchWord) {
        $articles = [];

        // $searchWord = 0 if all articles are to be shown
        if ($searchWord == 0) {
            foreach(AbArticle::all() as $article) {
                $singleArticle = [];
                $singleArticle['id'] = $article->id;
                $singleArticle['ab_name'] = $article->ab_name;
                $singleArticle['ab_price'] = $article->ab_price;
                $singleArticle['ab_description'] = $article->ab_description;
                $singleArticle['ab_creator_id'] = $article->ab_creator_id;
                $singleArticle['ab_createdate'] = $article->ab_createdate;
                $articles[] = $singleArticle;
            }
        }
        return $articles;
    }

}
