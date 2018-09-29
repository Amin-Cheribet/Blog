@extends('template/main')

@section('head')
    <link rel="stylesheet" href="/css/index.css">
    <script src="/js/index.js"></script>
    <title>{{container()->Configuration::$configuration->name}}</title>
@endsection

@section('body')
    <div class='head-container'>
        <div class='cover-img' style="background-image: url('{{container()->Configuration::$configuration->coverImage}}')">
        </div>
    </div>
    <div class="content grid">
        <div class="arrow-container">
            <div class="arrow arrow-up"></div>
        </div>
        <div class="content-title">
            <h1 class="title">{{container()->Configuration::$configuration->name}}</h1>
        </div>
    </div>
@endsection
