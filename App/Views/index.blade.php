@extends('template/main')

@section('head')
    <link rel="stylesheet" href="/css/index.css">
    <script src="/js/index.js"></script>
    <title>Blog!</title>
@endsection

@section('body')
    <div class='head-container'>
        <div class='cover-img' style="background-image: url('{{container()->Configuration::$configuration->coverImage}}')">
            <div class="description">
                <h1 class="title">My description title</h1>
                <h4 class="sub-title">sub description title fsldkj lkgd mùdlsfkg mlsdkg </h4>
            </div>
        </div>
    </div>
    <div class="content grid">
        <div class="arrow-container">
            <div class="arrow arrow-up"></div>
        </div>
        <div class="assort-list">
            <ul>
                <li><a href='#'>Most recent</a></li>
                <li><a href='#'>Popular</a></li>
                <li><a href='#'>Categories</a></li>
            </ul>
        </div>
    </div>
@endsection
