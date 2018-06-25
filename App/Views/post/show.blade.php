@extends('template/main')

@section('head')
    <link rel="stylesheet" href="/css/post.css">
    <script type="text/javascript" src="/js/post.js"></script>
    <title>Blog!</title>
@endsection

@section('body')
    <div class='head-container'>
        <div class='cover-img'>
            <div class="cover-img" style="background-image: url('{{url($post->path)}}')"></div>
            <div class="highlight"></div>
        </div>
    </div>
    <div class="content">
        <div class="title-container">
            <div class="title">
                {{$post->title}}
            </div>
            <div class="description">
                {{$post->description}}
            </div>
        </div>
        <div class="post-container">
            <div class="post">
                {{$post->post}}
            </div>
            <div class="comments">
                @foreach ($comments as $comment)
                    <div class="comment">
                        <div class="username-container">
                            {{$comment->name}}
                        </div>
                        <div class="comment-text">
                            {{$comment->comment}}
                        </div>
                    </div>
                @endforeach
            </div>
            @if (Authenticator\Auth::check())
                <div class="comment-form">
                    <div class="comment-error-box"></div>
                    <form method="post" id='comment-form'>
                        <input type="hidden" name="post" value="{{$post->postgroup}}">
                        {{csrf_field()}}
                        <table>
                            <tr>
                                <td>
                                    <textarea name="comment" rows="7"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" value="Comment">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection
