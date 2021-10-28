<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected  $table = "news";

    public function getNews()
    {
        /*dd(
            \DB::table($this->table)
                ->join('categories', 'news.category_id', '=', 'categories.id')
                ->select("news.*", "categories.title as categoryTitle")
                ->where('news.title', 'like', '%' . request()->get('s') . '%')
                ->where('id', '>', 5)
                ->orwhere('id', '<', 2)
                ->get()
        );*/
        return \DB::table($this->table)
            ->select(['id', 'title', 'author', 'description'])
            ->get();
    }

    public function getNewsById(int $id)
    {
        return \DB::table($this->table)->find($id);
    }

}
