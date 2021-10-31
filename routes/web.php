<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\FeedbacksController;

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

Route::get('/', HomeController::class)
        ->name('index');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', AdminController::class)
        ->name('index');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});


Route::get('/news', [NewsController::class, 'index'])
-> name('news.index');

Route::get('/news/{news}', [NewsController::class, 'show'])
    ->where('news', '\d+')
    ->name('news.show');

Route::resource('/news/store', NewsController::class)
    ->name('store', 'news.store');

Route::get('/auth', [AuthController::class, 'index'])
    ->name('auth');

Route::get('/news/category', [NewsController::class, 'category'])
    ->name('news.category');

Route::get('collection', function() {
    $names = ['Ann', 'Kate', 'Ben', 'Lucy', 'Kim', 'Bob', 'Sara'];
    $collection = collect($names);
//    dd($collection->map(fn($item) => strtolower($item)));
    dd($collection->count());
});

Route::resource('/feedbacks', FeedbacksController::class);

