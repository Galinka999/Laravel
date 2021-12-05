<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Jobs\NewsJob;
use App\Models\Resource;
use App\Http\Controllers\Controller;
use App\Services\ParserService;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param ParserService $parserService
     * @param Resource $resource
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(ParserService $parserService, Resource $resource)
    {
        $resources = Resource::where('status', '=', 'ACTIV')->get();
        foreach ($resources as $resource) {
            dispatch(new NewsJob($resource->link));
        }
        return redirect()->route('admin.news.index');
    }
}
