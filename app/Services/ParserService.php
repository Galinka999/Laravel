<?php declare(strict_types=1);

namespace App\Services;

use App\Contracts\Parser;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Orchestra\Parser\XML\Facade as XmlParser;

class ParserService implements Parser
{
    protected string $url;

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function start($link)
    {
        $xml = XmlParser::load($link);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'news' => [
                'uses' => 'channel.item[title,description,pubDate]'
            ]
        ]);

        $e = explode("/", $link);
        $fileName = end($e);
        $name_pars = pathinfo($fileName, PATHINFO_FILENAME );
//        \Storage::append( 'news/' . $fileName, json_encode($data));
        $category = Category::where('name_pars', $name_pars)->first();
        $title = explode(": ", $data['title']);
        $titleName = end($title);
        if(!$category) {
            $category = Category::create([
                'title' => $titleName,
                'description' => $data['description'],
                'name_pars' => $name_pars
            ]);
        }

        foreach ($data['news'] as $news) {
            $news_db = News::where('title', $news['title'])->first();
            if(!$news_db) {
                $news = News::create([
                    'category_id' => $category->id,
                    'title' => $news['title'],
                    'author' => $title[0],
                    'description' => $news['description'],
                    'created_at' => $news['pubDate']
                ]);
            }
        }
    }
}
