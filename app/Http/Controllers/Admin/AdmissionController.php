<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\Course;


class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courses=Course::all();
        $admissions=Admission::with('course')->paginate(5);
        return view('admin.admission.index',compact('admissions','courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'fullname'=>'required',
            'email'=>'required',
            'phone'=>'required|max:10',
            'start_date'=>'required',
            'address'=>'required',
            'message'=>'required',


        ]);

        Admission::create([
            'fullname'=>$request->fullname,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'course_id'=>$request->course,
            'start_date'=>$request->start_date,
            'address'=>$request->address,
            'message'=>$request->message,
        ]);
        return redirect()->back()->with('success','Your Data has been received');
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
        $admission=Admission::findorFail($id);
        $admission->delete();
        return redirect()->back()->with('success','Admission data deleted successfully');

    }
}
