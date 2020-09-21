@extends('admin.layout.master')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="col-md-6">
          <div class="caption">
            <i class="icon-list font-blue"></i>
            <span class="caption-subject font-green bold uppercase">User information</span> 
            <h3>{{ $user->name }}</h3> 
            <h5>Username: <b>{{ $user->username }}</b></h5>
          </div>
        </div>   
        <div class="col-md-3 pull-right">
          <div class="dashboard-stat purple">
            <div class="visual">
              <i class="fa fa-money"></i>
            </div>
            <div class="details">
              <div class="number">
                <span data-counter="counterup" data-value="{{round(floatval($user->balance), $gnl->decimal)}}">0</span> {{$gnl->cursym}} </div>
                <div class="desc">Balance</div>
              </div>
            </div>
          </div>
        </div>
        <div class="portlet-body">
          <div class="row">
            <div class="portlet box blue-ebonyclay">
              <div class="portlet-title">
                <div class="caption">
                  <i class="fa fa-cogs"></i>Operations
                </div>
              </div>
              <div class="portlet-body">
                <div class="row">
                  <div class="col-md-3">
                    <a href="{{route('email',$user->id)}}" class="btn btn-lg btn-block btn-primary" style="margin-bottom:10px;">Send Email</a>
                  </div>
                  <div class="col-md-3"> 
                    <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#mbalance">Manage Balance</button>        
                  </div>
                  <div class="col-md-3"> 
                    <button type="button" class="btn btn-warning btn-lg btn-block" data-toggle="modal" data-target="#changepass">Change Password</button>        
                  </div>
                  <div class="col-md-3"> 
                    <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#ModalDocumnet">Documents</button>        
                  </div>

                </div> 

              </div>
            </div>
          </div>

          <div class="row">
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption">
                  <i class="fa fa-user"></i>Update Profile</div>
                </div>
                <div class="portlet-body">
                  <form id="form" method="POST" action="{{route('user.status', $user->id)}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('put')}}
                    <div class="form-group col-md-4">
                      <label>Users Name</label>
                      <input type="text" name="name" class="form-control input-sz" value="{{$user->name}}">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Phone</label>
                      <input type="text" name="mobile" class="form-control input-sz" value="{{$user->mobile}}">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control input-sz" value="{{$user->email}}">
                    </div>

                    <div class="form-group col-md-3">
                      <label>User Status</label>
                      <input class="form-control" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-width="100%" data-on="Active" data-off="Deactive" type="checkbox" value="1" name="status" {{ $user->status == "1" ? 'checked' : '' }}> 
                    </div> 
                    <div class="form-group col-md-3">
                      <label>Google Authentication</label>
                      <input class="form-control" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-width="100%" data-on="Active" data-off="Deactive" type="checkbox" value="1" name="tauth" {{ $user->tauth == "1" ? 'checked' : '' }}> 
                    </div> 
                    <div class="form-group col-md-3">
                      <label>Email Verification</label>
                      <input class="form-control" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-width="100%" data-on="Yes" data-off="No" type="checkbox" value="1" name="emailv" {{ $user->emailv == "1" ? 'checked' : '' }}> 
                    </div>   
                    <div class="form-group col-md-3">
                      <label>SMS Verification</label>
                      <input class="form-control" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-width="100%" data-on="Yes" data-off="No" type="checkbox" value="1" name="smsv" {{ $user->smsv == "1" ? 'checked' : '' }}> 
                    </div> 
                    <hr/>
                    <button type="submit" class="btn btn-lg btn-primary btn-block">Update</button>

                  </form>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="portlet box blue-ebonyclay">
                <div class="portlet-title">
                  <div class="caption">
                    <i class="fa fa-money"></i>Coin Wallet
                  </div>
                </div>
                <div class="portlet-body">
                  <div class="row">
                    @foreach($coins as $coin)
                    <div class="col-md-2">
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                          {{$coin->coin->name}}
                        </div>
                        <div class="panel-body">
                          <p><strong>{{round($coin->balance,$gnl->decimal)}}</strong> {{$coin->coin->symbol}}</p>
                        </div>
                      </div>
                    </div>
                    @endforeach

                  </div> 

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption font-dark">
                      <i class="icon-settings font-dark"></i>
                      <span class="caption-subject bold uppercase">Transaction Log of {{$user->name}}</span>
                    </div>

                  </div>
                  <div class="portlet-body">

                    <table class="table table-striped">
                      <tr>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Balance</th>
                        <th>TRX ID</th>
                        <th>Details</th>
                      </tr>
                      @foreach($trans as $log)
                      <tr>
                        <td><span class="btn btn-{{$log->type == '0' ? 'danger' : 'success'}}">
                          {{$log->type == '0' ? 'Sent' : 'Received'}}
                        </span>
                      </td>
                      <td>{{round($log->amount, $gnl->decimal)}}  BTC</td>
                      <td>{{round($log->balance, $gnl->decimal)}}  BTC</td>
                      <td>{{$log->trxid}}</td>
                      <td>{{$log->details}}</td>
                    </td>
                  </tr>
                  @endforeach
                </table>
                {{$trans->links()}}
              </div>

            </div>
          </div>
        </div>



      </div>
    </div>
  </div>
