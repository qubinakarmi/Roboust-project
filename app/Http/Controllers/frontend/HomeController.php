<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Slider;

use App\Models\Setting;
use App\Models\Testimonial;

use App\Models\Service;
use App\Models\Course;
use App\Models\Page;



use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function detail(Request $request)
    {
$pages = Page::where('title', 'About Us')->firstOrFail();
        $testimonials = Testimonial::all();
        $slider = Slider::all();
        $services = Service::all();
        $courses = Course::where('status', 1)->get();

        return view('frontend.content.index', compact('slider', 'services', 'testimonials', 'courses','pages'));
    }

    public function info()
    {
        $detail = Setting::all()->pluck('value', 'key');
        return view('frontend.header.header', compact('detail'));
    }

    public function contact()
    {
        return view('frontend.content.contact');
    }
    
    public function about()
    {
        return view('frontend.content.about');
    }
}
