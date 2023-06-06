<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('style/goddPage.css') }}" rel="stylesheet">
    <title>{{ $good->name }}</title>
</head>
<body>
    @include('components.header')
    <section id="product">
        <p id="product_path"><a href="#">Главная</a> / <a href="#">Каталог</a> / <a href="#">Головоломки</a> / {{ $good->name}}</p>
        <div id="product_part">
            <div id="left_part">
                <img id="main_img" src="{{ asset('storage/goods/'.$good->path_1) }}" alt="">
            <div id="slider">
                <div class="arrow left_ar">
                    <img src="{{ asset('storage/imgs/white_arrow.png') }}" alt="">
                </div>
                <div id="carousel_container">
                    <div class="owl-carousel">
                        <div class="slider__item first">
                            <img src="{{ asset('storage/goods/'.$good->path_1) }}" alt="">
                        </div>
                        <div class="slider__item second">
                            <img src="{{ asset('storage/goods/'.$good->path_2) }}" alt="">
                        </div>
                        <div class="slider__item third">
                            <img src="{{ asset('storage/goods/'.$good->path_3) }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="arrow right_ar">
                    <img src="{{ asset('storage/imgs/white_arrow.png') }}" alt="">
                </div>
            </div>
            </div>
            <div id="right_part">
                <div id="title">
                    <h1>{{ $good->name }}</h1>
                    <h2>({{ $good->manufacturer }})</h2>
                </div>
                <div id="rating">
                    <img src="{{ asset('storage/imgs/stars.png') }}" alt=""><span>31</span>
                </div>
                <div id="money_section">
                    <div id="price">
                        <span>{{ $good->price }}</span>
                        <img src="{{ asset('storage/imgs/rub_black.png') }}" alt="">
                    </div>
                    <button onclick="addtokart('{{ $good->id }}')">Добавить в корзину</button>
                </div>
            </div>
        </div>
    </section>
    <section id="characteristics">
        <div id="chrs_left">
            <h1>Характеристики</h1>
            <p>Производитель: {{ $good->manufacturer}}</p>
            <p>Материал: Пластик</p>
        </div>
        <div id="chars_right">
            <h1>Описание</h1>
            <p>Если при взгляде на {{ $good->name }} вы подумали, что это что-то очень запутанное, вы правы. Спидкуберы привыкли к головоломкам, на каждой грани которых есть дополнительный круг. Здесь же таких кругов по четыре штуки на каждой грани! И они не заблокированы на своем месте, они крутятся вместе с гранью. Но не все так просто. Когда вы крутите грань на 90 градусов, круги вращаются на 180. Эта задачка точно не для новичков. Зато опытные спидкуберы наверняка получат огромное удовольствие в процессе поиска решения!</p>
        </div>
    </section>
    <section id="more_products">
        <div id="more_products_title">
            <p>Покупают вместе с этим</p>
        </div>
        @foreach($more as $product)
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
    </section>
    @include('components.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.owl-carousel').owlCarousel({
        center: true,
        items:3,
        loop:true,
        mouseDrag: false,
        });
        $('.right_ar').click(function() {
            $('.owl-carousel').trigger('next.owl.carousel');
        })
        $('.left_ar').click(function() {
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


        function addtokart(id){
            $.ajax({
                url: '{{ route("addtokart") }}',
                method: 'GET',
                data: {id: id}, 
                success: function(data){
                    
                }
            })
            .fail(function(jqXHR, ajaxOpions, throwError){
            })
        }
    </script>
</body>
</html>