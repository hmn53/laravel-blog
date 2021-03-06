@extends('layouts.app')

@section('content')
<header class="masthead" style="background-image: url(&quot;{{asset('img/index-bg.jpg')}}&quot;);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto">
                <div class="site-heading">
                    <h1>Technology Blog</h1><span class="subheading"></span></div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    @include('includes.messages')
        
    <div class="row">
        <div class="col-md-10 col-lg-8">
            @if (count($blogs)>0)
            @foreach ($blogs->all() as $blog)
                <div class="post-preview">
                    <a href="/show/{{$blog['id']}}">
                        <h2 class="post-title">{{$blog['title']}}</h2>
                        <h3 class="post-subtitle">{{$blog['subtitle']}}</h3>
                    </a>
                    <p class="post-meta">Posted by&nbsp;<a href="/user/{{$blog->user_id}}">{{$blog['user_name']}}</a> on {{$blog['created_at']->format('d M Y H:i')}}</p>
                </div>
                <hr>
            @endforeach

            @else
                <h2 class="post-title">No Blogs Found! </h2>
            @endif
            
        </div>
    </div>
</div>

@endsection
