<?php

namespace App\Http\Controllers;

use App\Exports\ServicesExport;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Service;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function export()
    {
        return Excel::download(new ServicesExport, 'services.xlsx');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)

    {
        $services = Service::when($request->filled('search'), function ($query) use ($request) {
            $query->where('title', 'LIKE', '%' . $request->search . '%');
        })->when($request->filled('status'), function ($query) use ($request) {
            $query->where('status', $request->status);
        })->with('category')->paginate(5)->appends([
            'status' => $request->status,
            'search' => $request->search,

        ]);
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
            'hidden_tags'   => [
                'nullable',
                function ($attribute, $value, $fail) {
                    // Convert string to array
                    $tags = array_filter(array_map('trim', explode(',', $value)));

                    // Check if more than 10
                    if (count($tags) > 10) {
                        $fail('Maximum 10 tags allowed.');
                    }
                },
            ],
        ]);




        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('services'), $fileName);
        }

        if ($request->hasFile('meta_image')) {
            $file = $request->file('meta_image');

            $meta_fileName = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('meta_services'), $meta_fileName);
        }



        Service::create([
            'category_id' => $request->category_id  ?? '',
            'title' => $request->name ?? '',
            'slug' => Str::Slug($request->name, '-'),
            'sub_title' => $request->sub_title ?? '',
            'short_desc' => $request->short_desc  ?? '',
            'description' => strip_tags($request->description) ?? '',
            'image' => $fileName ?? '',
            'status' => $request->status ?? 0,
            'meta_title' => $request->meta_title ?? '',
            'meta_keywords' =>  $request->hidden_tags ?? '',
            'meta_description' => $request->meta_description ?? '',
            'meta_image' => $meta_fileName ?? '',



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
          $currentTags = $services->meta_keywords
            ? array_map('trim', explode(',', $services->meta_keywords))
            : [];

        // All tags (ONLY for suggestions/autocomplete)
        $allTags = Service::pluck('meta_keywords')
            ->filter()
            ->map(function ($t) {
                return array_map('trim', explode(',', $t));
            })
            ->flatten()
            ->unique()
            ->values()
            ->toArray();


        return view('admin.services.edit', compact('services', 'categories','currentTags', 'allTags'));
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
            'hidden_tags'   => [
                'nullable',
                function ($attribute, $value, $fail) {
                    // Convert string to array
                    $tags = array_filter(array_map('trim', explode(',', $value)));

                    // Check if more than 10
                    if (count($tags) > 10) {
                        $fail('Maximum 10 tags allowed.');
                    }
                },
            ],
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
            'meta_keywords' =>  $request->hidden_tags ?? '',

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
