@extends('layouts.app')

@section('content')
<div class="row justify-content-center register-page">
<div class="col-lg-4 col-md-12  ml-auto mr-auto">
    <div class="card text-white bg-dark" style="margin-top:50px;margin-bottom:50px;">
        <div class="card-header text-center">
             Register
        </div>
        <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                     @if(isset($reference))
                        <input type="hidden" name="refid" value="{{$reference}}">
                    @endif
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        
                            <input type="text" value="{{ old('name') }}" class="form-control" name="name" placeholder="Name">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                           
                            <input type="text" value="{{ old('username') }}" class="form-control" name="username" placeholder="Username">
                             @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            
                            <input type="email" value="{{ old('email') }}" class="form-control" name="email" placeholder="Email">
                             @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
                            
                            <input type="text" value="{{ old('mobile') }}" class="form-control" name="mobile" placeholder="Mobile no with Country Code">
                             @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                          
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            
                            <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                        </div>

                        <button type="submit" class="btn btn-own btn-lg btn-block">Register</button>
                    </form>
                    </div>
        <div class="card-footer">
<div class="row">

    <div class="col-md-6 col-sm-12 text-center">
Forgot your password? <br> <a href="{{ route('password.request') }}" class="btn btn-info btn-sm">Reset now</a>        
    </div>

    <div class="col-md-6 col-sm-12  text-center">
 Have an account?  <br> <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Sign In</a>       
    </div>

</div>
        </div>
      
    </div>
</div>
</div>
@endsection

