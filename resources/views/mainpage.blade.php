<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('style/mainpage.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
@include('components.header')

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    </script>
</body>
</html>