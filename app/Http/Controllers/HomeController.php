<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $news = new News();
        return view('index', [
            'newsList' => $news->getNews()
        ]);
    }
}
