@extends('layouts.admin')
@section('title') Добавить категорию - @parent @stop
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить категорию</h1>
    </div>
    <div class="table-responsive">
        @include('inc.message')
        <form method="post" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Наименование</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}"/>
                @error('title') <div style="color:red;">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
                @error('description') <div style="color:red;">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="name_pars">Наименование категории при парсинге</label>
                <input type="text" class="form-control" name="name_pars" id="name_pars" value="{{ old('name_pars') }}"/>
                @error('name_pars') <div style="color:red;">{{ $message }}</div>@enderror
            </div><br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection


