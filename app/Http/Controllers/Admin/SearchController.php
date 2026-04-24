<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Blog;


class SearchController extends Controller
{
    //


    // public function author(Request $request)
    // {
    //     $search = $request->search;

    //     $authors = Author::where('name', 'LIKE', "%$search%")->paginate(5);

    //     return view('admin.author.index', compact('authors'));
    // }
public function blog(Request $request)
{
    $search = $request->search;
    $authorId = $request->author_id;

    $blogs = Blog::with('author')
        ->when($search, function ($query) use ($search) {
            $query->where('title', 'LIKE', "%$search%")
        ->orWhereHas('author', function($q) use ($search) {
                      $q->where('name', 'LIKE', "%$search%");
                  });
        })
        ->when($authorId, function ($query) use ($authorId) {
            $query->where('author_id', $authorId);
        })
        ->paginate(5);

    return view('admin.blog.index', compact('blogs', 'authors'));
}
}
