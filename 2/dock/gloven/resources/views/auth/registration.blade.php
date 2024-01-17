@extends('layout')
@section('title', 'Регистрация')
@section('header')
@endsection
@section('left-part')
@endsection
@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <div class="alert-danger__wrapper">
                <div class="alert-danger__close"><i class="fa fa-close"></i></div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <div class="reg">
        <a href="{{route('index')}}" class="reg-back"><i class="fa fa-arrow-left"></i></a>
        <div class="container">
            <form action="{{route('auth.registration_do')}}" method="POST" class="form reg-form" autocomplete="off" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="surname">Фамилия</label>
                    <input type="text" id="surname" name="surname" minlength="2" maxlength="20" class="form-group__input" required value="{{old('surname')}}">
                </div>
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" id="name" name="name" minlength="2" maxlength="20" class="form-group__input" required value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="middle">Отчество (при наличии)</label>
                    <input type="text" id="middle" name="middle" minlength="6" maxlength="20" value="{{old('middle')}}">
                </div>
                <div class="form-group">
                    <label for="birthday">Дата рождения</label>
                    <input type="date" id="birthday" name="birthday" class="form-group__input" required value="{{old('birthday')}}">
                </div>
                <div class="form-drop">
                    <label for="nationality">Гражданство</label>
                    <input type="text" id="nationality" name="nationality" minlength="3" class="form-group__input" required value="{{old('nationality')}}">
                    <ul class="form-drop__list" id="form-drop__list"></ul>
                </div>
                <span class="form-subtitle">Пол</span>
                <div class="form-radio">
                    <div class="form-radio__wrapper">
                        <label for="man">Мужской</label>
                        <input type="radio" id="man" value="Мужской" name="sex" required>
                        <div class="form-radio__button"><span></span></div>
                    </div>
                    <div class="form-radio__wrapper">
                        <label for="woman">Женский</label>
                        <input type="radio" id="woman" value="Женский" name="sex" required>
                        <div class="form-radio__button"><span></span></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Почта</label>
                    <input type="email" id="email" name="email" minlength="10" class="form-group__input" maxlength="40" required value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input type="tel" id="phone" name="phone" minlength="10" class="form-group__input" required value="{{old('phone')}}">
                </div>
                <div class="form-group">
                    <label for="login">Логин</label>
                    <input type="text" id="login" name="login" minlength="5" class="form-group__input" maxlength="30" required value="{{old('login')}}">
                </div>
                <div class="form-group">
                    <label for="password" class="form-group__pas">Пароль</label>
                    <input type="text" id="password" name="password" minlength="8" class="form-group__input" maxlength="32" required value="{{old('password')}}">
                </div>
                <div class="form-group">
                    <label for="passwordrepeat" class="form-group__pas">Повторите пароль</label>
                    <input type="password" minlength="8" maxlength="32" class="form-group__input" id="passwordrepeat" name="passwordrepeat" required value="{{old('passwordrepeat')}}">
                </div>
                <div class="form-file">
                    <label for="photo">Загрузить изображение <i class="fa fa-upload"></i></label>
                    <input type="file" id="photo" name="photo">
                </div>
                <div class="form-checked">
                    <div class="form-checked__btn form-checked__btn_active"></div>
                    <input type="checkbox" id="person" name="person" required checked>
                    <label for="person">Даю согласие на обработку персональных данных</label>
                </div>
                <div class="form-checked">
                    <div class="form-checked__btn form-checked__btn_active"></div>
                    <input type="checkbox" id="mailing" name="mailing" checked>
                    <label for="mailing">Отправлять рассылку на почту</label>
                </div>
                <input type="submit" value="Регистрация" class="reg-submit">
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
    <script>$('#phone').mask('+7(999)999-99-99');</script>
@endsection
@section('right-part')
@endsection
@section('footer')
@endsection


