<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Exports\TestimonialsExport;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Maatwebsite\Excel\Facades\Excel;

class TestimonialController extends Controller
{
    public function export()
    {
        return Excel::download(new TestimonialsExport, 'testimonials.xlsx');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $testimonials = Testimonial::when($request->filled('search'), function ($query) use ($request) {
            $query->where('client_name', 'LIKE', '%' . $request->search . '%');
        })->when($request->filled('status'), function ($query) use ($request) {
            $query->where('status', $request->status);
        })
            ->latest()
            ->paginate(5)->appends([
                'status' => $request->status,
                'search' => $request->search,

            ]); // 5 per page (you can change);
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonial.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $request->validate([
            'company_name' => 'required',
            'designation' => 'required',
            'client_name' => 'required',
            'message' => 'required',
            'logo'    => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'status' => 'required',

        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('testimonials'), $fileName);
        }


        Testimonial::create(
            [
                'company_name'    => $request->company_name,
                'designation' =>  $request->designation,
                'client_name' =>  $request->client_name,
                'message' =>  $request->message,
                'image'     => $fileName,
                'status' =>  $request->status,


            ]
        );




        return redirect()->route('testimonial.index')->with('success', 'Settings saved successfully!');
    }






    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        //editing form display 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datas = Testimonial::findorFail($id);
        return view('admin.testimonial.edit', compact('datas'));
        // update the code 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'company_name' => 'required',
            'designation'  => 'required',
            'client_name'  => 'required',
            'message'      => 'required',
            'logo'         => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'status'       => 'required',
        ]);

        $testimonial = Testimonial::findOrFail($id);

        // Handle file upload if present
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('testimonials'), $fileName);

            // Only update the image if a new file was uploaded
            $testimonial->image = $fileName;
        }

        // Update other fields
        $testimonial->company_name = $request->company_name;
        $testimonial->designation  = $request->designation;
        $testimonial->client_name  = $request->client_name;
        $testimonial->message      = $request->message;
        $testimonial->status       = $request->status;

        $testimonial->save(); // save the changes

        return redirect()->route('testimonial.index')->with('success', 'Testimonial updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the testimonial by ID
        echo $id;
        $testimonial = Testimonial::findOrFail($id);

        // Optional: Delete the associated image file from storage
        if ($testimonial->image && file_exists(public_path('testimonials/' . $testimonial->image))) {
            unlink(public_path('testimonials/' . $testimonial->image));
        }

        // Delete the record from database
        $testimonial->delete();

        return redirect()->route('testimonial.index')->with('success', 'Testimonial deleted successfully!');
    }
}
