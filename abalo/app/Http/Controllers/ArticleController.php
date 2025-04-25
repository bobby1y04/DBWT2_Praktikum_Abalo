<?php

namespace App\Http\Controllers;

use App\Models\AbArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function search(Request $request) // reprÃ¤sentiert eine HTTP Anfrage, z.b.: GET Parameter
    {
        $searchWord = $request->input('search');

        $articles = AbArticle::getArticles($searchWord);

        return view('articleView', ['data' => $articles]);
    }

    public function create(Request $request) {
        return view('newArticleView');
    }

    public function store(Request $request) {
        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');

        try {
            AbArticle::saveArticle($name, $price, $description);
        } catch (\InvalidArgumentException $e) {
            return redirect()->back()->withErrors(['validation' => $e->getMessage()])->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['database' => $e->getMessage()])->withInput();
        }
        return redirect()->route('showArticles');


    }
}
