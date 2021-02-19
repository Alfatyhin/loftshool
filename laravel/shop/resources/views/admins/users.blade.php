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
                <h1 class="panel panel-default">list users</h1>

                <a class="button" href="{{route('admins.add')}}" >add product</a>
                <a class="button" href="{{route('admins.category')}}" >edit category</a>
                <a class="button" href="{{route('admins.orders')}}" >orders</a>
                <a class="button" href="{{route('admins.list')}}" >products</a>
                <table >
                    <tr>
                        <th>id</th>
                        <th class="name">name</th>
                        <th>email</th>
                        <th>role</th>
                    </tr>
                    @foreach($users as $item)
                        <tr>
                            <td>
                                {{$item->id}}
                            </td>
                            <td>
                                {{$item->name}}
                            </td>
                            <td>
                                {{$item->email}}
                            </td>
                            <td>
                                @if($item->role != 1)
                                    <a class="button" href="{{route('admins.role.add', ['user' => $item])}}" >сделать админом</a>
                                @else
                                    <a class="button" href="{{route('admins.role.delete', ['user' => $item])}}" >удалить админ права</a>
                                @endif
                            </td>
                        </tr>

                    @endforeach
                </table>
                {{$users->links()}}
            </div>
        </div>
    </div>
    </div>
@endsection

