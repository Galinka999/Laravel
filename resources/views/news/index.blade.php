@extends('layouts.main')
@section('title') Список новостей - @parent @stop

@section('content')
    @forelse($newsList as $news)
            <div class="col">
                <div class="card shadow-sm">
{{--                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>--}}
                    <div class="card-body" style="height: 170px;">
                        <p class="card-text"><strong>{{ $news->title }}</strong></p>
{{--                        <p class="card-text">{!! $news->description !!}</p>--}}
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('news.show', ['news' => $news->id]) }}">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Смотреть подробнее</button>
                                </a>
                            </div>
                            <small class="text-muted">{{ $news->author }} <br>
                                {{ $news->created_at->format('d-m-Y H:i') }}</small>
                        </div>
                    </div>
                </div>
            </div>
    @empty
        <h2>Записей нет</h2>
    @endforelse
@endsection

@section('links')
    <br><br>
    <a href="{{ route('news.category') }}">
        <button type="submit" class="btn btn-success">Вернуться к списку категорий</button>
    </a><br><br><br>
    <div>
        {{ $newsList->links() }}
    </div>
@endsection

