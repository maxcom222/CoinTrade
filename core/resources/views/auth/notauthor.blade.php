@extends('layouts.app')
@section('content')
@if (Auth::user()->status != '1')
<div class="row">
    <div class="col-6 ml-auto mr-auto">
        <div class="card text-white bg-dark" style="margin-top:50px;">
            <div class="card-body">
                <h2 style="color: red;">Your account is Deactivated </h2>
            </div>

        </div>
    </div>
</div>

@elseif(Auth::user()->emailv != '1')
<div class="row">
    <div class="col-5 ml-auto">
        <div class="card text-white bg-dark" style="margin-top:50px;">
            <div class="card-header text-center">
                Verify Email
            </div>
            <div class="card-body">
                <form action="{{route('sendemailver')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">

                        <input type="text" class="form-control" value="{{Auth::user()->email}}" readonly>
                    </div>

                    <button type="submit" class="btn btn-own btn-block">Send Verification Code</button>
                </form>
            </div>

        </div>
    </div>

    <div class="col-5 mr-auto">
        <div class="card text-white bg-dark" style="margin-top:50px;">
            <div class="card-header text-center">
                Verify Code
            </div>
            <div class="card-body">
                <form action="{{route('emailverify') }}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">

                        <input type="text" name="code" class="form-control" placeholder="Verification Code">
                    </div>

                    <button type="submit"  class="btn btn-own btn-block">Verify</button>
                </form>                            
            </div>

        </div>
    </div>
</div>
@elseif(Auth::user()->smsv != '1')
<div class="row">
    <div class="col-5 ml-auto">
        <div class="card text-white bg-dark" style="margin-top:50px;">
            <div class="card-header text-center">
                Verify Mobile
            </div>
            <div class="card-body">
                <form action="{{route('sendsmsver')}}" method="POST">
                    {{csrf_field()}}

                    <div class="form-group">
                        
                        <input type="text" class="form-control" value="{{Auth::user()->mobile}}" readonly>
                    </div>

                    <button type="submit" class="btn btn-own">Send Verification Code</button>
                </form>
            </div>

        </div>
    </div>

    <div class="col-5 mr-auto">
        <div class="card text-white bg-dark" style="margin-top:50px;">
            <div class="card-header text-center">
                Verify Code
            </div>
            <div class="card-body">
                <form action="{{route('smsverify') }}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        
                        <input type="text" name="code" class="form-control" placeholder="Verification Code">
                    </div>

                    <button type="submit"  class="btn btn-own btn-block">Verify</button>
                </form>                            
            </div>

        </div>
    </div>
</div>
@elseif(Auth::user()->tfver != '1')
<div class="row">
    <div class="col-6 ml-auto mr-auto">
        <div class="card text-white bg-dark" style="margin-top:50px;">
            <div class="card-header text-center">
                Verify Two Factor Authenticator
            </div>
            <div class="card-body">
                    <form action="{{route('go2fa.verify') }}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                            <input type="text" value="{{ old('code') }}" class="form-control" name="code" placeholder="Enter Google Authenticator Code">
                            @if ($errors->has('code'))
                            <span class="help-block">
                                <strong>{{ $errors->first('code') }}</strong>
                            </span>
                            @endif
                        </div>

                        <button type="submit"  class="btn btn-own btn-block">Verify</button>
                </form>                            
            </div>

        </div>
    </div>
</div>
@endif


@endsection


