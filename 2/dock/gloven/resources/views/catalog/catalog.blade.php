@extends('layout')
@section('title', 'Каталог')
@section('content')
    <div class="catalog">
        <div class="catalog-wrapper">
            @if(count($products)!=0)
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="catalog-card">
                                <div class="catalog-card__img">
                                    <img src="{{$product->photo}}">
                                </div>
                                <a href="more.html" class="catalog-card__title">{{$product->title}}</a>
                                <div class="catalog-card__wrapper">
                                    <p class="catalog-card__price">Цена: <span>{{$product->price}} ₽</span></p>
                                    <a href="#" сlass="catalog-card__btn">Купить</a>
                                </div>
                                <div class="catalog-card__modal">
                                    <div class="catalog-card__more more">
                                        <h2 class="more-title">{{$product->title}}</h2>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="more-img">
                                                    <img src="{{$product->photo}}" alt="1">
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <p class="more-text">{{$product->short_desc}}</p>
                                                @if(count($product->conditions)>1)
                                                    <ul class="more-list">
                                                        @for($i=0;$i<2;$i++)
                                                            <li>{{$product->conditions[$i]->title}}</li>
                                                        @endfor
                                                    </ul>
                                                @elseif(count($product->conditions)==1)
                                                    <ul>
                                                        <li>{{$product->conditions[0]->title}}</li>
                                                    </ul>
                                                @endif
                                                <div class="more-wrapper">
                                                    <p class="more-price">Цена: <span>15000</span></p>
                                                    <div class="more-wrapper__buttons">
                                                        <a href="{{route('catalog.more', $product->url)}}" class="btn more-btn">Подробнее</a>
                                                        <a href="#" class="btn more-buy">Купить</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @havePermission('admin')
                                <div class="catalog-card__adminbuttons">
                                    <a href="{{route('catalog.edit', $product->id)}}">Редактировать</a>
                                    <a href="{{route('catalog.delete', $product->id)}}">Удалить</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <h1 class="catalog-wrapper__none">Каталог пуст</h1>
            @endif
            @havePermission('admin')
            <a href="{{route('catalog.add')}}" class="catalog-wrapper__add">Добавить в каталог <i class="fa fa-plus"></i></a>
            @endif
        </div>
    </div>
@endsection
