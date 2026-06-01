<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $brands=Brand::paginate(5);
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.brand.add');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {

// dd($request->hidden_tags);


        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'logo' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required',
     

        ]);
        $fileName = null;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');

            $fileName = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('brands'), $fileName);
        }

 

        $brands = Brand::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $fileName,
            'status' => $request->status,

        ]);


        return redirect()->route('brand.index')->with('success', 'Brand Submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);




        return view('admin.brand.edit', compact('brand'));
    }
    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'         => 'required',
            'description' => 'required',
            'logo'          => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'status'        => 'required',


        ]);

        $brand = Brand::findOrFail($id);

        // ✅ Prepare update data
        $data = [
            'title'             => $request->title,
            'description'     => $request->description,
            'status'            => $request->status,

        ];

        // ✅ Handle featured image
        if ($request->hasFile('logo')) {

            // Delete old image (optional but recommended)
            if ($brand->image && file_exists(public_path('brands/' . $brand->image))) {
                unlink(public_path('brands/' . $brand->image));
            }

            $file = $request->file('logo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('blogs'), $fileName);

            $data['image'] = $fileName;
        }


        
 

        // ✅ Update
        $brand->update($data);

        return redirect()->route('brand.index')->with('success', 'Brand updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the testimonial by ID
        $brand = Brand::findOrFail($id);

        // Optional: Delete the associated image file from storage
        if ($brand->image && file_exists(public_path('brands/' . $brand->image))) {
            unlink(public_path('certificates/' . $brand->image));
        }

        // Delete the record from database
        $brand->delete();

        return redirect()->route('brand.index')->with('success', 'Brand deleted successfully!');
    }
}
