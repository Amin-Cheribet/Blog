@extends('template/admin')

@section('head')
    <title>Edit Post</title>
@endsection

@section('body')
    <form class="create-post" action="{{url('post/'.$id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PUT')}}
        @if (isset($errors))
        <ul class='errors'>
            @foreach ($errors as $error)
                <li>- {{$error}}</li>
            @endforeach
        </ul>
        @endif
        <table>
            <tr>
                <td><label for="1">Title:</label></td>
                <td><input type="text" name="title" placeholder="Post Title" value="{{$post->title}}"></td>
            </tr>
            <tr>
                <td><label for="2">Description:</label></td>
                <td><input type="text" name="description" placeholder="Sub Title" value="{{$post->description}}"></td>
            </tr>
            <tr>
                <td><label for="3">Language:</label></td>
                <td><input type="text" name="language" placeholder="example: en (or) fr" value="{{$post->language}}"></td>
            </tr>
            <tr>
                <td><label for="4">Cover image</label></td>
                <td><input type="file" name="cover-image[]"></td>
            </tr>
            <tr>
                <td><label for="5">Grid image</label></td>
                <td><input type="file" name="grid-image[]"></td>
            </tr>
            <tr>
                <td colspan="2"><textarea name="post" placeholder="Write something good">{{$post->post}}</textarea></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Update"></td>
            </tr>
        </table>
    </form>

@endsection
