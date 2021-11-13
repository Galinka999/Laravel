@extends('layouts.admin')
@section('title') Список категорий - @parent @stop
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Категории</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-secondary">Добавить</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Категория</th>
                <th scope="col">Дата последнего обновления</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
{{--                    @dd($category->news()->get()->map(fn($item) => $item->title));--}}
{{--                    @dd($category->news()->get()->first()));--}}
                    <td>{{ $category->title }} ({{ $category->news->count() }})</td>
                    <td>@if($category->updated_at)
                            {{ $category->updated_at->format('d-m-Y H:i') }}
                        @else -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.categories.edit', ['category' => $category]) }}">Изменить</a>&nbsp;|&nbsp;
                        <a href="javasqript:;" style="color:red;" class="delete" rel="{{ $category->id }}">Удалить</a>
                    </td>
                </tr>
            @empty
                <td colspan="5">Записей нет</td>
            @endforelse
            </tbody>
        </table>
    </div>
    <div>
        {{ $categories->links() }}
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
                        fetchData("{{ url('/admin/categories') }}/" + this.getAttribute('rel'), {
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

