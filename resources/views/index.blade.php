@extends('layouts.main')
@section('maincontent')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Euronews</h1>
                <p class="lead text-muted">Европейский ежедневный круглосуточный информационный телеканал, совмещающий видеохронику мировых событий и аудиокомментарий на тринадцати языках. Основан 1 января 1993 года. Кабельное, спутниковое и эфирное вещание Euronews в 2009 году охватывало более 294 миллионов домовладений в 150 странах мира.</p>
                <p>
                    <a href="{{ route('category') }}" class="btn btn-primary my-2">Категории новостей</a>
                    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary my-2">Кабинет администратора</a>
                </p>
            </div>
        </div>
    </section>
@endsection
@section('content')
    @forelse($newsList as $news)
        <div class="col">
            <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

                <div class="card-body">
                    <p class="card-text"><strong>{{ $news['title'] }}</strong></p>
                    <p class="card-text">{!! $news['description'] !!}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('news.show', ['id' => intval($news['id'])]) }}">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Смотреть подробнее</button>
                            </a>
                        </div>
                        <small class="text-muted">Автор: {{ $news['author'] }} <br>
                            {{ now()->format('d-m-Y H:1') }}</small>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <h2>Записей нет</h2>
    @endforelse
@endsection



