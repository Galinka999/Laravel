<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $news = $this->getNews();
        return view('news.category', [
            'category' => $category,
            'newsList' =>  $news
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        return $name;
    }

}
