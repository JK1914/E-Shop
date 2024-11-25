<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Админка: @yield('title')</title>

    <script src="/js/app.js" defer></script>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">  

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{route('index')}}">
                    Вернуться на сайт
                </a>
                <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav"> 
                    @admin
                    <li><a href="{{route('categories.index')}}">Категории</a></li>
                    <li><a href="{{route('basket')}}">В корзину</a></li>  
                    <li><a href="{{route('index')}}">Заказы</a></li>
                    @endadmin
                </ul>

                @guest
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Зарегистрироваться</a>
                    </li>
                </ul>
                @endguest

                @auth
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                           Администратор
                        </a>                    
               
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Выйти
                        </a>

                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    </li>
                </ul>
                @endauth            
            </div>
            </div>
        </nav>
        <div class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    @yield('content')
                    
                </div>
            </div>
        </div>
    </div>    
</body>
</html>