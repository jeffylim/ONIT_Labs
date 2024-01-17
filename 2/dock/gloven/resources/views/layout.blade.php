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
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
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
    @section('header')
    <header class="header">
        <div class="container">
            <div class="header-wrapper">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <a href="{{route('index')}}" class="header-logo">
                            <img src="img/logo.svg" alt="logo">
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
    @section('left-part')
    <section class="section">
        <div class="container">
            <div class="section-wrapper">
                <div class="row">
                    <div class="col-md-2">
                        <div class="left">
                            <ul class="left-menu">
                                <li class="left-menu__item"><a href="{{route('static_page', 'regions')}}" id="regions">Регионы</a></li>
                                <li class="left-menu__item"><a href="{{route('static_page', 'clients')}}" id="clients">Клиентам</a></li>
                                <li class="left-menu__item"><a href="{{route('static_page', 'partners')}}" id="partners">Партнерам</a></li>
                                <li class="left-menu__item"><a href="{{route('static_page', 'contacts')}}" id="contacts">Контакты</a></li>
                                <li class="left-menu__item"><a href="{{route('catalog.catalog')}}" id="catalog">Каталог</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="main">
                            @show
                            @section('content')
                            @show
                            @section('right-part')
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="right">
                            <div class="right-banners">
                                <a href="https://youtube.com" class="right-banners__item">
                                    <img src="../../img/youtube.jpg" alt="youtube">
                                </a>
                                <a href="https://web.telegram.org" class="right-banners__item">
                                    <img src="../../img/telega.jpg" alt="telegram">
                                </a>
                                <a href="https://skgelios.ru/" class="right-banners__item">
                                    <img src="../../img/str.jpg" alt="asd">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @show
    @section('footer')
    <footer class="footer">
        <div class="container">
            <div class="footer-container">
                <div class="row">
                    <div class="col-md-4">
                        <p class="footer-copy">
                            <i class="fa fa-copyright"></i> Все права защищены
                        </p>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-wrapper">
                            <p class="footer-title">Подписывайтесь на нас в соцсетях</p>
                            <div class="footer-link">
                                <a href="https://web.telegram.org" class="footer-link__item tg"><i class="fa fa-telegram"></i></a>
                                <a href="https://youtube.com" class="footer-link__item utube"><i class="fa fa-youtube-play"></i></a>
                                <a href="https://instagram.com" class="footer-link__item inst"><i class="fa fa-instagram"></i></a>
                                <a href="https://facebook.com" class="footer-link__item fb"><i class="fa fa-facebook"></i></a>
                                <a href="https://vk.com" class="footer-link__item vk"><i class="fa fa-vk"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-feedback">
                            <h2 class="footer-feedback__title">Какие-то вопросы?</h2>
                            <span class="btn footer-feedback__btn">Напишите нам</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="modal">
        <div class="modal-container">
            <form class="modal-form" method="POST" action="{{route('bid.bid_add')}}" enctype="multipart/form-data">
                <span class="modal-form__close"><i class="fa fa-times-circle-o"></i></span>
                <h2 class="modal-form__title">Напиши нам</h2>
                <div class="modal-form__group">
                    <label for="mail">Почта</label>
                    <input type="email" name="userMail" id="mail" required>
                </div>
                <div class="modal-form__group">
                    <label for="title">Заголовок сообщения</label>
                    <input type="text" name="userTitle" id="title" required>
                </div>
                <div class="modal-form__group">
                    <label for="problem">Категория сообщения</label>
                    <select id="problem" name="userCategory" required>
                        <option value="Проблема с входом/регистрацией">Проблема с входом/регистрацией</option>
                        <option value="Проблема с сайтом">Проблема с сайтом</option>
                        <option value="Пожелания">Пожелания</option>
                        <option value="Благодарность">Благодарность</option>
                        <option value="Другое">Другое</option>
                    </select>
                </div>
                <div class="modal-form__group">
                    <label for="bigtext">Ваше сообщение</label>
                    <textarea id="bigtext" name="userText"></textarea>
                </div>
                <div class="modal-form__file">
                    <label for="userFile">Файл</label>
                    <input type="file" name="userFile" id="userFile">
                </div>
                <div class="modal-form__check">
                    <div class="modal-form__checkBtn"></div>
                    <input type="checkbox" id="person" name="userPerson" class="modal-form__checkInput" required>
                    <label for="person" class="modal-form__checkLabel">Даю согласие на обработку персональных данных</label>
                </div>
                <input type="submit" value="Отправить" class="modal-form__submit">
            </form>
        </div>
    </div>
    @show
<script src="https://use.fontawesome.com/329c6c77c2.js"></script> <!--Иконки-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../../js/jquery.validate.min.js"></script>
<script src="../../js/main.js"></script>
</body>
</html>
