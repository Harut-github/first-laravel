@extends('layout')
  @section('title', 'Shop страница')
@section('content')
<h1>Shop page</h1>
<section id="products">
    @foreach ($products->reverse() as $product)
    <div class="product">
        <a href="/shop/{{ $product->slug }}" >  
            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:200px;" align="center">
                <img width="50px" src="/storage/uploadsimg/{{ $product->image }}" class="img-responsive" /><br />
                <h4 class="text-info">{{ $product->title }}</h4>
                <h4 class="text-danger">{{ $product->price }}$</h4>
                <div class="text-danger">{!! $product->description !!}</div><br>
                <input type="text" name="quantity" id="quantity{{ $product->id }}" class="form-control" value="1" />
                <input type="hidden" name="hidden_name" id="name{{ $product->id }}" value="{{ $product->title }}" />
                <input type="hidden" name="hidden_price" id="price{{ $product->id }}" value="{{ $product->price }}" /> 
            </div>
        </a>
        <?php if ( Auth::check() ): ?>
            
        <input type="button" name="add_to_cart" id="{{ $product->id }}" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart" />

        <?php else: ?>
         <button>если хотите купить товар нужна зарегистрироваться</button>
        <?php endif ?>
        
    </div>
              
    @endforeach 
</section>
@endsection
