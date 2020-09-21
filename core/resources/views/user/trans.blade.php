@extends('layouts.user')

@section('content')
<div class="row">
<div class="col-md-12">
  <div class="panel panel-inverse" data-sortable-id="index-1">
    <div class="panel-heading">
      <h4 class="panel-title text-center">BITCOIN Transaction Log</h4>
    </div>
    <div class="panel-body table-responsive">
     <table class="table table-striped">
     	<tr>
            <th>Type</th>
            <th>Amount</th>
     		<th>Balance</th>
            <th>TRX ID</th>
     		<th>Details</th>
     	</tr>
     	@foreach($logs as $log)
     	<tr>
            <td><span class="btn btn-{{$log->type == '0' ? 'warning' : 'success'}}">
                {{$log->type == '0' ? 'Sent' : 'Received'}}
                </span>
            </td>
     		<td>{{$log->amount}} BTC</td>
            <td>{{$log->balance}} BTC</td>
            <td>{{$log->trxid}}</td>
     		<td>{{$log->details}}</td>
     	</tr>
     	@endforeach
     </table>
     {{$logs->links()}}
   </div>
 </div>
</div>   
</div>


@endsection
