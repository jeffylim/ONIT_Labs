// Jquery
$(document).ready(function () {

    var div = $('div'), sections = $('header, section, footer'), modal = $('.modal'), modalContainer = $('.modal-container');

    // код для кнопки вниз на главном экране

    if(div.hasClass('scene')){
        $('.scene-btn').click(function(e){
            var elem = $(this).attr('href'), dest = $('#content').offset().top;
            $('html').animate({scrollTop: dest}, 1100);
        });
    }

    // открывает диалоговое окно браузера с текстом "Функция входа не реализована".

    $('.header-form__sign').click(function(){
        alert("Функция входа не реализована");
    });

    // подсвечивает элементы правого сайдбара в зависимости от страницы, на которой сейчас пользователь
    $('.left-menu [href]').each(function(){
        if(this.href == window.location.href){
            $(this).addClass('left-menu__item_active');
        }
    });

    // чекбокс в модальном окне

    $('.modal-form__checkLabel').click(function(){
        if($('.modal-form__checkInput').is(':checked')){
            $('.modal-form__checkBtn').removeClass('modal-form__checkBtn_active');
        }
        else{
            $('.modal-form__checkBtn').addClass('modal-form__checkBtn_active');
        }
    });
    $('.modal-form__checkBtn').click(function(){
        if($('.modal-form__checkInput').is(':checked')){
            $(this).removeClass('modal-form__checkBtn_active');
            $('.modal-form__checkInput').removeAttr('checked');
        }
        else{
            $(this).addClass('modal-form__checkBtn_active');
            $('.modal-form__checkInput').prop('checked', true);
        }
    });

    // код для модального окна


    $('.footer-feedback__btn').click(function(){
        modal.slideDown(200);
        modal.css({'display':'flex'});
        sections.css({
            'transition':'0.3s',
            'filter':'blur(6px)'
        });
        $('body').css({'overflow-y':'hidden'});
    });

    $('.modal-form__close').click(function(){
        modal.slideUp(200);
        sections.css({'filter':'none'});
        $('body').css({'overflow-y':'scroll'});
    });

    $(document).keydown(function(e){
        if(e.keyCode == 27){
            modal.slideUp(200);
            sections.css({'filter':'none'});
            $('body').css({'overflow-y':'scroll'});
        }
    });

    modal.mouseup(function(e){
        if(e.target == this && e.target != modalContainer){
            modal.slideUp(200);
            sections.css({'filter':'none'});
            $('body').css({'overflow-y':'scroll'});
        }
    });

    // валидация модальной формы обратной связи

    if(div.hasClass("modal")){
        $('.modal-form').validate({
            rules:{
                userPerson: 'required',
                userTitle: 'required',
                userMail: 'required',
                userTitle:{
                    required: true,
                    minlength: 6
                },
                userMail:{
                    required: true,
                    email: true
                },
                userText:{
                    minlength: 10,
                    maxlength: 200
                },
                userPerson:{
                    required: true
                }
            },
            messages:{
                userMail:{
                    required: "Пожалуйста заполните поле почты",
                    email: "Неверный формат. (Формат: example@mail.ru)"
                },
                userTitle:{
                    required: "Пожалуйста заполните это поле",
                    minlength: "Поле должно содержать не менее 6 символов"
                },
                userText:{
                    minlength: "Обращение не короче 10 символов",
                    maxlength: "Максимальное число символов - 200"
                },
                userPerson:{
                    required: "Галочка обязательна"
                }
            }
        });
    }

    // код для страницы clients.html
    if(div.hasClass('clients')){
        var tabs = $('.clients-tabs__item'), items = $('.clients-item');
        tabs.each(function(i){
            $(this).click(function(){
                tabSwitch(tabs, items, i);
            });
        });
    }
    // код для страницы partners.html
    if(div.hasClass('partners')){
        var tabs = $('.partners-tabs__item'), items = $('.partners-item');
        tabs.each(function(i){
            $(this).click(function(){
                tabSwitch(tabs, items, i);
            });
        });
    }

    // код для личного кабинета

    if(div.hasClass('pa')){
        var tabs = $('.pa-secondary__tab'), items = $('.pa-secondary__item'), cantUpdate = $('.cantUpdate'), canUpdate = $('.canUpdate');
        tabs.each(function(i){
            $(this).click(function(){
                tabSwitch(tabs, items, i);
            });
        });
        cantUpdate.each(function(){
            $(this).prop('disabled', true);
        });
        canUpdate.each(function(){
            $(this).prop('disabled', true);
        });
        $('.pa-secondary__change').click(function(){
            canUpdate.each(function(){
                $(this).prop('disabled', false);
            });
        });
    }

    // код для страницы регистрации
    if(div.hasClass('reg')){
        var passwordFlag = false;
        // код для радио-кнопок
        // эта часть для нажатия на сам label
        var radio = $('input[type=radio]'), radioBtn = $('.form-radio__button');
        radio.each(function(i){
            $(radio[i]).on('input', function(){
                radioBtn.each(function(){
                    $(this).removeClass('form-radio__button_active');
                });
                if($(this).attr('checked', 'checked')){
                    $(radioBtn[i]).addClass('form-radio__button_active');
                }
            });
        });
        // а эта на класс радиокнопки
        radioBtn.each(function(i){
            $(this).click(function(){
                radio.each(function(i){
                    $(this).removeAttr('checked');
                    $(radioBtn[i]).removeClass('form-radio__button_active');
                });
                $(radio[i]).prop('checked', true);
                $(this).addClass('form-radio__button_active');
            });
        });
        // код для чекбоксов
        // эта часть для нажатия на сам label
        var check = $('input[type=checkbox]'), checkBtn = $('.form-checked__btn');
        check.each(function(i){
            $(this).on('input', function(){
                if($(this).is(':checked')){
                    $(checkBtn[i]).addClass('form-checked__btn_active');
                }
                else{
                    $(checkBtn[i]).removeClass('form-checked__btn_active');
                }
            });
        });
        checkBtn.each(function(i){
            $(this).click(function(){
                if($(check[i]).is(':checked')){
                    $(check[i]).removeAttr('checked');
                    $(this).removeClass('form-checked__btn_active');
                }
                else{
                    $(check[i]).prop('checked', true);
                    $(this).addClass('form-checked__btn_active');
                }
            });
        });
        // код для проверки паролей
        $('#passwordrepeat').on('input', function(){
            if($(this).val()!=$('#password').val() && $('#password').val()!=0 && $(this).val()!=0){
                $('.form-group__pas').addClass('form-group__pas_wrong');
                passwordFlag = false;
            }
            else{
                $('.form-group__pas').removeClass('form-group__pas_wrong');
                passwordFlag = true;
            }
        });
        $('#password').on('input', function(){
            if($(this).val()!=$('#passwordrepeat').val() && $('#passwordrepeat').val()!=0 && $(this).val()!=0){
                $('.form-group__pas').addClass('form-group__pas_wrong');
                passwordFlag = false;
            }
            else{
                $('.form-group__pas').removeClass('form-group__pas_wrong');
                passwordFlag = true;
            }
        });
        // код для подсчёта "правильных" полей
        var inputs = $('.form-group__input'), count = 0;
        $('input').on('input', function(){
            count = 0;
            inputs.each(function(i){
                if($(this).is(':valid')){
                    count++;
                }
            });
        });
        // вывод всё ок, если все условия соблюдены
        $('.reg-submit').click(function(){
            if(count==9 && passwordFlag && $('#person').is(':checked') && ($('#man').is(':checked')||$('#woman').is(':checked'))){
                alert("Всё ок!");
            }
        });
    }

    // код для отзывов

    if($(div).hasClass('detail')){
        var tabs = $('.detail-tabs__item'), items = $('.detail-item'), rating = $('.rating-buttons'), average = 0, averageRating = $("#average");
        averageRating.css({'width':`${(average/5)*100}%`});
        rating.each(function(i){
            var btn = $(rating[i]).find('label');
            btn.each(function(j){
                var c = 0;
                $(btn[j]).click(function(){
                    for(c = 0; c <= j; c++){
                        $(btn[c]).css({'color':'orange'});
                    }
                    for(var d = c; d <= btn.length; d++){
                        $(btn[d]).css({'color':'gray'});
                    }
                });
            });
        });
        $('input[type=radio]').on('input', function(){
            average = 0;
            var checked = $('input:checked');
            checked.each(function(i){
                average += parseFloat($(checked[i]).val());
            });
            average /= checked.length;
            average = average.toFixed(2);
            averageRating.css({'width':`${(average/5)*100}%`});
        });
        tabs.each(function(i){
            $(this).click(function(){
                tabSwitch(tabs, items, i);
            });
        });
    }

    //функция для переключения табов
    function tabSwitch(tabArray, itemArray, index){
        tabArray.each(function(){
            $(this).removeAttr('id');
        });
        $(tabArray[index]).attr('id', `${$(tabArray[index]).attr('class')+'_active'}`);
        itemArray.each(function(){
            $(this).slideUp(100);
        });
        $(itemArray[index]).slideDown(100);
    }


});

