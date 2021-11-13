@extends('layouts.main')
@section('title') Новость с #ID {{ $news->id }} - @parent @stop
@section('content')
</div>
<h1>Новость с ID # {{ $news->id }}</h1>
<p>Автор: {{ $news->author }}</p>
<p>Описание: {{ $news->description }}</p>
</div>
<div class="table-responsive container"><br><br>
    @include('inc.message')
    <h3>Изменить отзыв:</h3>
    <form method="post" action="{{ route('feedback.update', ['feedback' => $feedback]) }}">
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
            <button type="submit" class="btn btn-success">
                <a href="{{ route('feedback.edit', ['feedback' => $feedback]) }}">Изменить</a>&nbsp;|&nbsp;
                <a href="javasqript:;" style="color:red;">Удалить</a>
            </button>
            <hr>
        @empty
            <h2>Записей нет</h2>
        @endforelse
    </div>
</div>

@endsection

@push('js')
    <script>
        // alert('Hello');
    </script>
@endpush
