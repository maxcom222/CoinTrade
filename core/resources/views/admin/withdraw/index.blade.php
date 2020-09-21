@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> Withdraw List</span>
                </div>
            </div>
            <div class="portlet-body">

                <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                <thead>
                    <tr>
                      	<th>
                            Withdraw ID 
                        </th>
                        <th>
                            User
                        </th>
                        <th>
                            Amount
                        </th>
                        <th>
                            Processed on
                        </th>
                  	 </tr>
                </thead>
                <tbody>
		 	@foreach($withdrws as $with)
                     <tr>
                     	<td>
                        	{{$with->wdid}}  	
                        </td>
                        <td>
                          <a href="{{route('user.single', $with->user->id)}}">
                             {{$with->user->username}}
                          </a>
                        </td> 
                        <td>
                             {{$with->amount}} BTC
                        </td>
                        <td>
                        	{{$with->updated_at}}
                        </td>
                      </tr>
 			@endforeach 
 			<tbody>
           </table>
        </div>
			
				</div><!-- row -->
			</div>
		</div>
	</div>		
</div>
@endsection