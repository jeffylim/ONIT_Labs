<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @section('title')
        @show
    </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;600&family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
@section('header')
    <header class="header">
        <div class="container">
            <div class="header-wrapper">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <a href="{{route('index')}}" class="header-logo">
                            <img src="../../img/logo.svg" alt="logo">
                        </a>
                    </div>
                    <div class="col-md-3">
                        <div class="header-title">Гелиос</div>
                    </div>
                    <div class="col-md-5">
                        @auth
                            <div class="header-user">
                                <div class="header-user__wrapper">
                                    <h2 class="header-user__name">{{auth()->guard()->user()->surname}} {{auth()->guard()->user()->name}} <span><i class="fa fa-arrow-down"></i></span></h2>
                                    <div class="header-user__drop">
                                        <a href="{{route('auth.profile')}}">Профиль</a>
                                        @havePermission('manager')
                                        <a href="{{route('bid.bid')}}">Заявки</a>
                                        @endif
                                        <a href="{{route('auth.logout')}}">Выход</a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="header-form">
                                <form method="GET" action="{{route('auth.login')}}">
                                    <div class="header-form__group">
                                        <label for="login">Логин: </label>
                                        <input type="text" minlength="5" id="login" name="login" required placeholder="email or phone">
                                    </div>
                                    <div class="header-form__group">
                                        <label for="password">Пароль: </label>
                                        <input type="password" minlength="8" id="password" name="password" required>
                                    </div>
                                    <div class="header-form__buttons">
                                        <input type="submit" value="Войти" class="btn header-form__sign">
                                        <a href="{{route('auth.registration')}}" class="btn header-form__btn">Регистрация</a>
                                    </div>
                                </form>
                            </div>
                        @endauth
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.container -->
    </header>
    <!-- /.header -->
@show
    <section class="section">
        <div class="container">
            <div class="section-wrapper">
                @section('content')
                @show
            </div>
        </div>
    </section>
<script src="https://use.fontawesome.com/329c6c77c2.js"></script> <!--Иконки-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../../js/jquery.validate.min.js"></script>
<script src="../../js/main.js"></script>
</body>
</html>
