<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Faq;

class FaqController extends Controller
{
    //
    public function index()
    {
        $details=Faq::where('status',1)->get();
        return view('frontend.front.faqs.index',compact('details'));
    }
}
