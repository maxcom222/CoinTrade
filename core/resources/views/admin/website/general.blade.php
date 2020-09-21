@extends('admin.layout.master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-red-sunglo">
					<i class="icon-settings font-red-sunglo"></i>
					<span class="caption-subject bold uppercase">General Settings</span>
				</div>
			</div>
			<div class="portlet-body form">
				<form role="form" method="POST" action="{{route('general.update')}}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-4">
							<h4>Website Title</h4>
							<input type="text" class="form-control input-lg" value="{{$general->title}}" name="title" >
						</div>
						<div class="col-md-4">
							<h4>Website Sub-Title</h4>
							<input type="text" class="form-control input-lg" value="{{$general->subtitle}}" name="subtitle" >
						</div>
						<div class="col-md-3">
							<h4>Start Date</h4>
                            <div class="input-group">
                            	<input type="text" class="form-control form-control-inline input-lg date-picker" readonly name="startdate" data-date-format="yyyy-mm-dd" value="{{$general->startdate}}">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                           
						</div>
					</div>
					<div class="row">
						<hr/>
						<div class="col-md-4">
							<h4>BASE COLOR CODE</h4>
							<input type="color" class="form-control input-lg"  value="#{{$general->color}}" name="color"  >
						</div>

						<div class="col-md-4">
							<h4>BASE CURRENCY CODE</h4>
							<input type="text" class="form-control input-lg" value="{{$general->cur}}" name="cur">
						</div>
						<div class="col-md-4">
							<h4>BASE CURRENCY SYMBOL</h4>
							<input type="text" class="form-control input-lg" value="{{$general->cursym}}" name="cursym">
						</div>
					</div>

					<hr/>
					<div class="row">
						<hr/>
						<div class="col-md-3">
							<label>Registration</label>
							<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-width="100%" type="checkbox" value="1" name="reg" {{ $general->reg == "1" ? 'checked' : '' }}>
						</div>

						<div class="col-md-2">
							<label>EMAIL VERIFICATION</label>
							<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-width="100%" type="checkbox" value="1" name="emailver" {{ $general->emailver == "0" ? 'checked' : '' }}>
						</div>
						<div class="col-md-2">
							<label>SMS VERIFICATION</label>
							<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-width="100%" type="checkbox" value="1" name="smsver"  {{ $general->smsver == "0" ? 'checked' : '' }}>
						</div>
						<div class="col-md-2">
							<label>EMAIL NOTIFICATION</label>
							<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-width="100%" type="checkbox" value="1" name="emailnotf"  {{ $general->emailnotf == "1" ? 'checked' : '' }}>
						</div>
						<div class="col-md-3">
							<label>SMS NOTIFICATION</label>
							<input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-width="100%" type="checkbox" value="1" name="smsnotf" {{ $general->smsnotf == "1" ? 'checked' : '' }}>
						</div>
					</div>
					<div class="row">
						<hr/>
						<div class="col-md-4">
							<h4>DECIMAL AFTER POINT</h4>
							<input type="number" value="{{$general->decimal}}" name="decimal" class="form-control input-md" >
						</div>
						<div class="col-md-4">
							<h4>Referal Commision</h4>
							<input type="text" value="{{$general->refcom}}" name="refcom" class="form-control input-md" >
						</div>
						<div class="col-md-4">
							<h4>Conversion Charge</h4>
							<input type="text" value="{{$general->concrg}}" name="concrg" class="form-control input-md" >
						</div>
						
                </div>
					<div class="row">
						<hr/>
						<div class="col-md-6 col-md-offset-3">
							<button class="btn blue btn-block btn-lg">Update</button>
						</div>
					</div>
			</form>
		</div>
	</div>
</div>
</div>
@endsection
