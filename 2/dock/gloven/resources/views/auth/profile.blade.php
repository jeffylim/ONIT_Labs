@extends('layout')
@section('title', 'Личный кабинет')
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
    <div class="pa">
        <div class="container">
            <form action="{{route('auth.profile_update')}}" method="POST" class="pa-form" enctype="multipart/form-data">
                <div class="pa-form__wrapper">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="pa-photo">
                                <img src="{{auth()->guard()->user()->photo}}" alt="photo">
                                <input type="file" id="changePhoto" name="photo">
                                <label for="changePhoto"><i class="fa fa-camera"></i></label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="pa-main">
                                <h1 class="pa-main__title">Основная информация</h1>
                                <div class="pa-main-wrapper">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="pa-main__group">
                                                <label for="surname">Фамилия</label>
                                                <input type="text" id="surname" value="{{auth()->guard()->user()->surname}}" class="cantUpdate">
                                            </div>
                                            <div class="pa-main__group">
                                                <label for="name">Имя</label>
                                                <input type="text" id="name" value="{{auth()->guard()->user()->name}}" class="cantUpdate">
                                            </div>
                                            <div class="pa-main__group">
                                                <label for="thirdname">Отчество</label>
                                                <input type="text" id="thirdname" value="{{auth()->guard()->user()->middle}}" class="cantUpdate">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="pa-main__group">
                                                <label for="birthday">День рождения</label>
                                                <input type="date" id="birthday" value="{{auth()->guard()->user()->birthday}}" class="cantUpdate">
                                            </div>
                                            <div class="pa-main__group">
                                                <label for="sex">Пол</label>
                                                <input type="text" id="sex" value="{{auth()->guard()->user()->sex}}" class="cantUpdate">
                                            </div>
                                            <div class="pa-main__group">
                                                <label for="nationality">Гражданство</label>
                                                <input type="text" id="nationality" value="{{auth()->guard()->user()->nationality}}" class="cantUpdate">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pa-secondary">
                    <div class="pa-secondary__tabs">
                        <span class="pa-secondary__tab" id="pa-secondary__tab_active">Дополнительная информация</span>
                        <span class="pa-secondary__tab">Безопасноть</span>
                    </div>
                    <div class="pa-secondary__item" style="display: block;">
                        <div class="pa-secondary__group">
                            <label for="lkmail">Почта</label>
                            <input type="email" value="{{auth()->guard()->user()->email}}"  id="lkmail" class="canUpdate" name="email" required>
                        </div>
                        <div class="pa-secondary__group">
                            <label for="phone">Телефон</label>
                            <input type="tel" minlength="16" value="{{auth()->guard()->user()->phone}}" id="phone" class="canUpdate" name="phone" required>
                        </div>
                        <div class="pa-secondary__group">
                            <label for="lklogin">Логин</label>
                            <input type="text" minlength="5" maxlength="32" value="{{auth()->guard()->user()->login}}" id="lklogin" class="canUpdate" name="login" required>
                        </div>
                        <div class="pa-secondary__group">
                            <label for="about">Обо мне</label>
                            <textarea id="about" class="canUpdate" name="about">{{auth()->guard()->user()->about}}</textarea>
                        </div>
                        <span class="pa-secondary__change">Изменить</span>
                    </div>
                    <div class="pa-secondary__item">
                        <div class="pa-secondary__group">
                            <label for="pas">Ваш пароль</label>
                            <input type="text" id="pas" value="{{auth()->guard()->user()->password}}" class="cantUpdate">
                        </div>
                        <div class="pa-secondary__group">
                            <label for="newpas" class="form-group__pas">Новый пароль</label>
                            <input type="text" id="newpas" minlength="8" maxlength="32" class="changePas canUpdate" name="password">
                        </div>
                        <div class="pa-secondary__group">
                            <label for="newpasrep" class="form-group__pas">Повторите новый пароль</label>
                            <input type="paassword" id="newpasrep" minlength="8" maxlength="32" class="changePas canUpdate" name="passwordrepeat">
                        </div>
                    </div>
                </div>
                <input type="submit" value="Сохранить" class="pa-form__submit">
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
    <script>$('#phone').mask('+7(999)999-99-99');</script>
@endsection
@section('right-part')
@endsection
