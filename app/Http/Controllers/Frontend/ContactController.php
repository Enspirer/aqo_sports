<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\Frontend\Contact\SendContact;
use App\Http\Requests\Frontend\Contact\SendContactRequest;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use Mail;  
use App\Mail\ContactUsMail;
use Modules\Competition\Entities\Competition;
use Modules\Competition\Entities\Competitor;

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

    public function ranking($competiton_id)
    {
        $competitons = Competition::where('status',1)->get();
        // dd($competitons);        

        $competitionDetails = Competition::where('id',$competiton_id)->first();

        if($competitionDetails == null){

            return view('frontend.ranking',[
                'competitons' => $competitons,
                'competitionDetails' => $competitionDetails
            ]);

        }else{
            
            $competitionDetails = Competition::where('id',$competiton_id)->first();
            $markSection = json_decode($competitionDetails->marks_sections);
            $roundSection = json_decode($competitionDetails->rounds_section);
            $competitorDetails = Competitor::where('competition_id',$competiton_id)->where('competitor_status',1)->orderBy('rank','ASC')->get();
            // dd($markSection);

            return view('frontend.ranking',[
                'competitons' => $competitons,
                'markSection' => $markSection,
                'roundSection' => $roundSection,
                'competitor_details' => $competitorDetails,
                'competitionDetails' => $competitionDetails
            ]);

        }
        
    }

    public function search_ranking(Request $request)
    {
        //  dd($request);      

         return redirect()->route('frontend.ranking',$request->competition);
    }

    

    public function votes($competiton_id)
    {
        $competitons = Competition::where('status',1)->get();
        // dd($competitons);        

        $competitionDetails = Competition::where('id',$competiton_id)->first();
        $getCompetitorDetails = Competitor::getAppliedCompetitorsUsers($competiton_id,1);
        // dd($getCompetitorDetails);

        if($competitionDetails == null){

            return view('frontend.votes',[
                'competitons' => $competitons,
                'competition_details' => $competitionDetails,
                'getCompetitorDetails' => $getCompetitorDetails
            ]);

        }else{
            // dd('aa');


            // $getCompetitorDetails = Competitor::getAppliedCompetitorsUsers($competiton_id,1);
            // dd($markSection);

            $getCompetitorDetails = Competitor::getAppliedCompetitorsUsers($competiton_id,1);
            // dd($getCompetitorDetails);

            return view('frontend.votes',[
                'competitons' => $competitons,
                'competition_details' => $competitionDetails,
                'getCompetitorDetails' => $getCompetitorDetails,
            ]);

        }
        
    }

    public function search_votes(Request $request)
    {
        //  dd($request);      

         return redirect()->route('frontend.votes',$request->competition);
    }



}
