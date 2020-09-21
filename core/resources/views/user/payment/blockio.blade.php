@extends('layouts.user')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-inverse">
			<div class="panel-heading">
				<h3 class="panel-title">Confirm Deposit Bitcoin</h3>
			</div>
			<div class="panel-body">

				<div  class="col-md-8 col-md-offset-2 text-center">
						<h3> PLEASE SEND EXACTLY <span style="color: green"> {{ $bcoin }} BTC</span> </h3>
							<h3>TO <span style="color: green"> {{ $sendadd}}</span> <br></h3>
							<br><br>
							{!! $qrurl !!}
							<h2 style="font-weight:bold;">SCAN TO SEND</h2>

							<br><br>
							<h4 style="color: red;"> ** Minimum 3 confirmations  Required to Credit your account.</h4>
							<br/>

						</div>


					</div>
				</div>
			</div>
		</div>

		@endsection