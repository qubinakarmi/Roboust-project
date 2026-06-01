<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Placement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlacementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $placements = Placement::paginate(5);
        return view('admin.placement.index', compact('placements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.placement.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $validated=$request->validate([
                'title' => 'required|string|max:255',
                'short_desc' => 'required|string',
                'logo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                'status' => 'required|boolean',
            ]);

            $filename = null;

            if ($request->hasFile('logo')) {

                $image = $request->file('logo');

                $filename = time() . '_' . Str::random(8) . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('placements'), $filename);
            }

            Placement::create([
                'title' => $request->title,
                'short_desc' => $request->short_desc,
                'image' => $filename,
                'status' => $request->status,
            ]);

            return redirect()->route('place.index')->with('success', 'Placement added successfully.');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
  public function show(string $id)
{
    $placement = Placement::findOrFail($id);
    return view('admin.placement.show', compact('placement'));
}

/**
 * Show the form for editing the specified resource.
 */
public function edit(string $id)
{
    $placement = Placement::findOrFail($id);
    return view('admin.placement.edit', compact('placement'));
}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    try {
        $placement = Placement::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_desc' => 'required|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|boolean',
        ]);

        $filename = $placement->image; // keep old image

        // If new image uploaded
        if ($request->hasFile('logo')) {

            // delete old image
            if ($placement->image && file_exists(public_path('placements/' . $placement->image))) {
                unlink(public_path('placements/' . $placement->image));
            }

            $image = $request->file('logo');
            $filename = time() . '_' . Str::random(8) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('placements'), $filename);
        }

        $placement->update([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'image' => $filename,
            'status' => $request->status,
        ]);

        return redirect()->route('place.index')->with('success', 'Placement updated successfully.');

    } catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
}

/**
 * Remove the specified resource from storage.
 */
public function destroy(string $id)
{
    try {
        $placement = Placement::findOrFail($id);

        // delete image file
        if ($placement->image && file_exists(public_path('placements/' . $placement->image))) {
            unlink(public_path('placements/' . $placement->image));
        }

        $placement->delete();

        return redirect()->route('place.index')->with('success', 'Placement deleted successfully.');

    } catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
}
}
