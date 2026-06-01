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

    public function about()
    {
        return view('frontend.front.about-us.index');
    }

}
