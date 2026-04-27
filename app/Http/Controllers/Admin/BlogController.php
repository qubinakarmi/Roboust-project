<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Author;
use Illuminate\Support\Str;



use App\Exports\BlogsExport;
use Maatwebsite\Excel\Facades\Excel;

class BlogController extends Controller
{





    public function export()
    {

        return Excel::download(new BlogsExport, 'blogs.xlsx');
    }
    /**
     * Display a listing of the resource.
     */


    public function view(Request $request)
    {


        $authors = Author::all();

        $blogs = Blog::with('author')
            ->when($request->search != null && $request->search !== '', function ($query) use ($request) {
                $query->where('title', 'LIKE', '%' . $request->search . '%');
            })
            ->when($request->author_id != null && $request->author_id !== '', function ($query) use ($request) {
                $query->where('author_id', $request->author_id);
            })
            ->latest()
            ->paginate(5)->appends([
                'status' => $request->status
            ]);

        // Preserve query params for pagination
        $blogs->appends($request->all());

        return view('admin.blog.view', compact('blogs', 'authors'));
    }


    public function index(Request $request)
    {
        $authors = Author::all();

        $blogs = Blog::with('author')
            ->when($request->search != null && $request->search !== '', function ($query) use ($request) {
                $query->where('title', 'LIKE', '%' . $request->search . '%');
            })
            ->when($request->author_id != null && $request->author_id !== '', function ($query) use ($request) {
                $query->where('author_id', $request->author_id);
            })
            ->latest()
            ->paginate(5)->appends([
                'status' => $request->status
            ]);

        // Preserve query params for pagination
        $blogs->appends($request->all());

        return view('admin.blog.index', compact('blogs', 'authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $authors = Author::all();
        return view('admin.blog.add', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

// dd($request->hidden_tags);


        $request->validate([
            'author_id' => 'required',
            'title' => 'required',
            'blog_content' => 'required',
            'sub_title' => 'required',
            'short_content' => 'required',
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
        $fileName = null;
        $meta_fileName = null;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');

            $fileName = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('blogs'), $fileName);
        }

        if ($request->hasFile('meta_image')) {
            $file = $request->file('meta_image');

            $meta_fileName = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('meta_blogs'), $meta_fileName);
        }


        $blogs = Blog::create([
            'author_id' => $request->author_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'blog_content' => $request->blog_content,
            'sub_title' => $request->sub_title,
            'short_content' => $request->short_content,
            'images' => $fileName,
            'status' => $request->status,
            'meta_title' => $request->meta_title,
            'meta_keywords' =>  $request->hidden_tags ?? '',
            'meta_description' => $request->meta_description,
            'meta_image' => $meta_fileName ?? '',

        ]);


        return redirect()->route('blog.index')->with('success', 'blog Submitted successfully!');
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
        $authors = Author::all();
        $datas = Blog::findOrFail($id);

        // Current blog tags (ONLY for prefill)
        $currentTags = $datas->meta_keywords
            ? array_map('trim', explode(',', $datas->meta_keywords))
            : [];

        // All tags (ONLY for suggestions/autocomplete)
        $allTags = Blog::pluck('meta_keywords')
            ->filter()
            ->map(function ($t) {
                return array_map('trim', explode(',', $t));
            })
            ->flatten()
            ->unique()
            ->values()
            ->toArray();

        return view('admin.blog.edit', compact('datas', 'authors', 'currentTags', 'allTags'));
    }
    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $request->validate([
            'author_id'     => 'required',
            'title'         => 'required',
            'blog_content'  => 'required',
            'sub_title'     => 'required',
            'short_content' => 'required',
            'logo'          => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'status'        => 'required',

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

        $blog = Blog::findOrFail($id);

        // ✅ Prepare update data
        $data = [
            'author_id'         => $request->author_id,
            'title'             => $request->title,
            'slug'              => Str::slug($request->title, '-'),
            'blog_content'      => $request->blog_content,
            'sub_title'         => $request->sub_title,
            'short_content'     => $request->short_content,
            'status'            => $request->status,

            // ✅ Meta fields (IMPORTANT)
            'meta_title'        => $request->meta_title,
            'meta_keywords'     => $request->hidden_tags ?? '', // prevent NULL
            'meta_description'  => $request->meta_description,
        ];

        // ✅ Handle featured image
        if ($request->hasFile('logo')) {

            // Delete old image (optional but recommended)
            if ($blog->images && file_exists(public_path('blogs/' . $blog->images))) {
                unlink(public_path('blogs/' . $blog->images));
            }

            $file = $request->file('logo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('blogs'), $fileName);

            $data['images'] = $fileName;
        }


        
        // ✅ Handle meta image
        if ($request->hasFile('meta_image')) {

            // Delete old meta image (optional)
            if ($blog->meta_image && file_exists(public_path('meta_blogs/' . $blog->meta_image))) {
                unlink(public_path('meta_blogs/' . $blog->meta_image));
            }

            $file = $request->file('meta_image');
            $meta_fileName = time() . '_meta.' . $file->getClientOriginalExtension();
            $file->move(public_path('meta_blogs'), $meta_fileName);

            $data['meta_image'] = $meta_fileName;
        }

        // ✅ Update
        $blog->update($data);

        return redirect()->route('blog.index')->with('success', 'Blog updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the testimonial by ID
        $blogs = Blog::findOrFail($id);

        // Optional: Delete the associated image file from storage
        if ($blogs->images && file_exists(public_path('blogs/' . $blogs->images))) {
            unlink(public_path('blogs/' . $blogs->images));
        }

        // Delete the record from database
        $blogs->delete();

        return redirect()->route('blog.index')->with('success', 'Blog deleted successfully!');
    }
}
