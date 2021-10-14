<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        //dd($this->getNews());
        return view('news.index', [
            'newsList' => $this->getNews()
        ]);
    }

    public function show(int $id)
    {
        $news = $this->getNews()[$id] ?? null;
        if(!$news) {
            abort(404);
        }
        return view('news.show', [
            'news' => $news,
            'id' => $id
        ]);
    }

    public function category()
    {
        $category = $this->getCategoryNews();
        return view('/news/categorynews', [
            'category' => $this->getCategoryNews(),
        ]);
    }

}
