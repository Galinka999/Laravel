@extends('layouts.admin')
@section('title') Добавить ресурс - @parent @stop
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить ресурс</h1>
    </div>
    <div class="table-responsive">
        @include('inc.message')
        <form method="post" action="{{ route('admin.resources.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Ссылка на ресурс</label>
                <input type="text" class="form-control" name="link" id="link" value="{{ old('link') }}"/>
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if(old('status') === 'ACTIV') selected @endif>ACTIV</option>
                    <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
                </select>
            </div><br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
