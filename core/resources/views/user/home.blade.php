@extends('layouts.user')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-inverse" data-sortable-id="index-1">
      <div class="panel-heading">
        <h4 class="panel-title">Live Trading Stats</h4>
      </div>
      <div class="panel-body">

        <div style="height: 300px">
          <!-- TradingView Widget BEGIN -->
          <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
          <script type="text/javascript">
            new TradingView.widget({
              "autosize": true,
              "height": 300,
              "symbol": "COINBASE:BTCUSD",
              "interval": "15",
              "timezone": "Etc/UTC",
              "theme": "Dark",
              "style": "1",
              "locale": "en",
              "toolbar_bg": "#f1f3f6",
              "enable_publishing": false,
              "hide_side_toolbar": false,
              "allow_symbol_change": true,
              "hideideas": true
            });
          </script>
          <!-- TradingView Widget END -->


        </div>
      </div>
    </div>
  </div>
</div>



<div class="row">
  <div class="col-md-12">
    <div class="panel panel-inverse">
      <div class="panel-heading">
        <h4 class="panel-title text-center">Coins Wallet</h4>
      </div>
      <div class="panel-body">
        @foreach($wallets as $wall)
        <div class="col-md-4">
          <div class="panel panel-primary">
            <div class="panel-heading text-center">
              <h4 class="panel-title">{{$wall->coin->name}}</h4>
            </div>
            <div class="panel-body">
              <ul class="list-group text-center">
                <li class="list-group-item">
                  Rate: <strong>{{$wall->coin->price}}</strong> USD
                </li>
                <li class="list-group-item">
                  Balance: <br/>
                  <strong>{{number_format(floatval($wall->balance) , 8, '.', '')}}
                  </strong> {{$wall->coin->symbol}} <br/> <strong>{{round(floatval($wall->balance*$wall->coin->price) , $gnl->decimal)}}</strong> USD
                </li>
              </ul>
            </div>
            <div class="panel-footer">
              <button class="btn btn-success buyCoinClass" data-toggle="modal" data-target="#buyModal" data-id="{{$wall->id}}" data-name="{{$wall->coin->name}}" data-symbol="{{$wall->coin->symbol}}" data-price="{{$wall->coin->price}}">
                BUY
              </button>
              <button class="btn btn-warning pull-right sellCoinClass" data-toggle="modal" data-target="#sellModal" data-id="{{$wall->id}}" data-name="{{$wall->coin->name}}" data-symbol="{{$wall->coin->symbol}}" data-price="{{$wall->coin->price}}">
                SELL
              </button>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>   
</div>


  <!--Buy Modal -->
<div id="buyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Buy <strong id="buyCoinName"></strong></h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('buy.wcoin') }}">
          {{csrf_field()}}
          <input type="hidden" name="wallet" id="buyWlletId">
          <p style="color:red;">Charge: {{$gnl->concrg}} %</p>
          <div class="form-group">
            <div class="input-group">
              <input type="text" name="amount" id="inputAmount" class="form-control">
              <span class="input-group-addon" id="buySymbol"></span> 
            </div>
          </div>
          <div class="form-group text-center">
             <h5>
              <span id="convertSymbol"></span> <span id="coinAmount">0</span>  = <strong>BTC</strong> <strong id="btcAmount">0</strong> 
             </h5>
               <p style="color:red;">Charge: {{$gnl->concrg}} %</p>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-block btn-lg">BUY NOW</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


 <!--sell Modal -->
  <div id="sellModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Sell <strong id="sellCoinName"></strong></h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('sell.wcoin') }}">
            {{csrf_field()}}
            <input type="hidden" name="wallet" id="sellCoinId">
            <div class="form-group">
              <div class="input-group">
                <input type="text" name="amount" id="sellAmount" class="form-control">
                <span class="input-group-addon" id="sellCoinSymbol"></span> 
              </div>
            </div>
            <div class="form-group text-center">
              <h5>
              <span id="sellCnSymbol"></span> <span id="sellCoinAmount">0</span>  = <strong>BTC</strong> <strong id="SellbtcAmount">0</strong> 
              </h5>
               <p style="color:red;">Charge: {{$gnl->concrg}} %</p>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-warning btn-block btn-lg">SELL NOW</button>
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

    $(document).on('click','.buyCoinClass', function()
    {
      $('#buyCoinName').text($(this).data('name'));
      $('#buySymbol').text($(this).data('symbol'));
      $('#convertSymbol').text($(this).data('symbol'));
      $('#buyWlletId').val($(this).data('id'));
      var coinPrc = $(this).data('price');

        $("#inputAmount").keyup(function()
        {
          var bitrate = {{$btcrate}};
          var coinAm = $(this).val();
          var usdAm = coinAm*coinPrc;
          var bitamount = (usdAm/bitrate).toFixed(8);

          $('#coinAmount').text(coinAm);
          $('#btcAmount').text(bitamount);
        });
      
    });


    $(document).on('click','.sellCoinClass', function()
    {
      $('#sellCoinName').text($(this).data('name'));
      $('#sellCoinSymbol').text($(this).data('symbol'));
      $('#sellCnSymbol').text($(this).data('symbol'));
      $('#sellCoinId').val($(this).data('id'));
      var coinPrc = $(this).data('price');

        $("#sellAmount").keyup(function()
        {
          var bitrate = {{$btcrate}};
          var coinAm = $(this).val();
          var usdAm = coinAm*coinPrc;
          var bitamount = (usdAm/bitrate).toFixed(8);

          $('#sellCoinAmount').text(coinAm);
          $('#SellbtcAmount').text(bitamount);
        });
    });

});
</script>
@endsection
