@extends('admin.layout.master')

@section('content')
        <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-list font-green"></i>
                        <span class="caption-subject font-green bold uppercase">Edit FAQ</span>
                    </div>
                      <div class="actions">
                        <a class="btn btn-circle  btn-success" href="{{route('faq')}}">
                           FAQ LIST
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
        <form role="form" method="POST" action="{{route('faq.update', $faq->id)}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                   {{method_field('put')}}
                            <div class="form-group">
                                <label for="ques">Question</label>
                              <input  class="form-control" id="ques" name="ques" type="text" value="{{$faq->ques}}" /> 
  
                            </div>
                          <div class="form-group">
                                <label for="ans">Answer</label>
                              <textarea  class="form-control" id="ans" name="ans">
                                {!! $faq->ans !!}
                              </textarea>
  
                            </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-success" >Update</button>
                        </div>
                    </form> 
                  </div>
                </div>
            </div>
        </div>
@endsection