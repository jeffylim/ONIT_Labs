@extends('adminlayout')
@section('title', 'Добавление в каталог')
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
    <div class="add">
        <form action="{{route('catalog.add_do')}}" method="POST" enctype="multipart/form-data">
            <h1 class="add-title">Добавление карточки товара</h1>
            <!-- <div class="add-photo">
                <img src="../img/st1.jpg" alt="st">
            </div> -->
            <div class="add-file">
                <label for="photo">Загрузить фотографию <i class="fa fa-upload"></i></label>
                <input type="file" id="photo" name="photo">
            </div>
            <div class="add-group">
                <label for="url">Название транслитом(без пробелов!)</label>
                <input type="text" id="url" minlength="8" name="url" required>
            </div>
            <div class="add-group">
                <label for="titleOfProduct">Название товара</label>
                <input type="text" id="titleOfProduct" minlength="8" name="title" required>
            </div>
            <div class="add-group add-short">
                <label for="short_desc">Краткое описание товара</label>
                <textarea name="short_desc" id="short_desc" required></textarea>
            </div>
            <div class="add-group add-long">
                <label for="long_desc">Подробное описание товара</label>
                <textarea name="long_desc" id="long_desc" required></textarea>
            </div>
            <div class="add-group">
                <label for="price">Цена</label>
                <input type="number" id="price" name="price" required>
            </div>
            @if(count($conditions)!=0)
                <h2 class="add-subtitle">Выберите условия(можно и позже)</h2>
                <div class="row">
                    @foreach($conditions as $condition)
                        <div class="col-6">
                            <div class="add-check">
                                <div class="add-check__btn"></div>
                                <input type="checkbox" name="condition[]" value="{{$condition->id}}" id="{{$condition->id}}">
                                <label for="{{$condition->id}}">{{$condition->title}}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <input type="submit" value="Добавить" class="add-submit">
        </form>
        <a href="{{route('catalog.add_condition')}}" class="add-condition">Добавить условия</a>
    </div>
@endsection
@section('right-part')
@endsection
