<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Jobs\NewsJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ParserService;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(ParserService $parserService)
    {
        $links = [
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss',
            'https://news.yandex.ru/music.rss',
        ];

        foreach ($links as $link) {
            dispatch(new NewsJob($link));
//            $parserService->start($link);
        }

        return redirect()->route('admin.news.index');
//        echo "Спасибо, парсинг";

    }
}
