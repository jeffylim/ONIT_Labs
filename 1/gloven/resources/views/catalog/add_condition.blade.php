@extends('adminlayout')
@section('title', 'Добавление условий')
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
        <form action="{{route('catalog.add_condition_do')}}" method="GET">
            <div class="add-group">
                <label for="conditionTitle">Условие</label>
                <textarea name="title" id="conditionTitle" required></textarea>
            </div>
            <input type="submit" value="Добавить" class="add-submit">
        </form>
    </div>
    <div class="conditions">
        <div class="conditions-wrapper">
            @if(count($conditions)>1)
                @foreach($conditions as $condition)
                    <div class="conditions-item">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <p class="conditions-item__text">{{$condition->title}}</p>
                            </div>
                            <div class="col-md-2">
                                <a href="{{route('catalog.edit_condition', $condition->id)}}" class="conditions-item__btn">Редактировать</a>
                            </div>
                            <div class="col-md-2">
                                <a href="{{route('catalog.delete_condition', $condition->id)}}" class="conditions-item__btn">Удалить</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @elseif(count($conditions)==1)
                <div class="conditions-item">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <p class="conditions-item__text">{{$conditions[0]->title}}</p>
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('catalog.edit_condition', $conditions[0]->id)}}" class="conditions-item__btn">Редактировать</a>
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('catalog.delete_condition', $conditions[0]->id)}}" class="conditions-item__btn">Удалить</a>
                        </div>
                    </div>
                </div>
            @elseif(count($conditions)==0)
                <h1 class="conditions-none">Условий нет</h1>
            @endif
        </div>
    </div>
@endsection
