<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Certificate;

class CertificateComposer
{
    public function compose(View $view)
    {
    $certificates = Certificate::all();        
    $view->with('certificates', $certificates);
    }

}