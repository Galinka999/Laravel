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
        $new = $this->getNews()[$id] ?? null;
        if(!$new) {
            abort(404);
        }
        return view('news.show', [
            'new' => $new
        ]);
    }
}
