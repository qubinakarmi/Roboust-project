<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->search;
        $sections = Section::when(
            $request->filled('search'),
            function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%');
            }
        )
            ->latest()
            ->paginate(5);
        return view('admin.section.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.section.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'logo' => 'required',
        ]);
        $fileName = null;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('sections'), $fileName);
        }

        Section::create([
            'title' => $request->title,
            'description' => $request->short_desc,
            'image' => $fileName,
        ]);
        return redirect()->route('section.index')
            ->with('success', 'Section created successfully');
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
        $section = Section::findorFail($id);
        return view('admin.section.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //


        $section = Section::findorFail($id);
        $request->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'logo' => 'mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);



        $fileName = $section->image;
        if ($request->hasFile('logo')) {

            // delete old image
            if ($section->image && file_exists(public_path('sections/' . $section->image))) {
                unlink(public_path('sections/' . $section->image));
            }

            // upload new image
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('sections'), $fileName);
        }


        $section->update([

            'title' => $request->title,
            'description' => $request->short_desc,
            'image' => $fileName,
            'status' => $request->status

        ]);

        return redirect()->route('section.index')->with('success', 'Section has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $section = Section::findOrFail($id);

        // delete image
        if ($section->image && file_exists(public_path('sections/' . $section->image))) {
            unlink(public_path('sections/' . $section->image));
        }

        $section->delete();

        return redirect()->route('section.index')
            ->with('success', 'Section has been deleted successfully');
    }
}
