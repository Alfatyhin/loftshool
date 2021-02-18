@extends('layouts.master')

@section('title', 'Page Title')

@section('style')
    <style>
        .page_active_{{$pageActiv}} a {
            color: brown;
        }
    </style>
@endsection

@section('sidebar')
    @parent

@endsection

@section('content-title')
    <div class="content-head__title-wrap__title bcg-title">Последние товары
        @if($categoryId > 0)
            @foreach($category as $item)
                @if($item->id == 5)
                    категории {{$item->name}}
                @endif
            @endforeach
        @endif
    </div>
@endsection

@section('content')
    <div class="content-main__container"><a name="products"></a>
        <div class="products-columns">
            @foreach($catalog as $product)

                <div class="products-columns__item">
                    <div class="products-columns__item__title-product"><a href="{{route('single.view', ['product' => $product])}}" class="products-columns__item__title-product__link">{{$product->name}}</a></div>
                    <div class="products-columns__item__thumbnail"><a href="{{route('single.view', ['product' => $product])}}" class="products-columns__item__thumbnail__link"><img src="{{$product->image}}" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                    <div class="products-columns__item__description"><span class="products-price">{{$product->price}} руб ({{$product->id}})</span><a href="{{route('single.view', ['product' => $product])}}" class="btn btn-blue">Купить</a></div>
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
@endsection
