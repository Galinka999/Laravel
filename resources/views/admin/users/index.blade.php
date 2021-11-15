@extends('layouts.admin')
@section('title') Список пользователей - @parent @stop
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Зарегистрированные пользователи</h1>
    </div>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">E-mail</th>
                <th scope="col">Статус</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin }}</td>
                    @if(Auth::user()->is_admin === 2)
                        <td>
                            <a href="{{ route('admin.users.edit', ['user' => $user]) }}">Изменить статус</a>
                        </td>
                    @endif
                </tr>
            @empty
                <td colspan="5">Записей нет</td>
            @endforelse
            </tbody>
        </table>
    </div>
    <div>
        {{ $users->links() }}
    </div>
@endsection
