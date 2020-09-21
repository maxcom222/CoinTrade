@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">Card Deposit List</span>
                </div>
            </div>
            <div class="portlet-body">

                <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                <thead>
                    <tr>
                      	<th>
                            Deposit ID 
                        </th>
                        <th>
                            User
                        </th>
                        <th>
                            Amount
                        </th>
                        <th>
                          Status
                        </th>
                        <th>
                            Processed on
                        </th>
                  	 </tr>
                </thead>
                <tbody>
		 	@foreach($deposits as $dep)
                     <tr>
                     	<td>
                        	{{$dep->trxid}}  	
                        </td>
                        <td>
                          <a href="{{route('user.single', $dep->user->id)}}">
                             {{$dep->user->username}}
                          </a>
                        </td> 
                        <td>
                             {{$dep->amount}} {{$gnl->cur}}
                        </td>
                        <td>
                          <span class="btn btn-{{$dep->status == 1 ? 'success' : 'danger'}}">{{$dep->status == 1 ? 'Approved' : 'Canceled'}}</span>
                        </td>
                        <td>
                        	{{$dep->updated_at}}
                        </td>
                      </tr>
 			@endforeach 
 			<tbody>
           </table>
           <?php echo $deposits->render(); ?>
        </div>
			
				</div><!-- row -->
			</div>
		</div>
	</div>		
</div>
@endsection