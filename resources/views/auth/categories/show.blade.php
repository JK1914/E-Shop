@extends('auth.layouts.master')
@section('title', 'Категория' . $category->name)
@section('content')

<div class="col-md-12">
    <h1>Категория Бытовая техника</h1>
    <table class="table">
        <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{$category->id}}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{$category->code}}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{$category->name}}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{$category->description}}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img src="https://api.technodom.kz/f3/api/v1/images/800/800/stiralnaya_mashina_samsung_ww80agas26aeld_272132_2.webp" height="240px"></td>
            </tr>
            <tr>
                <td>Кол-во товаров</td>
                <td>{{$category->products->count()}}</td>
            </tr>
        </tbody>
    </table>

</div>

@endsection