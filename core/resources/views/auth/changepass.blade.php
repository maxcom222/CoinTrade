@extends('layouts.user')
@section('content')
<div class="row">
     <div class="col-md-7">
      <div class="panel panel-inverse text-center">
        <div class="panel-heading">
          <h4 class="panel-title">Change Password</h4>
        </div>
        <div class="panel-body">
          <form method="POST" action="{{ route('changep') }}">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-12">
            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="cols-sm-2">Old Password</label>
                  <input type="password" class="form-control input-lg" name="passwordold" id="passwordold" required />
                  @if ($errors->has('passwordold'))
                  <span class="help-block">
                    <strong>{{ $errors->first('passwordold') }}</strong>
                  </span>
                  @endif
            </div>

            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="cols-sm-2">New Password</label>              
                  <input type="password" class="form-control input-lg" name="password" id="password" required />
                  @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
            </div>
            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
               <label for="password-confirm" class="cols-sm-2">Confirm Password</label>    
                <input id="password-confirm" type="password" class="form-control input-lg" name="password_confirmation" required>
                     @if ($errors->has('password'))
                     <span class="help-block">
                       <strong>{{ $errors->first('password') }}</strong>
                   </span>
                   @endif
           </div>
              <div class="form-group ">
                <button type="submit" class="btn btn-lg btn-block btn-success">Change Password</button>
              </div>
          </div>

        </div>
      </form>
        </div>
      </div>
      
     </div>  

     <div class="col-md-5">
        <div class="panel panel-primary ">
          <div class="panel-heading">
            <h4 class="panel-title text-center">{{Auth::user()->name}}</h4>
          </div>
          <div class="panel-body">
            <table class="table table-stripped">
              <tr>
                <td>Email:</td>
                <td><strong>{{Auth::user()->email}}</strong></td>
              </tr> 
              <tr>
                <td>Email Verification:</td>
                <td><span class="btn btn-{{Auth::user()->emailv==1 ? 'success':'danger'}}">{{Auth::user()->emailv==1 ? 'YES':'NO'}}</span></td>
              </tr> 
              <tr>
                <td>SMS Verification:</td>
                <td><span class="btn btn-{{Auth::user()->smsv==1 ? 'success':'danger'}}">{{Auth::user()->emailv==1 ? 'YES':'NO'}}</span></td>
              </tr> 
              <tr>
                <td>Two Factor Authentication:</td>
                <td><span class="btn btn-{{Auth::user()->tauth==1 ? 'success':'danger'}}">{{Auth::user()->emailv==1 ? 'YES':'NO'}}</span></td>
              </tr>
            </table>
          </div>
     </div> 

</div>

@endsection
