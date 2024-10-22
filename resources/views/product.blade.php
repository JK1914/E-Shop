@extends('master')

@section ('title', 'Товар')

@section('content')
        <div class="starter-template">
            <h1>iPhone X 64 Gb</h1>
            <h2>{{$product}}</h2>
            <p>Цена: <b>71990 руб.</b></p>
            <img src="https://cdn.new-brz.net/app/public/models/MQAC2/large/w/180413170152994289.webp" alt="iPhone X 64 Gb">
            <p>Отличный телефон с памятью на 64 Gb</p>
            <a href="http://laravel-diplom-1.rdavydov.ru/basket/1/add" class="btn btn-primary" role="button">Добавить в корзину</a>   
        </div>
@endsection