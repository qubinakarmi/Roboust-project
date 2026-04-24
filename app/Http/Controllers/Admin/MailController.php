<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
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

    public function sendMail(Request $request)
    {
        $data = [
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        Mail::to('qubinakarmi@gmail.com')->queue(new SendMail($data));

        return redirect()->route('contacts.index')
            ->with('success', 'Email sent successfully!');
    }
}
