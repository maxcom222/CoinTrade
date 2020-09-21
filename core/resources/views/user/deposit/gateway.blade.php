@extends('layouts.user')

@section('content')
<div class="row">
<div class="col-md-12">
  <div class="panel panel-inverse">
    <div class="panel-heading">
      <h4 class="panel-title">Select Payment Gateway</h4>
    </div>
    <div class="panel-body table-responsive">
      @foreach($gates as $gate)
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <h4 class="panel-title">{{$gate->name}}</h4>
                </div>
                <div class="panel-body text-center">
                    <img src="{{asset('assets/images/gateway')}}/{{$gate->gateimg}}" style="width:100%">
               </div>
               <div class="panel-footer">
                    <button class="btn btn-success btn-block selectGateway" data-toggle="modal" data-target="#depositModal" data-id="{{$gate->id}}" data-name="{{$gate->name}}"" data-currency="{{$gate->currency}}">Select</button>
               </div>
            </div>   
        </div>
      @endforeach
   </div>
 </div>
</div> 
</div>

<div id="depositModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Deposit via <strong id="gateName"></strong></h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('deposit.confirm')}}">
            {{csrf_field()}}
            <input type="hidden" name="gateway" id="gatewayId">
            <div class="form-group">
                <div class="input-group">
                  <input type="text" name="amount" class="form-control" id="amount" required>
                  <span class="input-group-addon" id="currency"></span>
                </div>
           </div>
           <div class="form-group text-center" id="usdConvert" style="display: none;">
             <h4>
              <i class="fa fa-usd"></i> <span id="usdAmount">0</span>  = <i class="fa fa-bitcoin"></i> <strong id="btcAmount">0</strong> 
             </h4>
           </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg">
                    Deposit Now
                </button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){

    $(document).on('click','.selectGateway', function(){
      $('#gateName').text($(this).data('name'));
      $('#currency').text($(this).data('currency'));
      $('#gatewayId').val($(this).data('id'));

      var gateId = $(this).data('id');

      if (gateId == '1' || gateId == '2' || gateId == '4' || gateId == '5' || gateId == '6') 
      {
        $("#usdConvert").show();

        $( "#amount" ).keyup(function()
        {
          var bitrate = {{$btcrate}};
          var usdamn = $(this).val();
          var bitamount = (usdamn/bitrate).toFixed(8);

          $('#usdAmount').text(usdamn);
          $('#btcAmount').text(bitamount);
        });
       
      }
      else
      {
        $("#usdConvert").hide();
      }

    });
  });

</script>
@endsection
