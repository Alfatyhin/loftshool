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
        <div class="content-head__title-wrap__title bcg-title">{{$message}}</div>
    </div>
@endsection

@section('content')


@endsection


