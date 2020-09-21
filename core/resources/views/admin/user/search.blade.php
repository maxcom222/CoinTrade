@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">User Search Result</span>
                </div>
                <div class="actions">
                    <form method="POST" class="form-inline" action="{{route('search.users')}}">
                        {{csrf_field()}}
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <button class="btn btn-outline btn-circle btn-sm green" type="submit"> <i class="fa fa-search"></i></button>
                                        
                    </form>
                </div>

            </div>
            <div class="portlet-body">

                <table class="table table-striped table-bordered table-hover order-column">
                <thead>
                    <tr>
                        <th>
                            Name 
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Username
                        </th>
                        <th>
                             Phone
                        </th>
                       	<th>
                       		Balance
                       	</th>                       	
                        <th>
                            Details
                        </th>
                  	 </tr>
                </thead>
                <tbody>
		 	@foreach($users as $user)
                     <tr>
                     	<td>
                        	{{$user->name}}
                        </td>
                        <td>
                            {{$user->email}}      
                        </td> 
                        <td>
                            {{$user->username}}      
                        </td>
                        <td>
                            {{$user->mobile}}
                        </td>
                        <td>
                        	{{number_format(floatval($user->balance), $gnl->decima, '.', '')}} {{$gnl->cursym}}
                        </td>
                        <td>
                        	<a href="{{route('user.single', $user->id)}}" class="btn btn-outline btn-circle btn-sm green">
                             <i class="fa fa-eye"></i> View </a>
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