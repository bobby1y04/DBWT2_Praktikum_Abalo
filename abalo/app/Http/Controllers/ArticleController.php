<?php

namespace App\Http\Controllers;

use App\Events\Angebotsevent;
use App\Models\AbArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

    public function notify_sold_api($id) {

        require __DIR__ . '/vendor/autoload.php';

        $articles = AbArticle::getFirstArticleById($id);

        if (empty($articles)) {
            return response()->json(['success' => false, 'message' => 'Artikel nicht gefunden']);
        }

        $article = $articles[0];
        $message = "Großartig! Ihr Artikel " . $article->ab_name . " wurde erfolgreich verkauft!";


        \Ratchet\Client\connect('ws://localhost:8085/chat')->then(function($conn) use($message) {
            $conn->send($message);
            $conn->close();
        })->catch(function ($e) {
            error_log($e->getMessage());
        });


        return response()->json(['message' => $message]);
}

    public function notify_offer_api(Request $request, $articleID) {

        // $article = DB::table('ab_article')->find($articleID);

        return response()->json(['success' => true, 200, [], JSON_PRETTY_PRINT]);


    }


    // -----------------------------------------------------------------------------------------------------------------

}
