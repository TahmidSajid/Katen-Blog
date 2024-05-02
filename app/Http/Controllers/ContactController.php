<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function view()
    {
        return view('frontend.contact');
    }
    public function contact_form(Request $request)
    {
        // return $request;
        Mail::to($request->email)->send(new ContactMail($request->except('email')));
        return back()->with('message_sent','Email sent to admin');
    }
}
