<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
//        dd(response()->json(['name' => 1, 'age' => 2]));
//        return response()->json(['name' => 1, 'age' => 2]);
        return view('admin.index');
    }
}
