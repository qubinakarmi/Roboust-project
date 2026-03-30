<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AuthorsExport;
class AuthorController extends Controller
{

public function export()
{


return Excel::download(new AuthorsExport,'authors.xlsx');
}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $authors = Author::when(
            $request->filled('search'),
            function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' .$search . '%');
            }
      )
            ->latest()
            ->paginate(5);

        return view('admin.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('admin.author.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'bio' => 'required',
            'logo' => 'required|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);


        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('authors'), $fileName);
        }


        Author::create([

            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'bio' => $request->bio,
            'image' => $fileName,

        ]);

        return redirect()->route('author.index')->with('success', 'Author has been created successfully');
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
        $authors = Author::findorFail($id);
        $authors->delete();
        return redirect()->route('author.index')->with('success', 'Author has been deleted');
    }
}
