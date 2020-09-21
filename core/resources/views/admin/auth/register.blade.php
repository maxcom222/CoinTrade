@extends('admin.layout.master')

@section('content')
<div class="col-md-6">
    

                    <form class="login-form" role="form" method="POST" action="{{ url('/admin/register') }}">
                        {{ csrf_field() }}
                         <h3 class="font-green">Register New Admin</h3>
<hr/>

                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Full Name</label>
                   <input id="name"  class="form-control placeholder-no-fix" type="text" placeholder="Full Name" name="name" value="{{ old('name') }}" autofocus>
                </div>
                 <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">E-Mail Address</label>
                   <input id="email"  class="form-control placeholder-no-fix" type="text" placeholder="E-Mail Address" name="email" value="{{ old('email') }}" autofocus>
                </div>
                 <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                   <input id="username"  class="form-control placeholder-no-fix" type="text" placeholder="Username" name="username" value="{{ old('username') }}" autofocus>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                   <input id="password" placeholder="Password"  class="form-control placeholder-no-fix" type="password"  name="password">
                </div>
                 <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Confirm Password</label>
                   <input id="password-confirm" placeholder="Confirm Password"  class="form-control placeholder-no-fix" type="password"  name="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                    @endif
                </div>


                <div class="form-actions">
                    <button type="submit" id="register-submit-btn" class="btn btn-success btn-lg btn-block btn-success uppercase pull-right">Register</button>
                </div>
                    </form>
         </div>     
@endsection
