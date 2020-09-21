@extends('admin.layout.master')

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-list font-green"></i>
                        <span class="caption-subject font-green bold uppercase">Create New FAQ</span>
                    </div>
                </div>
                <div class="portlet-body">
        <form role="form" method="POST" action="{{route('faq.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                            <div class="form-group">
                                <label for="ques">Question</label>
                              <input  class="form-control" id="ques" name="ques" type="text">
                            </div>
                          <div class="form-group">
                                <label for="ans">Answer</label>
                              <textarea  class="form-control" id="ans" name="ans">
                                
                              </textarea>
  
                            </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-success btn-block" >Save</button>
                        </div>
                    </form> 
                  </div>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-list font-green"></i>
                        <span class="caption-subject font-green bold uppercase">FAQ List</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th> Question </th>
                                <th> Answer</th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($faqs as $faq)
                            <tr>
                                <td>{!! $faq->ques !!}</td>
                                <td>{!! $faq->ans !!} </td>
                                <td>
                                  <a class="btn btn-circle btn-icon-only btn-warning" href="{{route('faq.edit', $faq->id)}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-circle btn-icon-only btn-danger"  href="{{ route('faq.destroy', $faq)}}" data-toggle="confirmation"  data-title="Are You Sure?" data-content="Delete This FAQ?">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection