@extends('layouts.main')
@section('title') Новость с #ID {{ $news->id }} - @parent @stop
@section('content')
</div>
    <h1>Новость с #ID {{ $news->id }}</h1>
    <p>Автор: {{ $news->author }}</p>
<p>Описание: {{ $news->description }}</p>
</div>
<div class="table-responsive container"><br><br>
{{--    @include('inc.message')--}}
    <h3>Оставьте отзыв:</h3>
    <form method="post" action="{{ route('feedback.store') }}">
        @csrf
        <div class="form-group hidden">
            <input type="hidden" class="form-control" name="news_id" id="news_id" value="{{ $news->id }}"/>
        </div>
        <div class="form-group">
            <label for="name">Ваше имя</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"/>
            @error('name') <div style="color:red;">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="message">Сообщение</label>
            <input type="text" class="form-control" name="message" id="message" value="{{ old('message') }}"/>
            @error('message') <div style="color:red;">{{ $message }}</div> @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
    <br><br><br>
    <div>
        <h2>Отзывы:</h2>
        @forelse($feedbacks as $feedback)
                <h5>{{ $feedback->name }} </h5>
                <p>{{ $feedback->message }}</p>
            <button type="submit" class="btn btn-success">
                <a href="{{ route('feedback.edit', ['feedback' => $feedback]) }}">Изменить</a>&nbsp;|&nbsp;
                <a href="javasqript:;" class="delete" rel="{{ $feedback->id }}" style="color:red;">Удалить</a>
            </button>
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
                        fetchData("{{ url('/feedback') }}/" + this.getAttribute('rel'), {
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
