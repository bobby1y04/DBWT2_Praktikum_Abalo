<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\AbArticle;

class TestArticle extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_articleSearch() : void {
        $searchWord = 0;
        $abArticle = new AbArticle();
        $result = $abArticle->getArticles($searchWord);

    }
}
