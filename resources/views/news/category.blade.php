@extends('layouts.main')

@section('content')
    @forelse($categories as $category)
        <div class="col">
            <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="150" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: {{ $category->title }}" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em" font-size="30px">{{ $category->title }}</text></svg>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('news.category.show', ['category' => $category]) }}">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Смотреть подробнее</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <td colspan="5">Записей нет</td>
    @endforelse
@endsection

@section('links')
    <div>
        {{ $categories->links() }}
    </div>
@endsection

