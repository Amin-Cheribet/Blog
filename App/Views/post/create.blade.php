@extends('template/admin')

@section('head')
    <title>Create Post</title>
@endsection

@section('body')
    <form class="create-post" action="#" method="post">
        <table>
            <tr>
                <td><label for="1">Title:</label></td>
                <td><input type="text" name="title" placeholder="Post Title"></td>
            </tr>
            <tr>
                <td><label for="2">Sub Title:</label></td>
                <td><input type="text" name="subtitle" placeholder="Sub Title"></td>
            </tr>
            <tr>
                <td><label for="3">Language:</label></td>
                <td><input type="text" name="language" placeholder="example: en (or) fr"></td>
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
                <td colspan="2"><textarea name="post" placeholder="Write something good"></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Create Post"></td>
            </tr>
        </table>
    </form>

@endsection
