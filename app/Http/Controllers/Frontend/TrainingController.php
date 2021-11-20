<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TrainingPageAd;
use App\Models\Training;
use App\Models\TopBanners;
use Mail;  
use \App\Mail\TrainingMail;

class TrainingController extends Controller
{
    public function index()
    {
        $training_ad = TrainingPageAd::first();
        $main_image = TopBanners::where('position','main_image')->first();

        return view('frontend.training',[
            'training_ad' => $training_ad,
            'main_image' => $main_image
        ]);
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
