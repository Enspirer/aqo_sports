<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Training;
use Mail;  
use \App\Mail\TrainingMail;

class TrainingController extends Controller
{
    public function index()
    {
        return view('frontend.training');
    }

    public function store(Request $request)
    {
        // dd($request);

        $add = new Training;

        if(!empty( auth()->user()->id) === true ){
            $add->user_id=auth()->user()->id;
        } 
        $add->time_zone=$request->time_zone;
        $add->first_name=$request->first_name;
        $add->last_name=$request->last_name;
        $add->email=$request->email;
        $add->phone_number=$request->phone;
        $add->country=$request->country;
        $add->state=$request->state;
        $add->address=$request->address;
        $add->city=$request->city;
        $add->postal_code=$request->postal_code;
        $add->description=$request->assist_tournament;
        $add->comments=$request->questions;
        $add->status='Pending'; 

        $add->save();

        $details = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'time_zone' => $request->time_zone,
            'phone' => $request->phone,
            'email' => $request->email,
            'country' => $request->country,
            'state' => $request->state,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'assist_tournament' => $request->assist_tournament,
            'questions' => $request->questions
        ];

        \Mail::to([$request->email,'nihsaan.enspirer@gmail.com'])->send(new TrainingMail($details));
        
        session()->flash('message','Thanks!');

        return back();
    }
}
