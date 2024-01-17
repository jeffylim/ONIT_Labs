@extends('adminlayout')
@section('title')
    Редактирование - {{$condition->title}}
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
        <form action="{{route('catalog.edit_condition_do')}}" method="POST">
            <input type="number" name="id" readonly hidden value="{{$condition->id}}">
            <div class="edit-group">
                <label for="conditionTitle">Условие</label>
                <textarea name="title" id="conditionTitle" required>{{$condition->title}}</textarea>
            </div>
            <input type="submit" value="Изменить" class="edit-submit">
        </form>
    </div>
@endsection
