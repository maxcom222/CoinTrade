<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stat;
class StatController extends Controller
{
    public function index()
    {
        $stats = Stat::all();

        return view('admin.interface.stats', compact('stats'));
    }

  
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'image' => 'required|string',
                'small' => 'required|string',
                'large' => 'required|string',
            ]);

        $stat['image'] = $request->image;
        $stat['small'] = $request->small;
        $stat['large'] = $request->large;

        Stat::create($stat);

        return back()->with('success', 'New Statistics Created Successfully!');
    }

   public function update(Request $request, $id)
    {
        $stat = Stat::find($id);
            $this->validate($request,
            [
                'image' => 'required|string',
                'small' => 'required|string',
                'large' => 'required|string',
            ]);

        $stat['image'] = $request->image;
        $stat['small'] = $request->small;
        $stat['large'] = $request->large;
        $stat->save();

        return back()->with('success', 'Statistics Updated Successfully!');
    }

    public function destroy(Stat $stat)
    {
        $stat->delete();
        
        return back()->with('success', 'Statistics Deleted Successfully!');
    }
}
