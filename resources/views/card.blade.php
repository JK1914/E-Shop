

<div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="https://cdn.new-brz.net/app/public/models/MQAC2/large/w/180413170152994289.webp" alt="iPhone X 64 Gb">
                        <div class="caption">
                            <h3>{{$product->name}}</h3>
                            <p>{{$product->price}}</p>
                            <p>
                                <a href="{{route('basket')}}" class="btn btn-primary" role="button">В корзину</a>
                                {{$product->category->name}}                                
                                <a href="http://laravel-diplom-1.rdavydov.ru/basket/1/add" class="btn btn-default" role="button">Подробнее</a>
                            </p>
                        </div>
                    </div>
                </div>