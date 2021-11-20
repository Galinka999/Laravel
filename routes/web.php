<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Feedback\FeedbacksController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (){
    return view('index');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/account', AccountController::class)->name('account');
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
        Route::get('/', AdminController::class)
            ->name('index');
        Route::get('/parser', ParserController::class)
        ->name('parser');
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/users', AdminUserController::class);
    });
});

Route::get('/news', [NewsController::class, 'index'])
-> name('news.index');

Route::get('/news/{news}', [NewsController::class, 'show'])
    ->where('news', '\d+')
    ->name('news.show');

Route::resource('/news/store', NewsController::class)
    ->name('store', 'news.store');


Route::get('/news/category', [NewsController::class, 'category'])
    ->name('news.category');

Route::resource('/feedback', FeedbacksController::class);

Route::get('collection', function() {
    $names = ['Ann', 'Kate', 'Ben', 'Lucy', 'Kim', 'Bob', 'Sara'];
    $collection = collect($names);
//    dd($collection->map(fn($item) => strtolower($item)));
    dd($collection->count());
});

Route::get('session', function (){
//    \Session::all();
    if(session()->has('somesession')) {
        session()->forget('somesession');
    }
    dd(session()->all());
    session()->put('somesession', 'Some text');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/vk/link', [SocialController::class, 'link'])
        ->name('vk.link');
    Route::get('/vk/callback', [SocialController::class, 'callback'])
        ->name('vk.callback');
    Route::get('/github/link', [SocialController::class, 'linkGithub'])
        ->name('github.link');
    Route::get('/github/callback', [SocialController::class, 'callbackGitHub'])
        ->name('github.callback');
});
