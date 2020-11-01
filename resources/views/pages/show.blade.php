@extends('layouts.app')

@section('content')
<header class="masthead" style="background-image:url('{{asset('img/show-bg.jpg')}}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-10 mx-auto">
                <div class="post-heading text-center">
                    <h1>{{$blog['title']}}</h1>
                    <h2 class="subheading">{{$blog['subtitle']}}</h2><span class="meta">Posted by&nbsp;<a href="#">{{$blog['user_name']}}</a>&nbsp;on {{$blog['created_at']->format('d M Y')}}</span></div>
            </div>
        </div>
    </div>
</header>
<article>
    <div class="container">
        @include('includes.messages')
        <div class="row">
            <div class="col-md-10 col-lg-10  mx-auto" style="text-align:justify;">
               {!!$blog['body']!!}
               <hr>
               @if (Auth::id() == $blog->user_id || $is_admin)
                   <a href="/edit/{{$blog['id']}}"><button class="btn btn-primary">Edit</button></a>
                    {!! Form::open(['action'=>['PagesController@delete',$blog->id],'method'=>'POST','class'=>'pull-right']) !!}
                    {{-- {!! Form::hidden('_method', 'DELETE') !!}      --}}
                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
               @endif
               
            </div>
            
        </div>
       
    </div>
        
</article>

@endsection
