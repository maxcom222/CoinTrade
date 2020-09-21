@extends('admin.layout.master')

@section('content')
<div class="row">
  <div class="col-md-12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption font-dark">
          <i class="icon-settings font-dark"></i>
          <span class="caption-subject bold uppercase">User Transaction Log</span>
        </div>

      </div>
      <div class="portlet-body">

       <table class="table table-striped">
        <tr>
          <th>Type</th>
          <th>User</th>
          <th>Amount</th>
          <th>Balance</th>
          <th>TRX ID</th>
          <th>Details</th>
        </tr>
        @foreach($trans as $log)
        <tr>
          <td><span class="btn btn-{{$log->type == '0' ? 'danger' : 'success'}}">
            {{$log->type == '0' ? 'Sent' : 'Received'}}
          </span>
        </td>
        <td>
          <a href="{{route('user.single', $log->user->id)}}">{{$log->user->username}}</a>
        </td>
         <td>{{round($log->amount, $gnl->decimal)}}  BTC</td>
        <td>{{round($log->balance, $gnl->decimal)}}  BTC</td>
        <td>{{$log->trxid}}</td>
        <td>{{$log->details}}</td>
      </tr>
      @endforeach
    </table>
    <?php echo $trans->render(); ?>
  </div>

</div><!-- row -->
</div>
</div>
@endsection