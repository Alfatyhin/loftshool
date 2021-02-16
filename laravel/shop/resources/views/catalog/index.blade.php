<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>main - ГеймсМаркет</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
    </style>

    <link rel="stylesheet" href="/css/libs.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/media.css">

    <style>
        .page_active_{{$pageActiv}} a {
            color: brown;
        }
        .category_{{$categoryId}} a {
            color: brown;
        }
    </style>
</head>
<body >
<div class="main-wrapper">

        <header class="main-header">
            <div class="logotype-container"><a href="/" class="logotype-link"><img src="/img/logo.png" alt="Логотип"></a></div>
            <nav class="main-navigation">
                <ul class="nav-list">
                    <li class="nav-list__item"><a href="/" class="nav-list__item__link">Главная</a></li>
                    <li class="nav-list__item"><a href="#" class="nav-list__item__link">Мои заказы</a></li>
                    <li class="nav-list__item"><a href="#" class="nav-list__item__link">Новости</a></li>
                    <li class="nav-list__item"><a href="#" class="nav-list__item__link">О компании</a></li>
                </ul>
            </nav>
            <div class="header-contact">
                <div class="header-contact__phone"><a href="#" class="header-contact__phone-link">Телефон: 33-333-33</a></div>
            </div>
            <div class="header-container">
                <div class="payment-container">
                    <div class="payment-basket__status">
                        <div class="payment-basket__status__icon-block"><a class="payment-basket__status__icon-block__link"><i class="fa fa-shopping-basket"></i></a></div>
                        <div class="payment-basket__status__basket"><span class="payment-basket__status__basket-value">0</span><span class="payment-basket__status__basket-value-descr">товаров</span></div>
                    </div>
                </div>
                <div class="authorization-block">
                    @if (Route::has('login'))
                        @auth

                        @else
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="authorization-block__link">Регистрация</a>
                            @endif

                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Войти</a>

                        @endauth
                    @endif
                </div>
            </div>
        </header>



        <div class="middle">
            <div class="sidebar">
                <div class="sidebar-item">
                    <div class="sidebar-item__title">Категории</div>
                    <div class="sidebar-item__content">
                        <ul class="sidebar-category">
                            @foreach($category as $item)
                                <li class="sidebar-category__item category_{{$item->id}}"><a href="{{route('category.list', ['categoryName' => $item->name, 'categoryId' => $item->id])}}" class="sidebar-category__item__link">{{$item->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="sidebar-item">
                    <div class="sidebar-item__title">Последние новости</div>
                    <div class="sidebar-item__content">
                        <div class="sidebar-news">
                            <div class="sidebar-news__item">
                                <div class="sidebar-news__item__preview-news"><img src="/img/cover/game-2.jpg" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                                <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
                            </div>
                            <div class="sidebar-news__item">
                                <div class="sidebar-news__item__preview-news"><img src="/img/cover/game-1.jpg" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                                <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
                            </div>
                            <div class="sidebar-news__item">
                                <div class="sidebar-news__item__preview-news"><img src="/img/cover/game-4.jpg" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                                <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="main-content">
                <div class="content-top">
                    <div class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
                    <div class="slider"><img src="/img/slider.png" alt="Image" class="image-main"></div>
                </div>
                <div class="content-middle">
                    <div class="content-head__container">
                        <div class="content-head__title-wrap">
                            <div class="content-head__title-wrap__title bcg-title">Последние товары
                                @if($categoryId > 0)
                                    @foreach($category as $item)
                                        @if($item->id == $categoryId)
                                           категории {{$item->name}}
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="content-head__search-block">
                            <div class="search-container">
                                <form class="search-container__form">
                                    <input type="text" class="search-container__form__input">
                                    <button class="search-container__form__btn">search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="content-main__container"><a name="products"></a>
                        <div class="products-columns">
                            @foreach($catalog as $product)

                            <div class="products-columns__item">
                                <div class="products-columns__item__title-product"><a href="{{route('single.view', ['product' => $product])}}" class="products-columns__item__title-product__link">{{$product->name}}</a></div>
                                <div class="products-columns__item__thumbnail"><a href="{{route('single.view', ['product' => $product])}}" class="products-columns__item__thumbnail__link"><img src="{{$product->image}}" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                                <div class="products-columns__item__description"><span class="products-price">{{$product->price}} руб ({{$product->id}})</span><a href="" class="btn btn-blue">Купить</a></div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                    <div class="content-footer__container">
                        <ul class="page-nav">
                            <li class="page-nav__item"><a href="{{route('category.list', ['page' => 1, 'categoryName' => $categoryName, 'categoryId' => $categoryId])}}" class="page-nav__item__link"><i class="fa fa-angle-double-left"></i></a></li>

                            @for($x = $pageStart; $x <= $pageEnd; $x++)

                            <li class="page-nav__item page_active_{{$x}}"><a href="{{route('category.list', ['page' => $x, 'categoryName' => $categoryName, 'categoryId' => $categoryId])}}" class="page-nav__item__link">{{$x}}</a></li>
                            @endfor

                            <li class="page-nav__item"><a href="{{route('category.list', ['page' => $pageNext, 'categoryName' => $categoryName, 'categoryId' => $categoryId])}}" class="page-nav__item__link"><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="content-bottom"></div>
            </div>
        </div>
        <footer class="footer">
            <div class="footer__footer-content">
                <div class="random-product-container">
                    <div class="random-product-container__head">Случайный товар</div>
                    <div class="random-product-container__content">
                        <div class="item-product">
                            <div class="item-product__title-product"><a href="/single/?id={{$randomProduct->id}}" class="item-product__title-product__link">{{$randomProduct->name}}</a></div>
                            <div class="item-product__thumbnail"><a href="/single/?id={{$randomProduct->id}}" class="item-product__thumbnail__link"><img src="{{$randomProduct->image}}" alt="Preview-image" class="item-product__thumbnail__link__img"></a></div>
                            <div class="item-product__description">
                                <div class="item-product__description__products-price"><span class="products-price">{{$randomProduct->price}} руб</span></div>
                                <div class="item-product__description__btn-block"><a href="#" class="btn btn-blue">Купить</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer__footer-content__main-content">
                    <p>
                        Интернет-магазин компьютерных игр ГЕЙМСМАРКЕТ - это
                        онлайн-магазин игр для геймеров, существующий на рынке уже 5 лет.
                        У нас широкий спектр лицензионных игр на компьютер, ключей для игр - для активации
                        и авторизации, а также карты оплаты (game-card, time-card, игровые валюты и т.д.),
                        коды продления и многое друго. Также здесь всегда можно узнать последние новости
                        из области онлайн-игр для PC. На сайте предоставлены самые востребованные и
                        актуальные товары MMORPG, приобретение которых здесь максимально удобно и,
                        что немаловажно, выгодно!
                    </p>
                </div>
            </div>
            <div class="footer__social-block">
                <ul class="social-block__list bcg-social">
                    <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-facebook"></i></a></li>
                    <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-twitter"></i></a></li>
                    <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </footer>
</div>
</body>
</html>
