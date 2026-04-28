<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Service;

class ServiceComposer
{
    public function compose(View $view)
    {
    $serves = Service::all();        
    $view->with('serves', $serves);
    }

}