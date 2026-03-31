<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;
use App\Exports\PagesExport;
use Maatwebsite\Excel\Facades\Excel;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

        public function export()
    {
        return Excel::download(new PagesExport, 'pages.xlsx');
    }
    public function index(Request $request)
    {
        //
    $pages = Page::when($request->filled('search'), function ($query) use ($request) {
            $query->where('title', 'LIKE', '%' . $request->search . '%');
        })->when($request->filled('status'), function ($query) use ($request) {
            $query->where('status', $request->status);
        })->latest()->paginate(5)->appends([
            'search' => $request->search,
            'status' => $request->status,
        ]);        return view('admin.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.page.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'short_content' => 'required',
            'detail_content' => 'required',
            'logo' => 'required',
            'status' => 'required'
        ]);

        $fileName = null;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('pages'), $fileName);
        }

        Page::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'sub_title' => $request->sub_title,
            'short_content' => $request->short_content,
            'detail_content' => $request->detail_content,
            'image' => $fileName,
            'status' => $request->status,
        ]);

        return redirect()->route('page.index')
            ->with('success', 'Page content has been registered');
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
        $page=Page::findorFail($id);
        return view('admin.page.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $page = Page::findOrFail($id);

    $request->validate([
        'title' => 'required',
        'sub_title' => 'required',
        'short_content' => 'required',
        'detail_content' => 'required',
        'status' => 'required'
    ]);

    $fileName = $page->image; // keep old image

    if ($request->hasFile('logo')) {

        // delete old image
        if ($page->image && file_exists(public_path('pages/' . $page->image))) {
            unlink(public_path('pages/' . $page->image));
        }

        // upload new image
        $file = $request->file('logo');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('pages'), $fileName);
    }

    $page->update([
        'title' => $request->title,
        'slug' => Str::slug($request->title, '-'),
        'sub_title' => $request->sub_title,
        'short_content' => $request->short_content,
        'detail_content' => $request->detail_content,
        'image' => $fileName,
        'status' => $request->status,
    ]);

    return redirect()->route('page.index')
        ->with('success', 'Page updated successfully');
}


public function destroy(string $id)
{
    $page = Page::findOrFail($id);

    // delete image
    if ($page->image && file_exists(public_path('pages/' . $page->image))) {
        unlink(public_path('pages/' . $page->image));
    }

    $page->delete();

    return redirect()->route('page.index')
        ->with('success', 'Page deleted successfully');
}
}