var div = document.querySelectorAll('div');

// JavaScript
// автозаполнение на чистом JS
if(document.querySelector('div').classList.contains('reg')){
    var countries = ["Абхазия", "Австралия","Австрия","Азад","Азербайджан","Албания","Алжир","Ангилья","Ангола","Андорра","Антигуа и Барбуда","Аргентина","Армения","Аруба","Афганистан","Багамские Острова","Бангладеш","Барбадос","Бахрейн","Белиз","Белоруссия","Бельгия","Бенин","Болгария","Боливия","Босния и Герцеговина","Ботсвана","Бразилия","Бруней","Буркина","Бурунди","Бутан","Вануату","Ватикан","Великобритания","Венгрия","Венесуэла","Восточный Тимор","Вьетнам","Габон","Гаити","Гайана","Гамбия","Гана","Гватемала","Гвинея","Гвинея","Германия","Гондурас","Гонконг","Государство Палестина","Гренада","Гренландия","Греция","Грузия","Дания","Демократическая Республика Конго","Джибути","Доминика","Доминиканская Республика","Египет","Замбия","Зимбабве","Израиль","Индия","Индонезия","Иордания","Ирак","Иран","Ирландия","Исландия","Испания","Италия","Йемен","Кабо","Казахстан","Камбоджа","Камерун","Канада","Катар","Кения","Кипр","Киргизия","Кирибати","Китай","КНДР (Северная Корея)","Колумбия","Коморские Острова","Косово","Коста","Кот","Куба","Кувейт","Кюрасао","Лаос","Латвия","Лесото","Либерия","Ливан","Ливия","Литва","Лихтенштейн","Люксембург","Маврикий","Мавритания","Мадагаскар","Македония","Малави","Малайзия","Мали","Мальдивы","Мальта","Марокко","Маршалловы Острова","Мексика","Микронезия","Мозамбик","Молдавия","Монако","Монголия","Мьянма","Нагорно","Намибия","Науру","Непал","Нигер","Нигерия","Нидерланды","Никарагуа","Ниуэ","Новая Зеландия","Норвегия","Объединённые Арабские Эмираты","Оман","Острова Кука","Пакистан","Палау","Панама","Папуа–Новая Гвинея","Парагвай","Перу","Польша","Португалия","Пуэрто","Республика Конго","Россия","Руанда","Румыния","Сальвадор","Самоа","Сан","Сан","Саудовская Аравия","Сахарская Арабская Демократическая Республика","Свазиленд","Северный Кипр","Сейшельские Острова","Сенегал","Сент","Сербия","Сингапур","Синт","Сирия","Словакия","Словения","Соединённые Штаты Америки","Соломоновы Острова","Сомали","Судан","Суринам","Сьерра","Таджикистан","Таиланд","Танзания","Того","Тонга","Тринидад и Тобаго","Тувалу","Тунис","Туркмения","Турция","Уганда","Узбекистан","Украина","Уругвай","Фареры","Фиджи","Филиппины","Финляндия","Франция","Хорватия","Центральноафриканская Республика","Чад","Черногория","Чехия","Чили","Швейцария","Швеция", "Шри-Ланка", "Эквадор", "Экваториальная Гвинея", "Эритрея", "Эсватини", "Эстония", "Эфиопия", "ЮАР", "Южный Судан", "Ямайка", "Япония"];
    var input = document.getElementById('nationality');
    input.addEventListener('keyup', (e)=>{
        removeElemens();
        regDropMenu.classList.remove('form-drop__list_inactive');
        for(var c of countries){
            if(c.toLowerCase().startsWith(input.value.toLowerCase()) && input.value != ""){
                var listItem = document.createElement("li");
                listItem.classList.add("form-drop__item");
                listItem.style.cursor = "pointer";
                listItem.setAttribute("onclick", "displayName('"+c+"')");
                var foundWords = "<span class=form-drop__span>"+c.substring(0, input.value.length)+"</span>";
                foundWords += c.substring(input.value.length);
                listItem.innerHTML = foundWords;
                document.querySelector('.form-drop__list').appendChild(listItem);
            }
        }
    });
    var regDropMenu = document.getElementById('form-drop__list');
    regDropMenu.addEventListener('click', (e)=>{
        regDropMenu.classList.add('form-drop__list_inactive');
    });


    function displayName(val){
        input.value = val;
    }

    function removeElemens(){
        var items = document.querySelectorAll('.form-drop__item');
        items.forEach((item)=>{
            item.remove();
        });
    }
}

