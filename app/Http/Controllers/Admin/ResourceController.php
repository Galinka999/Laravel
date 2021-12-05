<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateResourceRequest;
use App\Http\Requests\EditResourceRequest;
use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Resource::paginate(10);
        return view('admin.resources.index', [
            'resources' => $resources
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.resources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateResourceRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateResourceRequest $request)
    {
        $resources = Resource::create($request->validated());
        if($resources) {
            return redirect()
                ->route('admin.resources.index')
                ->with('success', __('messages.admin.resources.store.success'));
        }
        return back()->with('error', __('messages.admin.resources.store.fail'));
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
     * @param Resource $resource
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        return view('admin.resources.edit', [
            'resource' => $resource
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditResourceRequest $request, Resource $resource)
    {
        $resource = $resource->fill($request->validated())->save();
        if($resource) {
            return redirect()
                ->route('admin.resources.index')
                ->with('success'. __('messages.admin.resources.success'));
        }
        return back()->with('error', __('messages.admin.resources.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Resource $resource
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Resource $resource)
    {
        try {
            $resource->delete();
            return response()->json(['success' => true]);
        } catch(\Exception $e) {
            \Log::error($e->getMessage() . PHP_EOL, $e->getTrace());
            return response()->json(['success' => false]);
        }

    }
}
