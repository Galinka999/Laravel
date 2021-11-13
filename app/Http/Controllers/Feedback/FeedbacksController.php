<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFeedbackRequest;
use App\Http\Requests\EditFeedbackRequest;
use App\Models\Feedback;
use App\Models\News;
use Illuminate\Http\Request;

class FeedbacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Feedback $feedback)
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateFeedbackRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateFeedbackRequest $request)
    {

        $feedback = Feedback::create($request->validated());

        $news_id = $request->only('news_id');
        $news_id = intval($news_id['news_id']);

        if($feedback) {
            return redirect()
                ->route('news.show', ['news' => $news_id])
                ->with('success', 'Отзыв успешно сохранен');
        }
        return redirect()->back()->with('error', 'Отзыв не добавлен');
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
     * @param Feedback $feedback
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
//        dd($feedback->name);
        $news = News::where('id', $feedback->news_id)->get();
        $feedbacks = Feedback::where('news_id', $news[0]['id'])->get();
//        dd($news[0]['id']);
        return view('feedback.edit', [
            'news' => $news[0],
            'feedbacks' => $feedbacks,
            'feedback' => $feedback
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditFeedbackRequest $request
     * @param Feedback $feedback
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditFeedbackRequest $request, Feedback $feedback)
    {
        $news = News::where('id', $feedback->news_id)->get();
        $feedback = $feedback->fill($request->validated())->save();

        if($feedback) {
            return redirect()
                ->route('news.show', ['news' => $news[0]])
                ->with('success', __('messages.feedback.update.success'));
        }
        return back()->with('error', __('messages.feedback.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Feedback $feedback
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Feedback $feedback)
    {
        try {
            $feedback->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage() . PHP_EOL, $e->getTrace());
            return response()->json(['success' => false]);
        }
    }
}
