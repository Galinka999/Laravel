@extends('layouts.admin')
@section('title') Список новостей - @parent @stop
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Новости</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-outline-secondary">Добавить</a>
            </div>
            <div class="btn-group me-2">
                <a href="{{ route('admin.parser') }}" class="btn btn-sm btn-outline-secondary">Парсить</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Заголовок</th>
                <th scope="col">Автор</th>
                <th scope="col">Дата обновления</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $news)
            <tr>
                <td>{{ $news->id }}</td>
                <td>{{ $news->title }}</td>
                <td>{{ $news->author }}</td>
{{--                <td>{{ $news->description }}</td>--}}
                <td>@if($news->updated_at)
                        {{ $news->updated_at->format('d-m-Y H:i') }}
                    @else -
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.news.edit', ['news' => $news]) }}">Изменить</a>&nbsp;|&nbsp;
                    <a href="javasqript:;" class="delete" rel="{{ $news->id }}" style="color:red;">Удалить</a>
                </td>
            </tr>
            @empty
                <td colspan="5">Записей нет</td>
            @endforelse

            </tbody>
        </table>
    </div>
    <div>
        {{ $newsList->links() }}
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
                        fetchData("{{ url('/admin/news') }}/" + this.getAttribute('rel'), {
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
