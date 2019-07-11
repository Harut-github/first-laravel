@extends('layout')
  @section('title', 'Cart страница')
@section('content')
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> <!--uxaki styli hamra karas jnjes-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"><!--uxaki styli hamra karas jnjes-->
<h1>Cart page</h1>

<div class="container">
	<div id="popover_content_wrapper" >
		<span id="cart_details"></span>
		<div align="right">
			<a href="#" class="btn btn-primary" id="check_out_cart">
				<span class="glyphicon glyphicon-shopping-cart"></span> Check out
			</a>
			<a href="#" class="btn btn-default" id="clear_cart">
				<span class="glyphicon glyphicon-trash"></span> Clear
			</a>
		</div>
	</div>
</div>
@endsection