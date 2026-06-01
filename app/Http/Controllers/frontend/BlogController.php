<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Course;
use App\Models\Program;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::with('author')->where('status', 1)->get();
        return view("frontend.front.blogs.blog", compact('blogs'));
    }
    public function blog($slug)

    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $programs = Program::take(1)->get();

        $courses = Course::where('status', 1)->get();
        return view('frontend.front.blogs.single_page', compact('blog','programs','courses'));
    }
}
