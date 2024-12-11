@extends('layouts.master')

@section ('title', 'Товар')

@section('content')      
            <h1>{{$product->name}}</h1>
            <h2>{{$product->category->name}}</h2>
            <p>Цена: <b>{{$product->price}} руб.</b></p>
            <img src="{{Storage::url($product->image)}}" alt="iPhone X 64 Gb">
            <p>{{$product->description}}</p>
            @if($product->isAvailable())
            <form action="{{route('basket-add', $product)}}" method="post">
                <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>
                @csrf
            </form> 
            @else 
            <span>Недоступно</span>
            <br>
            <span>Сообщить мне, когда товар появится в наличии</span>
            <form method="POST" action="{{route('subscription', $product)}}">
                @csrf
                <input type="email" name="email">
                <button type="submit">Отправить</button>
            </form>
            @endif   
        
@endsection