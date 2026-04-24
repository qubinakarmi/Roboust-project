<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SubPagesExport;

class SubPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function export()
    {
        return Excel::download(new SubPagesExport, 'subpages.xlsx');
    }
    public function index(Request $request)
    {
        //
        $contents = Content::when($request->filled('search'), function ($query) use ($request) {
        $query->where('title', 'LIKE', '%' . $request->search . '%');
        })
        ->when($request->filled('status'), function ($query) use ($request) {
            $query->where('status', $request->status);
        })
        ->with('page')
        ->latest()->paginate(5)->appends([
                'search' => $request->search,
                'status' => $request->status,
            ]);
        return view('admin.subpages.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $page_id = $request->page_id;

        return view('admin.subpages.add', compact('page_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'page_id' => 'required|exists:pages,id',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'logo' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:0,1',
        ]);

        $imageName = null;

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('contents'), $imageName);
        }

        Content::create([
            'page_id' => $request->page_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'status' => $request->status,
        ]);

        // ✅ Redirect
        return redirect()->route('subpage.index')
            ->with('success', 'Subpage content added successfully');
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
        $content = Content::findorFail($id);

        return view('admin.subpages.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $content = Content::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'logo' => 'nullable|mimes:jpg,png,jpeg',
            'status' => 'required'
        ]);

        $fileName = $content->image; // keep old image

        if ($request->hasFile('logo')) {

            // delete old image
            if ($content->image && file_exists(public_path('contents/' . $content->image))) {
                unlink(public_path('contents/' . $content->image));
            }

            // upload new image
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('contents'), $fileName);
        }

        $content->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $fileName,
            'status' => $request->status,
        ]);

        return redirect()->route('subpage.index')
            ->with('success', 'Sub Page updated successfully');
    }


    public function destroy(string $id)
    {
        $content = Content::findOrFail($id);

        // delete image
        if ($content->image && file_exists(public_path('contents/' . $content->image))) {
            unlink(public_path('contents/' . $content->image));
        }

        $content->delete();

        return redirect()->route('subpage.index')
            ->with('success', 'Sub Page deleted successfully');
    }
}
