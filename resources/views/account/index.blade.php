@extends('layouts.app')
@section('content')
    <div class="offset-3">
        <h2>Привет, {{ Auth::user()->name }}</h2>
        <br>
        @if(Auth::user()->avatar)
            <img src="{{ Auth::user()->avatar }}" style="width:200px; height:200px"><br>
        @endif
        @if(Auth::user()->is_admin)
            <a href="{{ route('admin.index') }}">Перейти в админку</a><br>
        @endif
        <br>
        <h2>
            <a href="/">Перейти на сайт</a>
        </h2>
    </div>
@endsection
