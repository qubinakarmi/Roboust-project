<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enroll;
use Illuminate\Http\Request;

class EnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
          $search = $request->search;
        $enrolls=Enroll::when(
            $request->filled('search'),
            function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' .$search . '%');
            }
      )->latest()->paginate(5);
        return view('admin.enroll.index',compact('enrolls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
  
    try {

        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:contacts,email',
            'address'       => 'nullable|string',
            'state'         => 'nullable|string|max:255',
            'contact'       => 'nullable|string|max:20',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'how_find_us'   => 'nullable|string|max:255',
            'intro'         => 'nullable|string',
        ]);

        $fileName = null;

        // image upload
    

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $fileName = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('enrolls'), $fileName);
        }

        Enroll::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'address'     => $request->address,
            'state'       => $request->state,
            'contact'     => $request->contact,
            'image'       => $fileName,
            'how_find_us' => $request->how_find_us,
            'intro'       => $request->intro,
        ]);

        return redirect()->back()->with('success', 'Data saved successfully!');

    } catch (\Exception $e) {

        return redirect()->back()
            ->with('error', 'Something went wrong: ' . $e->getMessage())
            ->withInput();
    }
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
        //
    }
}
