<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $collects=Faq::paginate(5);
        return view('admin.faq.index',compact('collects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
                return view('admin.faq.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'question'=>'required',
            'answer'=>'required',

        ]);
        Faq::create([
              'question'=>$request->question,
            'answer'=>$request->answer,
            'status'=>$request->status,
        ]);
        return redirect()->route('faq.index')->with('success','Faq added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $collect=Faq::findorFail($id);
        return view('admin.faq.edit',compact('collect'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
            $request->validate([
            'question'=>'required',
            'answer'=>'required',

        ]);
        $faq=Faq::findorFail($id);
        $faq->update([
              'question'=>$request->question,
            'answer'=>$request->answer,
            'status'=>$request->status,
        ]);
        return redirect()->route('faq.index')->with('success','Faq updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $faq=Faq::findorFail($id);
         $faq->delete();
        
         return redirect()->route('faq.index')->with('success','Faq deleted successfully');

    }
}
