<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;

class FaqController extends Controller
{
    public function index()
	{
		$faqs = Faq::all();

		return view('admin.interface.faq', compact('faqs'));
	}

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'ques' => 'required',
                'ans' => 'required'
            ]);

        $faq['ques'] = $request->ques;
        $faq['ans'] = $request->ans;

        Faq::create($faq);

        return back()->with('success', 'New FAQ Created Successfully!');
    }

    public function edit(Request $request, $id)
    {
    	$faq = Faq::find($id);

    	return view('admin.interface.faqedit', compact('faq'));

    }


    public function update(Request $request, $id)
    {
       $faq = Faq::find($id);
		
		$this->validate($request,
            [
                'ques' => 'required',
                'ans' => 'required'
            ]);

        $faq['ques'] = $request->ques;
        $faq['ans'] = $request->ans;


        $faq->save();

        return back()->with('success', 'Service Updated Successfully!');
    }


    public function destroy(Faq $faq)
    {
       $faq->delete();

        return back()->with('success', 'FAQ Deleted Successfully!');
    }
}
