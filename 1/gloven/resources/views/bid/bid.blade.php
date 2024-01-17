@extends('adminlayout')
@section('title', 'Заявки пользоателей')
@section('content')
    <div class="bid">
        @if(count($bids)==0)
            <h1 class="bid-none">Заявок нет</h1>
        @else
            @foreach($bids as $bid)
                <div class="bid-item">
                    <h2 class="bid-item__count">Заявка {{$bid->id}}</h2>
                    <div class="bid-item__wrapper">
                        <h3 class="bid-item__feat">Заголовок:</h3>
                        <p class="bid-item__message">{{$bid->userTitle}}</p>
                        <h3 class="bid-item__feat">Категория сообщения:</h3>
                        <p class="bid-item__message">{{$bid->userCategory}}</p>
                        <h3 class="bid-item__feat">От: <span class="bid-item__mail">{{$bid->userMail}}</span></h3>
                        <h3 class="bid-item__feat">Дата</h3>
                        <p class="bid-item__message">{{$bid->created_at}}</p>
                        @if($bid->userText!=null)
                            <h3 class="bid-item__feat">Сообщение:</h3>
                            <p class="bid-item__message">
                                {{$bid->userText}}
                            </p>
                        @endif
                        @if($bid->userFileName!=null)
                            <a href="{{route('bid.download_file', $bid->id)}}" title="{{$bid->userFileName}}" class="bid-item__btn">Скачать файл <i class="fa fa-download"></i></a>
                        @endif
                        <a href="{{route('bid.bid_delete', $bid->id)}}" class="bid-item__btn">Удалить</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
