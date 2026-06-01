<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Mail\ContactMessageMail;
use App\Models\Office;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

public function show($slug)
{
  
    $office = Office::where('slug', $slug)
        ->where('status', 1)
        ->firstOrFail();


    return view('frontend.front.contact.index',compact('office'));
}



}
