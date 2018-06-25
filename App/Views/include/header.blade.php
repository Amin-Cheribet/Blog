@php
    $languages = explode(' ',container()->Configuration::$configuration->languages);
@endphp

<div class="header transparent-header">
    <div class="logo"><a href="{{url('/')}}">The Alien</a></div>

    @if (Authenticator\Auth::check())
        <div class="elements disconnect"><a href="{{url('user/disconnect')}}"><div>Disconnect</div></a></div>
        <div class="elements"><a href="{{url('user/'.Authenticator\Auth::user()->id.'/edit')}}"><div>Edit Profile</div></a></div>
    @else
        <div class="elements login-button" id="login"><a><div>Log in / Subscribe</div></a></div>
    @endif

    <div class="elements language">
        <div>Language</div>
        <div class="languages">
            <ul>
                @foreach ($languages as $language)
                    <a href="{{url('language/'.$language)}}"><li>{{$language}}</li></a>
                @endforeach
            </ul>
        </div>
    </div>

    @if (Authenticator\Auth::check(['auth' => 2]))
        <div class="elements"><a href="{{url('admin')}}"><div>Admin</div></a></div>
    @endif
    @include('include/login-form')
</div>
