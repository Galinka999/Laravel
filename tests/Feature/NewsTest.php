<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_news_create_form()
    {
        $response = $this->get(route('admin.news.create'));
        $response->assertStatus(200);
    }

    public function test_show_news_status()
    {
        $response = $this->get(route('news.show', ['id' => mt_rand(1,7)]));
        $response->assertStatus(200);
    }

    public function test_show_news_as_not_found_status()
    {
        $response = $this->get(route('news.show', ['id' => mt_rand(10000,1999999)]));
        $response->assertStatus(404);
    }

    public function test_has_json_structure()
    {
        $response = $this->get(route('admin.index'));
        $response->assertStatus(200);
//        $response->assertJsonMissing(['name' => 1, 'age' => 2]);
    }
    public function test_admin_category_status()
    {
        $response = $this->get(route('admin.categories.index'));
        $response->assertStatus(200);
    }
    public function test_admin_news_status()
    {
        $response = $this->get(route('admin.news.index'));
        $response->assertStatus(200);
    }
    public function test_auth_status()
    {
        $response = $this->get(route('auth'));
        $response->assertSuccessful();
    }

    public function test_store_news_status()
    {
        $response = $this->get(route('news.store'));
        $response->assertStatus(200);
    }

    public function test_category_news_status()
    {
        $response = $this->get(route('news.category'));
        $response->assertStatus(200);

    }
    public function test_category_news_view()
    {
        $response = $this->get(route('news.category'));
        $response->assertViewHasAll([
            'category',
            'newsList',
        ]);
    }
    public function test_index_status()
    {
        $response = $this->get(route('index'));
        $response->assertStatus(200);
    }
}
