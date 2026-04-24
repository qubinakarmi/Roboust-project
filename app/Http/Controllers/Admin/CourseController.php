<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        //
        $courses = Course::when(
            $request->filled('search'),
            function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%');
            }
        )
            ->latest()
            ->paginate(2);
        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.course.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'price' => 'required',
            'short_desc' => 'required',
            'logo' => 'required|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);


        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('courses'), $fileName);
        }


        Course::create([

            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'price' => $request->price,
            'short_desc' => $request->short_desc,
            'image' => $fileName,
            'status' => $request->status

        ]);

        return redirect()->route('course.index')->with('success', 'Course has been created successfully');
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
        $course = Course::findorFail($id);
        return view('admin.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //


        $course = Course::findorFail($id);
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'price' => 'required',
            'short_desc' => 'required',
            'logo' => 'mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);



        $fileName = $course->image;
        if ($request->hasFile('logo')) {

            // delete old image
            if ($course->image && file_exists(public_path('courses/' . $course->image))) {
                unlink(public_path('courses/' . $course->image));
            }

            // upload new image
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('courses'), $fileName);
        }


        $course->update([

            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'price' => $request->price,
            'short_desc' => $request->short_desc,
            'image' => $fileName,
            'status' => $request->status

        ]);

        return redirect()->route('course.index')->with('success', 'Course has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $course = Course::findOrFail($id);

        // delete image
        if ($course->image && file_exists(public_path('courses/' . $course->image))) {
            unlink(public_path('courses/' . $course->image));
        }

        $course->delete();

        return redirect()->route('course.index')
            ->with('success', 'Course has been deleted successfully');
    }
}
