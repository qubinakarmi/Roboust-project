<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumini;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AluminiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $aluminies = Alumini::latest()->paginate(5);

    //     return view('admin.alumini.alumini', compact('aluminies'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $aluminies = Alumini::latest()->paginate(5);

        return view('admin.alumini.alumini', compact('aluminies'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    try {

        $request->validate([
            'title' => 'required|string|max:255',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|boolean'
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Make unique filename
                $filename = time() . '_' . Str::random(8) . '.' . $image->getClientOriginalExtension();

                // Move file to gallery folder
                $image->move(public_path('alumini'), $filename);

                // Save to DB
                Alumini::create([
                    'hello' => $request->title,
                    'image' => $filename,
                    'status' => $request->status
                ]);
            }
        }

        return redirect()->back()->with('success', 'Images uploaded successfully!');

    } catch (\Exception $e) {

        return redirect()->back()
            ->withInput()
            ->with('error', 'Something went wrong!');
    }
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
        // Find the testimonial by ID
        $alumini = alumini::findOrFail($id);

        // Optional: Delete the associated image file from storage
        if ($alumini->image && file_exists(public_path('alumini/' . $alumini->image))) {
            unlink(public_path('alumini/' . $alumini->image));
        }

        // Delete the record from database
        $alumini->delete();

        return redirect()->route('alumini.create')->with('success', 'Image has been deleted successfully!');
    }
}
