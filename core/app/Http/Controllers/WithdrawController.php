<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Withdraw;
use App\Translog;
use App\User;

class WithdrawController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
    	$withdrws = Withdraw::where('status', 1)->orderBy('id', 'desc')->get();

    	return view('admin.withdraw.index', compact('withdrws'));
    }

    public function requests()
    {
    	$withdrws = Withdraw::where('status', 0)->orderBy('id', 'desc')->get();

    	return view('admin.withdraw.requests', compact('withdrws'));
    }

     public function approve(Request $request, $id)
    {
        $withdr = Withdraw::findorFail($id);

        $withdr['status'] = 1;
        $withdr->save();

        $user = User::find($withdr['user_id']);

        $msg =  'Your Withdraw Processed Successfully';
        send_email($user->email, $user->username, 'Withdraw Processed', $msg);
        $sms =  'Your Withdraw Processed Successfully';
        send_sms($user->mobile, $sms);

        return back()->with('success', 'Withdraw Request Approved Successfully!');
    }

    public function destroy(Withdraw $withdraw)
    {
        $user = User::find($withdraw['user_id']);
        $user['balance'] = $user->balance + $withdraw['amount'];
        $user->save();

        $tlog['user_id'] = $user->id;
       $tlog['trxid'] = str_random(16);
       $tlog['amount'] = $withdraw['amount'];
       $tlog['balance'] = $user->balance;
       $tlog['type'] = 1;
       $tlog['details'] = 'BTC Withdraw Canceled';
       Translog::create($tlog);

        $msg =  'Your Withdraw Request canceled by Admin';
        send_email($user->email, $user->username, 'Withdraw Canceled', $msg);
        $sms =  'Your Withdraw Request canceled by Admin';
        send_sms($user->mobile, $sms);

        $withdraw->delete();

        return back()->with('success', 'Withdraw Canceled Successfully!');
    }
}
