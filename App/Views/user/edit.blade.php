@extends('template/main')

@section('head')
    <title>Edit Account</title>
    <link rel="stylesheet" href="/css/user.css">
@endsection

@section('body')
    <form action="{{url("user/$data->id")}}" method="post">

        {{method_field('PUT')}}
        {{csrf_field()}}
        @if (isset($errors))
        <ul class='errors'>
            @foreach ($errors as $error)
                <li> {{$error}}</li>
            @endforeach
        </ul>
        @endif
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
                <td><input type="password" name="password" placeholder="Password"></td>
            </tr>
            <tr>
                <td><label for="4">Confirm password :</label></td>
                <td><input type="password" name="password2" placeholder="Confirm Your password">
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Edit"></td>
            </tr>
        </table>
    </form>
@endsection
