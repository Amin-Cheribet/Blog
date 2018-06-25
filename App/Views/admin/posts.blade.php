@extends('template/admin')

@section('head')
    <title>posts List</title>
@endsection

@section('body')
    <table class="list">
        @foreach ($posts as $post)
            <tr>
                <td>
                    {{$post->title}}
                </td>
                <td>
                    <a class="green-button" href="{{url("post/$post->id")}}">Show</a>
                </td>
                <td>
                    <a class="green-button" href="{{url("post/$post->id/edit")}}">Edit</a>
                </td>
                <td>
                    <a class="green-button" href="{{url("post/translate/$post->postgroup")}}">Translate</a>
                </td>
                <td>
                    <a class="red-button" href="{{url("post/delete/$post->id")}}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
