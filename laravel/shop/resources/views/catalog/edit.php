@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">edit single product</div>
                <form action="{{route('single.edit', ['product' => $product])}}" method="post">
                    @csrf
                    <div class="table table-bordered">
                        <h3>{{$product->name}}</h3>

                        <p> <span>name:</span> <br>
                            <input type="text" name="name" value="{{$product->name}}">
                            @if ($errors->has('name'))
                        <div class="alert alert-danger">{{$errors->first('name')}}</div>
                        @endif
                        </p>

                        <p> <span>dascription:</span> <br>
                            <input type="text" name="name" value="{{$product->description}}">
                            @if ($errors->has('name'))
                        <div class="alert alert-danger">{{$errors->first('name')}}</div>
                        @endif
                        </p>

                        <p> <span>price:</span><br>
                            <input type="text" name="price" value="{{$product->price}}">
                            @if ($errors->has('price'))
                        <div class="alert alert-danger">{{$errors->first('price')}}</div>
                        @endif
                        </p>

                    </div>
                    <input type="submit" value="сохранить">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
