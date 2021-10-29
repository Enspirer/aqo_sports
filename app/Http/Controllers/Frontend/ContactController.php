<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\Frontend\Contact\SendContact;
use App\Http\Requests\Frontend\Contact\SendContactRequest;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use Mail;  
use \App\Mail\ContactUsMail;

/**
 * Class ContactController.
 */
class ContactController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.contact');
    }

    public function store(Request $request)
    {        
        // dd($request);     
   
        $contactus = new ContactUs;

        $contactus->first_name=$request->first_name;
        $contactus->last_name=$request->last_name;
        $contactus->email=$request->email;
        $contactus->phone_number=$request->phone;
        $contactus->message=$request->message;
        $contactus->status='Pending'; 

        $contactus->save();

        $details = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message
        ];

        \Mail::to([$request->email,'nihsaan.enspirer@gmail.com'])->send(new ContactUsMail($details));
        
        session()->flash('message','Thanks!');

        return back();    
    }

    /**
     * @param SendContactRequest $request
     *
     * @return mixed
     */
    public function send(SendContactRequest $request)
    {
        Mail::send(new SendContact($request));

        return redirect()->back()->withFlashSuccess(__('alerts.frontend.contact.sent'));
    }
}
