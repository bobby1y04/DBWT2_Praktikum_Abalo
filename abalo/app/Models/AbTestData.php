<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbTestData extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'testdata.ab_testdata';

    protected $attributes = ['id', 'ab_testname'];

    public static function readAll() {
        $arrData = [];

        foreach(AbTestData::all() as $data) {
        $arrData[$data->id] = $data->ab_testname;
        }

        return $arrData;
    }
}
