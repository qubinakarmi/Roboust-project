<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $galleries = Gallery::all();
        // return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $galleries = Gallery::latest()->paginate(5);

        return view('admin.gallery.gallery', compact('galleries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
                $image->move(public_path('gallery'), $filename);

                // Save to DB
                Gallery::create([
                    'title' => $request->title,
                    'image' => $filename,
                    'status' => $request->status
                ]);
            }
        }

        return redirect()->back()->with('success', 'Images uploaded successfully!');
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
        $gallery = Gallery::findOrFail($id);

        // Optional: Delete the associated image file from storage
        if ($gallery->image && file_exists(public_path('gallery/' . $gallery->image))) {
            unlink(public_path('gallery/' . $gallery->image));
        }

        // Delete the record from database
        $gallery->delete();

        return redirect()->route('gall.create')->with('success', 'Image has been deleted successfully!');
    }
}
