<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('style/cart.css') }}" rel="stylesheet">
    <script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>
  @error('name')
    <style>
        #name{
            border: 7px solid #E14257;
        }
        #login_register, #register{
            display: block;
        }
    </style>
    @enderror
    @error('email')
    <style>
        #mail{
            border: 7px solid #E14257;
        }
        #login_register, #register{
            display: block;
        }
    </style>
    @enderror
    @error('password')
    <style>
        #password{
            border: 7px solid #E14257;
        }
        #login_register, #register{
            display: block;
        }
    </style>
    @enderror
    @error('password_r')
    <style>
        #password_r{
            border: 7px solid #E14257;
        }
        #login_register, #register{
            display: block;
        }
    </style>
    @enderror
  @error('phone')
  <style>
    .phone{
        border: 4px solid #E14257;
    }
  </style>
  @enderror
  @error('mail')
  <style>
    .mail{
        border: 4px solid #E14257;
    }
  </style>
  @enderror
  @error('surname')
  <style>
    .surname{
        border: 4px solid #E14257;
    }
  </style>
  @enderror
  @error('user_name')
  <style>
    .name{
        border: 4px solid #E14257;
    }
  </style>
  @enderror
  @error('flat')
  <style>
    .flat{
        border: 4px solid #E14257;
    }
  </style>
  @enderror
  @error('house')
  <style>
    .house{
        border: 4px solid #E14257;
    }
  </style>
  @enderror
  @error('index')
  <style>
    .index{
        border: 4px solid #E14257;
    }
  </style>
  @enderror
  @error('street')
  <style>
    .street{
        border: 4px solid #E14257;
    }
  </style>
  @enderror
  @error('living_place')
  <style>
    .living_place{
        border: 4px solid #E14257;
    }
  </style>
  @enderror

    <title>Корзина</title>
</head>
<body>
@include('components.header')
<section id="login_register">
        <form action="{{ route('login') }}" method="post" id="login">
        @csrf  
            <h1>Вход</h1>
            <input type="text" placeholder="Почта" name="email" id="mail">
            <input type="text" placeholder="Пароль" name="password" id="password">
            <button type="submit">Войти</button>
            <p id="reg_switch">Зарегистрироваться?</p>
        </form>
        <form action="{{ route('registration') }}" method="post" id="register">
        @csrf
            <h1>Регистрация</h1>
            <input type="text" placeholder="Имя" name="name" id="name">
            <input type="text" placeholder="Почта" name="mail" id="mail">
            <input type="text" placeholder="Пароль" name="password" id="password">
            <input type="text" placeholder="Повтор пароля" name="password_r" id="password_r">
            <button type="submit">Зарегистрироваться</button>
            <p id="login_switch">Войти?</p>
        </form>
        <div id="exit"></div>
    </section>
    
<form action="{{ route('checkright') }}">
<section id="up_section">
    <div id="products_tittle">
        <h1>В корзине {{$counter}} товар(а/ов)</h1>
        <div id="products">
        @php($tottal_price = 0)
        @foreach($goods as $product)
            <div class="product">
                <a href="{{ route('goodpage', $product->id) }}"><img src="{{ asset('storage/goods/'.$product->path_1) }}" alt=""></a>
                <div class="product_info">
                    <div class="product_info_title">
                        <a href="{{ route('goodpage', $product->id) }}"><h1>{{ $product->name }}</h1></a>
                        <p>({{ $product->manufacturer }})</p>
                    </div>
                    <div class="product_info_price">
                        <div class="items_ammount">
                            <input type="text" hidden value="{{ $product->price }}">
                            <span class="less" data-id="{{ $product->id }}">-</span>
                            <span class="ammount">1</span>
                            <span class="more">+</span>
                            <input type="text" hidden value="{{ $product->price }}">
                        </div>
                        <div class="product_price">
                            <p>{{ $product->price }}</p>
                            <img src="{{ asset('storage/imgs/rub_black.png') }}" alt=""></p>
                        </div>
                    </div>
                </div>
            </div>
        @php($tottal_price += $product->price)
        @endforeach
        </div>
    </div>
    <div id="price_tottal">
        <div id="product_price">
            <p>Товары цена</p>
            <div class="product_price_money">
                <p>{{ $tottal_price }}</p>
                <img src="{{ asset('storage/imgs/rub_white.png') }}" alt="">
            </div>
        </div>
        <div id="delivery_price">
            <p>Доставка</p>
            <div class="product_price_money">
                <p>200</p>
                <img src="{{ asset('storage/imgs/rub_white.png') }}" alt="">
            </div>
        </div>
        <div id="tottal_price">
            <p>Итог</p>
            <div class="tottal_price_money">
                <p>{{ $tottal_price + 200}}</p>
                <img src="{{ asset('storage/imgs/rub_white.png') }}" alt="">
            </div>
        </div>
        @auth
        <button type="submit">Перейти к оплате</button>
        @endauth
        @guest
        <button id="not_loged">Перейти к оплате</button>
        @endguest
    </div>
