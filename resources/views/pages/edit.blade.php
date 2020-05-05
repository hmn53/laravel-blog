@extends('layouts.app')

@section('content')
<header class="masthead" style="background-image: url(&quot;{{asset('img/create-bg.jpg')}}&quot;);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto">
                <div class="site-heading">
                    <h1>Edit Blog</h1></div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    @include('includes.messages')
    
    {{-- <form method="POST" action="[PagesController@update,$blog->id]">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$blog->title}}" placeholder="Title">
          </div>
          <div class="form-group">
            <label for="subtitle">Sub-title</label>
            <input type="text" class="form-control" id="subtitle"name="subtitle" value="{{$blog->subtitle}}" placeholder="Sub-title">
          </div>
          <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" name="body" rows="4">{{$blog->body}}"</textarea>
            <script>
                CKEDITOR.replace( 'body' );
            </script>
          </div>
          <button type="submit" name="submit"class="btn btn-primary">Submit</button>
    </form> --}}
    {!! Form::open(['action'=>['PagesController@update',$blog->id],'method'=>'POST']) !!}
        <div class="form-group">
            {!! Form::label('title','Title') !!}
            {!! Form::text('title', $blog->title, ['class'=>'form-control','placeholder'=>'Title']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('subtitle','Sub-title') !!}
            {!! Form::text('subtitle', $blog->subtitle, ['class'=>'form-control','placeholder'=>'Sub-title']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('body','Body') !!}
            {!! Form::textarea('body', $blog->body, ['class'=>'form-control','id'=>'body']) !!}
            <script>
                CKEDITOR.replace( 'body' );
            </script>
        </div>
        {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
    
</div>

@endsection
