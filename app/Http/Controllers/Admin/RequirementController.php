<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Requirement;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $collects=Requirement::paginate(5);
   
        return view('admin.requirement.index',compact('collects'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $sections=Section::all();
        return view('admin.requirement.add',compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
            
        ]);

        Requirement::create([
        'details'=>$request->name,
            'section_id'=>$request->section_id,
        ]);
        return redirect()->route('requirement.index')->with('success','Requirement has been registered');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data=Requirement::findorFail($id);
        $data->delete();
         return redirect()->route('requirement.index')
            ->with('success', 'Requirement has been deleted successfully');
    }
}