// вывод модального окна каждой карточки в каталоге на чистом JS
if($(div).hasClass('catalog')){
    var cards = document.querySelectorAll('.catalog-card');
    cards.forEach(function(item){
        item.addEventListener('click', function(e){
            if(e.target == this || e.target == item.querySelector('img') || e.target == item.querySelector('p') || e.target == item.querySelector('span')){
                item.querySelector('.catalog-card__modal').classList.add('catalog-card__modal_active');
                item.querySelector('.catalog-card__more').classList.add('catalog-card__more_active');
            }
            if(e.target == item.querySelector('.catalog-card__modal')){
                item.querySelector('.catalog-card__modal').classList.remove('catalog-card__modal_active');
                item.querySelector('.catalog-card__more').classList.remove('catalog-card__more_active');
            }
        });
    });


    document.addEventListener('keydown', function(e){
        if(e.key === "Escape"){
            this.querySelector('.catalog-card__modal_active').classList.remove('catalog-card__modal_active');
            this.querySelector('.catalog-card__more_active').classList.remove('catalog-card__more_active');
        }
    });

}

// Параллакс эффект
if(document.querySelector('div').classList.contains('scene')){
    window.addEventListener('scroll', function(e){
        this.scrollBy({
            behavior: 'smooth'
        });
        // высчитываем количество пикселей прокрутки, ширину и высоту блоков
        var scrollDown = this.scrollY,
        widthWindow = this.outerWidth,
        contentHeight = this.document.querySelector('.content').clientHeight,
        sceneHeight = this.document.querySelector('.scene').clientHeight,
        procentOfScroll = scrollDown/contentHeight*100,
        procentOfScrollTop = scrollDown/sceneHeight*100,
        procentOfOpacity = 1-1/100*procentOfScrollTop;
        if(scrollDown>=sceneHeight/2){
            this.document.querySelector('.content').style.zIndex = "10";
        }
        else{
            this.document.querySelector('.content').style.zIndex = "1";
        }
        // пишем код для парралакса при скроллинге страницы
        var zoom1 = 1+(widthWindow/10000*procentOfScrollTop);
        this.document.querySelector('.layer-fog').style.transform = `scale(${zoom1})`;
        this.document.querySelector('.layer-fog').style.opacity = procentOfOpacity;
        var zoom2 = 1+(widthWindow/1000000*procentOfScroll);
        this.document.querySelector('.layer-1').style.transform = `scale(${zoom2})`;
        var horizont1 = widthWindow/2000*procentOfScrollTop,
        zoom3 = 1+(widthWindow*0.000005)*procentOfScrollTop;
        this.document.querySelector('.layer-2').style.transform = `translate3d(${horizont1}px, 0, 0) scale(${zoom3})`;
        var horizont2 = widthWindow/1500*procentOfScrollTop,
        zoom4 = 1+(widthWindow*0.00002)*procentOfScrollTop;
        this.document.querySelector('.layer-3').style.transform = `translate3d(${horizont2}px, 0, 0) scale(${zoom4})`;
    });
    document.querySelector('.scene').addEventListener('mousemove', parallax);
    // функция для парралакса при движении мыши
    function parallax(e){
        this.querySelectorAll('.layer').forEach(item=>{
            var speed = item.getAttribute('data-speed');
            item.style.transform = `translateX(${e.clientX*speed/1000}px)`;
        });
    }
}

