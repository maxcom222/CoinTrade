@extends('layouts.user')
@section('content')
<div class="col-md-12 text-center">

	<h3>
		Please Send EXACTLY <span style="color:red">{{ $bitcoin['amount']}} </span>BTC <br>
		TO <span style="color:red">{{ $bitcoin['sendto']}} </span>
	</h3>
	<br>	
	<br>
	<h2>SCAN TO SEND</h2>
	{!!  $bitcoin['code']  !!}	
	<br>
	<br>
	<h3 style="color: red;">** 3 Confirmation Required To credited Your Account</h3>

</div>	
@endsection

