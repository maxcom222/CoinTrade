<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $services = Service::all();

        return view('admin.interface.service', compact('services'));
    }

  
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'image' => 'required|string',
                'small' => 'required|string',
                'large' => 'required|string'
            ]);

        $serv['image'] = $request->image;
        $serv['small'] = $request->small;
        $serv['large'] = $request->large;

        Service::create($serv);

        return back()->with('success', 'New Service Created Successfully!');
    }

   public function update(Request $request, $id)
    {
        $serv = Service::find($id);
            $this->validate($request,
            [
                'small' => 'required|string',
                'large' => 'required|string',
            ]);

        $serv['image'] = $request->image;
        $serv['small'] = $request->small;
        $serv['large'] = $request->large;
        $serv->save();

        return back()->with('success', 'Service Updated Successfully!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        
        return back()->with('success', 'Service Deleted Successfully!');
    }
}
