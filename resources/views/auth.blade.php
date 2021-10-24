@extends('layouts.main')
@section('content')
        <h2>Пожалуйста авторизуйтесь</h2>
        <form action="" method="post">
            @csrf
            <input type="text" placeholder="Введите имя">
            <input type="password" placeholder="Введите пароль">
            <input type="button" value="Войти">
        </form>
@endsection
