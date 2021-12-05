<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feedback;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('news.index', [
            'newsList' => News::orderBy('id', 'desc')->paginate(9)
        ]);
    }

    public function show(News $news)
    {
        $news_id = $news->id;
        $feedbacks = Feedback::where('news_id', '=', $news_id)->orderBy('id', 'desc')->get();
        return view('news.show', [
            'news' => $news,
            'feedbacks' => $feedbacks
        ]);
    }

    public function category()
    {
        $categories = Category::paginate(6);
        return view('news.category', [
            'categories' => $categories,
        ]);
    }

    public function categoryShow(Category $category)
    {
        $newsList = News::where('category_id', $category->id)->orderBy('id', 'desc')->paginate(9);
        return view('news.index', [
            'newsList' => $newsList,
        ]);
    }

}
