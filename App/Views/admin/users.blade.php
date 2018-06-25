@extends('template/admin')

@section('head')
    <title>posts List</title>
@endsection

@section('body')
    <table class="list">
        @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                @if ($user->banned === '0')
                    <td><a class="red-button" href="{{url("user/block/$user->id")}}">Block</a></td>
                @else
                    <td><a class="green-button" href="{{url("user/unblock/$user->id")}}">Un-block</a></td>
                @endif
                    <td><a class="red-button" href="{{url("user/delete/$user->id")}}">Delete</a></td>
            </tr>
        @endforeach
    </table>
@endsection
