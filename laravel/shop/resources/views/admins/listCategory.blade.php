@extends('layouts.app')
@section('css')
    <style>
        table img {
            height: 50px;
        }
        table {
            background: #1A202C;
            margin-bottom: 40px;
            width: 100%;
            border: 2px solid;
        }
        th {
            background: #aaaaaa;
        }
        th.name {
            width: 200px;
        }
        td {
            background: #ffffff;
        }
        .button {
            display: inline-block;
            padding: 2px 10px;
            background: #819ace;
            color: #101010;
            text-shadow: 0px 0px 3px #ffffff;
            text-decoration: none;
            margin: 10px;
            box-shadow: 3px 3px 5px #000000;
            border-radius: 4px;
            border: 2px solid #1087ab;
        }
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
                <h1 class="panel panel-default">list category</h1>

                <table >
                    <tr>
                        <th class="name">name</th>
                        <th>description</th>
                    </tr>
                    @foreach($category as $item)
                        <tr>
                            <td colspan="2">
                                <form action="{{route('admins.categoryEdit', ['category' => $item])}}" method="post" >
                                    @csrf
                                    <p>
                                        <span>name:</span>
                                        <input type="text" name="name" value="{{$item->name}}" />
                                    @if ($errors->has('name'))
                                        <div class="alert alert-danger" >{{$errors->first('name')}}</div>
                                        @endif

                                         <span>description:</span>
                                            <textarea name="description" >{{$item->description}}</textarea>
                                        @if ($errors->has('description'))
                                            <div class="alert alert-danger">{{$errors->first('description')}}</div>
                                            @endif
                                            </p>


                                        <a href="{{route('admins.categoryDelete', ['category' => $item])}}" class="button">
                                            delete
                                        </a>
                                        <input type="submit" class="button" value="save" />

                                </form>

                            </td>
                        </tr>

                    @endforeach

                </table>
                {{$category->links()}}

                <form action="{{route('admins.categoryNew')}}" method="post" >
                    @csrf
                    <h3>add category</h3>
                    <p>
                        <span>name:</span> <br>
                        <input type="text" name="name" value="" />
                    @if ($errors->has('name'))
                        <div class="alert alert-danger" >{{$errors->first('name')}}</div>
                        @endif
                    </p>

                    <p> <span>description:</span> <br>
                        <textarea name="description" ></textarea>
                        @if ($errors->has('description'))
                            <div class="alert alert-danger">{{$errors->first('description')}}</div>
                            @endif
                    </p>

                            <input type="submit" class="button" value="add category" />
                </form>

            </div>
        </div>
    </div>
    </div>
@endsection
