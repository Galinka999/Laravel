@extends('layouts.admin')
@section('title') Изменить статус - @parent @stop
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Изменить статус пользователя</h1>
    </div>
    <div class="table-responsive">
        @include('inc.message')
        <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Имя</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}"/>
            </div>
            <div class="form-group">
                <label for="description">Статус</label>
                <select class="form-control" name="is_admin" id="is_admin">
                    <option value="{{ $user->is_admin }}" selected>{{ $user->is_admin }}</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
                @error('is_admin') <div style="color:red;">{{ $message }}</div>@enderror
            </div><br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
