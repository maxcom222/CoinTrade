<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $slider = Slider::first();

        return view('admin.interface.slider', compact('slider'));
    }


   public function update(Request $request, $id)
    {
        $slide = Slider::find($id);
        $this->validate($request,
            [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048',
                'small' => 'required|string',
                'large' => 'required|string',
            ]);

       if($request->hasFile('image'))
        {
             $path = 'assets/images/slider/'.$slide->image;

                if(file_exists($path))
                {
                    unlink($path);
                }
                
            $slide['image'] = uniqid().'.jpg';
            $request->image->move('assets/images/slider',$slide['image']);
        }

        $slide['large'] = $request->large;
        $slide['small'] = $request->small;
        $slide->save();

        return back()->with('success', 'Slider Updated Successfully!');
    }

    public function destroy(Slider $slider)
    {
        $path = 'assets/images/slider/'.$slider->image;

        if(file_exists($path))
        {
            unlink($path);
        }
        $slider->delete();
        
        return back()->with('success', 'Slider Deleted Successfully!');
    }
}
