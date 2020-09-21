@extends('layouts.user')
@section('content')
<div class="row">
<div class="col-md-8">
<div class="panel panel-inverse">
	<div class="panel-heading">
		<h3 class="panel-title">Withdraw Bitcoin</h3>
	</div>
	<div class="panel-body">
		<div class="row">
		<div  class="col-md-12">
    <form method="POST" action="{{ route('withdraw.btc') }}">
      {{csrf_field()}}
		<div class="form-group"> 

      <div class="input-group">
        <input type="text" name="amount"  class="form-control" placeholder="Amount">
        <span class="input-group-addon">BTC</span>
      </div>
    </div>
    <div class="from-group">
        <input type="text" name="wallet"  class="form-control" placeholder="Your BitCoin Wallet ID to Receive BTC">
    </div>
    <hr/>
			<div class="form-group">
				<button class="btn btn-success btn-lg btn-block" type="submit">Confirm Withdraw</button>
			</div>		
		</form>
	
		</div>
		</div>
	
	</div>
</div>
</div>
<div class="col-md-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
		    <h3 class="panel-title">BITCOIN BALANCE</h3>
	    </div>
	    <div class="panel-body">
	        <h3>{{round(Auth::user()->balance,$gnl->decimal)}} <i class="fa fa-bitcoin"></i></h3>
	   </div>
    </div>
</div>
</div>

@endsection