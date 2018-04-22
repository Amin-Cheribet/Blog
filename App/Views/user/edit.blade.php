@extends('template/main')

@section('head')
    <title>Edit Account</title>
    <link rel="stylesheet" href="/css/user.css">
@endsection

@section('body')
    <form action="index.html" method="post">
        <table>
            <tr>
                <td><label for="1">Name : </label></td>
                <td><input type="text" name="name" value="{{$data->name}}"></td>
            </tr>
            <tr>
                <td><label for="2">E-mail :</label></td>
                <td><input type="text" name="email" value="{{$data->email}}"></td>
            </tr>
            <tr>
                <td><label for="3">Password :</label></td>
                <td><input type="password" name="password" value="{{$data->password}}"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Edit"></td>
            </tr>
        </table>
    </form>
@endsection
