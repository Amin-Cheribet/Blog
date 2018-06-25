
@foreach ($posts as $post)
    <a href="{{url("post/$post->postgroup")}}">
        <div class="post-container">
            <div class="post">
                <div class="img-container"><img src="{{url($post->path)}}" alt="desc"></im></div>
                <div class="title">{{$post->title}}</div>
                <div class="post-description">
                    {{$post->description}}
                </div>
            </div>
        </div>
    </a>
@endforeach
