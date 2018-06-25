@extends('template/admin')

@section('head')
    <title>Translate Post</title>
@endsection

@section('body')
    <form class="create-post" action="{{url('post/translate/'.$groupid)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        @if (isset($errors))
        <ul class='errors'>
            @foreach ($errors as $error)
                <li>- {{$error}}</li>
            @endforeach
        </ul>
        @endif
        <table>
            <input type="hidden" name="coverimage" value="{{$original->coverimage}}">
            <input type="hidden" name="gridimage" value="{{$original->gridimage}}">
            <tr>
                <td><label for="1">Title:</label></td>
                <td><input type="text" name="title" placeholder="Post Title"></td>
            </tr>
            <tr>
                <td><label for="2">Sub Title:</label></td>
                <td><input type="text" name="description" placeholder="Sub Title"></td>
            </tr>
            <tr>
                <td><label for="3">Language:</label></td>
                <td><input type="text" name="language" placeholder="example: english"></td>
            </tr>
            <tr>
                <td colspan="2"><textarea name="post" placeholder="Write something good"></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Translate Post"></td>
            </tr>
        </table>
    </form>

@endsection
