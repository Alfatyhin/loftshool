@extends('layouts.master')

@section('title', 'Page Title')

@section('style')
    <style>
        input {
            border: 1px solid #1A202C;
        }
    </style>
@endsection
@section('sidebar')
    @parent

@endsection

@section('content-title')
    <div class="content-head__title-wrap">
        <div class="content-head__title-wrap__title bcg-title">Мои заказы</div>
    </div>
@endsection

@section('content')
    <div class="cart-product-list" >


        @foreach($content as $data => $items)

            @foreach($items as $item)
            <div class="cart-product-list__item">
                <div class="cart-product__item__product-photo"><img src="{{$item->image}}" class="cart-product__item__product-photo__image"></div>
                <div class="cart-product__item__product-name">
                    <div class="cart-product__item__product-name__content"><a href="#">{{$item->name}}</a></div>
                </div>
                <div class="cart-product__item__cart-date">
                    <div class="cart-product__item__cart-date__content">{{$data}}</div>
                </div>
                <div class="cart-product__item__product-price" ><span class="product-price__value">{{$item->price}}</span></div>
            </div>

            @endforeach
        @endforeach


    </div>

    <div class="content-footer__container">

    </div>

@endsection


