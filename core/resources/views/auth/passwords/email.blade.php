@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-6 ml-auto mr-auto">
        <div class="card text-white bg-dark" style="margin-top:50px;">
            <div class="card-header text-center">
               Send Reset Link
            </div>
            <div class="card-body">
                    <form method="POST" action="{{ route('forgot.pass') }}">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" value="{{ old('email') }}" class="form-control" name="email" placeholder="Enter Your Email">
                             @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                     <button type="submit"  class="btn btn-block btn-success">Send Reset Link</button>
                    </form>
             </div>
        <div class="card-footer">
        <i class="fa fa-question-circle"></i> Don't Have an Account? <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Sign up</a>
        </div>
      
    </div>
</div>
</div>
@endsection
