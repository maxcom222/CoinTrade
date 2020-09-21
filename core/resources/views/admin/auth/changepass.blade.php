@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">Change Password</span>
                </div>

            </div>
            <div class="portlet-body">

                 <form class="login-form" role="form" method="POST" action="{{ route('password.update') }}">
                   {{ csrf_field() }}
                <div class="form-group" >
                    <label class="control-label visible-ie8 visible-ie9">Old Password</label>
                   <input id="passwordold" type="password" class="form-control form-control-solid placeholder-no-fix" name="passwordold" placeholder="Old Password">
                </div>
                <div class="form-group" >
                    <label class="control-label visible-ie8 visible-ie9">New Password</label>
                   <input id="password" type="password" class="form-control form-control-solid placeholder-no-fix" name="password" placeholder="New Password">
                </div>
                <div class="form-group" >
                    <label class="control-label visible-ie8 visible-ie9">Confirm Password</label>
                   <input id="password-confirm" type="password" class="form-control form-control-solid placeholder-no-fix" name="password_confirmation" placeholder="Confirm Password">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn green uppercase">Change Password</button>
                </div>
                
            </form>
          </div>
			
				</div>
			</div>
		</div>
	</div>		
</div>
@endsection