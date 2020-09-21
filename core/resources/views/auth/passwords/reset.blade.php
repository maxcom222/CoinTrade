@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-6 ml-auto mr-auto">
        <div class="card text-white bg-dark" style="margin-top:50px;">
            <div class="card-header text-center">
                Reset Password
            </div>
            <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('reset.passw') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $reset->token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <input id="email" type="email" class="form-control" name="email" value="{{ $reset->email }}" required autofocus readonly>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success btn-block">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                 </div>
    </div>
</div>
</div>
@endsection
