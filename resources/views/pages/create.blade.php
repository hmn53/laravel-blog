@extends('layouts.app')

@section('content')
<header class="masthead" style="background-image: url(&quot;{{asset('img/create-bg.jpg')}}&quot;);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto">
                <div class="site-heading">
                    <h1>Create Blog</h1></div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    @include('includes.messages')
    
    <form  method="POST" action="/store" >
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
          </div>
          <div class="form-group">
            <label for="subtitle">Sub-title</label>
            <input type="text" class="form-control" id="subtitle"name="subtitle" placeholder="Sub-title">
          </div>
          <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" name="body" rows="4"></textarea>
            <script>
                CKEDITOR.replace( 'body' );
            </script>
          </div>
          <button type="submit" name="submit"class="btn btn-primary">Submit</button>
    </form>
    
</div>

@endsection
