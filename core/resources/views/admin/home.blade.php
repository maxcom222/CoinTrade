@extends('admin.layout.master')

@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Dashboard</span>
        </li>
    </ul>

</div>

<h3 class="page-title"> Dashboard 
    <small>dashboard & statistics </small>
</h3>
@php
   $totalusers = \App\User::where('status',1)->count();
   $userbalance =\App\User::where('status',1)->sum('balance');
   $banusers = \App\User::where('status',0)->count();
   $withdrawreq =\App\Withdraw::where('status',0)->count();
   $deposit =\App\Deposit::where('status',1)->count();
   $transaction = \App\Translog::count();
   $coins = \App\Coin::all();
@endphp

<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users"></i> USERS STATISTICS </div>
                </div>
                <div class="portlet-body text-center">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="dashboard-stat blue">
                                <div class="visual">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$totalusers}}">{{$totalusers}}</span>
                                    </div>
                                    <div class="desc"> Total User </div>
                                </div>
                                <a class="more" href="{{route('users')}}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="dashboard-stat blue">
                                <div class="visual">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" 
                                        data-value="{{round($userbalance,$gnl->decimal)}}">{{$userbalance}} </span>
                                    </div>
                                    <div class="desc">Users Total USD Balance</div>
                                </div>
                                <a class="more" href="{{route('users')}}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="dashboard-stat blue">
                                <div class="visual">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$banusers}}">{{$banusers}}</span>
                                    </div>
                                    <div class="desc"> Banned Users </div>
                                </div>
                                <a class="more" href="{{route('users')}}"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

      <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-users"></i>User Transactions</div>
                    </div>
                    <div class="portlet-body text-center">
                        <div class="row">
                           
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="dashboard-stat green">
                                    <div class="visual">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" 
                                            data-value="{{$withdrawreq}}">{{$withdrawreq}}</span>
                                        </div>
                                        <div class="desc"> User Withdraw Requests</div>
                                    </div>
                                    <a class="more" href="{{route('withdraw.requests')}}"> View more
                                        <i class="m-icon-swapright m-icon-white"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="dashboard-stat green">
                                    <div class="visual">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="{{$transaction}}">{{$transaction}}</span>
                                        </div>
                                        <div class="desc"> Total Transactions </div>
                                    </div>
                                    <a class="more" href="{{route('users.transactions')}}"> View more
                                        <i class="m-icon-swapright m-icon-white"></i>
                                    </a>

                                </div>
                            </div>
                             <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="dashboard-stat green">
                                    <div class="visual">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="{{$deposit}}">{{$deposit}}</span>
                                        </div>
                                        <div class="desc"> Total Deposits </div>
                                    </div>
                                    <a class="more" href="{{route('admin.deposits')}}"> View more
                                        <i class="m-icon-swapright m-icon-white"></i>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users"></i> COIN WALLET STATISTICS </div>
                </div>
                <div class="portlet-body text-center">
                    <div class="row">
                        <table class="table table-striped table-bordered table-hover order-column">
                <thead>
                    <tr>
                        <th class="text-center">
                            Coin ID 
                        </th>
                        <th class="text-center">
                            Coin Name
                        </th>
                        <th class="text-center">
                             Price
                        </th>
                        <th class="text-center">
                            User Total Balance
                        </th>                         
                     </tr>
                </thead>
                <tbody>
        @foreach ($coins as $coin) 
            @php   $balance = \App\Coinwallet::where('coin_id', $coin->id)->sum('balance'); @endphp
            <tr>
                <td>{{$coin->coinid}}</td>
                <td>{{$coin->name}}</td>
                <td>{{$coin->price}} USD</td>
                <td>{{$balance}} {{$coin->symbol}}</td>
            </tr>
        @endforeach
          <tbody>
           </table>
                </div>
            </div>

        </div>
    </div>


@endsection
