@extends('layouts.user')

@section('content')
<div class="row">
<div class="col-md-6">
  <div class="panel panel-inverse" data-sortable-id="index-1">
    <div class="panel-heading">
      <h4 class="panel-title">My References</h4>
    </div>
    <div class="panel-body table-responsive">
     <table class="table table-striped">
     	<tr>
            <th>Username</th>
     		<th>Full Name</th>
            <th>Joining Date</th>
     		<th>Balance</th>
     	</tr>
     	@foreach($refers as $ref)
     	<tr>
            <td>{{$ref->username}}</td>
     		<td>{{$ref->name}}</td>
            <td>{{$ref->created_at}}</td>
     		<td>{{$ref->balance}} BTC</td>
     	</tr>
     	@endforeach
     </table>
     <?php echo $refers->render(); ?>
   </div>
 </div>
</div> 
<div class="col-md-6">
    <div class="panel panel-primary" data-sortable-id="index-1">
    <div class="panel-heading">
      <h4 class="panel-title">Referal URL</h4>
    </div>
    <div class="panel-body">
        <div class="form-group">
        <div class="input-group">
            <input type="text" class="form-control input-lg" id="rlink" value="{{url('/')}}/register/{{Auth::user()->username}}" readonly>
            <span class="input-group-addon btn btn-success" id="copybtn">Copy</span>
        </div>
    </div>
    </div>
    </div>
    
</div> 
</div>

<!--Copy Data -->
<script type="text/javascript">
  document.getElementById("copybtn").onclick = function() 
  {
    document.getElementById('rlink').select();
    document.execCommand('copy');
  }
</script>

@endsection
