@extends('layout')
  @section('title', 'Single страница')
@section('content')
	<h1>Single page shop</h1>
	<h4 class="text-info">{{ $products->title }}</h4>
	<h4 class="text-danger">{{ $products->price }}$</h4>
	<div class="text-danger">{!! $products->description !!}</div>
	<img width="50px" src="/storage/uploadsimg/{{ $products->image }}" class="img-responsive" /><br />
	<div class="text-danger">{!! $products->content !!}</div>
@endsection