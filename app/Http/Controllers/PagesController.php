<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;
use App\Exports\PagesExport;
use Maatwebsite\Excel\Facades\Excel;

class PagesController extends Controller
{
    public function export()
    {
        return Excel::download(new PagesExport, 'pages.xlsx');
    }

    public function index(Request $request)
    {
        $pages = Page::when($request->filled('search'), function ($query) use ($request) {
            $query->where('title', 'LIKE', '%' . $request->search . '%');
        })->when($request->filled('status'), function ($query) use ($request) {
            $query->where('status', $request->status);
        })->latest()->paginate(5)->appends([
            'search' => $request->search,
            'status' => $request->status,
        ]);

        return view('admin.page.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.page.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'short_content' => 'required',
            'detail_content' => 'required',
            'logo' => 'required',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:200',
            'meta_image' => 'nullable|mimes:jpg,png,jpeg|max:2048',
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

            'status' => 'required'
        ]);

        $fileName = null;
        $meta_fileName = null;

        // Main image upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('pages'), $fileName);
        }

        // Meta image upload
        if ($request->hasFile('meta_image')) {
            $file = $request->file('meta_image');
            $meta_fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('meta_pages'), $meta_fileName);
        }

        Page::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'sub_title' => $request->sub_title,
            'short_content' => $request->short_content,
            'detail_content' => $request->detail_content,
            'image' => $fileName,
            'meta_title' => $request->meta_title ?? '',
            'meta_keywords' =>  $request->hidden_tags ?? '',
            'meta_description' => $request->meta_description ?? '',
            'meta_image' => $meta_fileName ?? '',
            'status' => $request->status,
        ]);

        return redirect()->route('page.index')
            ->with('success', 'Page content has been registered');
    }

    public function edit(string $id)
    {
        $page = Page::findOrFail($id);
          // Current blog tags (ONLY for prefill)
        $currentTags = $page->meta_keywords
            ? array_map('trim', explode(',', $page->meta_keywords))
            : [];

        // All tags (ONLY for suggestions/autocomplete)
        $allTags = Page::pluck('meta_keywords')
            ->filter()
            ->map(function ($t) {
                return array_map('trim', explode(',', $t));
            })
            ->flatten()
            ->unique()
            ->values()
            ->toArray();

        return view('admin.page.edit', compact('page', 'currentTags', 'allTags'));
    }

    public function update(Request $request, string $id)
    {
        $page = Page::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'short_content' => 'required',
            'detail_content' => 'required',

            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:200',
            'meta_image' => 'nullable|mimes:jpg,png,jpeg|max:2048',


            'status' => 'required',
                  // ✅ Add tag validation (same as store)
            'hidden_tags' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    $tags = array_filter(array_map('trim', explode(',', $value)));
                    if (count($tags) > 10) {
                        $fail('Maximum 10 tags allowed.');
                    }
                },
            ],
            



        ]);

        $fileName = $page->image;
        $meta_fileName = $page->meta_image;

        // Update main image
        if ($request->hasFile('logo')) {

            if ($page->image && file_exists(public_path('pages/' . $page->image))) {
                unlink(public_path('pages/' . $page->image));
            }

            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('pages'), $fileName);
        }

        // Update meta image
        if ($request->hasFile('meta_image')) {

            if ($page->meta_image && file_exists(public_path('meta_pages/' . $page->meta_image))) {
                unlink(public_path('meta_pages/' . $page->meta_image));
            }

            $file = $request->file('meta_image');
            $meta_fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('meta_pages'), $meta_fileName);
        }

        $page->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'sub_title' => $request->sub_title,
            'short_content' => $request->short_content,
            'detail_content' => $request->detail_content,
            'image' => $fileName,
            'meta_title' => $request->meta_title ?? '',
            'meta_keywords' =>  $request->hidden_tags ?? '',
            'meta_description' => $request->meta_description ?? '',
            'meta_image' => $meta_fileName ?? '',

            'status' => $request->status,
        ]);

        return redirect()->route('page.index')
            ->with('success', 'Page updated successfully');
    }

    public function destroy(string $id)
    {
        $page = Page::findOrFail($id);

        if ($page->image && file_exists(public_path('pages/' . $page->image))) {
            unlink(public_path('pages/' . $page->image));
        }

        if ($page->meta_image && file_exists(public_path('meta_pages/' . $page->meta_image))) {
            unlink(public_path('meta_pages/' . $page->meta_image));
        }

        $page->delete();

        return redirect()->route('page.index')
            ->with('success', 'Page deleted successfully');
    }
}
