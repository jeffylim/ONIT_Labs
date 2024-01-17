@extends('layout')
@section('title')
    Подробнее - {{$product->title}}
@endsection
@section('content')
    <div class="detail">
        <h1 class="detail-title">{{$product->title}}</h1>
        <div class="detail-wrapper">
            <div class="row">
                <div class="col-md-5">
                    <div class="detail-img">
                        <img src="../../{{$product->photo}}" alt="st">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="detail-info">
                        <p class="detail-info__text">
                            {{$product->short_desc}}
                        </p>
                        @if(count($product->conditions)>1)
                            <ul class="detail-info__list">
                                @for($i=0;$i<2;$i++)
                                    <li>{{$product->conditions[$i]->title}}</li>
                                @endfor
                            </ul>
                        @elseif(count($product->conditions)==1)
                            <ul>
                                <li>{{$product->conditions[0]->title}}</li>
                            </ul>
                        @endif
                        <p class="detail-info__price">Цена: <span>{{$product->price}} ₽</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="detail-tabs">
            <span class="detail-tabs__item" id="detail-tabs__item_active">Описание</span>
            <span class="detail-tabs__item">
                                        Условия
                                    </span>
            <span class="detail-tabs__item">
                                        Отзывы
                                    </span>
        </div>
        <div class="detail-item" style="display: block;">
            <div class="description">
                <h2 class="description-title">Описание товара</h2>
                <p class="description-text">{{$product->long_desc}}</p>
            </div>
        </div>
        <div class="detail-item">
            <div class="spec">
                <h2 class="spec-subtitle">Условия</h2>
                @if(count($product->conditions)>1)
                    <ul class="spec-list">
                        @foreach($product->conditions as $condition)
                            <li>{{$condition->title}}</li>
                        @endforeach
                    </ul>
                @elseif(count($product->conditions)==1)
                    <ul class="spec-list">
                        <li>{{$product->conditions[0]->title}}</li>
                    </ul>
                @elseif(count($product->conditions)==0)
                    <span class="spec-none">Условий нет</span>
                @endif
            </div>
        </div>
        <div class="detail-item">
            <div class="review">
                @auth
                    <form method="POST" action="{{route('review.review_add')}}" class="review-form">
                        <h2 class="review-form__title">Оставьте отзыв</h2>
                        <div class="review-form__wrapper rating">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                                        <span class="rating-title">
                                                            Оказанные услуги
                                                        </span>
                                </div>
                                <div class="col-md-6">
                                    <div class="rating-buttons">
                                        <input type="radio" name="service" id="service1" value="1"><input type="radio" name="service" id="service2" value="2"><input type="radio" name="service" id="service3" value="3"><input type="radio" name="service" id="service4" value="4"><input type="radio" name="service" id="service5" value="5"><label for="service1">★</label><label for="service2">★</label><label for="service3">★</label><label for="service4">★</label><label for="service5">★</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="review-form__wrapper rating">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                                        <span class="rating-title">
                                                            Работа сайта
                                                        </span>
                                </div>
                                <div class="col-md-6">
                                    <div class="rating-buttons">
                                        <input type="radio" name="website" id="website1" value="1"><input type="radio" name="website" id="website2" value="2"><input type="radio" name="website" id="website3" value="3"><input type="radio" name="website" id="website4" value="4"><input type="radio" name="website" id="website5" value="5"><label for="website1">★</label><label for="website2">★</label><label for="website3">★</label><label for="website4">★</label><label for="website5">★</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="review-form__wrapper rating">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                                        <span class="rating-title">
                                                            Работа сотрудников
                                                        </span>
                                </div>
                                <div class="col-md-6">
                                    <div class="rating-buttons">
                                        <input type="radio" name="staff" id="staff1" value="1"><input type="radio" name="staff" id="staff2" value="2"><input type="radio" name="staff" id="staff3" value="3"><input type="radio" name="staff" id="staff4" value="4"><input type="radio" name="staff" id="staff5" value="5"><label for="staff1">★</label><label for="staff2">★</label><label for="staff3">★</label><label for="staff4">★</label><label for="staff5">★</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="review-form__wrapper rating">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                                        <span class="rating-title">
                                                            Общее впечатления
                                                        </span>
                                </div>
                                <div class="col-md-6">
                                    <div class="rating-buttons">
                                        <input type="radio" name="feel" id="feel1" value="1"><input type="radio" name="feel" id="feel2" value="2"><input type="radio" name="feel" id="feel3" value="3"><input type="radio" name="feel" id="feel4" value="4"><input type="radio" name="feel" id="feel5" value="5"><label for="feel1">★</label><label for="feel2">★</label><label for="feel3">★</label><label for="feel4">★</label><label for="feel5">★</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="review-form__wrapper rating">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <span class="rating-title">Средняя оценка</span>
                                    <input type="number" id="valueOfGrade" name="grade" readonly hidden>
                                </div>
                                <div class="col-md-6">
                                    <span class="average"><span id="average"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="review-form__text">
                            <label for="reviewText">Напишите отзыв</label>
                            <textarea id="reviewText" name="comment"></textarea>
                        </div>
                        <input type="number" value="{{$product->id}}" name="product_id" readonly hidden>
                        <input type="submit" value="Оставить" class="review-form__submit">
                    </form>
                @endauth
                @foreach($product->reviews as $review)
                    <div class="review-item">
                        <div class="review-item__info">
                            <h2 class="review-item__name">
                                {{$review->user_surname}} {{$review->user_name}}
                            </h2>
                            <span class="review-item__time">
                                                    {{$review->created_at}}
                                                </span>
                        </div>
                        <div class="review-item__grade">
                            <p>Оценка</p>
                            <div class="review-item__stars">
                                <input type="text" value="{{$review->grade}}" readonly hidden>
                                <span class="grade"><span id="grade"></span></span>
                            </div>
                        </div>
                        <p class="review-item__text">
                            {{$review->comment}}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
