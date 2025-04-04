<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AbUser extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $keyType = 'int';

    protected $table = 'ab_user';

    // Für Mass Assignments der Factory
    protected $fillable = [
        'ab_name',
        'ab_password',
        'ab_mail'
    ];
}
