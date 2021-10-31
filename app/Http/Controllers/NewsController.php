<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feedback;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
//        $news = new News();
//        dd($news->getNews());
        return view('news.index', [
            'newsList' => News::paginate(6)
        ]);
    }

    public function show(News $news)
    {
        $news_id = $news->id;
//        dd($news_id);
        $feedbacks = Feedback::where('news_id', '=', $news_id)->get();
//                dd($feedbacks);
        return view('news.show', [
            'news' => $news,
            'feedbacks' => $feedbacks
        ]);
    }

    public function category()
    {
        $categories = Category::paginate(6);
//        $category = $this->getCategoryNews();
//        $news = (new News())->getNews();
        return view('news.category', [
            'categories' => $categories,
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
