<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Slider;

use App\Models\Setting;
use App\Models\Video;

use App\Models\Testimonial;

use App\Models\Service;
use App\Models\Course;
use App\Models\Page;
use App\Models\Blog;
use App\Models\Requirement;
use App\Models\Teacher;
use App\Models\Faq;






use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function detail(Request $request)
    {
        $pages = Page::where('title', 'About Us')->firstOrFail();
        $testimonials = Testimonial::where('status', 1)->get();
        $slider = Slider::where('status', 1)->get();
        $services = Service::where('status', 1)->get();
        $videos = Video::where('status', 1)->get();
        $blogs = Blog::where('status', 1)->get();
        $mainBlog = $blogs->first();
        $otherBlogs = $blogs->skip(1);

        $courses = Course::where('status', 1)->get();

        return view('frontend.content.index', compact('slider', 'services', 'testimonials', 'courses', 'pages', 'videos', 'mainBlog', 'otherBlogs'));
    }

    public function info()
    {
        $detail = Setting::all()->pluck('value', 'key');
        return view('frontend.header.header', compact('detail'));
    }
      public function foot()
    {
        $detail = Setting::all()->pluck('value', 'key');
        return view('frontend.footer.footer', compact('detail'));
    }

    public function contact()
    {
        return view('frontend.content.contact');
    }

    public function about()
    {
        $ab_detail = Page::where('title', 'About us')->first();
        $teachers = Teacher::where('status', 1)->get();
        return view('frontend.content.about', compact('teachers', 'ab_detail'));
    }
    public function detail_course()
    {
        $courses = Course::where('status', 1)->get();

        return view('frontend.content.course', compact('courses'));
    }


  public function admission($id = null)
{
    $section=Section::all();
        $collects=Requirement::all();

    $courses = Course::all();
    $admissions = $id ? Course::findOrFail($id) : null;

    return view('frontend.content.admission', compact('courses', 'admissions','section','collects'));
}

public function ques()
{
    $questions=Faq::where('status',1)->get();
    return view('frontend.content.faq',compact('questions'));
}
}
