<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Course;
use App\Models\Office;

class ContactComposer
{
    public function compose(View $view)
    {
    $offices = Office::all();        
    $view->with('offices', $offices);
    }

}