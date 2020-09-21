<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Etemplate;

class EtemplateController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
    	$temp = Etemplate::first();
        if($temp == null)
        {
            $default = [
                'esender' => 'email@example.com',
                'emessage' => 'Email Message',
                'smsapi' => 'SMS Message',
                
            ];
            Etemplate::create($default);
            $temp = Etemplate::first();
        }
        return view('admin.website.email', compact('temp'));
    }

     public function update(Request $request)
    {
        $temp = Etemplate::first();

        $this->validate($request,
               [
                'esender' => 'required',
                'smsapi' => 'required',
                'emessage' => 'required'
                ]);

        $temp['esender'] = $request->esender;
        $temp['smsapi'] = $request->smsapi;
        $temp['emessage'] = $request->emessage;

        $temp->save();

        return back()->with('success', 'Email and SMS Template Updated Successfully!');
    }
}
