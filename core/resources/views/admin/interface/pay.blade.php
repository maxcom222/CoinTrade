@extends('admin.layout.master')

@section('content')
  <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-list font-blue"></i>
                        <span class="caption-subject font-green bold uppercase">Payment Methods</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <form role="form" method="POST" action="{{route('paymethod.store')}}" enctype="multipart/form-data" class="form-inline">
                            {{ csrf_field() }}
                            <div class="form-body">

                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group">
                                           <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                      <img src="{{ asset('assets/images/paymethod/ph.png') }}" alt="" /> </div>
                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100px; max-height: 50px;"> </div>
                      <div>
                        <span class="btn btn-success btn-file">
                          <span class="fileinput-new"> Change Image </span>
                          <span class="fileinput-exists"> Change </span>
                          <input type="file" name="payment"> </span>
                          <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                      </div>
                            
                                        </div>
                                        <hr/>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-lg btn-block">Save</button>
                                        </div>
                                    </div>
                            </div>
                        </form>
                     </div>
                      <div class="row">
                        <div class="col-md-12">
                            <hr/>
                            <div class="panel panel-primary">
                              <div class="panel-heading">Payment Methods</div>
                              <div class="panel-body">
                            @foreach($payment as $pay)
                                <div class="col-md-2 col-md-offset-1 well">
                                     <img src="{{ asset('assets/images/paymethod') }}/{{$pay->payment}}" class="img-responsive" width="100%" >
                                     <hr/>
                                     <a class="btn btn-circle  btn-danger"  href="{{ route('paymethod.destroy', $pay->id)}}" data-toggle="confirmation"  data-title="Are You Sure?" data-content="Delete This Payment Icon?">
                                        <i class="fa fa-trash"></i> Delete
                                </a>
                                </div>

                            @endforeach
                              </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
