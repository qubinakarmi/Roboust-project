<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class SubPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contents=Content::all();
        return view('admin.subpage.index',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

                return view('admin.subpages.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'logo' => 'required',
            'status' => 'required'
        ]);

        $fileName = null;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('contents'), $fileName);
        }

        Content::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $fileName,
            'status' => $request->status,
        ]);

        return redirect()->route('subpage.index')
            ->with('success', 'Sub Page content has been registered');
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
    }
}
