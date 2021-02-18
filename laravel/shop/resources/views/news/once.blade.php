@extends('layouts.master')

@section('title', 'Page Title')

@section('style')
    <style>
        .news-content {
            white-space: pre-line;
        }
    </style>
@endsection

@section('sidebar')
    @parent

@endsection

@section('content-title')
    <div class="content-head__title-wrap">
        <div class="content-head__title-wrap__title bcg-title">Новости</div>
    </div>
@endsection

@section('content')
    <div class="content-main__container">
        <div class="news-block content-text">
            <h3 class="content-text__title">
                «{{$content->name}}»
            </h3><img src="{{$content->image}}" alt="Image" class="alignleft img-news">
            <div class="news-content">
                {{$content->description}}
            </div>
        </div>
    </div>
    </div>

    <div class="content-bottom">
        <div class="line"></div>
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">Посмотрите наши товары</div>
            </div>
        </div>
        <div class="content-main__container">
            <div class="products-columns">
                @foreach($catalog as $product)
                    <div class="products-columns__item">
                        <div class="products-columns__item__title-product"><a href="{{route('single.view', ['product' => $product])}}" class="products-columns__item__title-product__link">{{$product->name}}</a></div>
                        <div class="products-columns__item__thumbnail"><a href="{{route('single.view', ['product' => $product])}}" class="products-columns__item__thumbnail__link"><img src="{{$product->image}}" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                        <div class="products-columns__item__description"><span class="products-price">{{$product->price}} руб</span><a href="#" class="btn btn-blue">Купить</a></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

