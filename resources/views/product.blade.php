@extends('layouts.master')

@section ('title', 'Товар')

@section('content')      
            <h1>{{$product->name}}</h1>
            <h2>{{$product->category->name}}</h2>
            <p>Цена: <b>{{$product->price}} руб.</b></p>
            <img src="{{Storage::url($product->image)}}" alt="iPhone X 64 Gb">
            <p>{{$product->description}}</p>
            @if($product->isAvailable())<a href="{{route('basket-add' , $product)}}" class="btn btn-success" role="button">Добавить в корзину</a>     
            @else <button type="submit" class="btn btn-danger" role="button">Недоступен</button> 
            @endif   
        
@endsection