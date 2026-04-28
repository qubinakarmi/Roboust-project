<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search=$request->search;
        $teachers=Teacher::when(
            $request->filled('search'),
            function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            }
        )
            ->latest()
            ->paginate(5);
        return view('admin.teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.teacher.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'short_desc' => 'required',
            'logo' => 'required|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);


        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('teachers'), $fileName);
        }


        Teacher::create([

            'name' => $request->name,
            'subject' => $request->subject,
            'short_desc' => $request->short_desc,
            'image' => $fileName,
            'status' => $request->status

        ]);

        return redirect()->route('teacher.index')->with('success', 'Teacher has been created successfully');
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
        $teacher = Teacher::findorFail($id);
        return view('admin.teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //


        $teacher = Teacher::findorFail($id);
        $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'short_desc' => 'required',
            'logo' => 'mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);



        $fileName = $teacher->image;
        if ($request->hasFile('logo')) {

            // delete old image
            if ($teacher->image && file_exists(public_path('teachers/' . $teacher->image))) {
                unlink(public_path('teachers/' . $teacher->image));
            }

            // upload new image
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('teachers'), $fileName);
        }


        $teacher->update([

            'name' => $request->name,
            'subject' => $request->subject,
            'short_desc' => $request->short_desc,
            'image' => $fileName,
            'status' => $request->status

        ]);

        return redirect()->route('teacher.index')->with('success', 'Teacher has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $teacher = Teacher::findOrFail($id);

        // delete image
        if ($teacher->image && file_exists(public_path('teachers/' . $teacher->image))) {
            unlink(public_path('teachers/' . $teacher->image));
        }

        $teacher->delete();

        return redirect()->route('teacher.index')
            ->with('success', 'teacher has been deleted successfully');
    }
}
