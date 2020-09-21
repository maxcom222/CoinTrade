@extends('layouts.user')
@section('content')       
<div class="row text-center">
      <div class="col-md-8">
            <div class="panel panel-inverse cust-panel">
                  <div class="panel-heading">
                        <h4 class="panel-title">Upload Your Legal Document</h4>
                  </div>
                  <div class="panel-body">
                        <form role="form" method="POST" action="{{ route('document.upload') }}" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
      <label>Document Name</label>
      <input type="text" name="name" class="form-control input-lg input-sz" placeholder="Name of Document">
    </div>
    <div class="form-group col-md-6">
      <label>Photo of ID Card</label>
            <input type="file" name="photo" class="form-control input-lg"> 
          
        </div>
        <div class="form-group col-md-6">
      <label>Photo of Address Verification</label>
            <input type="file" name="photo2" class="form-control input-lg"> 
          
        </div>
    
    <div class="form-group">
      <label for="details">Document Details</label>
      <textarea class="form-control"  id="details" name="details" rows="5">         
      </textarea>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-block btn-lg btn-success">Update Document</button>
    </div>
  </form>
                  </div>
            </div>
      </div>
      <div class="col-md-4">
            <div class="panel panel-inverse" data-sortable-id="ui-buttons-3">
             <div class="panel-heading">
                  <h4 class="panel-title">YOUR DOCUMENTS</h4>
              </div>
              <div class="panel-body table-responsive">
                @if($docs != null)
                  <table class="table table-responsive">
                    <tr>
                      <th>Status</th>
                      <td><span class="btn btn-{{Auth::user()->docv == 2 ? 'success' : 'danger'}}">{{Auth::user()->docv == 2 ? 'Verified' : 'Unverified'}}</span></td>
                    </tr>
                    <tr>
                      <th>Name</th>
                      <td>{{$docs->name}}</td>
                    </tr>
                    <tr>
                      <th>Photo of ID</th>
                      <td><img src="{{ asset('assets/images/document') }}/{{$docs->photo}}" class="img-responsive"></td>
                    </tr>
                    <tr>
                      <th>Photo of Address</th>
                      <td><img src="{{ asset('assets/images/document') }}/{{$docs->photo2}}" class="img-responsive"></td>
                    </tr>
                    <tr>
                      <th>Details</th>
                      <td>{{$docs->details}}</td>
                    </tr>

                  </table>
                @else
                <h2 class="btn btn-warning">No Document Available!</h2>
                @endif
              </div>
          </div>
      </div>
</div>

@endsection



