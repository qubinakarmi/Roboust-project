<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller
{
    public function show()
    {
        return view('frontend.front.courses.course_1');
    }
    public function course_detail($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();

        return view('frontend.front.courses.course_detail',compact('course'));
    }
}