</div>







<!--Balance Modal -->
<div id="mbalance" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Manage Balance</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="{{route('user.balance', $user->id)}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{method_field('put')}}
          <div class="form-group">
            <label>Operation</label>
            <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-width="100%" data-on="Add Balance" data-off="Substract Balance" type="checkbox" value="1" name="status" > 
          </div>
          <div class="form-group">
            <label>Amount</label>
            <div class="input-group">
              <input type="text" name="amount" class="form-control">
              <span class="input-group-addon">{{$gnl->cur}}</span>
            </div>
          </div>
          <div class="form-group">
            <label>Message</label>
            <input type="text"  name="message" class="form-control" rows="5">
          </div>
          <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
        </form>
      </div>

    </div>

  </div>
</div>

<!--Change Pass Modal -->
<div id="changepass" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Password</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="{{route('user.passchange', $user->id)}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{method_field('put')}}
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

            <button type="submit" class="btn btn-primary btn-block">
              Change Password
            </button>
          </div>
        </form>
      </div>

    </div>

  </div>
</div>



<div class="modal fade" id="ModalDocumnet" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Document of {{$user->username}}</h4>
      </div>

      <div class="modal-body">
        <h3>Status: 
          <span class="btn btn-{{$user->docv == 2 ? 'success' : 'danger' }}">{{$user->docv == 2 ? 'Verified' : 'Unverified' }}</span></h3>
          @if($doc != null)
          <table class="table-striped table table-hover">
            <tr>
              <td>Username:</td>
              <td>{{$user->username}}</td>
            </tr>   
            <tr>
              <td>Document Name:</td>
              <td>{{$doc->name}}</td>
            </tr> 
            <tr>
              <td>Document Photo:</td>
              <td> 
                <img src="{{ asset('assets/images/document') }}/{{$doc->photo}}" class="img-responsive" style="max-width: 70%; padding: 5px;"> 
              </td>
            </tr>   
            <tr>
              <td>Document Details:</td>
              <td> 
                {!! $doc->details !!}
              </td>
            </tr>   
          </table>


          <form role="form" method="POST" action="{{route('user.docver', $doc->id)}}" >
            {{ csrf_field() }}
            {{method_field('put')}}
            <div class="form-group">
              <label>Approve</label>
              <input data-toggle="toggle" data-onstyle="success" data-on="Approve" data-off="Cancel" data-offstyle="danger" data-width="100%" type="checkbox" value="1" name="status" checked>
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block" type="submit">
                Update
              </button>
            </div>

          </form>
          @else
          <h1 class="btn btn-warning">NO DOCUMENT AVAILABLE</h1>
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  @endsection

