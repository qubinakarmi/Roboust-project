<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Course;

class ServiceComposer
{
    public function compose(View $view)
    {
    $courses = Course::all();        
    $view->with('courses', $courses);
    }

}