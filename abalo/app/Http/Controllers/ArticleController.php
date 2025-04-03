<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AbArticle;


class ArticleController extends Controller
{

    public function index() {
        return view('articleView');
    }
    public function search() {
        $data = [];
        $articles = new AbArticle();


        if (!isset($_GET['search'])) {
            $data = $articles->getArticles(0);
        }




        return view('articleView', ['data' => $data]);
    }
}
