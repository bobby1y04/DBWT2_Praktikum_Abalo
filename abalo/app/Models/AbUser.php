<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbUser extends Model
{
    protected $primaryKey = 'id';
    protected $keyType = 'int';

    protected $table = 'ab_user';

    protected $attributes = [
        'ab_name',
        'ab_password',
        'ab_mail'
    ];
}
