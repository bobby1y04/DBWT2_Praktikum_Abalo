<?php

namespace App\Http\Controllers;

use App\Models\AbTestData;
use Illuminate\Http\Request;


class AbTestDataController extends Controller
{
    public function printAll() {
    $data = AbTestData::readAll();

    return view('testdata', ['data' => $data]);
    }
}
