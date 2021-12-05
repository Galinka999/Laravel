@extends('layouts.admin')
@section('title') Список ресурсов - @parent @stop
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ресурсы для парсинга</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.resources.create') }}" class="btn btn-sm btn-outline-secondary">Добавить</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ссылка</th>
                <th scope="col">Статус</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($resources as $resource)
                <tr>
                    <td>{{ $resource->id }}</td>
                    <td>{{ $resource->link }}</td>
                    <td>{{ $resource->status }}</td>
                    <td>
                        <a href="{{ route('admin.resources.edit', ['resource' => $resource]) }}">Изменить</a> |
                        <a href="javasqript:;" class="delete" rel="{{ $resource->id }}" style="color:red;">Удалить</a>
                    </td>
                </tr>
            @empty
                <td colspan="5">Записей нет</td>
            @endforelse
            </tbody>
        </table>
    </div>
    <div>
        {{ $resources->links() }}
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
                        fetchData("{{ url('/admin/resources') }}/" + this.getAttribute('rel'), {
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
