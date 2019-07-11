<style>
	.error_div{
		background:red;
		color:#ffff;
		padding-left: 15px;
	}
	.error{
		border:solid 1px red;
	}
</style>

	@foreach ($errors->all() as $error)
		<div class="error_div"><b>{{ $error }}</b></div><br>
	@endforeach
