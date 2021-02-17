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
        a.button {
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
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="panel panel-default">list product</h1>

                <a class="button" href="{{route('admins.add')}}" >add product</a>
                <a class="button" href="{{route('admins.category')}}" >edit category</a>
                    <table >
                        <tr>
                            <th>image</th>
                            <th class="name">name</th>
                            <th>category</th>
                            <th>description</th>
                            <th>price</th>
                            <th></th>
                        </tr>
                    @foreach($catalog as $item)
                        <tr>
                            <td>
                                <img src="{{$item->image}}" />
                            </td>
                            <td>
                                {{$item->name}}
                            </td>
                            <td>
                                {{$category[$item->category]['name']}}
                            </td>
                            <td>
                                {{$item->description}}
                            </td>
                            <td>
                                {{$item->price}}
                            </td>
                            <td>
                                <a class="button" href="{{route('admins.edit', ['product' => $item])}}" >edit</a>
                            </td>
                        </tr>

                    @endforeach
                    </table>
                    {{$catalog->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
