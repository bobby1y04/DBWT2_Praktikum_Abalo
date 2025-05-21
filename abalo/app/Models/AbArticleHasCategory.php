<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbArticleHasCategory extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = true; // Autoinkrement

    protected $keyType = 'integer';

    protected $table = 'ab_article_has_articlecategory';

    protected $fillable = [
        'ab_articlecategory_id',
        'ab_article_id'
    ];
    
}
