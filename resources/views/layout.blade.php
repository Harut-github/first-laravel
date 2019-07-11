<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 <title>@yield('title','Home view')</title>
	 <style>
		 *{
		 	margin:0;
		 	padding: 0;
		 }
		 footer{
		 	display: flex;
		 	text-align: center;
   	 		justify-content: center;
		 }
		 header{
		 	position: fixed;
		 	width: 100%;
		 }
		 .contents{
		 	padding-top:50px;
		 }
	 	header nav ul, footer{
	 		background:#f1f1f1;
			height: 50px;
	 		display: flex;
	 		list-style: none;
	 		justify-content: center;
	 		align-items: center;
	 	}
	 	header nav ul li{
	 		margin-right:15px;
	 	}
	 	#products{
	 		display: flex;
	 		justify-content: center;
	 		align-items: center;
	 	}
	 	.product{
	 		width: 25%;
	 		text-decoration: none;
	 	}
	 	.add_to_cart{
	 		width: 100%;
	 		height: 40px;
	 		background: #f8c3c3;
	 		color: #fff;
	 	}
	 	.post{
	 		display: block;
	 		text-decoration: none;
	 		margin:0 auto;
	 		max-width: 768px;
	 		width:100%;
	 		min-height: 100px;
	 		box-shadow: 0 0 15px -4px rgba(0,0,0,0.5);
	 		margin-top:15px;
	 		margin-bottom:30px;
	 		padding:15px;
	 		color: #333;
	 	}
	 	.post:hover{
	 		transform: translateY(-5px);
	 	}
	 	.post b{
	 		font-size: 24px;
	 		color: black;
	 		font-weight: 900;
	 	}
	 	.post p{
			color: #333;
			margin-top:15px;
	 	}
	 	.post_img{
	 		width:50px;
	 	}
	 	img{
	 		max-width: 100%;
	 	}
	 	h2{
	 		text-align: center;
	 	}
	 	.line{
	 		width:100%;
	 		background:black;
	 		height: 5px;
	 	}
	 	.search_post{
	 		display: block;
	 		border:solid 2px red;
	 		margin-top:5px;
	 	}
	 	.pagination{
	 		display: flex;
	 		justify-content: center;
	 		font-size: 24px;
	 	}
	 	table{
	 		width:50%;
	 		margin:0 auto;
	 	}
	 	ul{
	 		list-style: none;
	 	}
	 	tr{
	 		border:solid 1px;
	 	}
	 	.tr_cart:nth-child(even){
			background: #f3e5e5;
	 	}
	 </style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   
</head>
<body>
	<header>
		<nav>
			<ul>
				<li><a href="/">Home</a></li>
				<li><a href="/blog">Blog</a></li>
				<li><a href="/shop">Shop</a></li>
				<li><a href="/cart">Cart</a></li>
            	<li><a href="/cabinet">My Cabinet </a></li>

				<li>
					<a id="cart-popover" class="btn" data-placement="bottom" title="Shopping Cart">
						<span class="glyphicon glyphicon-shopping-cart"></span>
						<span class="badge"></span>
						<span class="total_price">$ 0.00</span>
					</a>
				</li>

					<!-- login - registracia -->
				  	@guest
	                    <li class="nav-item">
	                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
	                    </li>
	                    @if (Route::has('register'))
	                        <li class="nav-item">
	                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
	                        </li>
	                    @endif
	                @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
					<!-- end login - registracia -->
					
			</ul>
		</nav>
	</header>
	<div class="contents">
		@yield('content')
	</div>

	<footer>
		<p>footer <?php echo date('Y'); ?></p>
	</footer>



	
<script>  
$(document).ready(function(){

	load_cart_data();
    

	function load_cart_data()
	{
		$.ajax({
			url:"/js/fetch_cart.php",
			method:"POST",
			dataType:"json",
			success:function(data)
			{
				$('#cart_details').html(data.cart_details);
				$('.total_price').text(data.total_price);
				$('.badge').text(data.total_item);
			}
		});
	}

	

	$(document).on('click', '.add_to_cart', function(){
		var product_id = $(this).attr("id");
		var product_name = $('#name'+product_id+'').val();
		var product_price = $('#price'+product_id+'').val();
		var product_quantity = $('#quantity'+product_id).val();
		var action = "add";
		if(product_quantity > 0)
		{
			$.ajax({
				url:"js/action.php",
				method:"POST",
				data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
				success:function(data)
				{
					load_cart_data();
					/*alert("Item has been Added into Cart");*/
				}
			});
		}
		else
		{
			alert("lease Enter Number of Quantity");
		}
	});

	$(document).on('click', '.delete', function(){
		var product_id = $(this).attr("id");
		var action = 'remove';
		if(confirm("Are you sure you want to remove this product?"))
		{
			$.ajax({
				url:"js/action.php",
				method:"POST",
				data:{product_id:product_id, action:action},
				success:function()
				{
					load_cart_data();
					$('#cart-popover').popover('hide');
				}
			})
		}
		else
		{
			return false;
		}
	});

	$(document).on('click', '#clear_cart', function(){
		var action = 'empty';
		$.ajax({
			url:"js/action.php",
			method:"POST",
			data:{action:action},
			success:function()
			{
				load_cart_data();
				$('#cart-popover').popover('hide');
				alert("Your Cart has been clear");
			}
		});
	});
    
});

</script>

</body>
</html>