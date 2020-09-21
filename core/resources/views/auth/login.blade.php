@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
<div class="col-lg-4 col-md-12  ml-auto mr-auto">
    <div class="card text-white bg-dark" style="margin-top:50px;margin-bottom:50px;">
        <div class="card-header text-center">
             Log in
        </div>
        <div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
            <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                <input type="text" value="{{ old('username') }}" class="form-control" name="username" placeholder="Username">
                 @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
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

            <button type="submit" class="btn btn-own btn-lg btn-block">Login</button>
        </form>
        </div>
        <div class="card-footer">

<div class="row">

    <div class="col-md-6 col-sm-12 text-center">
Forgot your password? <br><a href="{{ route('password.request') }}" class="btn btn-info btn-sm">Reset now</a>        
    </div>

    <div class="col-md-6 col-sm-12 text-center">
Don't Have an Account? <br><a href="{{ route('register') }}" class="btn btn-primary btn-sm">Sign up</a>       
    </div>

</div>



        </div>
      
    </div>
</div>
</div>

@endsection
