<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deposit;
use App\Mdeposit;
use App\Translog;
use App\User;

class DepositController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
    	$deposits = Deposit::where('status','!=', 0)->orderBy('id', 'desc')->paginate(15);

    	return view('admin.deposit.deposits', compact('deposits'));
    }
    
}
