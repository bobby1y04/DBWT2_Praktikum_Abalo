<?php

namespace App\Http\Controllers;

use App\Models\AbArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\error;

class ArticleController extends Controller
{
    public function search(Request $request) // reprÃ¤sentiert eine HTTP Anfrage, z.b.: GET Parameter
    {
        $searchWord = $request->input('search');
        $limit = $request->input('limit');
        $offset = $request->input('offset');


        $articles = AbArticle::getArticles($searchWord, $offset, $limit);

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


    // API-methods -----------------------------------------------------------------------------------------------------

    /*
     * curl -X GET 'http://localhost:8000/api/articles/?search=Artikelname'
     * -H "Accept: application/json"
     */
    public function search_api(Request $request) {
        $limit = $request->input('limit');
        $searchWord = $request->input('search');
        $offset = $request->input('offset');
        $articles = AbArticle::getArticles($searchWord, $offset, $limit);

        $response = [];
        foreach ($articles as $article) {
            $response[] = [
                'ID' => $article->id,
                'Name' => $article->ab_name,
                'Preis' => $article->ab_price / 100,    // Preis ist in Cent gespeichert
                'Beschreibung' => $article->ab_description,
                'SellerID' => $article->ab_creator_id,
                'Erstellungsdatum' => $article->ab_createdate,
                'Bild' => $article->ab_image
            ];
        }

        // return view('articleView', ['data' => $articles]);
        return response()->json($response, 200, [], JSON_PRETTY_PRINT);
    }

    /*
     * curl -X POST 'http://localhost:8000/api/articles/'
     * -H "Accept: application/json"
     * -H "Content-Type: application/json"
     * -d '{"name":"Artikelname","price":999,"description":"Artikelbeschreibung"}'
     */
    public function store_api(Request $request) {
        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');

        try {
            AbArticle::saveArticle($name, $price, $description);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 422);    // 422 = Unprocessable Entity
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
        return response()->json(['id' => DB::table('ab_article')->max('id')]);
    }

    public function get_amount_api(Request $request) {
        $amount = AbArticle::getAmountOfArticles();
        return response()->json($amount, 200, [], JSON_PRETTY_PRINT);
    }


    // -----------------------------------------------------------------------------------------------------------------

}
