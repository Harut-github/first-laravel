@extends('layout')
  @section('title', 'Search страница')
@section('content')
<h1>Search page</h1>

@foreach($posts as $post)
    <a href="/blog/{{ $post->slug }}" class="post">
        <div>
            <b>{{ $post->title }}</b><br>
            <p>{!! $post->content !!}</p>
        </div>
        <div class="post_img">
            <img src="/storage/uploadsimg/{{ $post->image }}" alt="">
        </div>
        <div>
            Category -> {{ $post->category_id }}
        </div>
        <div>
            Tag -> {{ $post->tags }}
        </div>
        <div>
            {{ $post->date }}
        </div>
    </a>    
@endforeach

@endsection


