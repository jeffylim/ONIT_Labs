@extends('layout')
@section('title', 'Регистрация')
@section('header')
@endsection
@section('left-part')
@endsection
@section('content')
    <div class="reg-done">
        @if($message=='bid_add_done')
            <h1>Благодарим вас за отправленную заявку. Мы обработаем ее и свяжемся с вами по почте: {{$bid->userMail}}</h1>
        @endif
        <a href="{{route('index')}}">На главную</a>
    </div>
@endsection
@section('right-part')
@endsection
@section('footer')
@endsection
