<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyUs;
use Illuminate\Http\Request;

class WhyUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datas=WhyUs::paginate(5);
        return view('admin.why.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.why.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->hidden_tags);

        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'logo' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required',


        ]);
        $fileName = null;
        $meta_fileName = null;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');

            $fileName = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('why'), $fileName);
        }



        $datas = WhyUs::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $fileName,
            'status' => $request->status,

        ]);


        return redirect()->route('whyUs.index')->with('success', 'WhyUs Submitted successfully!');
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
        $data = WhyUs::findOrFail($id);




        return view('admin.why.edit', compact('data'));
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

        $detail = WhyUs::findOrFail($id);

        // ✅ Prepare update data
        $data = [
            'title'             => $request->title,
            'description'     => $request->description,
            'status'            => $request->status,

        ];

        // ✅ Handle featured image
        if ($request->hasFile('logo')) {

            // Delete old image (optional but recommended)
            if ($detail->image && file_exists(public_path('why/' . $detail->image))) {
                unlink(public_path('why/' . $detail->image));
            }

            $file = $request->file('logo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('why'), $fileName);

            $data['image'] = $fileName;
        }





        // ✅ Update
        $detail->update($data);

        return redirect()->route('whyUs.index')->with('success', 'WhyUs updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the testimonial by ID
        $data = WhyUs::findOrFail($id);

        // Optional: Delete the associated image file from storage
        if ($data->image && file_exists(public_path('why/' . $data->image))) {
            unlink(public_path('why/' . $data->image));
        }

        // Delete the record from database
        $data->delete();

        return redirect()->route('whyUs.index')->with('success', 'WhyUs deleted successfully!');
    }
}
