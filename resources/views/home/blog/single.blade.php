@extends('layout')
  @section('title', 'Single страница')
@section('content')
<h1>Single page</h1>

<h2>{{$posts->title}}</h2>
<h3>tags ->{{$posts->tags}}</h3>
<h4>category -> {{$posts->category_id}}</h4>
<img src="/storage/uploadsimg/{{ $posts->image }}" alt="" width="300"><br>
{!!$posts->content!!}

<div class="line"></div>
<h1>user comment</h1>
<ol>
<?php if (!$posts->comments->isEmpty()): ?>
	@foreach ($posts->comments as $comment) <!--esi vor ashxati model posti mej kpcreles comment table@ vor -->
		<li class="post">
			<p>{{ $comment->text }}</p>
			<b>{{ $comment->users->name }}</b><!--esi vor ashxati modeli mej comment kpcreles users tabl@-->
		</li>
	@endforeach	
<?php else: ?>
	<li class="post">
		<p>нет комментарии к этои записи</p>
	</li>
<?php endif ?>
</ol>


<div class="line"></div>
<h1>send comment</h1>
 @include('admin.errors.index')
<form action="/comment" method="POST">
	{{ csrf_field() }}
	<input type="hidden" name="post_id" value="{{ $posts->id }}">
	<div><textarea name="commenttext" placeholder="commenttext" cols="60" rows="10" class="{{ $errors->has('commenttext') ? 'error' : ''}}"></textarea></div>
	<div><button>create project</button></div>
</form>

@endsection