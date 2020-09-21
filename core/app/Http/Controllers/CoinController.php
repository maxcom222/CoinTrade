<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coin;
use App\Coinwallet;
use App\User;
use App\Translog;
use App\General;
use Auth;

class CoinController extends Controller
{
	public function __construct()
    {
        $this->middleware(['auth','ckstatus']);
    }

    // public function insert()
    // {

    //     $all = file_get_contents("https://api.coinmarketcap.com/v1/ticker/?start=1&limit=50");
    //     $res = json_decode($all);
    //     $i = 1;
    //     foreach ($res as $r) 
    //     {
    //        $coin['id'] = $i;
    //        $coin['coinid'] = $r->id;
    //        $coin['name'] = $r->name;
    //        $coin['symbol'] = $r->symbol;
    //        $coin['price'] = $r->price_usd;
    //        Coin::create($coin);

    //        $i++;
    //     }
        
    //     return 'Success';
    // }


    public function index()
    {
    	$total = Coin::count();
    	$ucoin = Coinwallet::where('user_id', Auth::id())->count();
    	if ($total != $ucoin) 
    	{
    		$coins = Coin::all();

			foreach ($coins as $coin) 
			{
			    
    			$exist = Coinwallet::where('coin_id', $coin->id)->where('user_id', Auth::id())->count();
        		if($exist == 0)
    			{
    			    
    				$new['coin_id'] = $coin->id;
    				$new['user_id'] = Auth::id();
    				$new['balance'] = '0';

    				Coinwallet::create($new);
    			}
    		}
    	}
    	$wallets = Coinwallet::where('user_id', Auth::id())->orderBy('coin_id', 'asc')->get();	

    	return view('user.coinwallet', compact('wallets'));

    }

    public function buyCoin(Request $request)
    {
    	$this->validate($request,
			[
				'amount' => 'required',
				'wallet' => 'required'
			]);
    	$user = User::find(Auth::id());
    	$gnl = General::first();

    	if ($request->amount <= 0) 
    	{
    		return back()->with('alert', 'Invalid Amount');
    	}
    	else
    	{
    		$wallet = Coinwallet::find($request->wallet);

            $all = file_get_contents("https://blockchain.info/ticker");
            $res = json_decode($all);
            $btcrate = $res->USD->last;

            $coinPrice = ($request->amount*$wallet->coin->price)/$btcrate;

    		$charge = ($coinPrice*$gnl->concrg)/100;

            $total = $coinPrice + $charge;

            if ($total > $user->balance) 
            {
                return back()->with('alert', 'Insufficient Balance');
            }
            else
            {
                $user['balance'] = $user->balance - $total;
                $user->save();

                $wallet['balance'] = $wallet->balance + $request->amount;
                $wallet->save();

               $tlog['user_id'] = $user->id;
               $tlog['trxid'] = str_random(12);
               $tlog['amount'] = $request->amount;
               $tlog['balance'] = $user->balance;
               $tlog['type'] = 0;
               $tlog['details'] = 'Bought '.$wallet->coin->name;
               Translog::create($tlog);
               
                $msg =  'Bought'.$wallet->coin->name.' Successfully';
                send_email($user->email, $user->username, 'Bought Coin', $msg);
                $sms = 'Bought'.$wallet->coin->name.' Successfully';
                send_sms($user->mobile, $sms);

                return back()->with('success', $wallet->name.' Bought Successfully');
            }
    	}

    }

    public function sellCoin(Request $request)
    {
    	$this->validate($request,
			[
				'amount' => 'required',
				'wallet' => 'required'
			]);
    	$user = User::find(Auth::id());
    	$wallet = Coinwallet::find($request->wallet);
        $gnl = General::first();

    	if ($request->amount <= 0) 
    	{
    		return back()->with('alert', 'Invalid Amount');
    	}
    	else
    	{
            $charge = ($request->amount*$gnl->concrg)/100;
            $total = ($request->amount+$charge);

            if ($total > $wallet->balance) 
            {
                return back()->with('alert', 'Insufficient Balance');
            }
            else
            {
               $wallet['balance'] = $wallet->balance - $total;
               $wallet->save();

                $all = file_get_contents("https://blockchain.info/ticker");
                $res = json_decode($all);
                $btcrate = $res->USD->last;

                $inBtc = ($request->amount*$wallet->coin->price)/$btcrate;

                $user['balance'] = $user->balance + $inBtc;
                $user->save();


               $tlog['user_id'] = $user->id;
               $tlog['trxid'] = str_random(12);
               $tlog['amount'] = $inBtc;
               $tlog['balance'] = $user->balance;
               $tlog['type'] = 1;
               $tlog['details'] = 'Sold '.$wallet->coin->name;
               Translog::create($tlog);
           
                $msg =  'Sold'.$wallet->coin->name.' Successfully';
                send_email($user->email, $user->username, 'Bought Coin', $msg);
                $sms = 'Sold'.$wallet->coin->name.' Successfully';
                send_sms($user->mobile, $sms);

                return back()->with('success', $wallet->name.' Sold Successfully');
 
            }
            
    	}

    }
}
