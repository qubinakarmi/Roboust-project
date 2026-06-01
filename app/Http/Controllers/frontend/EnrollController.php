<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EnrollmentRequest;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnrollmentMail;

class EnrollController extends Controller
{
    // Show the enrollment form
    public function index()
    {
        return view('frontend.front.enroll.index');
    }

    // Handle form submission

}
