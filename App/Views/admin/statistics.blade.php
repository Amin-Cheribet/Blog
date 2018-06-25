@extends('template/admin')

@section('head')
    <title>Blog Stats</title>
@endsection

@section('body')
    Total Hits : {{$hits}}
    <br>
    Total Unique visits : {{$unique}}
@endsection
