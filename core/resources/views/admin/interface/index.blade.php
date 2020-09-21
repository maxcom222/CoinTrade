@extends('admin.layout.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-list font-blue"></i>
                    <span class="caption-subject font-green bold uppercase">Interface Settings</span>
                </div>
            </div>
            <div class="portlet-body">
      <div class="row">
        <form role="form" method="POST" action="{{route('interface.update')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 100%; height: 250px;">
                                <img src="{{ asset('assets/images/interface/about.jpg') }}" alt="" /> </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                            <div>
                                <span class="btn btn-success btn-file">
                                    <span class="fileinput-new"> Change About Image </span>
                                    <span class="fileinput-exists"> Change </span>
                                    <input type="file" name="abimage"> </span>
                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="col-md-6">
                        <div class="form-group">
                         <div class="fileinput fileinput-new" data-provides="fileinput">
                             <div class="fileinput-new thumbnail" style="width: 100%; height: 250px;">
                                 <img src="{{ asset('assets/images/interface/story.jpg') }}" alt="" /> </div>
                             <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                             <div>
                                 <span class="btn btn-success btn-file">
                                     <span class="fileinput-new"> Change Story Background </span>
                                     <span class="fileinput-exists"> Change </span>
                                     <input type="file" name="stimage"> </span>
                                 <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                             </div>
                         </div>
                        </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label><h2>About Us</h2></label>
                          <textarea class="form-control" name="abdesc" rows="6">
                            {!! $ints->abdesc !!}
                          </textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label><h2>Story Section Heading</h2></label>
                          <input type="text" value="{{$ints->sthead}}" class="form-control" name="sthead">                          
                        </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group">
                          <label><h2>Footer Section</h2></label>
                          <input type="text" value="{{$ints->ftcon}}" class="form-control" name="ftcon">                          
                        </div>
                      </div>
                       
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label><h2>Story Section</h2></label>
                          <textarea class="form-control" name="stdesc" rows="6">
                             {!! $ints->stdesc !!}
                          </textarea>
                        </div>
                      </div>
                     
                    </div>
                </div>
                <div class="form-actions right">
                    <button type="submit" class="btn blue btn-lg btn-block">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection