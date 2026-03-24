<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Service;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $services = Service::with('category')->paginate(5);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.services.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'sub_title' => 'required',
            'short_desc' => 'required',
            'logo' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required',
        ]);




        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('services'), $fileName);
        }


        Service::create([
            'category_id' => $request->category_id,
            'title' => $request->name,
            'slug' => Str::Slug($request->name, '-'),
            'sub_title' => $request->sub_title,
            'short_desc' => $request->short_desc,
            'description' => strip_tags($request->description),
            'image' => $fileName,
            'status' => $request->status,



        ]);

        return redirect()->route('service.index')->with('success', 'Services has been registered');
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

        $categories = Category::all();
        $services = Service::findorFail($id);


        return view('admin.services.edit', compact('services', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request
        $request->validate([
            'name'       => 'required|string|max:255',
            'sub_title'  => 'required|string|max:255',
            'short_desc' => 'required|string',
            'logo'       => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'status'     => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Find the existing service
        $service = Service::findOrFail($id);

        // Prepare data for update
        $data = [
            'category_id' => $request->category_id,
            'title'       => $request->name,
            'slug'        => Str::slug($request->name, '-'),
            'sub_title'   => $request->sub_title,
            'short_desc'  => $request->short_desc,
            'description' => strip_tags($request->description),
            'status'      => $request->status,
        ];

        // Handle file upload if a new image is provided
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('services'), $fileName);

            // Delete old image if exists
            if ($service->image && file_exists(public_path('services/' . $service->image))) {
                unlink(public_path('services/' . $service->image));
            }

            $data['image'] = $fileName;
        }

        // Use Eloquent update
        $service->update($data);

        return redirect()->route('service.index')->with('success', 'Service updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


        $service = Service::findOrFail($id);

        // Optional: Delete the associated image file from storage
        if ($service->image && file_exists(public_path('services/' . $service->image))) {
            unlink(public_path('services/' . $service->image));
        }

        // Delete the record from database
        $service->delete();

        return redirect()->route('service.index')->with('success', 'Service deleted successfully!');
    }
}
