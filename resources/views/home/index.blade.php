@extends('layout')
  @section('title', 'home страница')
@section('content')
<h1>Home page</h1>

<div class="line"></div>

<form action="/search" method="GET" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="search"
            placeholder="Search users"> <span class="input-group-btn">
            <button type="submit"> search</button>
        </span>
    </div>
</form>

<div class="line"></div>
<div>
	<div>
		<h2>Рекомендовать (is featured)</h2>
	</div>
	<div>
		@foreach ($posts as $post)
			<?php if ( $post->is_featured == 1): ?>
				<a href="/blog/{{ $post->slug }}" class="post">
					<div>
						<b>{{ $post->title }}</b><br>		
					</div>	
					<div class="post_img">
						<img src="/storage/uploadsimg/{{ $post->image }}" alt="">
					</div>				
				</a>
			<?php endif ?>
		@endforeach
	</div>
</div>
<div class="line"></div>
	<h2>Products</h2>

<section id="products">
    @foreach ($products as $product)
        <a href="javascript:;" class="product">  
            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:200px;" align="center">
                <img width="50px" src="/storage/uploadsimg/{{ $product->image }}" class="img-responsive" /><br />
                <h4 class="text-info">{{ $product->title }}</h4>
                <h4 class="text-danger">{{ $product->price }}$</h4>
                <div class="text-danger">{!! $product->description !!}</div>

                <input type="text" name="quantity" id="quantity{{ $product->id }}" class="form-control" value="1" />

                <input type="hidden" name="hidden_name" id="name{{ $product->id }}" value="{{ $product->title }}" />
                <input type="hidden" name="hidden_price" id="price{{ $product->id }}" value="{{ $product->price }}" />

                <br>
                <input type="button" name="add_to_cart" id="{{ $product->id }}" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart" />
            </div>
        </a>        
    @endforeach 
</section>

@endsection