</section>
<section id="user_info">
    <h1>Данные для получения</h1>
    <div id="user_info_wrapper">
        <div id="adress">
            <h1>Адресс</h1>
            <div class="adress_up">
                <input type="text" placeholder="Населённый пункт*" value="{{ old('living_place') }}" name="living_place" class="long living_place">
                <input type="text" placeholder="Улица*" value="{{ old('street') }}" name="street" class="long street">
            </div>
            <div class="adress_down">
                <input type="text" placeholder="Индекс*" value="{{ old('index') }}" name="index" class="short index">
                <input type="text" placeholder="Дом*" value="{{ old('house') }}" name="house" class="short house">
                <input type="text" placeholder="Квартира/офис*" value="{{ old('flat') }}" name="flat" class="short flat">
            </div>
        </div>
        <div id="personal">
            <h1>Личные данные</h1>
            <div class="adress_up">
                <input type="text" placeholder="Имя*" value="{{ old('user_name') }}" name="user_name" class="long name">
                <input type="text" placeholder="Фамилия*" value="{{ old('surname') }}" name="surname" class="long surname">
            </div>
            <div class="adress_down">
                @guest
                <input type="text" placeholder="Почта*" value="{{ old('mail') }}" name="mail" class="long mail">
                @endguest
                @auth
                <input type="text" placeholder="Почта*" value="{{ Auth::user()->email }}" name="mail" class="long mail">
                @endauth
                <input type="text" placeholder="Телефон*" value="{{ old('phone') }}" name="phone" class="long phone">
            </div>
        </div>
    </div>
    
</section>
</form>
@include('components.footer')

<script>
    $counter = parseInt('{{$counter}}');
    $('.more').click(function(){
        let value = $(this).prev().html();
        value++;
        $(this).prev().html(value);
        value = parseInt($('#product_price .product_price_money p').html()) + parseInt($(this).next().val());
        $('#product_price .product_price_money p').html(value);
        value = parseInt($('#tottal_price .tottal_price_money p').html()) + parseInt($(this).next().val());
        $('#tottal_price .tottal_price_money p').html(value);
        $('#products_tittle>h1').html('В корзине ' + ++$counter+ ' товар(а/ов)')

    });
    $('.less').click(function(){
        let value = $(this).next().html();
        value--;
        if(value == 0){
            let id = $(this).data('id');
            let element = $(this).parent().parent().parent().parent();
            $.ajax({
                url: '{{ route("deletecart") }}',
                method: 'GET',
                data: {id: id}, 
                success: function(data){
                    element.empty();
                    $('#products_tittle>h1').html('В корзине ' +--$counter+ ' товар(а/ов)');
                }
            })
            .fail(function(jqXHR, ajaxOpions, throwError){
            })
        }
        $(this).next().html(value);
        value = parseInt($('#product_price .product_price_money p').html()) - parseInt($(this).prev().val());
        $('#product_price .product_price_money p').html(value);
        value = parseInt($('#tottal_price .tottal_price_money p').html()) - parseInt($(this).prev().val());
        $('#tottal_price .tottal_price_money p').html(value);
        $('#products_tittle>h1').html('В корзине ' +--$counter+ ' товар(а/ов)');
    });

    $('#not_loged').click(function(e){
        e.preventDefault();
        $('#login_register').show();
    })
    $('#login_nav').click(function(){
        $('#login_register').show();
    })
    $('#exit').click(function(){
        $('#login_register').hide();
    })
    $('#login_switch').click(function(){
        $('#register').hide();
        $('#login').show();
    });
    $('#reg_switch').click(function(){
        $('#login').hide();
        $('#register').show();
    });
</script>
</body>
</html>