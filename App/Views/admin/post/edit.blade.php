@extends('template/admin')

@section('head')
    <title>Edit Post</title>
@endsection

@section('body')
    @include('post/edit', ['data' => $data])
@endsection
