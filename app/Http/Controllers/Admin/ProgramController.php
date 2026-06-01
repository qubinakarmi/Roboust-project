<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        //
        $programs = Program::paginate(5);
        return view('admin.program.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.program.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {

            $validated=$request->validate([
                'title' => 'required|string|max:255',
                'short_desc' => 'required|string',
                // 'logo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                'status' => 'required|boolean',
            ]);

            // $filename = null;

            // if ($request->hasFile('logo')) {

            //     $image = $request->file('logo');

            //     $filename = time() . '_' . Str::random(8) . '.' . $image->getClientOriginalExtension();

            //     $image->move(public_path('programs'), $filename);
            // }

            Program::create([
                'title' => $request->title,
                'short_desc' => $request->short_desc,
                // 'image' => $filename,
                'status' => $request->status,
            ]);

            return redirect()->route('program.index')->with('success', 'Program added successfully.');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
  public function show(string $id)
{
    $program = Program::findOrFail($id);
    return view('admin.program.show', compact('program'));
}

/**
 * Show the form for editing the specified resource.
 */
public function edit(string $id)
{
    $program = Program::findOrFail($id);
    return view('admin.program.edit', compact('program'));
}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    try {
        $program = Program::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_desc' => 'required|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|boolean',
        ]);

        $filename = $program->image; // keep old image

        // If new image uploaded
        if ($request->hasFile('logo')) {

            // delete old image
            if ($program->image && file_exists(public_path('programs/' . $program->image))) {
                unlink(public_path('programs/' . $program->image));
            }

            $image = $request->file('logo');
            $filename = time() . '_' . Str::random(8) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('programs'), $filename);
        }

        $program->update([
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
        $program = Program::findOrFail($id);

        // delete image file
        if ($program->image && file_exists(public_path('programs/' . $program->image))) {
            unlink(public_path('programs/' . $program->image));
        }

        $program->delete();

        return redirect()->route('program.index')->with('success', 'pPogram deleted successfully.');

    } catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
}
}
