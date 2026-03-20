<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Author;
use Illuminate\Support\Str;




class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */




    public function index()
    {
        $blogs = Blog::with('author')->paginate(5); // eager load
        return view('admin.blog.index', compact('blogs'));
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




        $request->validate([
            'author_id' => 'required',
            'title' => 'required',
            'blog_content' => 'required',
            'sub_title' => 'required',
            'short_content' => 'required',
            'logo' => 'mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required',


        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');

            $fileName = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('blogs'), $fileName);
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
        $datas = Blog::findorFail($id);
        return view('admin.blog.edit', compact('datas','authors'));
        // update the code 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'author_id' => 'required',
            'title' => 'required',
            'blog_content' => 'required',
            'sub_title' => 'required',
            'short_content' => 'required',
            'logo' => 'mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required',


        ]);

        $blog = Blog::findOrFail($id);

        // Handle file upload if present
          if ($request->hasFile('logo')) {
            $file = $request->file('logo');

            $fileName = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('blogs'), $fileName);
        }

        // Update other fields
        $blog->author_id = $request->author_id;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title, '-');
        $blog->blog_content = $request->blog_content;
        $blog->sub_title = $request->sub_title;
        $blog->short_content = $request->short_content;
        $blog->images = $fileName;
        $blog->status = $request->status;

        $blog->save(); // save the changes

        return redirect()->route('blog.index')->with('success', 'Blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the testimonial by ID
        echo $id;
        $blogs = Blog::findOrFail($id);

        // Optional: Delete the associated image file from storage
        if ($blogs->images && file_exists(public_path('blogs/' . $blogs->images))) {
            unlink(public_path('blogs/' . $blogs->images));
        }

        // Delete the record from database
        $blogs->delete();

        return redirect()->route('blog.index')->with('success', 'Testimonial deleted successfully!');
    }
}
