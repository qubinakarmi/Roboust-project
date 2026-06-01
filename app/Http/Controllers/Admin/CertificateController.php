<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $certificates = Certificate::paginate(5);
        return view('admin.certificate.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.certificate.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->hidden_tags);


        $request->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'logo' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required',


        ]);
        $fileName = null;
        $meta_fileName = null;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');

            $fileName = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('certificates'), $fileName);
        }



        $certificates = Certificate::create([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'image' => $fileName,
            'status' => $request->status,

        ]);


        return redirect()->route('certificate.index')->with('success', 'certificate Submitted successfully!');
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
        $certificate = Certificate::findOrFail($id);




        return view('admin.certificate.edit', compact('certificate'));
    }
    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'         => 'required',
            'short_desc' => 'required',
            'logo'          => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'status'        => 'required',


        ]);

        $certificate = Certificate::findOrFail($id);

        // ✅ Prepare update data
        $data = [
            'title'             => $request->title,
            'short_desc'     => $request->short_desc,
            'status'            => $request->status,

        ];

        // ✅ Handle featured image
        if ($request->hasFile('logo')) {

            // Delete old image (optional but recommended)
            if ($certificate->image && file_exists(public_path('certificates/' . $certificate->image))) {
                unlink(public_path('certificates/' . $certificate->image));
            }

            $file = $request->file('logo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('blogs'), $fileName);

            $data['image'] = $fileName;
        }





        // ✅ Update
        $certificate->update($data);

        return redirect()->route('certificate.index')->with('success', 'Certificate updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the testimonial by ID
        $certificate = Certificate::findOrFail($id);

        // Optional: Delete the associated image file from storage
        if ($certificate->image && file_exists(public_path('certificates/' . $certificate->image))) {
            unlink(public_path('certificates/' . $certificate->image));
        }

        // Delete the record from database
        $certificate->delete();

        return redirect()->route('certificate.index')->with('success', 'certificate deleted successfully!');
    }
}
