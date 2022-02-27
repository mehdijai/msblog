<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Mail\Newsletter\Activate;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        //
    }
    
    /**
     * Request newsletter submition
     * Send an activation email
     * After the email is verified add to DB
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function request(Request $newsletter)
    {
        $back = url()->previous().'#newsletter';

        $validator = Validator::make($newsletter->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:newsletters',
        ],
        [
            'email.unique' => 'This email is already subscribed!',
        ]);

        if ($validator->fails()) {
            return redirect($back)->withErrors($validator)->withInput();
        }
        
        $validated = $validator->validated();
        
        $confirmEmailUrl = URL::temporarySignedRoute(
            "newsletter.confirm", 
            now()->addDay(),
            [
            "subscriber" => $validator->safe()->except(['g-recaptcha-response']),
            ]
        );

        $subscriber = array_merge($validator->safe()->except('g-recaptcha-response'), ['confirm_url' => $confirmEmailUrl]);

        Mail::to($validated['email'])->send(new Activate($subscriber));

        if(!Mail::failures()){
            return redirect($back)->with(['state' => 'success', 'message' => 'Great! Subscription is half-ready. A confirmation email is not sent to you. Please confirm it!']);
        }else{
            return redirect($back)->with(['state' => 'failed', 'message' => 'There was some error! Please try later.']);
        }
    }

    public function confirm(Request $request)
    {

        if(!$request->hasValidSignature()){
            return view('blog.newsletter')->with(['state' => 'failed', 'message' => "Oops! The link is not valid anymore"]);
        } 

        $validator = Validator::make($request->subscriber, [
            'name' => 'required|string',
            'email' => 'required|email|unique:newsletters',
        ]);

        if ($validator->fails()) {
            return view('blog.newsletter')->with(['state' => 'failed', 'message' => "Oops! The link is not valid"]);
        }

        $validater_subscriber = $validator->validated();

        Newsletter::create([
            'name' => $validater_subscriber['name'],
            'email' => $validater_subscriber['email'],
        ]);

        return view('blog.newsletter')->with(['state' => 'success', 'message' => 'Thank you '. $validater_subscriber['name'] .'! You are now a part of our community.']);

    }
}
