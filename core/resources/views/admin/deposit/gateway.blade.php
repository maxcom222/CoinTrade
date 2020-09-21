@extends('admin.layout.master')

@section('content')
<div class="row">
<div class="col-md-12">
<div class="portlet light bordered">
<div class="portlet-title">
<div class="caption font-red-sunglo">
<i class="icon-settings font-red-sunglo"></i>
<span class="caption-subject bold uppercase">Payment Gateways</span>
</div>
</div>
<div class="portlet-body">
<div class="row">
@foreach($gateways as $gateway)

<div class="col-md-3">
<div class="panel panel-primary">
<div class="panel-heading text-center">
{{$gateway->name}}
</div>
<div class="panel-body">
<ul class="list-group">
<li class="list-group-item"><img src="{{asset('assets/images/gateway')}}/{{$gateway->gateimg}}" style="width: 100%;">
</li>


<li class="list-group-item"><strong class="btn btn-block btn-{{$gateway->status == 1 ? 'success' : 'danger'}}">{{$gateway->status == 1 ? 'Active' : 'Deactive'}}</strong></li>
</ul>
</div>
<div class="panel-footer">
<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal{{$gateway->id}}">
<i class="fa fa-edit"></i>
Edit
</button>
</div>
</div>				
</div>
<div id="myModal{{$gateway->id}}" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Edit {{$gateway->name}}</h4>
</div>
<div class="modal-body">
<form role="form" method="POST" action="{{route('gateway.update', $gateway)}}" enctype="multipart/form-data">
{{ csrf_field() }}
{{method_field('put')}}
<div class="modal-body">
<div class="form-group">
<div class="fileinput fileinput-new" data-provides="fileinput">
    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
        <img src="{{ asset('assets/images/gateway') }}/{{$gateway->gateimg}}" alt="" /> </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100px; max-height: 150px;"> </div>
            <div>
            <span class="btn btn-success btn-file">
                <span class="fileinput-new"> Change Logo </span>
                <span class="fileinput-exists"> Change </span>
                <input type="file" name="gateimg"> </span>
                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
            </div>
        </div>
    </div>
    <div class="form-group">
            <h4>Name of Gateway</h4>
            <input type="text" value="{{$gateway->name}}" class="form-control" id="name" name="name" >
    </div>
    
    <div class="form-group" style="display:none;">
        <div class="col-md-6">
            <h4 for="charged">Fixed Charge</h4>
            <input type="text" value="{{$gateway->chargefx}}" class="form-control" id="chargefx" name="chargefx" >
        </div>
        <div class="col-md-6">
            <h4 for="chargep">Charge in Percentage (%)</h4>
            <input type="text" value="{{$gateway->chargepc}}" class="form-control" id="chargepc" name="chargepc" >
        </div>
    </div>


    @if($gateway->id==1)
    <div class="form-group">
        <h4 for="val1">PAYPAL BUSINESS EMAIL</h4>
        <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
    </div>
    @elseif($gateway->id==2)
    <div class="form-group">
        <h4 for="val1">PM USD ACCOUNT</h4>
        <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
    </div>
    <div class="form-group">
        <h4 for="val2">ALTERNATE PASSPHRASE</h4>
        <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
    </div>
    @elseif($gateway->id==3)
    <div class="form-group">
        <h4 for="val1">API KEY</h4>
        <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
    </div>
    <div class="form-group">
        <h4 for="val2">XPUB CODE</h4>
        <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
    </div>
    @elseif($gateway->id==4)
    <div class="form-group">
        <h4 for="val1">SECRET KEY</h4>
        <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
    </div>
    <div class="form-group">
        <h4 for="val2">PUBLISHABLE KEY</h4>
        <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
    </div>
    @elseif($gateway->id==5)
    <div class="form-group">
        <h4 for="val1">Marchant Email</h4>
        <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
    </div>
    <div class="form-group">
        <h4 for="val2">Secret KEY</h4>
        <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
    </div>
    @elseif($gateway->id==6)
    <div class="form-group">
        <h4 for="val1">API ID</h4>
        <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
    </div>
    <div class="form-group">
        <h4 for="val2">API KEY</h4>
        <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
    </div>
    <div class="form-group">
        <h4 for="val3">API Secret</h4>
        <input type="text" value="{{$gateway->val3}}" class="form-control" id="val3" name="val3" >
    </div>
    @elseif($gateway->id==7)
    <div class="form-group">
        <h4 for="val1">API Key</h4>
        <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
    </div>
    <div class="form-group">
        <h4 for="val2">API ID</h4>
        <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
    </div>
    @elseif($gateway->id==8)
    <div class="form-group">
        <h4 for="val1">API Key</h4>
        <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
    </div>
    <div class="form-group">
        <h4 for="val2">API PIN</h4>
        <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
    </div>
    @else
    <div class="form-group">
        <h4 for="val1">Payment Details</h4>
        <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
    </div>								
    @endif
    <hr/> 
    <div class="form-group">
        <h4 for="status">Status</h4>
        <select class="form-control" name="status">
            <option value="1" {{ $gateway->status == "1" ? 'selected' : '' }}>Active</option>
            <option value="0" {{ $gateway->status == "0" ? 'selected' : '' }}>Deactive</option>
        </select>

    </div>
</div>

<div class="modal-footer">
    <button type="submit" class="btn btn-success btn-block">Update</button>
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
@endsection
