<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = Office::latest()->paginate(10);

        return view('admin.office.index', compact('offices'));
    }

    public function create()
    {
        return view('admin.office.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'email' => 'required|email',
            'phone_1' => 'nullable|max:20',
            'phone_2' => 'nullable|max:20',
            'phone_3' => 'nullable|max:20',
            'is_head_office' => 'nullable|boolean',
            'status' => 'required|boolean',
        ]);

        $validated['slug'] = Str::slug($request->name);

        Office::create($validated);

        return redirect()
            ->route('offices.index')
            ->with('success', 'Office created successfully.');
    }

    public function edit(string $id)
    {
        $office=Office::findorFail($id);
        return view('admin.office.edit', compact('office'));
    }

    
    public function update(Request $request, string $id)
{
    $office = Office::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|max:255',
        'address' => 'required',
        'email' => 'required|email',
        'phone_1' => 'nullable|max:20',
        'phone_2' => 'nullable|max:20',
        'phone_3' => 'nullable|max:20',
        'is_head_office' => 'nullable|boolean',
        'status' => 'required|boolean',
    ]);

    $validated['slug'] = Str::slug($request->name);
    $validated['is_head_office'] = $request->has('is_head_office');

    $office->update($validated);

    return redirect()
        ->route('offices.index')
        ->with('success', 'Office updated successfully.');
}
    // public function update(Request $request, string $id)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|max:255',
    //         'address' => 'required',
    //         'email' => 'required|email',
    //         'phone_1' => 'nullable|max:20',
    //         'phone_2' => 'nullable|max:20',
    //         'phone_3' => 'nullable|max:20',
    //         'is_head_office' => 'nullable|boolean',
    //         'status' => 'required|boolean',
    //     ]);

    //     $validated['slug'] = Str::slug($request->name);

    //     $office->update($validated);

    //     return redirect()
    //         ->route('offices.index')
    //         ->with('success', 'Office updated successfully.');
    // }

    public function destroy(string $id)
    {
        // Find the testimonial by ID
        $office = Office::findOrFail($id);

   

        // Delete the record from database
        $office->delete();

        return redirect()->route('offices.index')->with('success', 'Office deleted successfully!');
    }
}