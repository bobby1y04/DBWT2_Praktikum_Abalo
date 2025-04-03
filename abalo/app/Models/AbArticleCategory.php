<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbArticleCategory extends Model
{
    protected $primaryKey = 'id';
    protected $keyType = 'int';

    protected $table = 'ab_articlecategory';

    protected $attributes = [
        'ab_name',
        'ab_description',
        'ab_parent'
    ];
}
