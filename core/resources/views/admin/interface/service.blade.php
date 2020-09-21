@extends('admin.layout.master')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption">
          <i class="icon-list font-blue"></i>
          <span class="caption-subject font-green bold uppercase">Service Settings</span>
        </div>
        <div class="actions">
          <a class="btn btn-circle btn-lg btn-success" data-toggle="modal" data-target="#addslide">
           <i class="icon-plus"></i> New Service
         </a>
       </div>
     </div>
     <div class="portlet-body">
       <div class="row">
        @foreach($services as $service)
        <div class="col-md-3">
          <div class="panel panel-primary">
            <div class="panel-heading">Service {{$service->id}}
            </div>
            <div class="panel-body">
                 <h1> <i class="fa fa-{{$service->image}}"></i></h1>
                
              <h3>
                {{$service->large}}
              </h3>
              <h5>
                {{$service->small}}
              </h5>
            </div>
            <div class="panel-footer">
              <a class="btn btn-circle btn-warning" data-toggle="modal" data-target="#editslide{{$service->id}}">
                <i class="fa fa-edit"></i> Edit
              </a>

              <a class="btn btn-circle btn-danger"  href="{{ route('service.destroy', $service)}}" data-toggle="confirmation"  data-title="Are You Sure?" data-content="Delete This Slide?">
                <i class="fa fa-trash"></i> Delete
              </a>
            </div>
          </div>
        </div>

        <!-- Edit Slide -->
        <div id="editslide{{$service->id}}" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Slide {{$service->id}}</h4>
                <a href="http://fontawesome.io/icons/" target="_blank" class="btn btn-success pull-right">Font Awesome Icons</a>
              </div>
              <div class="modal-body">
                <form role="form" method="POST" action="{{route('service.update',$service->id)}}" enctype="multipart/form-data">
                 {{ csrf_field() }}
                 {{method_field('put')}}
                  <div class="form-group">
                      <label for="image">Service Icon</label>
              <div class="input-group">
                        <span class="input-group-addon">fa fa-</span>
              <input type="text" class="form-control" value="{{$service->image}}" id="image" name="image">
            </div>
                    </div>
                     <div class="form-group">
                      <label for="large">Large Text</label>
                      <input type="text" class="form-control" id="large" name="large" value="{{$service->large}}">
                    </div>
                    <div class="form-group">
                      <label for="small">Small Text</label>
                      <input type="text" class="form-control" id="small" name="small" value="{{$service->small}}" >
                    </div>
                   
                    <div class="form-group">
                      <button type="submit" class="btn btn-lg btn-block btn-success" >Update</button>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Add Slide -->
<div id="addslide" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Slide</h4>
          <a href="http://fontawesome.io/icons/" target="_blank" class="btn btn-success pull-right">Font Awesome Icons</a>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="{{route('service.store')}}" enctype="multipart/form-data">
         {{ csrf_field() }}
         <div class="form-group">
              <label for="image">Service Icon</label><div class="input-group">
                        <span class="input-group-addon">fa fa-</span>
              <input type="text" class="form-control" id="image" name="image">
            </div>
            </div>
            <div class="form-group">
              <label for="large">Large Text</label>
              <input type="text" class="form-control" id="large" name="large" >
            </div>
            <div class="form-group">
              <label for="small">Small Text</label>
              <input type="text" class="form-control" id="small" name="small" >
            </div>
          
            <div class="form-group">
              <button type="submit" class="btn btn-lg btn-success btn-block" >Save</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

  @endsection
