<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbArticleHasCategory extends Model
{
    protected $primaryKey = 'id';
    protected $keyType = 'int';

    protected $table = 'ab_article_has_articlecategory';

    protected $attributes = [
        'ab_articlecategory_id',
        'ab_article_id'
    ];
}
