@extends('layouts.app')
@section('css')
    <style>
        textarea {
            max-width: 800px;
            width: 60%;
            height: 170px;
        }
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">edit single product</div>
                <form enctype="multipart/form-data" action="{{route('admins.save', ['product' => $product])}}" method="post">
                    @csrf
                    <div class="table table-bordered">
                        <h3>{{$product->name}}</h3>

                        <p>
                            <span>image:</span> <br>
                            <img height="100px" src="{{$product->image}}" /> <br>
                            <input type="file" name="image" />

                        </p>


                        <p>
                            <span>name:</span> <br>
                            <input type="text" name="name" value="{{$product->name}}" />
                            @if ($errors->has('name'))
                             <div class="alert alert-danger">{{$errors->first('name')}}</div>
                            @endif
                        </p>


                        <p>
                            <span>category:</span> <br>
                            <select name="category" >
                                @foreach($category as $item)
                                    @if($product->category == $item->id)
                                        <option value="{{$item->id}}" selected>{{$item->id}} {{$item->name}}</option>
                                    @else
                                         <option value="{{$item->id}}">{{$item->id}} {{$item->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('category'))
                             <div class="alert alert-danger">{{$errors->first('category')}}</div>
                            @endif
                        </p>

                        <p>
                            <span>description:</span> <br>
                            <textarea name="description" >{{$product->description}}</textarea>
                            @if ($errors->has('description'))
                             <div class="alert alert-danger">{{$errors->first('description')}}</div>
                            @endif
                        </p>


                         <p>
                             <span>price:</span><br>
                             <input type="text" name="price" value="{{$product->price}}">
                            @if ($errors->has('price'))
                                <div class="alert alert-danger"> {{$errors->first('price')}} </div>
                            @endif
                         </p>

                    </div>
                    <input type="submit" name="save" value="сохранить">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
