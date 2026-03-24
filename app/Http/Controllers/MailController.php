<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class MailController extends Controller
{


    public function vMail()
    {

        return view('sendMessage');
    }

    public function sendMail()
    {
        $data = [
            'subject' => 'hi',
            'message' => 'hi',
        ];
        Mail::to('qubinakarmi@gmail.com')->send(new SendMail($data));

        return redirect()->route('contacts.index')
            ->with('success', 'Email sent successfully!');
    }
}
