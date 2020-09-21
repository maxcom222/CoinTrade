@extends('admin.layout.master')

@section('content')
<div class="row">
  <div class="col-md-12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption font-dark">
          <i class="icon-settings font-dark"></i>
          <span class="caption-subject bold uppercase">Bank Deposit Requests</span>
        </div>
      </div>
      <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
          <thead>
            <tr>
              <th>
                User
              </th>
              <th>
                {{$gnl->cur}} Amount
              </th>
              <th>
                Transaction ID
              </th>
              <th>
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($deposits as $dep)
            <tr>
              <td>
                <a href="{{route('user.single', $dep->user->id)}}">{{$dep->user->username}}</a>
              </td> 
              <td>
                {{$dep->amount}} {{$gnl->cursym}}
              </td>
              <td>
                {{$dep->trxid}}
              </td>
              <td>
                <a href="" class="btn btn-outline btn-circle btn-sm green" data-toggle="modal" data-target="#Modal{{$dep->id}}">
                  <i class="fa fa-eye"></i> View </a>
                  <a href="{{ route('deposit.destroy', $dep)}}" data-toggle="confirmation"  data-title="Are You Sure?" data-content="Cancel This Deposit Request?" class="btn btn-outline btn-circle btn-sm red" >
                    <i class="fa fa-times"></i> Cancel </a>
                  </td>
                </tr>
                <!--Approve Modal -->
                <div class="modal fade" id="Modal{{$dep->id}}" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Deposit Details</h4>
                      </div>

                      <div class="modal-body">

        @php 
            $dat = json_decode($dep->details);
        @endphp
                        <ul class="list-group">
                          <li class="list-group-item">Name: <strong>{{$dat->name}}</strong></li>
                         
                          <li class="list-group-item">Email: <strong>{{$dat->email}}</strong></li>
                          <li class="list-group-item">Phone /Mobile: <strong>{{$dat->phone}}</strong></li>
                        </ul>
                        <form role="form" method="POST" action="{{route('deposit.approve', $dep->id)}}">
                          {{ csrf_field() }}
                          {{method_field('put')}}

                          <button type="submit" class="btn btn-lg btn-success btn-block">Approve</button>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      </div>


                    </div>
                  </div>
                </div>
              </div>
              @endforeach 
              <tbody>
              </table>
            </div>

          </div><!-- row -->
        </div>
      </div>
    </div>		
  </div>
  @endsection