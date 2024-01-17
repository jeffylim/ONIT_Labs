@extends('layout')
@section('title')
    @if($message=='registration_done')
    Регистрация завершена
    @elseif($message=='auth_error')
    Неверный логин и/или пароль
    @elseif($message=='access_denied')
    Недостаточно прав
    @endif
@endsection
@section('header')
@endsection
@section('left-part')
@endsection
@section('content')
    <div class="reg-done">
        @if($message=='registration_done')
            <h1>Уважаемый {!! Request::get('surname') !!} {!! Request::get('name') !!}, благодарим за регистрацию!<br>Проверьте вашу электронную почту</h1>
        @elseif($message=='auth_error')
            <h1>Неверный логин и/или пароль!</h1>
        @elseif($message=='access_denied')
            <h1>У вас отсутствуют необходимы права доступа к данному разделу!</h1>
    @endif
        <a href="{{route('index')}}">На главную</a>
    </div>
@endsection
@section('right-part')
@endsection
@section('footer')
@endsection
