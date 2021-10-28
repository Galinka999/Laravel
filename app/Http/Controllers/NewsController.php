<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
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
        $news = new News();
//        dd($news->getNews());
        return view('news.index', [
            'newsList' => $news->getNews()
        ]);
    }

    public function show(int $id)
    {
//        $news = $this->getNews()[$id] ?? null;
        $news = new News();
        if(!$news) {
            abort(404);
        }
        return view('news.show', [
            'news' => $news->getNewsById($id),
            'id' => $id
        ]);
    }

    public function category()
    {
        $categories = new Category();
//        $category = $this->getCategoryNews();
//        $news = (new News())->getNews();
        return view('news.category', [
            'categories' => $categories->getCategory(),
//            'newsList' =>  $news
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
