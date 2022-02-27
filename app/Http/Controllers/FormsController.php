<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\General\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FormsController extends Controller
{
    /**
     * ? Handle app's forms submition
     * todo: Contact form with captacha
     */

    public function contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'subject' => 'required|string',
            'email' => 'required|email', 
            'message' => 'required|string|max:200',
            'g-recaptcha-response' => 'required|recaptcha'
        ],
        [
            'g-recaptcha-response.recaptcha' => 'Captcha verification failed',
            'g-recaptcha-response.required' => 'Please complete the captcha'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $validated = $validator->validated();

        $mail = [
            'subject' => "From Contact Form: " . $validated['subject'],
            'message' => $validated['message'],
            'name' => $validated['name'],
            'email' => $validated['email'],
        ];

        Mail::to("msblog@medostudios.com")->queue(new Contact($mail));

        if(!Mail::failures()){
            return back()->with(['state' => 'success', 'message' => 'Message sent successfully!']);
        }else{
            return back()->with(['state' => 'failed', 'message' => 'Message was not sent successfully! Please try later.']);
        }
    }
}
