@extends('layouts.main')
@section('title') Новость с #ID {{ $news->id }} - @parent @stop
@section('content')
</div>
    <h1>Новость с #ID {{ $news->id }}</h1>
    <p>Автор: {{ $news->author }}</p>
<p>Описание: {{ $news->description }}</p>
</div>
@endsection

{{--@push('js')--}}
{{--    <script>--}}
{{--        alert('Hello');--}}
{{--    </script>--}}
{{--@endpush--}}
