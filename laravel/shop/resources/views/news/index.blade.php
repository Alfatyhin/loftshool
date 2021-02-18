@extends('layouts.master')

@section('title', 'Page Title')

@section('style')
    <style>
        .page_active_{{$pageActiv}} a {
            color: brown;
        }
        .category_{{$categoryId}} a {
            color: brown;
        }
        .news-content {
            white-space: pre-line;
            max-height: 200px;
            overflow: hidden;
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
    <div class="content-main__container">
        <div class="news-list__container">

            @foreach($content as $item)

            <div class="news-list__item">
                <div class="news-list__item__thumbnail">
                    <img src="{{$item->image}}">
                </div>
                <div class="news-list__item__content">


                    <div class="news-list__item__content__news-title">{{$item->name}}</div>
                    <div class="news-list__item__content__news-date">{{$item->created_at}}</div>
                    <div class="news-list__item__content__news-content news-content">
                       {{$item->description}}
                    </div>
                </div>
                <div class="news-list__item__content__news-btn-wrap">
                    <a href="{{ route( 'news.once', [ 'news' => $item ]) }}" class="btn btn-brown">Подробнее</a>
                </div>
            </div>

            @endforeach

        </div>
    </div>
    <div class="content-footer__container">
        <ul class="page-nav">
            <li class="page-nav__item"><a href="{{route('news.index', ['page' => 1, 'categoryName' => $categoryName, 'categoryId' => $categoryId])}}" class="page-nav__item__link"><i class="fa fa-angle-double-left"></i></a></li>

            @for($x = $pageStart; $x <= $pageEnd; $x++)

                <li class="page-nav__item page_active_{{$x}}"><a href="{{route('news.index', ['page' => $x, 'categoryName' => $categoryName, 'categoryId' => $categoryId])}}" class="page-nav__item__link">{{$x}}</a></li>
            @endfor

            <li class="page-nav__item"><a href="{{route('news.index', ['page' => $pageNext, 'categoryName' => $categoryName, 'categoryId' => $categoryId])}}" class="page-nav__item__link"><i class="fa fa-angle-double-right"></i></a></li>
        </ul>
    </div>
@endsection
