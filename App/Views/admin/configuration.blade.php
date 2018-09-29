@extends('template/admin')

@section('head')
    <title>posts List</title>
@endsection

@section('body')
    <form class="configuration-form" action="{{url('admin/configuration')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        @if (!empty($errors))
            <ul class="errors">
                @foreach ($errors as $error)
                    <li>- {{$error}}</li>
                @endforeach
            </ul>
        @endif
        <table>
            <tr>
                <td><label for="">Blog Name :</label></td>
                <td><input type="text" name='name' placeholder='Blog Name' value='{{$data->name}}'></td>
            </tr>
            <tr>
                <td><label for="">Lanuages : </label></td>
                <td><input type="text" name="languages" placeholder="Example: en fr ar (leave spaces)" value="{{$data->languages}}"></td>
            </tr>
            <tr>
                <td><label for="">Allow Comments :</label></td>
                <td>
                    <input type="radio" name="comments" value="1" @if($data->comments === '1') checked @endif>Yes
                    <input type="radio" name="comments" value="0" @if($data->comments === '0') checked @endif>No
                </td>
            </tr>
            <tr>
                <td><label for="">Show Visits :</label></td>
                <td>
                    <input type="radio" name="visits" value="1" @if($data->visits === '1') checked @endif>Yes
                    <input type="radio" name="visits" value="0" @if($data->visits === '0') checked @endif>No
                </td>
            </tr>
            <tr>
                <td><label for="">Cover Image :</label></td>
                <td><input type="file" name="coverimage[]"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="update"></td>
            </tr>

        </table>
    </form>
@endsection
