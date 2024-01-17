@extends('adminlayout')
@section('title')
    Редактирование - {{$product->title}}
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
    <div class="edit">
        <form action="{{route('catalog.edit_do')}}" method="POST" enctype="multipart/form-data">
            <input type="number" value="{{$product->id}}" name="id" hidden readonly>
            <h1 class="edit-title">Добавление карточки товара</h1>
            <div class="edit-photo">
                <img src="../../{{$product->photo}}" alt="st">
            </div>
            <div class="edit-file">
                <label for="photo">Загрузить фотографию <i class="fa fa-upload"></i></label>
                <input type="file" id="photo" name="photo">
            </div>
            <div class="edit-group">
                <label for="url">Название транслитом(без пробелов!)</label>
                <input type="text" id="url" minlength="8" name="url" value="{{$product->url}}" required>
            </div>
            <div class="edit-group">
                <label for="titleOfProduct">Название товара</label>
                <input type="text" id="titleOfProduct" minlength="8" value="{{$product->title}}" name="title" required>
            </div>
            <div class="edit-group edit-short">
                <label for="short_desc">Краткое описание товара</label>
                <textarea name="short_desc" id="short_desc" required>{{$product->short_desc}}</textarea>
            </div>
            <div class="edit-group edit-long">
                <label for="long_desc">Подробное описание товара</label>
                <textarea name="long_desc" id="long_desc" required>{{$product->long_desc}}</textarea>
            </div>
            <div class="edit-group">
                <label for="price">Цена</label>
                <input type="number" id="price" name="price" value="{{$product->price}}" required>
            </div>
            @if(count($conditions)!=0)
                <h2 class="edit-subtitle">Выберите условия(можно и позже)</h2>
                <div class="row">
                    @foreach($conditions as $condition)
                        <div class="col-6">
                            <div class="edit-check">
                                <div class="edit-check__btn"></div>
                                <input type="checkbox" name="condition[]" id="{{$condition->id}}" value="{{$condition->id}}"
                                       @if(count($product->conditions->where('id', $condition->id)))
                                       checked
                                    @endif>
                                <label for="{{$condition->id}}">{{$condition->title}}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <input type="submit" value="Изменить" class="edit-submit">
        </form>
    </div>
@endsection
