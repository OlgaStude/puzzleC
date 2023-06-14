<header>
    <div id="up_part">
        <a href="{{ route('mainpage') }}"><img src="{{ asset('storage/imgs/logo.png') }}" alt=""></a>
        <nav>
            <a href="#">О нас</a>
            <a href="#">Акции</a>
            <a href="#">Контакты</a>
            <a href="#">Отзывы</a>
            <a href="#">Оплата и доставка</a>
        </nav>
    </div>
    <div id="mid_part">
        <div id="search_bar">
            <input type="text">
            <img src="{{ asset('storage/imgs/MG_icon.png') }}" alt="">
        </div>
        <div>
            @guest
            <img id="login_nav" src="{{ asset('storage/imgs/logout_icon.png') }}" alt="">
            @endguest
            @auth
            <a href="{{ route('logout') }}"><img src="{{ asset('storage/imgs/login_icon.png') }}" alt=""></a>
            @endauth
            <a href="{{ route('cart') }}"><img src="{{ asset('storage/imgs/kart_icon.png') }}" alt=""></a>
        </div>
    </div>
    <div id="down_part">
        <a href="#">Каталог</a>
        <div>
            <a href="#">Кубики</a>
            <a href="#">Металлические</a>
            <a href="#">Деревянные</a>
            <a href="#">3д пазлы</a>
            <a href="#">Вместить</a>
            <a href="#">Открыть коробку</a>
        </div>
    </div>
</header>