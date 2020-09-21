@extends('admin.layout.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-list font-blue"></i>
                    <span class="caption-subject font-green bold uppercase">Logo and Icon Settings</span>
                </div>
            </div>
            <div class="portlet-body">
      <div class="row">
        <form role="form" method="POST" action="{{route('logo.update')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-body">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="{{ asset('assets/images/logo/logo.png') }}" alt="" /> </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                            <div>
                                <span class="btn btn-success btn-file">
                                    <span class="fileinput-new"> Change Logo </span>
                                    <span class="fileinput-exists"> Change </span>
                                    <input type="file" name="logo"> </span>
                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="col-md-4">
                        <div class="form-group">
                         <div class="fileinput fileinput-new" data-provides="fileinput">
                             <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                 <img src="{{ asset('assets/images/logo/icon.png') }}" alt="" /> </div>
                             <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                             <div>
                                 <span class="btn btn-success btn-file">
                                     <span class="fileinput-new"> Change Icon </span>
                                     <span class="fileinput-exists"> Change </span>
                                     <input type="file" name="icon"> </span>
                                 <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                             </div>
                         </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                           <div class="fileinput fileinput-new" data-provides="fileinput">
                               <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                   <img src="{{ asset('assets/images/logo/bc.jpg') }}" alt="" /> </div>
                               <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                               <div>
                                   <span class="btn btn-success btn-file">
                                       <span class="fileinput-new"> Change Breadcrumb </span>
                                       <span class="fileinput-exists"> Change </span>
                                       <input type="file" name="bread"> </span>
                                   <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                               </div>
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