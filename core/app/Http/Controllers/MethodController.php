<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paym;

class MethodController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $payment = Paym::all();
        return view('admin.interface.pay', compact('payment'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'payment' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

        if($request->hasFile('payment'))
        {
            $pay['payment'] = uniqid().'.jpg';
            $request->payment->move('assets/images/paymethod',$pay['payment']);

            Paym::create($pay);

            return back()->with('success', 'New Payment Method Icon Added Successfully!');
        }

    }

    public function destroy(Paym $paymethod)
    {
         unlink('assets/images/paymethod/'.$paymethod->payment);
    	
         $paymethod->delete();
        return back()->with('success', 'Payment Icon Deleted Successfully!');
    }
}
