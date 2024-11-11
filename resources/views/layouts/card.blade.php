

<div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="https://cdn.new-brz.net/app/public/models/MQAC2/large/w/180413170152994289.webp" alt="iPhone X 64 Gb">
                        <div class="caption">
                            <h3>{{$product->name}}</h3>
                            <p>{{$product->price}}</p>
                            <p>
                                <form action="{{route('basket-add', $product)}}" method="post">
                                    <button type="submit" class="btn btn-primary" role="button">В корзину</button>                                
                                    <a href="{{route('product', [$product->category->code, $product->code])}}" class="btn btn-default" role="button">Подробнее</a>                         
                                @csrf
                                </form>                                
                            </p>
                        </div>
                    </div>
                </div>