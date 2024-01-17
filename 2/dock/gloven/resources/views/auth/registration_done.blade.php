@extends('layout')
@section('title', 'Регистрация завершена')
@section('header')
@endsection
@section('left-part')
@endsection
@section('content')
    <div class="reg-done">
        <h1>Уважаемый {{Request::get('surname')}} {{Request::get('name')}}, благодарим за регистрацию!<br>Мы показали - как мы можем отправлять письма нашим пользователям</h1>
        <a href="{{route('index')}}">Вернуться на главную страницу</a>
    </div>
@endsection
@section('right-part')
@endsection
@section('footer')
@endsection
