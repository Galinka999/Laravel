<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
//        $categories = Category::whereIn('id', ['1', '5', '7'])->get();
//        dd($categories);
        $categories = Category::with('news')->paginate(5);
        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCategoryRequest $request)
    {
        //validation here
        $category = Category::create($request->validated());

        if($category) {
            return redirect()
                ->route('admin.categories.index')
                ->with('success', __('messages.admin.categories.store.success'));
        }
        return back()->with('error', __('messages.admin.categories.store.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
//        $category = Category::findOrFail($id);
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditCategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditCategoryRequest $request, Category $category)
    {
        //validation here

        $category = $category->fill($request->validated())->save();
//        $category->description = $request->input('description');

        if($category) {
            return redirect()
                ->route('admin.categories.index')
                ->with('success', __('messages.admin.categories.update.success'));
        }
        /*$category = $category->fill(
            $request->only(['title', 'description'])
        )->save();*/
        return back()->with('error', __('messages.admin.categories.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Category  $category)
    {
        try{
            $category->delete();

            return response()->json(['success' => true]);
        } catch(\Exception $e) {
            \Log::error($e->getMessage() . PHP_EOL, $e->getTrace());

            return response()->json(['success' => false]);
        }
    }
}
