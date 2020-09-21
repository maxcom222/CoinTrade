<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interf;

class InterfaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
    	$ints = Interf::first();
    	if($ints == null)
         {
             $default = [
                 'abdesc' => 'About Us',
                 'stdesc' => 'Story of Us',
                 'sthead' => 'Our Story',
                 'ftcon' => 'fOOTER',
             ];
             Interf::create($default);
             $ints = Interf::first();
         }

    	return view('admin.interface.index', compact('ints'));
    }

    public function update(Request $request)
    {
    	$intfs = Interf::first();

		$this->validate($request, [
            'abimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048',
            'stimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048',         
            'ttimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048',        
            'abdesc' => 'required',         
            'stdesc' => 'required',         
            'sthead' => 'required',         
            'ftcon' => 'required',         
	        ]);

		if($request->hasFile('abimage'))
        {
            $request->abimage->move('assets/images/interface','about.jpg');
        }
        if($request->hasFile('stimage'))
        {
            $request->stimage->move('assets/images/interface','story.jpg');
        }
        if($request->hasFile('ttimage'))
        {
            $request->ttimage->move('assets/images/interface','testm.jpg');
        }

      $intfs['abdesc'] = $request->abdesc;
      $intfs['sthead'] = $request->sthead;
      $intfs['stdesc'] = $request->stdesc;
      $intfs['ftcon'] = $request->ftcon;

      $intfs->save();

       return back()->with('success', 'Interface Content Updated Successfully!');

    }
}
