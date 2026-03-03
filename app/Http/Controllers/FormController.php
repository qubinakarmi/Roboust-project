<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function register_form()
    {
        return view('admin.forms.register');
    }

      public function contact_form()
    {
        return view('admin.forms.contact');
    }
}
