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
    <div class="cart-product-list"  data="{{$allprice = 0}}">


        @foreach($content as $item)

        <div class="cart-product-list__item">
            <div class="cart-product__item__product-photo"><img src="{{$item->image}}" class="cart-product__item__product-photo__image"></div>
            <div class="cart-product__item__product-name">
                <div class="cart-product__item__product-name__content"><a href="#">{{$item->name}}</a></div>
            </div>
            <div class="cart-product__item__cart-date">
                <div class="cart-product__item__cart-date__content">{{$item->date}}</div>
            </div>
            <div class="cart-product__item__product-price"  data="{{$allprice = $allprice +$item->price}}" ><span class="product-price__value">{{$item->price}}</span></div>
        </div>


        @endforeach

        <div class="cart-product-list__result-item">
            <div class="cart-product-list__result-item__text">Итого</div>
            <div class="cart-product-list__result-item__value">{{$allprice}}</div>
        </div>
    </div>

    <div class="content-footer__container">
        <form action="{{route('order.save')}}" method="post" >
            <table>
                <tr>
                    <td>
                        @csrf
                        Имя:
                        <input type="text" name="name" />
                        @if ($errors->has('name'))
                            <div class="alert alert-danger">{{$errors->first('name')}}</div>
                        @endif
                    </td>
                    <td>
                        Email:
                        <input type="text" name="email" value="{{$userMail}}"/>
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">{{$errors->first('email')}}</div>
                        @endif
                    </td>
                </tr>
            </table>

            <div class="btn-buy-wrap">
                <button class="btn-buy-wrap__btn-link">Оформить заказ</button>
            </div>
        </form>
    </div>

@endsection

