@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">Document Verification Requests</span>
                </div>
            </div>
            <div class="portlet-body">

                <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                      	<th>
                            User ID
                        </th>
                        <th>
                            Username
                        </th>
                        <th>
                            Document Name
                        </th>
                         <th>
                            Status
                        </th>
                        <th>
                        	Action
                        </th>
                  	 </tr>
                </thead>
                <tbody>
		 	@foreach($docs as $doc)
                     <tr>
                     	<td>
                                 {{$doc->user_id}}  
                                	
                        </td>
                        <td>
                             <a href="{{route('user.single', $doc->user->id)}}">{{$doc->user->username}}</a>
                        </td> 
                        <td>
                             {{$doc->name}}
                        </td>
                         <td>
                             <span class="btn btn-{{$doc->status == 1 ? 'success' : 'danger'}}">{{$doc->status == 1 ? 'Verified' : 'Unverified'}}</span>
                        </td>
                  
                        <td>
                        	<a href="" class="btn btn-outline btn-circle btn-sm green" data-toggle="modal" data-target="#Modal{{$doc->id}}">
                             <i class="fa fa-eye"></i> View </a>
                        </td>

                     </tr>
 			@endforeach 
 			<tbody>
           </table>
           <?php echo $docs->render(); ?>
        </div>
			
				</div><!-- row -->
			</div>
		</div>
	</div>		
</div>

@foreach($docs as $doc)
  <div class="modal fade" id="Modal{{$doc->id}}" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Document of {{$doc->user->username}}</h4>
          </div>
          
            <div class="modal-body">
              <table class="table-striped table table-hover">
                  <tr>
                    <td>Username:</td>
                    <td>{{$doc->user->username}}</td>
                  </tr>   
                  <tr>
                    <td>Document Name:</td>
                    <td>{{$doc->name}}</td>
                  </tr> 
                  <tr>
                    <td>Photo of ID:</td>
                    <td> 
                      <img src="{{ asset('assets/images/document') }}/{{$doc->photo}}" class="img-responsive" style="max-width: 70%; padding: 5px;"> 
                    </td>
                  </tr>
                  <tr>
                    <td>Photo of Address:</td>
                    <td> 
                      <img src="{{ asset('assets/images/document') }}/{{$doc->photo2}}" class="img-responsive" style="max-width: 70%; padding: 5px;"> 
                    </td>
                  </tr>   
                  <tr>
                    <td>Document Details:</td>
                    <td> 
                      {!! $doc->details !!}
                    </td>
                  </tr>   
              </table>


              <form role="form" method="POST" action="{{route('user.docver', $doc->id)}}" >
                  {{ csrf_field() }}
                  {{method_field('put')}}
              <div class="form-group">
                <label>Approve</label>
                <input data-toggle="toggle" data-onstyle="success" data-on="Approve" data-off="Cancel" data-offstyle="danger" data-width="100%" type="checkbox" value="1" name="status" checked>
              </div>
              <div class="form-group">
                <button class="btn btn-primary btn-lg btn-block" type="submit">
                  Update
                </button>
              </div>
          
          </form>
           </div>
           <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
          
        
        </div>
                       
                    
                    </div>
                </div>
@endforeach
@endsection