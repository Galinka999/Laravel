@extends('layouts.main')
@section('title') Новость с #ID {{ $news->id }} - @parent @stop
@section('content')
</div>
    <br><br>
    <h1>{{ $news->title }}</h1><br><br>
    <h4>Источник: {{ $news->author }}</h4>
    <p>Дата публикации: {{ $news->created_at->format('d-m-Y H:i') }}</p><br><br>
    <h5>{{ $news->description }}</h5><br><br>
</div>
<div class="table-responsive container">
    <a href="{{ route('news.index') }}">
        <button type="submit" class="btn btn-success">Вернуться к списку новостей</button>
    </a><br><br><br><br><br>
    @include('inc.message')
    <h3>Изменить отзыв:</h3>
    <form method="post" action="{{ route('feedbacks.update', ['feedback' => $feedback]) }}">
        @csrf
        @method('put')
        <div class="form-group hidden">
            <input type="hidden" class="form-control" name="news_id" id="news_id" value="{{ $news->id }}"/>
        </div>
        <div class="form-group">
            <label for="name">Ваше имя</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $feedback->name }}"/>
            @error('name') <div style="color:red;">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="message">Сообщение</label>
            <input type="text" class="form-control" name="message" id="message" value="{{ $feedback->message }}"/>
            @error('message') <div style="color:red;">{{ $message }}</div> @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
    <br><br><br>
    <div>
        <h2>Отзывы:</h2>
        @forelse($feedbacks as $feedback)
            <h5>{{ $feedback->name }} </h5>
            <p>{{ $feedback->message }}</p>
            @if(Auth::user() && $feedback->user_id === \Auth::user()->id)
            <button type="submit" class="btn btn-success">
                <a href="{{ route('feedbacks.edit', ['feedback' => $feedback]) }}">Изменить</a>&nbsp;|&nbsp;
                <a href="javasqript:;" style="color:red;">Удалить</a>
            </button>
            @endif
            <hr>
        @empty
            <h2>Записей нет</h2>
        @endforelse
    </div>
</div>

@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const fetchData = async (url, options) => {
                const response = await fetch(`${url}`, options);
                const body = await response.json();
                return body;
            }
            const links = document.querySelectorAll(".delete");
            links.forEach(function (index) {
                index.addEventListener("click", function () {
                    if(confirm("Вы подтверждаете удаление ?")) {
                        fetchData("{{ url('/feedbacks') }}/" + this.getAttribute('rel'), {
                            method: "DELETE",
                            headers: {
                                'Content-Type': 'application/json; charset=utf-8',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        }).then((data) => {
                            alert('Deleted');
                            location.reload();
                        })
                    }
                });
            });
        });
    </script>
@endpush
