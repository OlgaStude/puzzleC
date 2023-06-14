<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('owlcarousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/owl.carousel.min.css')}}">
    <link href="{{ asset('style/mainpage.css') }}" rel="stylesheet">
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
    <title>Главная</title>
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
            <input type="text" placeholder="Почта" name="email" id="mail">
            <input type="text" placeholder="Пароль" name="password" id="password">
            <input type="text" placeholder="Повтор пароля" name="password_r" id="password_r">
            <button type="submit">Зарегистрироваться</button>
            <p id="login_switch">Войти?</p>
        </form>
        
        <div id="exit"></div>
    </section>
    <section id="slider">
        <div class="owl-carousel">
            <div class="slider__item first">
                <div class="blackout_screen"></div>
                <div class="banner_message">
                    <h1>Новинки сезона уже у нас!</h1>
                    <p>Всё самое свежее<br> и интересное!</p>
                    <button>смотреть</button>
                </div>
                <img src="{{ asset('storage/imgs/banner_img_1.png') }}" alt="">
            </div>
            <div class="slider__item second">
                <div class="blackout_screen"></div>
                <div class="banner_message">
                    <h1>Кажется слишком сложным?</h1>
                    <p>Всё проще,<br> чем вы думаете</p>
                    <button>смотреть</button>
                </div>
                <img src="{{ asset('storage/imgs/banner_img_2.png') }}" alt="">
            </div>
            <div class="slider__item third">
                <div class="blackout_screen"></div>
                <div class="banner_message">
                    <h1>Дерево - лучший материал!</h1>
                    <p>Экологично, красиво, эстетично!</p>
                    <button>смотреть</button>
                </div>
                <img src="{{ asset('storage/imgs/banner_img_3.png') }}" alt="">
            </div>
        </div>
        <div class="arrow left">
            <img src="{{ asset('storage/imgs/black_arrow.png') }}" alt="">
        </div>
        <div class="arrow right">
            <img src="{{ asset('storage/imgs/black_arrow_right.svg') }}" alt="">
        </div>
    </section>
    <section id="bonuses">
        <div id="bonuses_center">
            <div class="bonus first">
                <div class="bonus_title">
                    <img src="{{ asset('storage/imgs/car_icon.png') }}" alt="">
                    <h1>Доставим</h1>
                </div>
                <p>как можно быстрее и недорого</p>
            </div>
            <div class="bonus second">
                <div class="bonus_title">
                    <img src="{{ asset('storage/imgs/money_icon.png') }}" alt="">
                    <h1>Акции</h1>
                </div>
                <p>особые предложения для всех</p>
            </div>
            <div class="bonus third">
                <div class="bonus_title">
                    <img src="{{ asset('storage/imgs/present_icon.png') }}" alt="">
                    <h1>Бонусы</h1>
                </div>
                <p>купи больше — плати меньше</p>
            </div>
            <div class="bonus forth">
                <div class="bonus_title">
                    <img src="{{ asset('storage/imgs/mark_icon.png') }}" alt="">
                    <h1>Гарантия</h1>
                </div>
                <p>высокого качества и надёжности</p>
            </div>
        </div>
        <div class="bonuses_decor first"></div>
        <div class="bonuses_decor second"></div>
        <div class="bonuses_decor third"></div>
        <div class="bonuses_decor forth"></div>
        <div class="bonuses_decor fifth"></div>
        <div class="bonuses_decor sixth"></div>
        <div class="bonuses_decor seventh"></div>
        <div class="bonuses_decor eighth"></div>
    </section>
    <section id="more_products">
        <div id="more_products_title">
            <p>Новинки</p>
        </div>
        @foreach($goods as $product)
        <div class="product">
            <a href="{{ route('goodpage', $product->id) }}"><img src="{{ asset('storage/goods/'.$product->path_1) }}" alt=""></a>
            <div class="dots">
                <div class="active" data-image="{{ asset('storage/goods/'.$product->path_1) }}"></div>
                <div data-image="{{ asset('storage/goods/'.$product->path_2) }}"></div>
                <div data-image="{{ asset('storage/goods/'.$product->path_3) }}"></div>
            </div>
            <div class="product_title">
            <a href="{{ route('goodpage', $product->id) }}"><h1>{{ $product->name }}</h1></a>
                <p>{{ $product->manufacturer }}</p>
            </div>
            <div class="product_price">
                <p>{{ $product->price }}</p>
                <img src="{{ asset('storage/imgs/rub_red_icon.png') }}" alt="">
            </div>
        </div>
        @endforeach
        <button>Каталог</button>
    </section>
    <section id="videos">
        <div id="videos_title">
            <h1>Обзоры</h1>
        </div>
        <div id="videos_container">
            <div class="video">
                <div class="blackout"></div>
                <img class="video_preview" src="{{ asset('storage/videos/video_1.webp') }}" alt="">
            </div>
            <div class="video">
                <div class="blackout"></div>
                <img class="video_preview" src="{{ asset('storage/videos/video_2.jpg') }}" alt="">
            </div>
        </div>
        <button>Все обзоры</button>
    </section>
    <div id="brands">
        <div id="brands_title">
            <h1>Бренды</h1>
        </div>
        <div id="brands_container">
            <img src="{{ asset('storage/imgs/brand_logo_1.png') }}" alt="">
            <img src="{{ asset('storage/imgs/brand_logo_2.png') }}" alt="">
            <img src="{{ asset('storage/imgs/brand_logo_3.png') }}" alt="">
            <img src="{{ asset('storage/imgs/brand_logo_4.png') }}" alt="">
            <img src="{{ asset('storage/imgs/brand_logo_5.png') }}" alt="">
            <img src="{{ asset('storage/imgs/brand_logo_6.png') }}" alt="">
            <img src="{{ asset('storage/imgs/brand_logo_7.png') }}" alt="">
            <img src="{{ asset('storage/imgs/brand_logo_8.png') }}" alt="">
        </div>
    </div>
@include('components.footer')

    <script src="{{ asset('owlcarousel/jquery.min.js')}}"></script>
    <script src="{{ asset('owlcarousel/owl.carousel.min.js')}}"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            center: true,
            items:3,
            loop:true,
            mouseDrag: false,
            autoplay:true,
            autoplayTimeout:7000 ,
            smartSpeed: 3000,
            autoplayHoverPause:true
        });
        $('#slider .right').click(function() {
            $('.owl-carousel').trigger('next.owl.carousel');
        })
        $('#slider .left').click(function() {
            $('.owl-carousel').trigger('prev.owl.carousel');
        })

        $('.slider__item img').click(function(){
            $('#main_img').attr("src",$(this).attr('src'));
        });


        $('.dots div').click(function(){
            $(this).parent().prev().children().attr("src",$(this).data('image'));
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
        });

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