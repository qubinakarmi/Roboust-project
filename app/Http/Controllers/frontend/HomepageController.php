<?php

namespace App\Http\Controllers\frontend;

use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Alumini;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Placement;
use App\Models\Program;
use App\Models\Service;
use App\Models\Slider;
use App\Models\WhyUs;

class HomepageController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 1)->take(5)->get();
        $services = Service::where('status', 1)->take(5)->get();
        $galleries = Gallery::where('status', 1)->get();
        $aluminies = Alumini::where('status', 1)->get();
        $placements = Placement::where('status', 1)->get();
        $programs = Program::take(1)->get();
        $item = WhyUs::first();

        $sliders = Slider::all();

        $blogs = Blog::with('author')->get();
        return view('frontend.front.homepage', compact('courses', 'services', 'blogs', 'galleries', 'aluminies', 'placements', 'sliders', 'programs','item'));
    }

    public function aboutUs()
    {
        $aluminies = Alumini::where('status', 1)->get();
        $placements = Placement::where('status', 1)->get();
        return view('frontend.front.about-us.index', compact('aluminies', 'placements'));
    }

    public function comingSoon()
    {
        return view('frontend.pages.coming-soon');
    }

    public function faqs()
    {
        return view('frontend.front.faqs.index');
    }


    public function about()
    {


        $aluminies = Alumini::where('status', 1)->get();
        $placements = Placement::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $about = AboutUs::first();
        $item = WhyUs::first();


        return view('frontend.front.about-us.index', compact('aluminies', 'placements', 'brands', 'about' ,'item'));
    }

    public function course_list()
    {
        $programs = Program::take(1)->get();

        $courses = Course::where('status', 1)->get();
        return view('frontend.front.courses.course-list', compact('courses', 'programs'));
    }
}
