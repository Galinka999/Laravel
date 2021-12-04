@extends('layouts.admin')
@section('title') Изменить категорию - @parent @stop
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Изменить категорию</h1>
    </div>
    <div class="table-responsive">
        @include('inc.message')
        <form method="post" action="{{ route('admin.categories.update', ['category' => $category]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Наименование</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $category->title }}"/>
                @error('title') <div style="color:red;">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description">{!! $category->description !!}</textarea>
                @error('description') <div style="color:red;">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="name_pars">Наименование категории при парсинге</label>
                <input type="text" class="form-control" name="name_pars" id="name_pars" value="{{ $category->name_pars }}"/>
                @error('name_pars') <div style="color:red;">{{ $message }}</div>@enderror
            </div><br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
