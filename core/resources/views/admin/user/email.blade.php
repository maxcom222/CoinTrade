@extends('admin.layout.master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-envelope font-blue-sharp"></i>
                                        <span class="caption-subject font-blue-sharp bold uppercase">Send Email</span>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form role="form" method="POST" action="{{route('send.email')}}" enctype="multipart/form-data">
                                    	{{ csrf_field() }}
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>To</label>
                                                <input type="email" name="emailto" class="form-control input-lg" value="{{$user->email}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="reciver" class="form-control input-lg" value="{{$user->firstname}} {{$user->lastname}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <input type="text" name="subject" class="form-control input-lg" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Email Message</label>
                                                <textarea class="form-control" name="emailMessage" rows="10">
                                                	
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="submit-btn btn btn-primary btn-lg btn-block login-button">Send Email</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
		</div>
	</div>
	
	@endsection