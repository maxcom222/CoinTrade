@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-list font-blue"></i>
                        <span class="caption-subject font-green bold uppercase">Testimonials</span>
                    </div>
                     <div class="actions">
                        <a class="btn btn-circle btn-lg btn-success" data-toggle="modal" data-target="#addtest">
                           <i class="icon-plus"></i> New Testimonial
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                     <div class="row">
                    @foreach($testims as $testim)
                        <div class="col-md-4">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Testimonial from {{$testim->name}}</div>
                              <div class="panel-body">
                                  <img src="{{ asset('assets/images/testimonial') }}/{{$testim->photo}}" class="img-responsive" width="100%">
                                  <h3>
                                      {{$testim->name}} 
                                  </h3>
                                  <h5>
                                      {{$testim->company}}
                                  </h5>
                                   <p>
                                    @for($i = 0; $i < $testim->star ; $i++)
                                           <i class="fa fa-star"></i>
                                    @endfor
                                  </p>
                                  <p>
                                      <q>{{$testim->comment}}</q>
                                  </p>
                              </div>
                               <div class="panel-footer">
                                    <a class="btn btn-circle btn-warning" data-toggle="modal" data-target="#edittestim{{$testim->id}}">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>

                                    <a class="btn btn-circle btn-danger"  href="{{ route('testim.destroy', $testim)}}" data-toggle="confirmation"  data-title="Are You Sure?" data-content="Delete This testim?">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                              </div>
                            </div>
                        </div>

                        <!-- Edit testim -->
                        <div id="edittestim{{$testim->id}}" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit testim {{$testim->id}}</h4>
                          </div>
                          <div class="modal-body">
                            <form role="form" method="POST" action="{{route('testim.update',$testim->id)}}" enctype="multipart/form-data">
                             {{ csrf_field() }}
                             {{method_field('put')}}
                                <div class="form-group">
                                                      <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                      <img src="{{ asset('assets/images/testimonial') }}/{{$testim->photo}}" alt="" /> </div>
                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                      <div>
                        <span class="btn btn-success btn-file">
                          <span class="fileinput-new"> Change Image </span>
                          <span class="fileinput-exists"> Change </span>
                          <input type="file" name="photo"> </span>
                          <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                      </div>
                                </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" value="{{$testim->name}}" id="name" name="name" >
                            </div>
                            <div class="form-group">
                                <label for="company">Company</label>
                                <input type="text" class="form-control" value="{{$testim->company}}"  id="company" name="company" >
                            </div>
                            <div class="form-group">
                                <label for="star">Star</label>
                                <input type="text" class="form-control"  value="{{$testim->star}}" id="star" name="star" >
                            </div>
                            <div class="form-group">
                                <label for="comment" >Comment</label>
                                <input type="text" name="comment" value="{{$testim->comment}}" class="form-control">
                            </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-success" >Update</button>
                                </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                            <!-- Add Test -->
    <div id="addtest" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Testimonial</h4>
              </div>
              <div class="modal-body">
                <form role="form" method="POST" action="{{route('testim.store')}}" enctype="multipart/form-data">
                 {{ csrf_field() }}
                    <div class="form-group">
                                 <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                      <img src="{{ asset('assets/images/testimonial/ph.png') }}" alt="" /> </div>
                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                      <div>
                        <span class="btn btn-success btn-file">
                          <span class="fileinput-new"> Change Image </span>
                          <span class="fileinput-exists"> Change </span>
                          <input type="file" name="photo"> </span>
                          <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" >
                    </div>
                    <div class="form-group">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" id="company" name="company" >
                    </div>
                    <div class="form-group">
                        <label for="star">Star</label>
                        <input type="text" class="form-control" id="star" name="star" >
                    </div>
                    <div class="form-group">
                        <label for="comment" >Comment</label>
                        <input type="text" name="comment" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-success" >Save</button>
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>

@endsection
